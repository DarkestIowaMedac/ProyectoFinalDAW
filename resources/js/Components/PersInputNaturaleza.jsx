import { useState, useEffect } from "react";

export default function PersInputNaturaleza() {
  const [naturaleza, setNaturaleza] = useState(""); // Estado para la naturaleza seleccionada
  const [naturalezas, setNaturalezas] = useState([]); // Estado para las naturalezas obtenidas
  const [error, setError] = useState(null); // Estado para manejar errores

  // Función para obtener las naturalezas desde el backend
  const obtenerNaturalezas = async () => {
    try {
      const respuesta = await fetch("/ProyectoSubidaNotaDAW/public/verNaturalezas"); // Cambia la URL si es necesario
      if (!respuesta.ok) {
        throw new Error(`Error al obtener las naturalezas: ${respuesta.status}`);
      }
      const datos = await respuesta.json(); // Convierte la respuesta a JSON
      setNaturalezas(datos); // Actualiza el estado con las naturalezas obtenidas
    } catch (error) {
      setError(error.message); // Maneja errores
    }
  };

  // Llama a obtenerNaturalezas cuando el componente se monta
  useEffect(() => {
    obtenerNaturalezas();
  }, []);

  const handleNaturalezaChange = (event) => {
    setNaturaleza(event.target.value); // Actualiza la naturaleza seleccionada
  };

  return (
    <div className="flex justify-center p-8 items-center rounded-lg shadow-[inset_0_0_10px_rgba(0,0,0,0.8)] sm:p-4 md:p-6 lg:p-8">
      <div className="space-y-6 p-6 border rounded-lg shadow-lg bg-white w-full max-w-lg sm:max-w-md md:max-w-lg lg:max-w-xl">
        <h2 className="lg:text-2xl md:text-xl sm:text-lg w-full font-bold text-center mb-6 bg-gray-900 p-2 sm:p-1 rounded-xl text-white">
          Naturaleza
        </h2>

        {/* Naturaleza */}
        <div id="naturaleza" className="space-y-3">
          {error ? (
            <p className="text-red-500">Error: {error}</p>
          ) : naturalezas.length === 0 ? (
            <p className="text-gray-500">Cargando naturalezas...</p>
          ) : (
            <div className="space-y-4">
              <div className="grid lg:grid-cols-2 gap-4 sm:grid-cols-1 md:grid-cols-2">
                {naturalezas.map((item) => (
                  <label
                    key={item.id} // Usa un identificador único de la naturaleza
                    className={`cursor-pointer p-4 sm:p-2 md:p-3 rounded-lg border-2 text-center text-gray-700 transition duration-700 ease-in-out transform hover:scale-105  
                      ${
                        naturaleza === item.codigo
                          ? "bg-blue-500 text-white border-blue-900 hover:shadow-2xl hover:shadow-blue-500/50"
                          : "bg-gray-100 border-gray-300 hover:bg-gray-100"
                      }`}
                  >
                    <input
                      type="radio"
                      name="naturaleza"
                      value={item.codigo} // Usa el tipo de estudio como valor
                      checked={naturaleza === item.codigo}
                      onChange={handleNaturalezaChange}
                      className="hidden sm:w-full"
                    />
                    <span className="sm:text-sm md:text-base lg:text-lg">
                      {item.codigo} {/* Muestra el tipo de estudio */}
                    </span>
                  </label>
                ))}
              </div>
            </div>
          )}
        </div>
      </div>
    </div>
  );
}