<?php

namespace App\Http\Controllers\Pokemon;

use App\Http\Controllers\Controller;
use App\Models\Pokemon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    //
    private $pokemon;

    public function __construct()
    {
        $this->pokemon = Pokemon::all()->toArray();
    }


    public function index(){
        return view('pokemon.index');
    }

    public function search(Request $request){
        $namePokemon = mb_strtoupper($request->namePokemon);
        $key = $this->searchIndex($namePokemon);
        if (!$key) return redirect()->back()->withErrors(['nameError' => 'Informações sobre o pokémon não foram localizadas.']);

        $pokemon = $this->pokemon[$key];
        $additional = $this->consumeApi(mb_strtolower($pokemon['name']));
        return view('pokemon.result', compact('pokemon', 'additional'));
    }


    public function searchIndex($namePokemon){
        $key = array_search($namePokemon, array_column($this->pokemon, 'name'));
        return $key;
    }

    public function consumeApi($name)
    {
        $client = new Client(); //GuzzleHttp\Client

        $url = 'https://pokeapi.co/api/v2/pokemon/'.$name;

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return $responseBody;
    }
}
