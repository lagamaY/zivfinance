<!DOCTYPE html>
<html>
<head>
    <title>Liste des personnes</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <a href="{{ route('personnes.create') }}" class="btn-add">Enregistrer une personne</a>

    <h1>Liste des personnes</h1>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Type de personne</th>
            <th>Sexe</th>
            <th>Date de naissance</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
        @foreach($personnes as $personne)
        <tr id="personne-{{ $personne->id }}">
            <td>{{ $personne->nom }}</td>
            <td>{{ $personne->prenom }}</td>
            <td>{{ $personne->typepersonne->libelle }}</td>
            <td>{{ $personne->sexe }}</td>
            <td>{{ $personne->datenaissance }}</td>
            <td><img src="{{ asset('photos/' . $personne->photo) }}" width="100" height="100"></td>
            <td>
                <button class="delete-btn" data-id="{{ $personne->id }}">Supprimer</button>
            </td>
        </tr>
        @endforeach
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // ... Votre code JavaScript pour la suppression des personnes ...
    </script>
</body>
</html>
