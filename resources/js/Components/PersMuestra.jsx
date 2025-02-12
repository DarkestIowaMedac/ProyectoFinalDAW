export function PersMuestra ({codigo, fecha, organo}) {

    return(
        <>
            <div>
                <h2>Codigo: {codigo}</h2>
                <h3>Fecha: {fecha}</h3>
                <h3>Órgano: {organo}</h3>
            </div>
            <div>
                <button>Editar</button>
                <button>Eliminar</button>
            </div>
        </>
    )

}