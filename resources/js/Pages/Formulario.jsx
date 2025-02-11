import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import FormInsertLayout from '@/Layouts/FormInsertLayout';

import { Head } from '@inertiajs/react';
import { useState, useEffect } from 'react';
import { BrowserRouter } from 'react-router-dom';

export default function Formulario() {

    //const [muestras, setMuestras] = useState([]);

    const [muestra, setMuestra] = useState ({
        codigoMuestra:"",
        fecha:"",
        id: "",
        idUsuario: "",
        idFormato: "",
        idSede: "",
        idNaturaleza: "",
        idCalidad: "",
        codigo: "",
        fecha: "",
        organo: "",
        descripcionCalidad: ""
    })

    return (

        <BrowserRouter>

        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Formulario
                </h2>
            }
        >
            <Head title="Formulario" />

            <FormInsertLayout></FormInsertLayout>

        </AuthenticatedLayout>
        </BrowserRouter>
    );
}
