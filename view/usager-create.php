{{ include('header.php', {title: 'Usager Create'}) }}
<body>
    <div class="container">
        <form action="{{path}}usager/store" method="post">
            <label>Nom
                <input type="text" name="nom">
            </label>
            <label>Prenom
                <input type="text" name="prenom">
            </label>
            <label>Adresse
                <input type="text" name="adresse">
            </label>
            <label>Phone
                <input type="text" name="phone">
            </label>
            <label>Courriel
                <input type="email" name="courriel">
            </label>
            <input type="submit" value="Subgarder" class="btn">
        </form>
    </div>
</body>
</html>

