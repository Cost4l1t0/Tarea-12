<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Peliculas / Series
        $halloween = Movie::create([
            'name'           => 'Halloween',
            'classification' => 'slasher',
            'release_date'   => '1978-10-25',
            'review'         => 'La pelicula que definio el genero slasher. Michael Myers acecha a una adolescente en la noche de brujas.',
            'season'         => null,
        ]);

        $halloween2018 = Movie::create([
            'name'           => 'Halloween',
            'classification' => 'slasher',
            'release_date'   => '2018-10-19',
            'review'         => 'Secuela directa del original. Laurie Strode se prepara durante 40 anos para el regreso de Myers.',
            'season'         => null,
        ]);

        $friday = Movie::create([
            'name'           => 'Friday the 13th',
            'classification' => 'slasher',
            'release_date'   => '1980-05-09',
            'review'         => 'Un grupo de consejeros en Camp Crystal Lake es cazado uno a uno en una noche de terror.',
            'season'         => null,
        ]);

        $nightmare = Movie::create([
            'name'           => 'A Nightmare on Elm Street',
            'classification' => 'slasher',
            'release_date'   => '1984-11-16',
            'review'         => 'Freddy Krueger ataca a los adolescentes dentro de sus suenos. Un clasico del horror de los 80.',
            'season'         => null,
        ]);

        $scream = Movie::create([
            'name'           => 'Scream',
            'classification' => 'slasher',
            'release_date'   => '1996-12-20',
            'review'         => 'Una deconstruccion inteligente del genero slasher. Ghostface acecha a Sidney Prescott.',
            'season'         => null,
        ]);

        $scream2 = Movie::create([
            'name'           => 'Scream 2',
            'classification' => 'slasher',
            'release_date'   => '1997-12-12',
            'review'         => 'Un nuevo asesino imita a Ghostface en la universidad donde estudia Sidney.',
            'season'         => null,
        ]);

        $texasChainsawMassacre = Movie::create([
            'name'           => 'The Texas Chain Saw Massacre',
            'classification' => 'horror',
            'release_date'   => '1974-10-11',
            'review'         => 'Una de las peliculas de terror mas perturbadoras jamas filmadas. Leatherface es una pesadilla pura.',
            'season'         => null,
        ]);

        $halloweenKills = Movie::create([
            'name'           => 'Halloween Kills',
            'classification' => 'slasher',
            'release_date'   => '2021-10-15',
            'review'         => 'El pueblo de Haddonfield se une para cazar a Michael Myers mientras Laurie se recupera.',
            'season'         => null,
        ]);

        // Personajes
        $michael = Character::create([
            'name'        => 'Michael Myers',
            'description' => 'El hombre del mascara. Asesino en serie que mato a su hermana de nino y escapa cada vez que se lo encierra. No habla, no corre, pero siempre llega.',
            'picture'     => null,
        ]);
        $michael->movies()->sync([$halloween->id, $halloween2018->id, $halloweenKills->id]);

        $jason = Character::create([
            'name'        => 'Jason Voorhees',
            'description' => 'El guardian de Camp Crystal Lake. Aparentemente ahogado de nino, regresa como una fuerza imparable con su iconica mascara de hockey y un machete.',
            'picture'     => null,
        ]);
        $jason->movies()->sync([$friday->id]);

        $freddy = Character::create([
            'name'        => 'Freddy Krueger',
            'description' => 'El asesino de los suenos. Con guantes con cuchillas y un sombrero desgastado, ataca a sus victimas mientras duermen. Quemado vivo por los padres del vecindario.',
            'picture'     => null,
        ]);
        $freddy->movies()->sync([$nightmare->id]);

        $ghostface = Character::create([
            'name'        => 'Ghostface',
            'description' => 'El asesino enmascarado de Woodsboro. La identidad detras de la mascara cambia en cada pelicula, pero la mascara de fantasma y el cuchillo son siempre los mismos.',
            'picture'     => null,
        ]);
        $ghostface->movies()->sync([$scream->id, $scream2->id]);

        $leatherface = Character::create([
            'name'        => 'Leatherface',
            'description' => 'Un gigante que usa mascaras hechas de piel humana y empuna una motosierra. Miembro de una familia de canibales en Texas. Basado vagamente en Ed Gein.',
            'picture'     => null,
        ]);
        $leatherface->movies()->sync([$texasChainsawMassacre->id]);

        $laurie = Character::create([
            'name'        => 'Laurie Strode',
            'description' => 'La final girl original. Sobreviviente de Michael Myers en 1978, dedico su vida a prepararse para su regreso. Interpretada por Jamie Lee Curtis.',
            'picture'     => null,
        ]);
        $laurie->movies()->sync([$halloween->id, $halloween2018->id, $halloweenKills->id]);

        $sidney = Character::create([
            'name'        => 'Sidney Prescott',
            'description' => 'La protagonista de la saga Scream. Una adolescente que sobrevive a multiples ataques de Ghostface. Se convierte progresivamente en una cazadora.',
            'picture'     => null,
        ]);
        $sidney->movies()->sync([$scream->id, $scream2->id]);
    }
}
