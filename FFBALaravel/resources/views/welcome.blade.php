<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil </title>
    <link rel="stylesheet" href="{{asset('assets/css/style_main_page.css')}}">
</head>

<body>
<header>
        <div class="logo">
        <img class="logo_page" src="{{ asset('assets/img/logo_movie.png') }}" alt="Logo du site web">

        </div>
        <div class="connexion">
            <a href="{{url('login')}}">Connexion</a>
        </div>
        <div class="register">
            <a href="{{url('register')}}">S'inscrire</a>
        </div>
    </header>
    <!-- x-welcome.blade.php -->
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
                <td>{{ $movie['title'] }}</td>
                <td>{{ $movie['release_date'] }}</td>
                <td>{{ $movie['vote_average'] }}</td>
                <td>{{ $movie['vote_count'] }}</td>
                <td>{{ $movie['overview'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>

</html>

</html>