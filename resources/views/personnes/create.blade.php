
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une personne</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>
<body>
    <h1>Ajouter une personne</h1>
    <form method="post" action="{{ route('personnes.store') }}" enctype="multipart/form-data">
        @csrf
        <label>Nom :</label>
        <input type="text" name="nom" required><br>

        <label>Prénom :</label>
        <input type="text" name="prenom" required><br>

        <label>Sexe :</label>
        <select name="sexe" required>
            <option value="M">Masculin</option>
            <option value="F">Féminin</option>
        </select><br>

        <label>Type de personne :</label>
        <select name="type_personne" id="type_personne" required>
            @foreach($typesPersonne as $typePersonne)
                <option value="{{ $typePersonne->id }}">{{ $typePersonne->libelle }}</option>
            @endforeach
        </select><br>

        <label>Date de naissance :</label>
        <input type="date" name="date_naissance" required><br>

        <div id="photoField" style="display: none;">
            <label>Photo :</label>
            <input type="file" name="photo"><br>
        </div>

        <input class="btn-submit" type="submit" value="VALIDER">
    </form>

    <script>
        document.getElementById("type_personne").addEventListener("change", function() {
            var selectedType = this.value;
            var photoField = document.getElementById("photoField");
            if (selectedType === "2") { // 2 corresponds to the type "enseignant"
                photoField.style.display = "block";
            } else {
                photoField.style.display = "none";
            }
        });
    </script>
</body>
</html>
