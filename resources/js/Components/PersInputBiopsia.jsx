export function PersInputBiopsia (){

    const biopsias = [
        "Biopsia1",
        "Biopsia2",
        "Biopsia3",
        "Biopsia4",
        "Biopsia5"
    ]

    return(
    <>
        <label htmlFor="biopsia">Selecciona el tipo de biopsia:</label>
        <br />
        <select name="biopsia" id="biopsia" required>
            <option value="" disabled selected>Biopsia</option>

            {
                biopsias.map((biopsia, index) => {
                    return(
                    <option value={biopsia} key={index}>
                        {biopsia}
                    </option>
                    )
                })
            }


        </select>

    </>
    )

}