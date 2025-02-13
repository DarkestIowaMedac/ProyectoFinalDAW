import { useState, useEffect } from "react";

export default function PersInputConservacion() {
  const [conservaciones, setConservaciones] = useState([]);
  const [selectedValue, setSelectedValue] = useState("");
  const [nuevoValue, setNuevoValue] = useState("");
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [editIndex, setEditIndex] = useState(null);

  useEffect(() => {
    fetch("/ProyectoSubidaNotaDAW/public/formatos")
      .then((response) => response.json())
      .then((data) => {
        const nombres = data.map((item) => item.nombre);
        setConservaciones(nombres);
      })
      .catch((error) => console.error("Error al cargar datos:", error));
  }, []);

  const handleConservacionChange = (event) => {
    setSelectedValue(event.target.value);
  };

  const openModal = () => {
    setIsModalOpen(true);
  };

  const closeModal = () => {
    setIsModalOpen(false);
    setNuevoValue("");
    setEditIndex(null);
  };

  const saveModal = () => {
    if (nuevoValue.trim() !== "") {
      if (editIndex !== null) {
        const updatedConservaciones = [...conservaciones];
        updatedConservaciones[editIndex] = nuevoValue;
        setConservaciones(updatedConservaciones);
      } else {
        setConservaciones([...conservaciones, nuevoValue]);
      }
    }
    closeModal();
  };

  const openEditModal = (index) => {
    setEditIndex(index);
    setNuevoValue(conservaciones[index]);
    openModal();
  };

  return (
    <div className="flex justify-center p-8 items-center rounded-lg shadow-lg">
      <div className="space-y-6 p-6 border rounded-lg shadow-lg bg-white w-full max-w-lg">
        <h2 className="text-2xl font-bold text-center mb-6 bg-gray-900 p-2 rounded-xl text-white">
          Conservación
        </h2>

        <div id="conservacion" className="space-y-3">
          <label className="block text-lg font-semibold text-gray-700">
            Método de Conservación:
          </label>

          <div className="grid lg:grid-cols-2 md:grid-cols-1 sm:grid-cols-1 gap-4">
            {conservaciones.map((item, index) => (
              <label
                key={index}
                className={`cursor-pointer p-4 rounded-lg border-2 text-center text-gray-700 transition hover:scale-105 
                ${
                  selectedValue === item
                    ? "bg-blue-500 text-white border-blue-900"
                    : "bg-gray-100 border-gray-300 hover:bg-gray-100"
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
                    className="text-sm px-2 py-1 bg-blue-950 hover:bg-slate-950 text-white rounded"
                    onClick={(event) => {
                      event.preventDefault();
                      openEditModal(index);
                    }}
                  >
                    Editar
                  </button>
                  <button
                    className="text-sm px-2 py-1 bg-red-600 hover:bg-red-800 text-white rounded"
                    onClick={(e) => {
                      e.preventDefault();
                      setConservaciones(conservaciones.filter((_, i) => i !== index));
                    }}
                  >
                    Borrar
                  </button>
                </div>
              </label>
            ))}
          </div>

          <button
            className="w-full bg-green-500 text-white font-semibold py-2 rounded-lg hover:bg-green-600"
            onClick={(e) => {
              e.preventDefault();
              openModal();
            }}
          >
            Añadir Nuevo Método
          </button>
        </div>
      </div>

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