import { useState, useEffect } from "react";

export function PersInputInterpretacion() {
    const [interpretaciones, setInterpretaciones] = useState([
        { codigo: "", descripcion: "" },
    ]);
    const [códigosDisponibles, setCódigosDisponibles] = useState([]);
    const [todosLosDatos, setTodosLosDatos] = useState([]);

    useEffect(() => {
        // Cargar las interpretaciones desde el enlace
        fetch("/ProyectoSubidaNotaDAW/public/verInterpretaciones")
            .then((response) => response.json())
            .then((data) => {
                setTodosLosDatos(data); // Guardamos todos los datos
                const códigos = data.map((item) => item.codigo); // Solo los códigos
                setCódigosDisponibles(códigos);
            })
            .catch((error) => console.error("Error al cargar las interpretaciones:", error));
    }, []);

    const anyadir = () => {
        setInterpretaciones([...interpretaciones, { codigo: "", descripcion: "" }]);
    };

    const borrar = () => {
        if (interpretaciones.length <= 1) {
            alert("Debe haber mínimo 1 interpretación");
        } else {
            setInterpretaciones(interpretaciones.slice(0, -1));
        }
    };

    const actualizarCodigo = (indice, nuevoCodigo) => {
        const nuevasInterpretaciones = [...interpretaciones];
        nuevasInterpretaciones[indice].codigo = nuevoCodigo;

        // Encontramos el texto correspondiente al código seleccionado
        const descripcionCorrespondiente = todosLosDatos.find(
            (item) => item.codigo === nuevoCodigo
        )?.texto || ""; // Si no lo encuentra, pone una cadena vacía

        nuevasInterpretaciones[indice].descripcion = descripcionCorrespondiente;
        setInterpretaciones(nuevasInterpretaciones);
    };

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

                {interpretaciones.map((interpretacion, index) => (
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
                        />
                    </div>
                ))}

                <div className="flex justify-between flex-wrap md:justify-center sm:justify-center sm:gap-4 md:gap-4">
                    <button
                        className="lg:px-3 lg:py-2 md:px-3 md:py-2 sm:px-2 sm:py-1 bg-blue-950 text-white font-semibold rounded-lg shadow hover:bg-slate-950 transition duration-300 flex-2"
                        onClick={(e) => {
                            e.preventDefault();
                            anyadir();
                        }}
                    >
                        Añadir Interpretación
                    </button>

                    <button
                        className="lg:px-3 lg:py-2 md:px-3 md:py-2 sm:px-2 sm:py-1 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-800 transition duration-300 flex-2"
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
