<?php

namespace Database\Factories;

use App\Models\Interpretacion;
use App\Models\Naturaleza;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interpretacion>
 */
class InterpretacionFactory extends Factory
{
    protected $model = Interpretacion::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $interpretaciones = [
            // Biopsia de bazo
            'Se observa una arquitectura esplénica conservada, con una adecuada distribución de la pulpa blanca y roja.' => '10.1.',
            'Presencia de áreas de tejido hemorrágico en el corte, indicativo de hemorragia intraparenquimatosa reciente o traumática.' => '10.2.',
            'Identificación de escaso tejido linfoide en la muestra, sugiriendo una posible atrofia o disminución de la actividad inmunológica.' => '10.3',
            'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.' => '10.4',
            'Observación de deshidratación del tejido, lo que puede causar contracción y distorsión de las células y estructuras.' => '10.5',
            'Se detecta un aumento en el tamaño de los folículos linfoides, indicativo de una respuesta inmunológica activa.' => '10.6',
            'Presencia de células plasmáticas en la pulpa blanca, sugiriendo una respuesta inmunitaria o inflamatoria.' => '10.7',
            'Identificación de células de la serie eritroide en la pulpa roja, indicando actividad hematopoyética.' => '10.8',
            'Se observa una marcada congestión vascular en la pulpa roja, posiblemente como respuesta a la hemorragia o a una estimulación inflamatoria.' => '10.9',
            'Presencia de células fagocíticas en la pulpa roja, indicativas de la función fagocítica del bazo en la eliminación de células sanguíneas viejas o anormales.' => '10.10',

            // Biopsia de cerebro
            'Presencia de neuronas.' => '12.1.',
            'Presencia de células gliales.' => '12.2.',
            'Presencia de fibras nerviosas mielinizadas.' => '12.3.',
            'Presencia de fibras nerviosas no mielinizadas.' => '12.4.',
            'Presencia de vasos sanguíneos.' => '12.5.',
            'Presencia de células inflamatorias.' => '12.6.',
            'Presencia de infiltración de células neoplásicas.' => '12.7.',
            'Presencia de cuerpos de inclusión intracelulares.' => '12.8.',
            'Presencia de placas de proteína beta-amiloide.' => '12.9.',
            'Presencia de cuerpos de Lewy.' => '12.10.',

            // Biopsia de corazón
            'Se observa una arquitectura cardíaca conservada, con una adecuada distribución de miocitos y estructuras vasculares.' => '1.1.',
            'No se observan signos evidentes de necrosis en el tejido cardíaco, lo que sugiere una integridad estructural relativamente normal.' => '1.2.',
            'Identificación de células inflamatorias dispersas en el tejido, indicativas de una respuesta inflamatoria leve o moderada.' => '1.3.',
            'Presencia de áreas de fibrosis en el miocardio, posiblemente como resultado de un proceso de cicatrización tras una lesión cardíaca previa.' => '1.4.',
            'Se detecta una adecuada perfusión sanguínea en los vasos coronarios, indicativa de una circulación coronaria funcional.' => '1.5.',
            'Observación de células cardíacas con una apariencia histológica normal, incluyendo la presencia de discos intercalares y estriaciones transversales.' => '1.6.',
            'No se observan células tumorales ni signos de infiltración neoplásica en el tejido cardíaco.' => '1.7.',
            'Identificación de células endoteliales íntegras en los vasos sanguíneos, sugiriendo una función endotelial adecuada.' => '1.8.',
            'Se observa una distribución regular de fibras de colágeno en el miocardio, indicativo de una matriz extracelular bien organizada.' => '1.9',
            'No se identifican anomalías estructurales significativas en las válvulas cardíacas ni en las cámaras cardíacas.' => '1.10.',

            // Biopsia de esófago
            'Se observa un epitelio escamoso estratificado bien conservado en la mucosa esofágica.' => '7.1.',
            'Presencia de contenido alimenticio en la luz esofágica, indicando la fase de tránsito del proceso digestivo.' => '7.2.',
            'Identificación de escaso tejido epitelial en el corte, sugiriendo posible atrofia o adelgazamiento del epitelio.' => '7.3.',
            'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.' => '7.4.',
            'Observación de tejido conectivo periesofágico, indicativo de la ubicación anatómica de la muestra.' => '7.5.',
            'Detección de células caliciformes dispersas en la mucosa esofágica, sugiriendo producción de moco.' => '7.6.',
            'Presencia de infiltración de células inflamatorias en la lámina propia, indicando una respuesta inflamatoria.' => '7.7.',
            'Identificación de vasos sanguíneos y nervios en la submucosa esofágica, componentes normales del tejido.' => '7.8.',
            'Signos de hiperplasia epitelial, evidenciada por un aumento en el número de capas celulares.' => '7.9.',
            'Presencia de células de Langerhans en la mucosa esofágica, indicativas de una función inmunológica local.' => '7.10.',

            // Biopsia de estómago
            'Se observa un epitelio gástrico intacto y bien conservado.' => '3.1.',
            'Presencia de infiltración de células inflamatorias en la lámina propia, sugiriendo una respuesta inflamatoria crónica.' => '3.2.',
            'Identificación de células caliciformes productoras de moco en las glándulas gástricas.' => '3.3.',
            'Signos de erosión superficial de la mucosa gástrica, posiblemente debido a irritación crónica.' => '3.4.',
            'Presencia de gastritis aguda, evidenciada por la infiltración de neutrófilos en la mucosa gástrica.' => '3.5.',
            'Observación de cambios displásicos en el epitelio gástrico, sugiriendo un proceso preneoplásico.' => '3.6.',
            'Detección de Helicobacter pylori en la mucosa gástrica, indicando una infección bacteriana.' => '3.7.',
            'Detección de Helicobacter pylori en la mucosa gástrica, indicando una infección bacteriana.' => '3.8.',
            'Identificación de células neuroendocrinas en las glándulas gástricas, indicando una función endocrina.' => '3.9.',
            'Signos de ulceración profunda en la mucosa gástrica, posiblemente relacionada con un proceso ulceroso crónico.' => '3.10.',

            // Biopsia de feto
            'Presencia de tejido fetal bien desarrollado.' => '11.1.',
            'Presencia de órganos internos correctamente formados.' => '11.2.',
            'Presencia de tejido nervioso en desarrollo.' => '11.3.',
            'Presencia de células sanguíneas en formación.' => '11.4.',
            'Presencia de huesos en proceso de osificación.' => '11.5.',
            'Presencia de tejido muscular en desarrollo.' => '11.6.',
            'Presencia de membranas fetales intactas.' => '11.7.',
            'Presencia de cordón umbilical sin anomalías evidentes.' => '11.8.',
            'Presencia de estructuras faciales reconocibles.' => '11.9.',
            'Presencia de extremidades bien formadas.' => '11.10.',

            // Biopsia de hígado
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia de intestino
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia de lengua
            'Presencia de epitelio escamoso estratificado.' => '13.1.',
            'Presencia de papilas gustativas filiformes.' => '13.2.',
            'Presencia de papilas gustativas fungiformes.' => '13.3.',
            'Presencia de papilas gustativas foliadas.' => '13.4.',
            'Presencia de células caliciformes.' => '13.5.',
            'Presencia de células basales.' => '13.6.',
            'Presencia de células parabasales.' => '13.7.',
            'Presencia de células intermedias.' => '13.8.',
            'Presencia de células superficiales.' => '13.9.',
            'Presencia de células inflamatorias.' => '13.10.',
            'Presencia de células de Langerhans.' => '13.11.',
            'Presencia de células glandulares.' => '13.12.',
            'Presencia de células neoplásicas.' => '13.13.',
            'Presencia de células con cambios atípicos.' => '13.14.',
            'Presencia de cuerpos extraños.' => '13.15.',

            // Biopsia de ovario
            'Presencia de folículos primordiales.' => '14.1.',
            'Presencia de folículos primarios.' => '14.2.',
            'Presencia de folículos secundarios.' => '14.3.',
            'Presencia de folículos maduros.' => '14.4.',
            'Presencia de células de la granulosa.' => '14.5.',
            'Presencia de células de la teca.' => '14.6.',
            'Presencia de células lúteas.' => '14.7.',
            'Presencia de cuerpos albicans.' => '14.8.',
            'Presencia de células intersticiales.' => '14.9.',
            'Presencia de células estromales.' => '14.10',

            // Biopsia de páncreas
            'Presencia de células acinares.' => '16.1.',
            'Presencia de islotes de Langerhans.' => '16.2.',
            'Presencia de células ductales.' => '16.3.',
            'Presencia de infiltración de células inflamatorias.' => '16.4.',
            'Presencia de necrosis focal.' => '16.5.',
            'Presencia de fibrosis intersticial.' => '16.6.',
            'Presencia de células neoplásicas.' => '16.7.',
            'Presencia de cuerpos de inclusión eosinofílicos.' => '16.8.',
            'Presencia de calcificación distrófica.' => '16.9.',
            'Presencia de células adiposas en el estroma.' => '16.10.',

            // Biopsia de piel
            'Predominio de células epiteliales escamosas superficiales.' => '17.1.',
            'Predominio de células epiteliales escamosas intermedias.' => '17.2.',
            'Predominio de células epiteliales escamosas parabasales.' => '17.3.',
            'Poli nucleares neutrófilos.' => '17.4.',
            'Células metaplásicas inmaduras.' => '17.8.',
            'Células reactivas.' => '17.9.',
            'Alteraciones celulares sugerentes de HPV.' => '17.11.',
            'Alteraciones celulares sugerentes de Herpes.' => '17.12.',
            'Células neoplásicas.' => '17.13.',
            'Células superficiales e intermedias con cambios atípicos.' => '17.14',
            'Células intermedias y parabasales con algunos cambios atípicos.' => '17.15',
            'Células parabasales con algunos cambios atípicos.' => '17.16',
            'Células escamosas de significado incierto.' => '17.17',
            'Células epiteliales glandulares de significado incierto.' => '17.18',

            // Biopsia de pulmón
            'Se observa una arquitectura pulmonar conservada, con la presencia de alvéolos bien definidos y paredes alveolares íntegras.' => '9.1.',
            'Presencia de tejido necrótico en el corte, sugiriendo un proceso de necrosis tisular, posiblemente debido a una lesión o enfermedad.' => '9.2.',
            'Identificación de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.' => '9.3.',
            'Signos de inflamación pulmonar, indicados por la presencia de células inflamatorias abundantes en el tejido.' => '9.4.',
            'Observación de deshidratación del tejido, lo que puede causar contracción y distorsión de las células y estructuras.' => '9.5.',
            'Detección de tejido fibroso en los espacios alveolares, sugiriendo fibrosis pulmonar.' => '9.6.',
            'Presencia de células de metaplasia escamosa en las vías respiratorias, indicativas de una respuesta adaptativa al daño crónico.' => '9.7.',
            'Identificación de células neoplásicas en el tejido, sugiriendo un proceso tumoral pulmonar.' => '9.8.',
            'Signos de edema pulmonar, evidenciados por la presencia de líquido en los espacios alveolares.' => '9.9.',
            'Presencia de cuerpos extraños en el tejido, indicando inhalación de material extraño.' => '9.10.',

            // Biopsia de riñón
            'Se observa una arquitectura renal conservada, con una adecuada distribución de los diferentes componentes histológicos.' => '4.1.',
            'Presencia de infiltración de tejido adiposo perirrenal.' => '4.2.',
            'Identificación de glóbulos rojos en los túbulos renales, indicativo de hematuria y posible lesión glomerular.' => '4.3.',
            'Signos de esclerosis glomerular, evidenciada por la presencia de matriz extracelular aumentada y segmentos glomerulares colapsados.' => '4.4.',
            'Presencia de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.' => '4.5.',
            'Observación de necrosis tubular aguda, caracterizada por la pérdida de la arquitectura tubular y la presencia de células necróticas en el lumen tubular.' => '',
            'Detección de cilindros hialinos en los túbulos renales, indicando una posible proteinuria.' => '',
            'Presencia de células inflamatorias en el intersticio renal, sugiriendo una respuesta inflamatoria crónica.' => '',
            'Identificación de cuerpos ovales grasos en los túbulos renales, indicativos de daño renal crónico y degeneración lipídica.' => '',
            'Signos de fibrosis intersticial, evidenciada por la presencia de tejido conectivo fibroso entre los túbulos renales y los glomérulos.' => '',

            // Biopsia de testículo
            'Se observa una arquitectura testicular conservada, con la presencia de túbulos seminíferos bien definidos.' => '8.1.',
            'Presencia de células germinales escasas en los túbulos seminíferos, lo que puede indicar una disminución en la espermatogénesis.' => '8.2.',
            'Identificación de tejido fibroso intersticial entre los túbulos seminíferos, sugiriendo una posible fibrosis testicular.' => '8.3.',
            'Signos de artefactos de fijación en el tejido, lo que puede afectar la visualización precisa de algunas estructuras.' => '8.4.',
            'Observación de deshidratación del tejido, lo que puede causar contracción y distorsión de las células y estructuras.' => '8.5.',
            'Detección de células de Sertoli en los túbulos seminíferos, indicativas de su función de soporte para las células germinales.' => '8.6.',
            'Presencia de células de Leydig en el tejido intersticial, responsables de la producción de testosterona.' => '8.7.',
            'Identificación de células inmaduras o anormales en los túbulos seminíferos, sugiriendo un posible trastorno en la espermatogénesis.' => '8.8.',
            'Signos de inflamación testicular, evidenciados por la presencia de células inflamatorias en el tejido.' => '8.9.',
            'Presencia de células apoptóticas en los túbulos seminíferos, indicando un proceso de muerte celular programada, posiblemente relacionado con el daño testicular.' => '8.10.',

            // Biopsia de trompa de falopio
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia de útero
            'Se observa un endometrio bien conservado, con una adecuada proliferación glandular y estroma endometrial.' => '5.1.',
            'Presencia de sangre en el espécimen, indicando la fase menstrual del ciclo uterino.' => '5.2.',
            'Identificación de escaso tejido endometrial en el corte, sugiriendo una posible atrofia endometrial.' => '5.3.',
            'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.' => '5.4.',
            'Observación de células descamadas en el endometrio, indicativas de la fase de descamación menstrual.' => '5.5.',
            'Detección de hiperplasia glandular endometrial, sugiriendo un desequilibrio hormonal.' => '5.6.',
            'Presencia de infiltración de células inflamatorias en el estroma endometrial, indicando una respuesta inflamatoria crónica.' => '5.7.',
            'Identificación de cuerpos de Arias-Stella en las células glandulares, sugiriendo cambios hormonales asociados con el embarazo o condiciones patológicas.' => '5.8.',
            'Signos de adenomiosis, evidenciada por la presencia de glándulas endometriales dentro del miometrio.' => '5.9.',
            'Presencia de células atípicas en las glándulas endometriales, sugiriendo una posible neoplasia endometrial.' => '5.10.',

            // Biopsia veterinaria de bazo
            'Se observa una arquitectura esplénica conservada, con una adecuada distribución de la pulpa blanca y roja.' => '10.1.',
            'Presencia de áreas de tejido hemorrágico en el corte, indicativo de hemorragia intraparenquimatosa reciente o traumática.' => '10.2.',
            'Identificación de escaso tejido linfoide en la muestra, sugiriendo una posible atrofia o disminución de la actividad inmunológica.' => '10.3',
            'Signos de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.' => '10.4',
            'Observación de deshidratación del tejido, lo que puede causar contracción y distorsión de las células y estructuras.' => '10.5',
            'Se detecta un aumento en el tamaño de los folículos linfoides, indicativo de una respuesta inmunológica activa.' => '10.6',
            'Presencia de células plasmáticas en la pulpa blanca, sugiriendo una respuesta inmunitaria o inflamatoria.' => '10.7',
            'Identificación de células de la serie eritroide en la pulpa roja, indicando actividad hematopoyética.' => '10.8',
            'Se observa una marcada congestión vascular en la pulpa roja, posiblemente como respuesta a la hemorragia o a una estimulación inflamatoria.' => '10.9',
            'Presencia de células fagocíticas en la pulpa roja, indicativas de la función fagocítica del bazo en la eliminación de células sanguíneas viejas o anormales.' => '10.10',

            // Biopsia veterinaria de cerebro
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia veterinaria de corazón
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia veterinaria de esófago
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia veterinaria de estómago
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia veterinaria de feto
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia veterinaria de hígado
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia veterinaria de intestino
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia veterinaria de lengua
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia veterinaria de ovario
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia veterinaria de páncreas
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia veterinaria de piel
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia veterinaria de pulmón
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia veterinaria de riñón
            'Se observa una arquitectura renal conservada, con una adecuada distribución de los diferentes componentes histológicos.' => '4.1.',
            'Presencia de infiltración de tejido adiposo perirrenal.' => '4.2.',
            'Identificación de glóbulos rojos en los túbulos renales, indicativo de hematuria y posible lesión glomerular.' => '4.3.',
            'Signos de esclerosis glomerular, evidenciada por la presencia de matriz extracelular aumentada y segmentos glomerulares colapsados.' => '4.4.',
            'Presencia de artefactos de fijación en el tejido, lo que puede dificultar la interpretación precisa de algunas estructuras.' => '4.5.',
            'Observación de necrosis tubular aguda, caracterizada por la pérdida de la arquitectura tubular y la presencia de células necróticas en el lumen tubular.' => '',
            'Detección de cilindros hialinos en los túbulos renales, indicando una posible proteinuria.' => '',
            'Presencia de células inflamatorias en el intersticio renal, sugiriendo una respuesta inflamatoria crónica.' => '',
            'Identificación de cuerpos ovales grasos en los túbulos renales, indicativos de daño renal crónico y degeneración lipídica.' => '',
            'Signos de fibrosis intersticial, evidenciada por la presencia de tejido conectivo fibroso entre los túbulos renales y los glomérulos.' => '',

            // Biopsia veterinaria de testículo
            'Se observa una arquitectura testicular conservada, con la presencia de túbulos seminíferos bien definidos.' => '8.1.',
            'Presencia de células germinales escasas en los túbulos seminíferos, lo que puede indicar una disminución en la espermatogénesis.' => '8.2.',
            'Identificación de tejido fibroso intersticial entre los túbulos seminíferos, sugiriendo una posible fibrosis testicular.' => '8.3.',
            'Signos de artefactos de fijación en el tejido, lo que puede afectar la visualización precisa de algunas estructuras.' => '8.4.',
            'Observación de deshidratación del tejido, lo que puede causar contracción y distorsión de las células y estructuras.' => '8.5.',
            'Detección de células de Sertoli en los túbulos seminíferos, indicativas de su función de soporte para las células germinales.' => '8.6.',
            'Presencia de células de Leydig en el tejido intersticial, responsables de la producción de testosterona.' => '8.7.',
            'Identificación de células inmaduras o anormales en los túbulos seminíferos, sugiriendo un posible trastorno en la espermatogénesis.' => '8.8.',
            'Signos de inflamación testicular, evidenciados por la presencia de células inflamatorias en el tejido.' => '8.9.',
            'Presencia de células apoptóticas en los túbulos seminíferos, indicando un proceso de muerte celular programada, posiblemente relacionado con el daño testicular.' => '8.10.',

            // Biopsia veterinaria de trompa de falopio
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Biopsia veterinaria de útero
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Estudio citológico bucal
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Estudio citológico cérvico-vaginal
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Estudio citológico de esputo
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Estudio citológico de frotis
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Estudio citológico de impronta
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Estudio citológico de semen
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Estudio hematológico completo
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',

            // Estudio microscópico y químico de orina
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
            '' => '',
        ];

        $texto = $this->faker->unique()->randomElement(array_keys($interpretaciones));
        $codigo = $interpretaciones[$texto];

        return [
            'codigo' => $codigo,
            'texto' => $texto,
            'idNaturaleza' => Naturaleza::factory(), // Genera una nueva Naturaleza automáticamente
        ];
    }
}
