import { useState } from 'react';

export function PersInputFotos() {
    // Tu configuración de Cloudinary
    const CLOUDINARY_URL = 'https://api.cloudinary.com/v1_1/dbsxcnftm/image/upload';
    const UPLOAD_PRESET = 'presetbueno';

    const [arrayImages, setArrayImages] = useState([]); // Estado para las imágenes
    const [isLoading, setIsLoading] = useState(false); // Estado para el indicador de carga

    let aumentos = ["x4", "x10", "x40", "x100"];

    const urlImages = async (e) => {
        setArrayImages([]); // Reiniciar el estado antes de subir nuevas imágenes
        setIsLoading(true); // Activar el estado de carga

        let imgs = Array.from(e.target.files);

        if (imgs.length === 0) {
            alert('Por favor, selecciona imágenes antes de subir.');
            setIsLoading(false); // Desactivar el estado de carga
            return;
        }

        for (const archivo of imgs) {
            const formData = new FormData();
            formData.append('file', archivo);
            formData.append('upload_preset', UPLOAD_PRESET);

            try {
                // Subir la imagen a Cloudinary
                const response = await fetch(CLOUDINARY_URL, {
                    method: 'POST',
                    body: formData,
                });

                const data = await response.json();

                console.log('Imagen subida:', data.secure_url); // Enlace de la imagen

                // Actualizar el estado con la nueva URL de la imagen
                setArrayImages((prevImages) => [...prevImages, data.secure_url]);
            } catch (error) {
                console.error('Error al subir la imagen:', error);
            }
        }

        setIsLoading(false); // Desactivar el estado de carga después de subir todas las imágenes
    };

    return (
        <div className="flex justify-center p-4 xs:p-6 items-center rounded-lg py-6 shadow-[inset_0_0_10px_rgba(0,0,0,0.8)]">
            <input
                id="imgs"
                type="file"
                accept="image/*"
                multiple
                onChange={(e) => urlImages(e)}
                className="mb-4"
            />

            <div id="imgcontainer" className="flex flex-wrap justify-start gap-5">
                {isLoading ? (
                    // Mostrar un indicador de carga mientras se suben las imágenes
                    <div className="w-full mt-5 text-center">
                        <p className="text-lg font-semibold">Cargando imágenes...</p>
                        <div className="loader mt-2"></div> {/* Puedes usar un spinner aquí */}
                    </div>
                ) : (
                    // Mostrar las imágenes subidas
                    arrayImages.map((url, index) => (
                        <div key={index} className="mt-5">
                            <img 
                                src={url} 
                                alt={url} 
                                className="w-32 h-32 rounded-full object-cover" 
                            />
                            <select
                                className="mt-2 w-32 p-2 bg-white border-2 border-gray-300 rounded-lg text-gray-700 font-medium shadow-md focus:ring-2 focus:ring-blue-500 focus:outline-none hover:border-blue-500 transition duration-300 ease-in-out"
                                name="aumento"
                                id="aumento"
                                required
                                defaultValue=""
                            >
                                <option value="" disabled>
                                    Aumento
                                </option>
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
    );
}
