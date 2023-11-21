{{ include('header.php', {title: 'Livre Create'}) }}
<body>
    <div class="container">
        <form action="{{path}}livre/store" method="post">
            <label>Titre
                <input type="text" name="titre">
            </label>
            <label>Auteur
                <input type="text" name="auteur">
            </label>
            <label>ISBN
                <input type="text" name="isbn">
            </label>
            <input type="submit" value="Subgarder" class="btn">
        </form>
    </div>
</body>
</html>

