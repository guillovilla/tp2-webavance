{{ include('header.php', {title: 'Usager Edit'}) }}
<body>
    <div class="container">
        <form action="{{path}}usager/update" method="post">
            <input type="hidden" name="id" value="{{ usager.id}}">
            <label>Nom
                <input type="text" name="nom" value="{{ usager.nom }}">
            </label>
            <label>Prenom
                <input type="text" name="prenom" value="{{ usager.prenom }}">
            </label>
            <label>Adresse
                <input type="text" name="adresse" value="{{ usager.adresse }}">
            </label>
            <label>Phone
                <input type="text" name="phone" value="{{ usager.phone }}">
            </label>
            <label>Courriel
                <input type="email" name="courriel" value="{{ usager.courriel }}">
            </label>
            <input type="submit" value="Subgarder" class="btn">
        </form>
    </div>
</body>
</html>