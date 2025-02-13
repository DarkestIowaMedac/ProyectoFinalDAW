import { PersMuestra } from "@/Components/PersMuestra"
import { useState, useEffect } from 'react';

export function TodasMuestras () {

    const [muestras, setMuestras] = useState([])

    const [muestrasok, setMuestrasOK] = useState(false)


    // Función para obtener las muestras desde el servidor
    const obtenerMuestras = () => {
        fetch("/ProyectoSubidaNotaDAW/public/muestras")
            .then((respuesta) => respuesta.json())
            .then((datos) => {
                setMuestras(datos); // Actualiza el estado con las muestras obtenidas
                setMuestrasOK(true)
            })
            .catch((error) => {
                console.error("Error al obtener las muestras:", error);
                setMuestrasOK(false)
            });
    };

    // Llamar a obtenerMuestras cuando el componente se monta
    useEffect(() => {
        obtenerMuestras();
    }, []);

    console.log(muestras)

    // Función para borrar una muestra
    const borrarMuestra = (id) => {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'); // Usa el operador opcional para evitar errores
    
        if (!csrfToken) {
            console.error("No se encontró el token CSRF en el documento HTML.");
            return;
        }
    
        fetch(`/ProyectoSubidaNotaDAW/public/borrarMuestra/${id}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken, // Incluye el token CSRF en los encabezados
            },
        })
            .then((respuesta) => {
                if (!respuesta.ok) {
                    throw new Error("Error al borrar la muestra");
                }
                return respuesta.json();
            })
            .then((datos) => {
                console.log(datos.message); // Mensaje de éxito del servidor
                obtenerMuestras(); // Vuelve a obtener las muestras después de borrar
            })
            .catch((error) => {
                console.error("Error al borrar la muestra:", error);
            });
    };


    return (
        <>
            {
                muestrasok ? (
                    muestras.length > 0 ? (
                        muestras.map((muestra) => (
                            <PersMuestra 
                                key={muestra.id} 
                                id={muestra.id}
                                funcionborrar={() => borrarMuestra(muestra.id)} 
                                codigo={muestra.codigo} 
                                fecha={muestra.fecha} 
                                organo={muestra.organo}
                                funcioneditar
                            />
                        ))
                    ) : (
                        <h1>No hay muestras disponibles</h1>
                    )
                ) : (
                    <h1>Error al cargar las muestras</h1>
                )
            }
        </>
    );
}