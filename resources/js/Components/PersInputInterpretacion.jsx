import { useState } from "react"

export function PersInputInterpretacion (){

    const [interpretaciones, setInterpretaciones] = useState([
        {codigo:"",
         descripcion:""
        }
    ])

    const anyadir = () => {

    }

    const borrar = () => {

    }

    return(
    <>
        <label htmlFor="interpretacion">Código de interpretación:</label>
            <br />
        <select name="interpretacion" className="interpretacion" required>
            <option value="" disabled selected>Calidad</option>
            <option value=""> </option>
        </select>

            <br />

        <label for="descripcioncalidad">Descripción de la interpretación:</label>
            <br />
        <textarea className="interpretacion" name="descripcioncalidad" placeholder="Proporciona más detalles sobre la interpretacion de la muestra"></textarea>

    </>
    )

}