{{ include('header.php', {title: 'Usager Show'}) }}
<body>
    <div class="container">
        <h1>Details du Usager</h1>

        <p><strong>Nom:</strong> {{ usager.nom }}</p>
        <p><strong>Prenom:</strong> {{ emprunt.prenom }}</p>
        <p><strong>Adresse:</strong> {{ emprunt.livre_id }}</p>
        <p><strong>Phone:</strong> {{ emprunt.auteur }}</p>
        <p><strong>Courriel:</strong> {{ emprunt.date_emprunt }}</p>
        <p><strong>Courriel:</strong> {{ emprunt_livre.date_retour }}</p>
        <a href="{{path}}usager/edit/{{ usager.id }}" class="btn">Modifier</a>
    </div>
</body>
</html>
