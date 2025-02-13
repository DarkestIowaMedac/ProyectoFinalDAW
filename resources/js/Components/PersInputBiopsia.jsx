import { useState, useEffect } from "react";

export function PersInputBiopsia() {
  const [biopsias, setBiopsias] = useState([]);
  const [selectedBiopsy, setSelectedBiopsy] = useState("");
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState("");

  useEffect(() => {
    fetch("/ProyectoSubidaNotaDAW/public/verNaturalezas")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Error en la respuesta del servidor");
        }
        return response.json();
      })
      .then((data) => {
        setBiopsias(data);
        setLoading(false);
      })
      .catch((error) => {
        console.error("Error al obtener las biopsias:", error);
        setError("No se pudieron cargar las biopsias.");
        setLoading(false);
      });
  }, []);

  const handleChange = (event) => {
    setSelectedBiopsy(event.target.value);
  };

  return (
    <div className="flex justify-center p-8 items-center rounded-lg shadow-[inset_0_0_10px_rgba(0,0,0,0.8)]">
      <div className="space-y-6 p-6 border rounded-lg shadow-lg bg-white w-full max-w-lg">
        <h2 className="text-2xl font-bold text-center mb-6 bg-gray-900 p-2 rounded-xl text-white">
          Selección de Biopsia
        </h2>

        {/* Biopsia */}
        <div id="biopsia" className="space-y-3">
          <label
            htmlFor="biopsiaInput"
            className="block text-lg font-semibold text-gray-700"
          >
            Selecciona el tipo de biopsia:
          </label>

          {loading ? (
            <p className="text-center text-gray-500">Cargando biopsias...</p>
          ) : error ? (
            <p className="text-center text-red-500">{error}</p>
          ) : (
            <select
              name="biopsia_id"
              id="biopsia"
              value={selectedBiopsy}
              onChange={handleChange}
              required
              aria-label="Selecciona el tipo de biopsia"
              className="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
            >
              <option value="" disabled>
                Seleccionar Biopsia
              </option>
              {biopsias.length > 0 ? (
                biopsias.map((biopsia) => (
                  <option value={biopsia.codigo} key={biopsia.id}>
                    {biopsia.tipoEstudio}
                  </option>
                ))
              ) : (
                <option disabled>No hay biopsias disponibles</option>
              )}
            </select>
          )}
        </div>
      </div>
    </div>
  );
}
