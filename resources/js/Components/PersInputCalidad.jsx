import { useState, useEffect } from "react";

export function PersInputCalidad() {
  const [calidades, setCalidades] = useState([]);
  const [selectedCalidad, setSelectedCalidad] = useState("");
  const [descripcionCalidad, setDescripcionCalidad] = useState("");
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState("");

  useEffect(() => {
    fetch("/ProyectoSubidaNotaDAW/public/verCalidades")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Error en la respuesta del servidor");
        }
        return response.json();
      })
      .then((data) => {
        setCalidades(data);
        setLoading(false);
      })
      .catch((error) => {
        console.error("Error al obtener las calidades:", error);
        setError("No se pudieron cargar las calidades");
        setLoading(false);
      });
  }, []);

  const handleChange = (event) => {
    const selectedCodigo = event.target.value;
    setSelectedCalidad(selectedCodigo);

    const calidadSeleccionada = calidades.find(
      (calidad) => calidad.codigo === selectedCodigo
    );
    setDescripcionCalidad(calidadSeleccionada?.texto || "No hay descripción disponible.");
  };

  return (
    <div className="flex justify-center p-8 items-center rounded-lg shadow-[inset_0_0_10px_rgba(0,0,0,0.8)]">
      <div className="space-y-6 p-6 border rounded-lg shadow-lg bg-white w-full max-w-lg">
        <h2 className="text-2xl font-bold text-center mb-6 bg-gray-900 p-2 rounded-xl text-white">
          Calidad de la Muestra
        </h2>

        {/* Calidad de la Muestra */}
        <div id="calidad" className="space-y-3">
          <label
            htmlFor="calidadInput"
            className="block text-lg font-semibold text-gray-700"
          >
            Calidad de la Muestra:
          </label>

          {loading ? (
            <p className="text-center text-gray-500">Cargando calidades...</p>
          ) : error ? (
            <p className="text-center text-red-500">{error}</p>
          ) : (
            <select
              name="calidad_id"
              id="calidad"
              value={selectedCalidad}
              onChange={handleChange}
              required
              aria-label="Selecciona la calidad de la muestra"
              className="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
            >
              <option value="" disabled>
                Seleccionar Calidad
              </option>
              {calidades.length > 0 ? (
                calidades.map((calidad) => (
                  <option value={calidad.codigo} key={calidad.id}>
                    {calidad.codigo}
                  </option>
                ))
              ) : (
                <option disabled>No hay calidades disponibles</option>
              )}
            </select>
          )}
        </div>

        {/* Descripción de la Calidad */}
        <div id="descripcionCalidad" className="space-y-3">
          <label
            htmlFor="descripcioncalidad"
            className="block text-lg font-semibold text-gray-700"
          >
            Descripción de la Calidad:
          </label>
          <textarea
            id="descripcioncalidad"
            name="descripcion_calidad"
            value={descripcionCalidad}
            readOnly
            placeholder="La descripción aparecerá aquí..."
            className="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 resize-none h-24 bg-gray-100"
            aria-label="Descripción de la calidad seleccionada"
          />
        </div>
      </div>
    </div>
  );
}
