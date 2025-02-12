import { PersMuestra } from "@/Components/PersMuestra"

export function TodasMuestras () {

    fetch('ProyectoSubidaNotaDAW/public/muestras/1')
    .then(respuesta => respuesta.json())
    .then(datos => {
        console.log(datos)
    })

    return(
        <>
            <PersMuestra codigo="1" fecha="25/05/2005" organo="pito"></PersMuestra>
        </>
    )
}