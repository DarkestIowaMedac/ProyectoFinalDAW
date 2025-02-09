import PersInputFecha from '@/Components/PersInputFecha';
import PersInputNaturaleza from '@/Components/PersInputNaturaleza';
import PersInputConservacion from '@/Components/PersInputConservacion';
import { PersInputCiudad } from '@/Components/PersInputCiudad';
import { PersInputBiopsia } from '@/Components/PersInputBiopsia';
import { PersInputCalidad } from '@/Components/PersInputCalidad';
import { PersInputInterpretacion } from '@/Components/PersInputInterpretacion';

export default function FormInsertLayout() {
    return (

        <>
            <form action="">

                <PersInputFecha></PersInputFecha>
            
                <br /><br />

                <PersInputNaturaleza></PersInputNaturaleza>

                <br />

                <PersInputConservacion></PersInputConservacion>

                <br /> <br />

                <PersInputCiudad></PersInputCiudad>

                <br /><br />

                <PersInputBiopsia></PersInputBiopsia>

                <br /><br />

                <PersInputCalidad></PersInputCalidad>

                <br /><br />

                <PersInputInterpretacion></PersInputInterpretacion>

            </form>
        </>

    );
}
