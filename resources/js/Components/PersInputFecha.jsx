import { useState } from "react";

export default function PersInputFecha() {
  // Obtener la fecha actual en formato YYYY-MM-DD
  const getCurrentDate = () => {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, "0");
    const day = String(today.getDate()).padStart(2, "0");
    return `${year}-${month}-${day}`;
  };

  // Estado para manejar la fecha
  const [selectedDate, setSelectedDate] = useState(getCurrentDate());

  return (
    <div className="bg-white p-8 rounded-lg shadow-[inset_0_0_10px_rgba(0,0,0,0.8)]">
      <div className="flex flex-col items-center space-y-4 p-6 border rounded-lg bg-white shadow-lg max-w-full sm:max-w-md mx-auto">
        <h2 className="lg:text-2xl md:text-xl sm:text-lg w-full font-bold text-center mb-6 bg-gray-900 p-2 sm:p-1 rounded-xl text-white">
          Fecha de registro
        </h2>

        <label htmlFor="fecha" className="sr-only">
          Selecciona una fecha de registro
        </label>

        <input
          type="date"
          id="fecha"
          name="fecha"
          value={selectedDate}
          onChange={(event) => setSelectedDate(event.target.value)}
          required
          aria-label="Seleccione una fecha"
          aria-describedby="fechaHelp"
          max={getCurrentDate()} // Restricción de fecha máxima para evitar seleccionar fechas futuras
          className="block w-full lg:p-3 md:p-2 sm:p-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 text-lg md:text-base sm:text-sm"
        />
        <p id="fechaHelp" className="text-sm text-gray-500 mt-2">
          La fecha no puede ser posterior a la fecha actual.
        </p>
      </div>
    </div>
  );
}
