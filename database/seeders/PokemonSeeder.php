<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $json = \File::get("database/data/pokemon.json");
        $pokemons = json_decode($json);
        foreach ($pokemons as $pokemon) {
            Pokemon::create([
                'name' => mb_strtoupper($pokemon->name),
            ]);
        }
    }
}
