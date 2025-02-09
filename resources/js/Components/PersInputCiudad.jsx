export function PersInputCiudad (){

    const ciudades = [
        "Córdoba",
        "Sevilla",
        "Madrid",
        "Málaga"
    ]

    return(
    <>
        <label htmlFor="ciudad">Selecciona una sede:</label>
        <br />
        <select name="ciudad" id="ciudad" required>
            <option value="" disabled selected>Sede</option>

            {
                ciudades.map((ciudad, index) => {
                    return(
                    <option value={ciudad} key={index}>
                        {ciudad}
                    </option>
                    )
                })
            }


        </select>

    </>
    )

}