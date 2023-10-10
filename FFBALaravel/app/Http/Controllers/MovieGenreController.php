<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieGenreController extends Controller
{
    public function movgenre()
    {
        $response = Http::get('https://api.themoviedb.org/3/genre/movie/list?language=fr', [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMjJkNjNjZGRjMDY2ZDk5ZWQzZTgwNmQzMjY3MThjYSIsInN1YiI6IjYyNGVhNTRhYjc2Y2JiMDA2ODIzODc4YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.zuuBq1c63XpADl8SQ_c62hezeus7VibE1w5Da5UdYyo',
            ],
        ]);

        if ($response->ok()) {
            $data = $response->json();
    
            if (isset($data['genres'])) {
                return view('movday')->with('name', $data['genres']); 
            } else {
                return response('Les données ne contiennent pas de clé "genres"', 500);
            }
        } else {
            return response('Erreur lors de la requête', 500);
        }
    }
}
