import { useState } from 'react';

export function PersInputFotos({ onImageChange }) {
    const CLOUDINARY_URL = 'https://api.cloudinary.com/v1_1/dbsxcnftm/image/upload';
    const UPLOAD_PRESET = 'presetbueno';

    const [arrayImages, setArrayImages] = useState([]); // Para almacenar las URLs de las imágenes
    const [isLoading, setIsLoading] = useState(false);
    const [errorMessage, setErrorMessage] = useState("");

    const aumentos = ["x4", "x10", "x40", "x100"];

    // Función que maneja la carga de imágenes
    const urlImages = async (e) => {
        setArrayImages([]); // Limpiar imágenes previas
        setIsLoading(true);
        setErrorMessage(""); // Limpiar cualquier error previo

        let imgs = Array.from(e.target.files);

        if (imgs.length === 0) {
            alert('Por favor, selecciona imágenes antes de subir.');
            setIsLoading(false);
            return;
        }

        const uploadedUrls = [];

        for (const archivo of imgs) {
            const formData = new FormData();
            formData.append('file', archivo);
            formData.append('upload_preset', UPLOAD_PRESET);

            try {
                const response = await fetch(CLOUDINARY_URL, {
                    method: 'POST',
                    body: formData,
                });

                const data = await response.json();

                if (data.error) {
                    setErrorMessage("Error al subir la imagen, por favor intente nuevamente.");
                    setIsLoading(false);
                    return;
                }

                uploadedUrls.push(data.secure_url); // Guardamos la URL de la imagen subida

                setArrayImages((prevImages) => [...prevImages, data.secure_url]);

                // Llamamos a la función onImageChange para enviar las URLs al padre
                if (onImageChange) {
                    onImageChange(uploadedUrls); // Ahora pasamos todas las URLs de las imágenes
                }
            } catch (error) {
                setErrorMessage("Hubo un problema con la conexión, por favor intente más tarde.");
                console.error('Error al subir la imagen:', error);
            }
        }

        setIsLoading(false);
    };

    // Función para manejar la eliminación de imágenes
    const handleDeleteImage = (index) => {
        const newImages = arrayImages.filter((_, i) => i !== index);
        setArrayImages(newImages);

        // Llamamos a onImageChange con las nuevas URLs después de eliminar una imagen
        if (onImageChange) {
            onImageChange(newImages);
        }
    };

    return (
        <div className="flex justify-center p-4 xs:p-6 items-center rounded-lg py-6 shadow-[inset_0_0_10px_rgba(0,0,0,0.8)]">
            <div>
                <input
                    id="imgs"
                    name="imagenes[]" // Aseguramos de que el name sea el que espera el backend
                    type="file"
                    accept="image/*"
                    multiple
                    onChange={urlImages}
                    className="mb-4"
                    aria-label="Selecciona las imágenes que deseas subir"
                />

                {errorMessage && (
                    <div className="text-red-500 text-center mb-4">
                        <p>{errorMessage}</p>
                    </div>
                )}

                <div id="imgcontainer" className="flex flex-wrap justify-start gap-5">
                    {isLoading ? (
                        <div className="w-full mt-5 text-center">
                            <p className="text-lg font-semibold">Cargando imágenes...</p>
                            <div className="loader mt-2"></div> {/* Aquí puedes usar un spinner visual */}
                        </div>
                    ) : (
                        arrayImages.map((url, index) => (
                            <div key={index} className="mt-5 relative">
                                <img 
                                    src={url} 
                                    alt={`Imagen subida ${index}`} 
                                    className="w-32 h-32 rounded-full object-cover" 
                                />
                                <button
                                    className="absolute top-1 right-1 bg-red-500 text-white text-xs rounded-full p-1"
                                    onClick={() => handleDeleteImage(index)}
                                    aria-label="Eliminar imagen"
                                >
                                    X
                                </button>
                                <select
                                    className="mt-2 w-32 p-2 bg-white border-2 border-gray-300 rounded-lg text-gray-700 font-medium shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none hover:border-blue-500 transition duration-300 ease-in-out"
                                    name="aumento"
                                    id="aumento"
                                    required
                                    defaultValue=""
                                >
                                    <option value="" disabled>Aumento</option>
                                    {aumentos.map((aument, i) => (
                                        <option value={aument} key={i}>
                                            {aument}
                                        </option>
                                    ))}
                                </select>
                            </div>
                        ))
                    )}
                </div>
            </div>
        </div>
    );
}
