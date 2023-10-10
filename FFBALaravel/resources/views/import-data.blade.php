section('content')
    <div class="container">
        <h1>Données Importées</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Genre</th>
                    <th>Date de Sortie</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->genre }}</td>
                        <td>{{ $movie->release_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
