import { useState, useEffect } from "react";

export function PersInputCiudad() {
  const [sedes, setSedes] = useState([]);
  const [selectedSede, setSelectedSede] = useState("");

  useEffect(() => {
    fetch("/ProyectoSubidaNotaDAW/public/sedes")
      .then((response) => response.json())
      .then((data) => setSedes(data))
      .catch((error) => console.error("Error al obtener las sedes:", error));
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
          <svg
            xmlns="http://www.w3.org/2000/svg"
            height="24px"
            viewBox="0 -960 960 960"
            width="24px"
            fill="#e8eaed"
          >
            <path d="M280-200h80v-240h240v240h80v-320H280v320Zm-80 80v-480h560v480H560v-240H400v240H200Zm-40-520v-80h640v80H160Zm240 240v-80h160v80H400Zm80-40Z" />
          </svg>
          <label
            htmlFor="sedeInput"
            className="block text-lg font-semibold text-gray-700"
          >
            Selecciona una sede:
          </label>

          <select
            name="sede"
            id="sede"
            value={selectedSede}
            onChange={handleChange}
            required
            className="block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
          >
            <option value="" disabled>
              Seleccionar Sede
            </option>
            {sedes.map((sede) => (
              <option value={sede.codigo} key={sede.id}>
                {sede.nombre}
              </option>
            ))}
          </select>
        </div>
      </div>
    </div>
  );
}