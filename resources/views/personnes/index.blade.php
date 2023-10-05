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
                <a class="supprimer-personne delete-btn" id-personne="{{ $personne->id }}" >Supprimer</a>
            </td>
        </tr>
        @endforeach
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(".supprimer-personne").on("click", function(e) {
            e.preventDefault();
            var id = $(this).attr("id-personne");
            $.ajax({
                url: "/personnes/" + id,
                data: {"_token": "{{ csrf_token() }}"},
                type: 'get', // Utilisez la méthode HTTP DELETE pour supprimer la personne
                success: function(result) {
                    // Suppression réussie, supprimez la ligne de la table et actualisez la liste
                    $("#personne-" + id).remove();
                }
            });
        });
    </script>
</body>
</html>
