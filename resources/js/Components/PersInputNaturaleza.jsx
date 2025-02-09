import { useState } from 'react';

export default function PersInputNaturaleza() {
  const [naturalezas, setNaturalezas] = useState([
    "Sangre",
    "Orina",
    "Saliva",
    "Esputo",
    "Heces",
    "Semen"
  ]);

  const [selectedValue, setSelectedValue] = useState(""); // Estado para la opción seleccionada

  const handleChange = (event) => {
    setSelectedValue(event.target.value); // Actualiza el estado con la opción seleccionada
  };

  return (
    <>
      <legend>Selecciona la naturaleza de la muestra:</legend>

      {naturalezas.map((natu, index) => (
        <label key={index}>
          <input  
            type="radio" 
            name="muestra" 
            value={natu} 
            onChange={handleChange} // Controlador para actualizar el estado
            required 
            readOnly={true}
          />
          {natu}
          <br />
        </label>
      ))}
    </>
  );
}