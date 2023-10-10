<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieDayController extends Controller
{

    public function movday()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.themoviedb.org/3/trending/movie/day?language=fr', [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMjJkNjNjZGRjMDY2ZDk5ZWQzZTgwNmQzMjY3MThjYSIsInN1YiI6IjYyNGVhNTRhYjc2Y2JiMDA2ODIzODc4YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.zuuBq1c63XpADl8SQ_c62hezeus7VibE1w5Da5UdYyo',
                'accept' => 'application/json',
            ],
        ]);

        $content = $response->getBody()->getContents();
        $data = json_decode($content, true);
        if ($data !== null) {
            usort($data['results'], function ($a, $b) {
                return strcmp($b['vote_average'], $a['vote_average']);
            });
            return view('movday')->with('movies', $data['results']);
        } else {
            return response('Erreur lors de la récupération des données', 500);
        }
    }

    public function show($id)
{
    $movies = $this->getMoviesFromApi();

    $movie = collect($movies)->firstWhere('id', $id);
    
    if ($movie) {
        return view('movie-details', ['movie' => $movie]);
    } else {
        return response('Film non trouvé', 404);
    }
}

private function getMoviesFromApi()
{
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'https://api.themoviedb.org/3/trending/movie/day?language=fr', [
        'headers' => [
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMjJkNjNjZGRjMDY2ZDk5ZWQzZTgwNmQzMjY3MThjYSIsInN1YiI6IjYyNGVhNTRhYjc2Y2JiMDA2ODIzODc4YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.zuuBq1c63XpADl8SQ_c62hezeus7VibE1w5Da5UdYyo',
            'accept' => 'application/json',
        ],
    ]);

    $content = $response->getBody()->getContents();
    $data = json_decode($content, true);

    if ($data !== null) {
        return $data['results'];
    } else {
        return [];
    }
}
    public function importData()
    {
        $data = Movie::all();


        if ($data !== null && isset($data['results'])) {
            foreach ($data['results'] as $movieData) {
                Movie::create([
                    'adult' => $movieData['adult'],
                    'backdrop_path' => $movieData['backdrop_path'],
                    'genre_ids' => json_encode($movieData['genre_ids']),
                    'original_language' => $movieData['original_language'],
                    'original_title' => $movieData['original_title'],
                    'overview' => $movieData['overview'],
                    'popularity' => $movieData['popularity'],
                    'poster_path' => $movieData['poster_path'],
                    'release_date' => $movieData['release_date'],
                    'title' => $movieData['title'],
                    'video' => $movieData['video'],
                    'vote_average' => $movieData['vote_average'],
                    'vote_count' => $movieData['vote_count'],
                ]);
            }

            return response('Données importées avec succès', 200);
        } else {
            return response('Erreur lors de limportation des données', 500);
        }
    }
}
