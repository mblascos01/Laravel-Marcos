<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Bulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::count() < 3
            ? collect([
                User::create([
                    'name' => 'Sofía López',
                    'email' => 'sofia@example.com',
                    'password' => bcrypt('password123'),
                ]),
                User::create([
                    'name' => 'Miguel Fernández',
                    'email' => 'miguel@example.com',
                    'password' => bcrypt('12345678'),
                ]),
                User::create([
                    'name' => 'Laura Martínez',
                    'email' => 'laura@example.com',
                    'password' => bcrypt('larau123'),
                ]),
            ])
            : User::take(3)->get();

        $bulos = [
            [
                'texto' => 'Las mujeres son peores conductoras que los hombres',
                'texto_desmentido' => 'Los datos de la DGT desmontan el mito: los hombres protagonizan el 80% de los accidentes mortales y el 90% de las infracciones por alcohol y drogas. Aunque las mujeres tienen accidentes leves en ciudad, su conducción es mucho más segura, responsable y menos costosa para las aseguradoras.',
            ],
            [
                'texto' => 'Las mujeres no trabajan tanto como los hombres',
                'texto_desmentido' => 'Las mujeres han alcanzado en 2025 máximos históricos de ocupación, liderando sectores clave como la medicina, la biotecnología y la educación. Además, ocupan casi el 40% de los puestos directivos en España, demostrando que son el motor principal del crecimiento económico y la innovación científica actual.',
            ],
            [
                'texto' => 'El feminismo es una exageración',
                'texto_desmentido' => 'La igualdad de género no es un capricho, sino un derecho fundamental que reconoce la dignidad y autonomía de la mujer. Minimizar sus experiencias o burlarse de ellas perpetúa injusticias y estereotipos dañinos. Empoderar a las mujeres significa respetar su voz, apoyar sus decisiones y valorar su contribución en todos los ámbitos de la vida.',
            ],
            [
                'texto' => 'Las mujeres no son aptas para puestos de liderazgo',
                'texto_desmentido' => 'Numerosos estudios demuestran que las mujeres líderes aportan habilidades cruciales como mayor empatía, colaboración y gestión de crisis. Empresas con diversidad de género en sus equipos directivos son un 21% más rentables según McKinsey. El problema no es la aptitud, sino las barreras estructurales y los sesgos inconscientes.',
            ],
            [
                'texto' => 'La brecha salarial es un mito',
                'texto_desmentido' => 'Datos de Eurostat confirman que en España las mujeres ganan de media un 11.5% menos que los hombres por el mismo trabajo. La brecha aumenta al 30% cuando se considera el salario a lo largo de toda la vida laboral, debido a interrupciones por maternidad y trabajo parcial involuntario.',
            ],
            [
                'texto' => 'Las mujeres son demasiado emocionales para tomar decisiones importantes',
                'texto_desmentido' => 'La ciencia no respalda esta afirmación. Las investigaciones muestran que tanto hombres como mujeres toman decisiones basadas en emociones y razón. De hecho, la inteligencia emocional, donde las mujeres a menudo destacan, mejora la toma de decisiones complejas y la gestión de equipos.',
            ],
            [
                'texto' => 'El acoso callejero es un cumplido',
                'texto_desmentido' => 'El acoso callejero es una forma de violencia que genera miedo, incomodidad y limita la libertad de movimiento de las mujeres. El 84% de las mujeres en España han sufrido acoso en espacios públicos. No son cumplidos, son conductas que perpetúan la intimidación y la desigualdad.',
            ],
            [
                'texto' => 'Las mujeres ya tienen igualdad de derechos, el feminismo ya no es necesario',
                'texto_desmentido' => 'Aunque se han logrado avances legales, persisten desigualdades estructurales: brecha salarial, violencia de género (54 mujeres asesinadas en 2025), reparto desigual de cuidados y techo de cristal. La igualdad formal en la ley no garantiza igualdad real en la práctica diaria.',
            ],
            [
                'texto' => 'Las denuncias falsas de violencia de género son un problema masivo',
                'texto_desmentido' => 'Los datos del Consejo General del Poder Judicial muestran que solo el 0.01% de las denuncias por violencia de género son falsas, una cifra similar a otros delitos. Este mito se usa para desacreditar a las víctimas reales, cuando el verdadero problema es que el 80% de las agresiones nunca se denuncian.',
            ],
            [
                'texto' => 'Las mujeres tienen ventajas por las cuotas y la discriminación positiva',
                'texto_desmentido' => 'Las medidas de acción positiva buscan corregir desigualdades históricas y barreras sistémicas que aún persisten. Sin ellas, la representación femenina en política y empresa sería mínima. No son privilegios, sino herramientas temporales para alcanzar una igualdad real que el mérito solo nunca ha conseguido.',
            ],
            [
                'texto' => 'La violencia de género es un problema privado de pareja',
                'texto_desmentido' => 'La violencia de género es un problema social y estructural que afecta a toda la sociedad. Es la principal causa de muerte de mujeres entre 16 y 44 años a nivel global. Requiere respuesta institucional, educación en igualdad y el compromiso de toda la ciudadanía para erradicarla.',
            ],
        ];

        foreach ($bulos as $bulo) {
            $users->random()->bulos()->create([
                'texto' => $bulo['texto'],
                'texto_desmentido' => $bulo['texto_desmentido'],
            ]);
        }
    }
}
