export function PersInputCalidad (){

    const calidades = [
        "Biopsia1",
        "Biopsia2",
        "Biopsia3",
        "Biopsia4",
        "Biopsia5"
    ]

    return(
    <>
        <label htmlFor="calidad">Calidad de la muestra:</label>
            <br />
        <select name="calidad" id="calidad" required defaultValue="">
            <option value="" disabled>Calidad</option>

            {
                calidades.map((calidad, index) => {
                    return(
                    <option value={calidad} key={index}>
                        {calidad}
                    </option>
                    )
                })
            }   

        </select>

            <br />

        <label htmlFor="descripcioncalidad">Descripción de la Calidad:</label>
            <br />
        <textarea id="descripcioncalidad" name="descripcioncalidad" placeholder="Proporciona más detalles sobre la calidad de la muestra"></textarea>

    </>
    )

}