import PersInputFecha from '@/Components/PersInputFecha';
import PersInputNaturaleza from '@/Components/PersInputNaturaleza';
import PersInputConservacion from '@/Components/PersInputConservacion';
import { PersInputCiudad } from '@/Components/PersInputCiudad';
import { PersInputBiopsia } from '@/Components/PersInputBiopsia';
import { PersInputCalidad } from '@/Components/PersInputCalidad';
import { PersInputInterpretacion } from '@/Components/PersInputInterpretacion';
import { PersInputFotos } from '@/Components/PersInputFotos';

export default function FormInsertLayout() {
    return (
        <div className="flex justify-center items-center min-h-screen p-4 mb-10">
            <form action="/" className="w-full max-w-5xl p-6 sm:p-8 bg-slate-50 rounded-xl shadow-lg">
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
