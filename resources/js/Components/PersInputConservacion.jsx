import { useState, useEffect, useCallback } from "react";

export default function PersInputConservacion() {
  const [conservaciones, setConservaciones] = useState([]);
  const [selectedValue, setSelectedValue] = useState("");
  const [nuevoValue, setNuevoValue] = useState("");
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [editIndex, setEditIndex] = useState(null);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState("");

  // Cargar los métodos de conservación
  useEffect(() => {
    setLoading(true);
    fetch("/ProyectoSubidaNotaDAW/public/formatos")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Error en la carga de datos.");
        }
        return response.json();
      })
      .then((data) => {
        const nombres = data.map((item) => item.nombre);
        setConservaciones(nombres);
      })
      .catch((error) => setError(error.message))
      .finally(() => setLoading(false));
  }, []);

  const handleConservacionChange = (event) => {
    setSelectedValue(event.target.value);
  };

  const openModal = useCallback(() => {
    setIsModalOpen(true);
  }, []);

  const closeModal = useCallback(() => {
    setIsModalOpen(false);
    setNuevoValue("");
    setEditIndex(null);
  }, []);

  const saveModal = useCallback(() => {
    if (nuevoValue.trim() !== "") {
      const updatedConservaciones = editIndex !== null
        ? conservaciones.map((item, index) =>
            index === editIndex ? nuevoValue : item
          )
        : [...conservaciones, nuevoValue];
      
      setConservaciones(updatedConservaciones);
    }
    closeModal();
  }, [nuevoValue, conservaciones, editIndex, closeModal]);

  const openEditModal = (index) => {
    setEditIndex(index);
    setNuevoValue(conservaciones[index]);
    openModal();
  };

  const handleDelete = (index) => {
    setConservaciones(conservaciones.filter((_, i) => i !== index));
  };

  if (loading) {
    return <div className="text-center">Cargando...</div>;
  }

  if (error) {
    return <div className="text-center text-red-500">{error}</div>;
  }

  return (
    <div className="flex justify-center p-8 items-center rounded-lg shadow-lg">
      <div className="space-y-6 p-6 border rounded-lg shadow-lg bg-white w-full max-w-lg">
        <h2 className="text-2xl font-bold text-center mb-6 bg-gray-900 p-2 rounded-xl text-white">
          Conservación
        </h2>

        <div id="conservacion" className="space-y-3">
          <label className="block text-lg font-semibold text-gray-700" htmlFor="conservacion">
            Método de Conservación:
          </label>

          <div className="grid lg:grid-cols-2 md:grid-cols-1 sm:grid-cols-1 gap-4">
            {conservaciones.map((item, index) => (
              <label
                key={index}
                className={`cursor-pointer p-4 rounded-lg border-2 text-center text-gray-700 transition hover:scale-105 
                ${selectedValue === item
                  ? "bg-blue-500 text-white border-blue-900"
                  : "bg-gray-100 border-gray-300 hover:bg-gray-100"}`}
                aria-labelledby={`conservacion-${index}`}
              >
                <input
                  type="radio"
                  name="conservacion"
                  value={item}
                  id={`conservacion-${index}`}
                  checked={selectedValue === item}
                  onChange={handleConservacionChange}
                  className="hidden"
                  aria-label={`Selecciona el método de conservación ${item}`}
                />
                <span>{item}</span>
                <div className="flex justify-center space-x-2 mt-2">
                  <button
                    className="text-sm px-2 py-1 bg-blue-950 hover:bg-slate-950 text-white rounded"
                    onClick={(event) => {
                      event.preventDefault();
                      openEditModal(index);
                    }}
                    aria-label={`Editar el método de conservación ${item}`}
                  >
                    Editar
                  </button>
                  <button
                    className="text-sm px-2 py-1 bg-red-600 hover:bg-red-800 text-white rounded"
                    onClick={(e) => {
                      e.preventDefault();
                      handleDelete(index);
                    }}
                    aria-label={`Eliminar el método de conservación ${item}`}
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
            aria-label="Añadir un nuevo método de conservación"
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
              aria-label="Escribe el nombre del nuevo método de conservación"
            />
            <div className="flex justify-center space-x-4">
              <button
                className="bg-blue-500 text-white px-4 py-2 rounded-lg"
                onClick={saveModal}
                aria-label="Guardar método"
              >
                Guardar
              </button>
              <button
                className="bg-red-500 text-white px-4 py-2 rounded-lg"
                onClick={closeModal}
                aria-label="Cancelar la operación"
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
