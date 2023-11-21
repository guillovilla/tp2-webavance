{{ include('header.php', {title: 'Usager Show'}) }}
<body>
    <div class="container">
        <h1>Details du Client</h1>

        <p><strong>Nom:</strong> {{ usager.nom }}</p>
        <p><strong>Prenom:</strong> {{ usager.prenom }}</p>
        <p><strong>Adresse:</strong> {{ usager.adresse }}</p>
        <p><strong>Phone:</strong> {{ usager.phone }}</p>
        <p><strong>Courriel:</strong> {{ usager.courriel }}</p>
        {% if session.privilege %}
        <a href="{{path}}usager/edit/{{ usager.id }}" class="btn">Modifier</a>
        {% endif %}
    </div>
</body>
</html>