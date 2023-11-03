{{ include('header.php', {title: 'Emprunt Create'}) }}
<body>
    <div class="container">
        <form action="{{path}}emprunt/store" method="post">
            <label>Nom
                <input type="text" name="nom">
            </label>
            <label>Prenom
                <input type="text" name="prenom">
            </label>
            <label>Titre
                <input type="text" name="titre">
            </label>
            <label>date d'emprunt
                <input type="text" name="date_emprunt">
            </label>
            <label>Date de retour
                <input type="text" name="date_retour" value="{{ emprunt.date_emprunt }}" >
            </label>
            <input type="submit" value="save" class="btn">
        </form>
    </div>
</body>
</html>

