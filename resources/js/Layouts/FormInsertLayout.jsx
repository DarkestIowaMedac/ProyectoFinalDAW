import { useState } from "react";
import PersInputFecha from "@/Components/PersInputFecha";
import PersInputNaturaleza from "@/Components/PersInputNaturaleza";
import PersInputConservacion from "@/Components/PersInputConservacion";
import { PersInputCiudad } from "@/Components/PersInputCiudad";
import { PersInputBiopsia } from "@/Components/PersInputBiopsia";
import { PersInputCalidad } from "@/Components/PersInputCalidad";
import { PersInputInterpretacion } from "@/Components/PersInputInterpretacion";
import { PersInputFotos } from "@/Components/PersInputFotos";
import axios from 'axios';

const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;

export default function FormInsertLayout() {
    const [imagenes, setImagenes] = useState([]); // Estado para las imágenes

    const handleSubmit = async (e) => {
        e.preventDefault();

        // Crear un FormData con los datos del formulario
        const formData = new FormData(e.target);

        // Asegurarnos de que las imágenes se agreguen al FormData
        imagenes.forEach(imagen => {
            formData.append('imagenes[]', imagen); // 'imagenes[]' para múltiples archivos
        });

        try {
            const response = await axios.post('/ProyectoSubidaNotaDAW/public/crearMuestra', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data', // Especificamos que estamos enviando archivos
                },
            });

            console.log('Muestra creada con éxito:', response.data);
        } catch (error) {
            console.error('Error al crear la muestra:', error.response ? error.response.data : error);
        }
    };

    // Manejo de la carga de imágenes en PersInputFotos
    const handleImageChange = (newImageUrl) => {
        setImagenes((prevImages) => [...prevImages, newImageUrl]); // Guardamos la URL de la imagen
    };

    return (
        <div className="flex justify-center items-center min-h-screen p-4 mb-10">
            <form onSubmit={handleSubmit} className="w-full max-w-5xl p-6 sm:p-8 bg-slate-50 rounded-xl shadow-lg">
                <div className="space-y-6">
                    <PersInputFecha />
                    <PersInputNaturaleza />
                    <PersInputConservacion />
                    <PersInputCiudad />
                    <PersInputBiopsia />
                    <PersInputCalidad />
                    <PersInputInterpretacion />
                    
                    {/* Aquí estamos pasando el evento de cambio para que PersInputFotos lo maneje */}
                    <PersInputFotos onImageChange={handleImageChange} />

                    <div className="flex justify-center items-center">
                        <input
                            type="submit"
                            className="bg-blue-950 text-white py-3 px-8 rounded-lg font-semibold text-lg hover:bg-gray-950 hover:scale-105 transition duration-700"
                        />
                    </div>
                </div>
            </form>
        </div>
    );
}
