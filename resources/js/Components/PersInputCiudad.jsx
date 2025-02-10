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
      <select name="ciudad" id="ciudad" required defaultValue="">
        {/* Opción predeterminada */}
        <option value="" disabled>
          Sede
        </option>
        {ciudades.map((ciudad, index) => (
          <option value={ciudad} key={index}>
            {ciudad}
          </option>
        ))}
      </select>

    </>
    )

}