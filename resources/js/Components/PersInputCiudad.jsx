import { useState, useEffect } from "react";

export function PersInputCiudad() {
  const [sedes, setSedes] = useState([]);
  const [selectedSede, setSelectedSede] = useState("");
  const [loading, setLoading] = useState(true); // Para mostrar la carga
  const [error, setError] = useState(""); // Para manejar los errores

  useEffect(() => {
    fetch("/ProyectoSubidaNotaDAW/public/sedes")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Error en la respuesta del servidor");
        }
        return response.json();
      })
      .then((data) => {
        if (Array.isArray(data)) {
          setSedes(data);
        } else {
          throw new Error("Los datos recibidos no son válidos");
        }
      })
      .catch((error) => {
        console.error("Error al obtener las sedes:", error);
        setError("No se pudieron cargar las sedes");
      })
      .finally(() => {
        setLoading(false);
      });
  }, []);

  const handleChange = (event) => {
    setSelectedSede(event.target.value);
  };

  return (
    <div className="flex justify-center p-8 items-center rounded-lg shadow-[inset_0_0_10px_rgba(0,0,0,0.8)]">
      <div className="space-y-6 p-6 border rounded-lg shadow-lg bg-white w-full max-w-lg">
        <h2 className="text-2xl font-bold text-center mb-6 bg-gray-900 p-2 rounded-xl text-white">
          Selección de Sede
        </h2>

        {/* Sede */}
        <div id="sede" className="space-y-3">
          <label
            htmlFor="sedeInput"
            className="block text-lg font-semibold text-gray-700"
          >
            Selecciona una sede:
          </label>

          {/* Si hay error, lo mostramos */}
          {error && (
            <p className="text-red-500 text-sm">
              {error}
            </p>
          )}

          <select
            name="sede_id"
            id="sede"
            value={selectedSede}
            onChange={handleChange}
            required
            disabled={loading} // Desactiva el select mientras se carga
            className="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
            aria-label="Selecciona una sede disponible"
          >
            <option value="" disabled>
              {loading ? "Cargando sedes..." : "Seleccionar Sede"}
            </option>
            {sedes.length > 0 ? (
              sedes.map((sede) => (
                <option value={sede.codigo} key={sede.id}>
                  {sede.nombre}
                </option>
              ))
            ) : (
              <option disabled>No hay sedes disponibles</option>
            )}
          </select>
        </div>
      </div>
    </div>
  );
}
