import { useState } from "react";

export default function PersInputNaturaleza() {
  const [naturaleza, setNaturaleza] = useState("");
  const naturalezas = ["Sangre", "Orina", "Saliva", "Esputo", "Heces", "Semen"];

  const handleNaturalezaChange = (event) => {
    setNaturaleza(event.target.value);
  };

  return (
    <div className="flex justify-center p-8 items-center rounded-lg shadow-[inset_0_0_10px_rgba(0,0,0,0.8)] sm:p-4 md:p-6 lg:p-8">
      <div className="space-y-6 p-6 border rounded-lg shadow-lg bg-white w-full max-w-lg sm:max-w-md md:max-w-lg lg:max-w-xl">
      <h2 className="lg:text-2xl md:text-xl sm:text-lg w-full font-bold text-center mb-6 bg-gray-900 p-2 sm:p-1 rounded-xl text-white">
        Naturaleza        
      </h2>

        {/* Naturaleza */}
        <div id="naturaleza" className="space-y-3">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            height="24px"
            viewBox="0 -960 960 960"
            width="24px"
            fill="#e8eaed"
          >
            <path d="M216-176q-45-45-70.5-104T120-402q0-63 24-124.5T222-642q35-35 86.5-60t122-39.5Q501-756 591.5-759t202.5 7q8 106 5 195t-16.5 160.5q-13.5 71.5-38 125T684-182q-53 53-112.5 77.5T450-80q-65 0-127-25.5T216-176Zm112-16q29 17 59.5 24.5T450-160q46 0 91-18.5t86-59.5q18-18 36.5-50.5t32-85Q709-426 716-500.5t2-177.5q-49-2-110.5-1.5T485-670q-61 9-116 29t-90 55q-45 45-62 89t-17 85q0 59 22.5 103.5T262-246q42-80 111-153.5T534-520q-72 63-125.5 142.5T328-192Zm0 0Zm0 0Z" />
          </svg>
          <label
            htmlFor="naturalezaInput"
            className="block text-lg font-semibold text-gray-700 sm:text-base md:text-lg lg:text-xl"
          >
            Naturaleza de la Muestra:
          </label>
          <div className="space-y-4">
            <div className="grid lg:grid-cols-2 gap-4 sm:grid-cols-1 md:grid-cols-2">
              {naturalezas.map((item) => (
                <label
                  key={item}
                  className={`cursor-pointer p-4 sm:p-2 md:p-3 rounded-lg border-2 text-center text-gray-700 transition duration-300 ease-in-out transform hover:scale-105  
                    ${naturaleza === item ? "bg-blue-500 text-white border-blue-600" : "bg-white border-gray-300 hover:bg-gray-100"}`}
                >
                  <input
                    type="radio"
                    name="naturaleza"
                    value={item}
                    checked={naturaleza === item}
                    onChange={handleNaturalezaChange}
                    className="hidden sm:w-full"
                    />
                  <span className="sm:text-sm md:text-base lg:text-lg">{item}</span>
                </label>
              ))}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
