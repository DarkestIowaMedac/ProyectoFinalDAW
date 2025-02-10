import { useState } from "react";

export default function PersInputConservacion() {
  const [conservaciones, setConservaciones] = useState([
    "Refrigeración",
    "Congelación",
    "Deshidratación",
  ]);

  const [nuevoValue, setNuevoValue] = useState(""); // Estado para el valor del input en el modal
  const [isModalOpen, setIsModalOpen] = useState(false); // Estado para controlar la visibilidad del modal
  const [editIndex, setEditIndex] = useState(null); // Estado para almacenar el índice de la opción que se está editando

  const openModal = () => {
    setIsModalOpen(true); // Abre el modal
  };

  const closeModal = () => {
    setIsModalOpen(false); // Cierra el modal
    setNuevoValue(""); // Limpia el input
    setEditIndex(null); // Resetea el índice de edición
  };

  const saveModal = () => {
    if (nuevoValue.trim() !== "") {
      if (editIndex !== null) {
        // Si estamos editando, actualizamos el valor en la lista
        const updatedConservaciones = [...conservaciones];
        updatedConservaciones[editIndex] = nuevoValue;
        setConservaciones(updatedConservaciones);
      } else {
        // Si no estamos editando, agregamos un nuevo valor
        setConservaciones([...conservaciones, nuevoValue]);
      }
    }
    closeModal(); // Cierra el modal
  };

  const openEditModal = (index) => {
    setEditIndex(index); // Guarda el índice de la opción que se está editando
    setNuevoValue(conservaciones[index]); // Carga el valor actual en el input
    openModal(); // Abre el modal
  };

  return (
    <>
      <legend>Selecciona el método de conservación:</legend>

      {conservaciones.map((conser, index) => (
        <label key={index}>
          <input
            type="radio"
            name="muestra"
            value={conser}
            required
          />
          {conser}

          <button
            className="px-4 py-2 border border-blue-400"
            onClick={(event) => 
              {openEditModal(index)
              event.preventDefault()}
            } // Abre el modal para editar
          >
            Editar
          </button>

          <button
            className="px-4 py-2 border border-blue-400"
            onClick={(e) =>{
              e.preventDefault()
              setConservaciones(conservaciones.filter((_, i) => i !== index))
            }}
          >
            Borrar
          </button>

          <br />
        </label>
      ))}

      <button
        className="px-4 py-2 border border-green-400"
        onClick={(e)=>{
          e.preventDefault()
          openModal()
        }}
      >
        Añadir Nuevo
      </button>

      {/* Modal */}
      {isModalOpen && (
        <div
          style={{
            position: "fixed",
            top: 0,
            left: 0,
            width: "100%",
            height: "100%",
            backgroundColor: "rgba(0, 0, 0, 0.5)",
            display: "flex",
            justifyContent: "center",
            alignItems: "center",
          }}
        >
          <div
            style={{
              backgroundColor: "#fff",
              padding: "20px",
              borderRadius: "8px",
              width: "300px",
              textAlign: "center",
            }}
          >
            <h2>{editIndex !== null ? "Editar Método" : "Añadir Método"}</h2>
            <input
              type="text"
              placeholder="Escribe aquí..."
              value={nuevoValue}
              onChange={(e) => setNuevoValue(e.target.value)}
              style={{
                width: "100%",
                padding: "10px",
                marginBottom: "15px",
                border: "1px solid #ccc",
                borderRadius: "4px",
              }}
            />
            <div>
              <button
                style={{
                  padding: "10px 20px",
                  margin: "5px",
                  backgroundColor: "#4CAF50",
                  color: "white",
                  border: "none",
                  borderRadius: "4px",
                  cursor: "pointer",
                }}
                onClick={saveModal}
              >
                Guardar
              </button>
              <button
                style={{
                  padding: "10px 20px",
                  margin: "5px",
                  backgroundColor: "#f44336",
                  color: "white",
                  border: "none",
                  borderRadius: "4px",
                  cursor: "pointer",
                }}
                onClick={closeModal}
              >
                Cancelar
              </button>
            </div>
          </div>
        </div>
      )}
    </>
  );
}