import { useState } from "react";

export default function PersInputConservacion() {
  const [conservaciones, setConservaciones] = useState([
    "Refrigeración",
    "Congelación",
    "Deshidratación",
  ]);

  const [selectedValue, setSelectedValue] = useState(""); // Estado para la opción seleccionada
  const [nuevoValue, setNuevoValue] = useState(""); // Estado para el valor del input en el modal
  const [isModalOpen, setIsModalOpen] = useState(false); // Estado para controlar la visibilidad del modal
  const [editIndex, setEditIndex] = useState(null); // Estado para almacenar el índice de la opción que se está editando

  const handleConservacionChange = (event) => {
    setSelectedValue(event.target.value); // Actualiza el estado con la opción seleccionada
  };

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
    <div className="flex justify-center p-8 items-center rounded-lg shadow-[inset_0_0_10px_rgba(0,0,0,0.8)]">
      <div className="space-y-6 p-6 border rounded-lg shadow-lg bg-white w-full max-w-lg">
        <h2 className="text-2xl font-bold text-center mb-6 bg-gray-900 p-2 rounded-xl text-white">
          Conservación
        </h2>

        <div id="conservacion" className="space-y-3">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            height="24px"
            viewBox="0 -960 960 960"
            width="24px"
            fill="#e8eaed"
          >
            <path d="M216-176q-45-45-70.5-104T120-402q0-63 24-124.5T222-642q35-35 86.5-60t122-39.5Q501-756 591.5-759t202.5 7q8 106 5 195t-16.5 160.5q-13.5 71.5-38 125T684-182q-53 53-112.5 77.5T450-80q-65 0-127-25.5T216-176Zm112-16q29 17 59.5 24.5T450-160q46 0 91-18.5t86-59.5q18-18 36.5-50.5t32-85Q709-426 716-500.5t2-177.5q-49-2-110.5-1.5T485-670q-61 9-116 29t-90 55q-45 45-62 89t-17 85q0 59 22.5 103.5T262-246q42-80 111-153.5T534-520q-72 63-125.5 142.5T328-192Zm0 0Zm0 0Z" />
          </svg>

          <label
            htmlFor="conservacionInput"
            className="block text-lg font-semibold text-gray-700"
          >
            Método de Conservación:
          </label>

          <div className="grid lg:grid-cols-2 md:grid-cols-1 sm:grid-cols-1 gap-4">
            {conservaciones.map((item, index) => (
              <label
                key={index}
                className={`cursor-pointer p-4 rounded-lg border-2 text-center text-gray-700 transition duration-300 ease-in-out transform hover:scale-105 
                ${
                  selectedValue === item
                    ? "bg-blue-500 text-white border-blue-600"
                    : "bg-white border-gray-300 hover:bg-gray-100"
                }`}
              >
                <input
                  type="radio"
                  name="conservacion"
                  value={item}
                  checked={selectedValue === item}
                  onChange={handleConservacionChange}
                  className="hidden"
                />
                <span>{item}</span>
                <div className="flex justify-center space-x-2 mt-2">
                  <button
                    className="text-sm px-2 py-1 bg-yellow-500 text-white rounded"
                    onClick={(event) => {
                      event.preventDefault();
                      openEditModal(index);
                    }}
                  >
                    Editar
                  </button>
                  <button
                    className="text-sm px-2 py-1 bg-red-500 text-white rounded"
                    onClick={(e) => {
                      e.preventDefault();
                      setConservaciones(
                        conservaciones.filter((_, i) => i !== index)
                      );
                    }}
                  >
                    Borrar
                  </button>
                </div>
              </label>
            ))}
          </div>

          <button
            className="w-full bg-green-500 text-white font-semibold py-2 rounded-lg hover:bg-green-600 transition"
            onClick={(e) => {
              e.preventDefault();
              openModal();
            }}
          >
            Añadir Nuevo Método
          </button>
        </div>
      </div>

      {/* Modal */}
      {isModalOpen && (
        <div className="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center">
          <div className="bg-white p-6 rounded-lg w-80 text-center">
            <h2 className="text-lg font-semibold mb-4">
              {editIndex !== null ? "Editar Método" : "Añadir Método"}
            </h2>
            <input
              type="text"
              placeholder="Escribe aquí..."
              value={nuevoValue}
              onChange={(e) => setNuevoValue(e.target.value)}
              className="w-full px-3 py-2 border border-gray-300 rounded-md mb-4"
            />
            <div className="flex justify-center space-x-4">
              <button
                className="bg-blue-500 text-white px-4 py-2 rounded-lg"
                onClick={saveModal}
              >
                Guardar
              </button>
              <button
                className="bg-red-500 text-white px-4 py-2 rounded-lg"
                onClick={closeModal}
              >
                Cancelar
              </button>
            </div>
          </div>
        </div>
      )}
    </div>
  );
}
