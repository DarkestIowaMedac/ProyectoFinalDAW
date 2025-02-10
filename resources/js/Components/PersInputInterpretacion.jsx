import { useState } from "react"

export function PersInputInterpretacion (){

    const [interpretaciones, setInterpretaciones] = useState([
        {
            codigo:"",
            descripcion:""
        }   
    ])

    const anyadir = () => {
        setInterpretaciones([
            ...interpretaciones,
            {
                codigo:"",
                descripcion:""
            }
        ])
        console.log(interpretaciones)
    }

    const borrar = () => {
        if (interpretaciones.length<=1) {
            alert("Debe haber mínimo 1 interpretación")
        }else{
            setInterpretaciones(interpretaciones.slice(0, -1))
        }
        console.log(interpretaciones)
    }

    const actualizarCodigo = (indice, nuevoCodigo) => {
        const nuevasInterpretaciones = [...interpretaciones]
        
        nuevasInterpretaciones[indice].codigo=nuevoCodigo

        setInterpretaciones(nuevasInterpretaciones)
    }

    const actualizarDescripcion = (indice, nuevaDescripcion) => {
        const nuevasInterpretaciones = [...interpretaciones]
        
        nuevasInterpretaciones[indice].descripcion=nuevaDescripcion

        setInterpretaciones(nuevasInterpretaciones)
    }

    return(
    <>

        {
            interpretaciones.map((interpretacion,index) => {
                return(
                    <div key={index}>

                        <label 
                            htmlFor="descripcion"
                        >
                            Código de interpretación:
                        </label>

                            <br />
                        
                        <select 
                            name="descripcion" 
                            className="descripcion" 
                            required
                            value={interpretacion.codigo}
                            onChange={(e) => actualizarCodigo(index, e.target.value)}
                        >
                            <option value="" disabled>Calidad</option>
                            <option value="Código 1">Código 1</option>
                            <option value="Código 2">Código 2</option>
                            <option value="Código 3">Código 3</option>
                        </select>
                
                            <br />
                
                        <label htmlFor="descripcioncalidad">Descripción de la interpretación:</label>
                            <br />
                        <textarea 
                            className="descripcion" 
                            name="descripcioncalidad" 
                            placeholder="Proporciona más detalles sobre la descripcion de la muestra"
                            value={interpretacion.descripcion}
                            onChange={(e) => actualizarDescripcion(index, e.target.value)}
                        ></textarea>
                            <br />
                    </div>
                )
            
            })
        }

        <button 
            className="px-4 py-2 border border-green-400"
            onClick={(e)=>{
                e.preventDefault()
                anyadir()
            }}
        >
            Añadir Interpretación
        </button>

        <button 
            className="px-4 py-2 border border-green-400"
            onClick={(e)=>{
                e.preventDefault()
                borrar()
            }}
        >
            Eliminar Interpretación
        </button>
    </>
    )

}