<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FFBA Cinéma API </title>
    <link rel="stylesheet" href="{{asset('assets/css/style_main_page.css')}}">
</head>

<body>
<header>
    <div class="logo">
        <img class="logo_page" src="{{ asset('assets/img/logo_movie.png') }}" alt="Logo du site web">
    </div>
    @auth
        <div class="connexion">
            <a href="{{ route('profile.show') }}">Mon compte</a>
        </div>
    @endauth
    @guest
        <div class="connexion">
            <a href="{{ route('login') }}">Connexion</a>
        </div>
        <div class="register">
            <a href="{{ route('register') }}">S'inscrire</a>
        </div>
    @endguest
</header>
    <div class="container">
        <h1>Films triés par moyenne des votes :</h1>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date de sortie</th>
                    <th>Moyenne des votes</th>
                    <th>Nombres de votes</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                <tr>
                    <td><a href="{{ route('movie-details', ['id' => $movie['id']]) }}" title="Voir les détails du film" >{{ $movie['title'] }}</a></td>
                    <td>{{$movie ['release_date']}}</td>
                    <td>{{ $movie['vote_average'] }}</td>
                    <td>{{$movie['vote_count']}}</td>
                    <td>{{$movie['overview']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

</html>