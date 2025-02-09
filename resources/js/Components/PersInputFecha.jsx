import { useState, useEffect } from 'react';

export default function PersInputFecha() {
  // Obtener la fecha actual en formato YYYY-MM-DD
  const getCurrentDate = () => {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0'); // Mes en formato 2 dígitos
    const day = String(today.getDate()).padStart(2, '0'); // Día en formato 2 dígitos
    return `${year}-${month}-${day}`;
  };

  // Estado para manejar la fecha
  const [selectedDate, setSelectedDate] = useState(getCurrentDate());

  // Manejar el cambio de la fecha
  const handleDateChange = (event) => {
    setSelectedDate(event.target.value); // Actualiza el estado con la nueva fecha seleccionada
  };

  return (
    <>
      <legend>Fecha:</legend>
      <input
        type="date"
        id="fecha"
        name="fecha"
        value={selectedDate} // Valor inicial es la fecha actual
        onChange={handleDateChange} // Permite cambiar la fecha
        required
      />
    </>
  );
}