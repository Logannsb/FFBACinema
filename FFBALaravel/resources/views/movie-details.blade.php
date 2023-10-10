<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FFBA Cinéma API - Détails du film</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style_main_page.css') }}">
</head>

<body>
    <header>
        <div class="logo">
            <img class="logo_page" src="{{ asset('assets/img/logo_movie.png') }}" alt="Logo du site web">
        </div>
        <div class="connexion">
            <a href="{{ url('login') }}">Connexion</a>
        </div>
    </header>
    <div class="container">
        <h1>Détails du film : {{ $movie['title'] }}</h1>
        <table>
            <tbody>
                <tr>
                    <td>Titre :</td>
                    <td>{{ $movie['title'] }}</td>
                </tr>
                <tr>
                    <td>Date de sortie :</td>
                    <td>{{ $movie['release_date'] }}</td>
                </tr>
                <tr>
                    <td>Moyenne des votes :</td>
                    <td>{{ $movie['vote_average'] }}</td>
                </tr>
                <tr>
                    <td>Nombre de votes :</td>
                    <td>{{ $movie['vote_count'] }}</td>
                </tr>
                <tr>
                    <td>Description :</td>
                    <td>{{ $movie['overview'] }}</td>
                </tr>
                <tr>
                    <td> Langue original :</td>
                    <td>{{ $movie['original_language'] }}</td>
                </tr>
                <tr>
                    <td> Titre original:</td>
                    <td>{{ $movie['original_title'] }}</td>
                </tr>
                <tr>
                    <td> ID:</td>
                    <td>{{ $movie['id'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>