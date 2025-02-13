import { useState, useEffect } from "react";

export function PersInputInterpretacion() {
    const [interpretaciones, setInterpretaciones] = useState([{ codigo: "", descripcion: "" }]);
    const [códigosDisponibles, setCódigosDisponibles] = useState([]);
    const [todosLosDatos, setTodosLosDatos] = useState([]);
    const [isLoading, setIsLoading] = useState(true); // Estado de carga
    const [error, setError] = useState(null); // Estado de error

    // Cargar los datos de las interpretaciones al montar el componente
    useEffect(() => {
        const cargarDatos = async () => {
            try {
                const response = await fetch("/ProyectoSubidaNotaDAW/public/verInterpretaciones");
                const data = await response.json();
                setTodosLosDatos(data); // Guardamos todos los datos
                const códigos = data.map((item) => item.codigo); // Extraemos los códigos
                setCódigosDisponibles(códigos);
            } catch (error) {
                setError("Error al cargar las interpretaciones.");
                console.error("Error al cargar las interpretaciones:", error);
            } finally {
                setIsLoading(false); // Desactivamos el estado de carga
            }
        };
        cargarDatos();
    }, []);

    // Añadir una nueva interpretación vacía
    const anyadir = () => {
        setInterpretaciones([...interpretaciones, { codigo: "", descripcion: "" }]);
    };

    // Eliminar una interpretación
    const borrar = () => {
        if (interpretaciones.length <= 1) {
            alert("Debe haber mínimo 1 interpretación");
        } else {
            setInterpretaciones(interpretaciones.slice(0, -1));
        }
    };

    // Actualizar el código seleccionado y la descripción correspondiente
    const actualizarCodigo = (indice, nuevoCodigo) => {
        const nuevasInterpretaciones = [...interpretaciones];
        nuevasInterpretaciones[indice].codigo = nuevoCodigo;

        const descripcionCorrespondiente = todosLosDatos.find(
            (item) => item.codigo === nuevoCodigo
        )?.texto || ""; // Si no lo encuentra, dejamos la descripción vacía

        nuevasInterpretaciones[indice].descripcion = descripcionCorrespondiente;
        setInterpretaciones(nuevasInterpretaciones);
    };

    // Actualizar la descripción manualmente
    const actualizarDescripcion = (indice, nuevaDescripcion) => {
        const nuevasInterpretaciones = [...interpretaciones];
        nuevasInterpretaciones[indice].descripcion = nuevaDescripcion;
        setInterpretaciones(nuevasInterpretaciones);
    };

    return (
        <div className="flex justify-center p-4 xs:p-6 items-center rounded-lg py-6 shadow-[inset_0_0_10px_rgba(0,0,0,0.8)]">
            <div className="space-y-4 p-4 xs:p-6 border rounded-lg shadow-lg bg-white w-full max-w-xs xs:max-w-sm md:max-w-lg">
                <h2 className="text-xl xs:text-lg font-bold text-center mb-4 bg-gray-900 p-2 rounded-xl text-white">
                    Interpretación de la Muestra
                </h2>

                {/* Manejando el error */}
                {error && <p className="text-red-500 text-center">{error}</p>}

                {isLoading ? (
                    <p className="text-gray-500 text-center">Cargando datos...</p>
                ) : (
                    interpretaciones.map((interpretacion, index) => (
                        <div key={index} className="border-b pb-4 mb-4">
                            {/* Código de Interpretación */}
                            <label
                                htmlFor={`codigo-${index}`}
                                className="block text-lg font-semibold text-gray-700"
                            >
                                Código de interpretación:
                            </label>
                            <select
                                name="codigo"
                                id={`codigo-${index}`}
                                value={interpretacion.codigo}
                                onChange={(e) => actualizarCodigo(index, e.target.value)}
                                required
                                className="block w-full p-2 xs:p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                                aria-label={`Código de interpretación ${index + 1}`}
                            >
                                <option value="" disabled>
                                    Seleccionar Código
                                </option>
                                {códigosDisponibles.map((codigo, idx) => (
                                    <option key={idx} value={codigo}>
                                        {codigo}
                                    </option>
                                ))}
                            </select>

                            {/* Descripción de la Interpretación */}
                            <label
                                htmlFor={`descripcion-${index}`}
                                className="block text-lg font-semibold text-gray-700 mt-4"
                            >
                                Descripción de la interpretación:
                            </label>
                            <textarea
                                id={`descripcion-${index}`}
                                name="descripcioncalidad"
                                placeholder="Proporciona más detalles sobre la interpretación..."
                                value={interpretacion.descripcion}
                                onChange={(e) => actualizarDescripcion(index, e.target.value)}
                                className="block w-full p-2 xs:p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 resize-none h-20 xs:h-24"
                                aria-label={`Descripción de interpretación ${index + 1}`}
                            />
                        </div>
                    ))
                )}

                <div className="flex flex-col sm:flex-col md:flex-col lg:flex-row justify-center gap-2 w-full">
                    <button
                        className="w-full sm:w-auto lg:px-4 lg:py-2 md:px-4 md:py-2 sm:px-2 sm:py-1 bg-blue-950 text-white font-semibold rounded-lg shadow hover:bg-slate-950 transition duration-300"
                        onClick={(e) => {
                            e.preventDefault();
                            anyadir();
                        }}
                    >
                        Añadir Interpretación
                    </button>

                    <button
                        className="w-full sm:w-auto lg:px-4 lg:py-2 md:px-4 md:py-2 sm:px-3 sm:py-2 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-800 transition duration-300"
                        onClick={(e) => {
                            e.preventDefault();
                            borrar();
                        }}
                    >
                        Eliminar Interpretación
                    </button>
                </div>

            </div>
        </div>
    );
}
