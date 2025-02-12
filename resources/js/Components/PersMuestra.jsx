export function PersMuestra ({codigo, fecha, organo, funcionborrar}) {

    return(
        <div className=" mb-3 bg-gray-700 text-white p-4 rounded-lg shadow-md">
            <div>
                <h2>Codigo: {codigo}</h2>
                <h3>Fecha: {fecha}</h3>
                <h3>Órgano: {organo}</h3>
            </div>
            <div>
                <button className=" bg-red-900 p-3 m-2 rounded">Editar</button>
                <button onClick={funcionborrar} className="bg-red-900 p-3 m-2 rounded">Eliminar</button>
            </div>
        </div>
    )

}