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

// Configura Axios para incluir el token CSRF en todas las solicitudes
const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;

export default function FormInsertLayout() {
    const handleSubmit = async (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);

        try {
            // Hacemos la solicitud POST con Axios
            const response = await axios.post('/crearMuestra', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data', // Específicamos que estamos enviando un formulario con archivos
                },
            });

            console.log('Muestra creada con éxito:', response.data);
        } catch (error) {
            console.error('Error al crear la muestra:', error.response ? error.response.data : error);
        }
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
                    <PersInputFotos/>
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
