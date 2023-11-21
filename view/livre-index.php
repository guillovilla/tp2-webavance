{{ include('header.php', {title: 'usager List'}) }}
<body>
    <div class="container">
        <h1>Livres</h1>
        <table>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>ISBN</th>
                {% if session.privilege ==1 %}
                <th>Supprimer</th>
                {% endif %}
            </tr>
            {% for livre in livres %}
                <tr>
                    <td>{{ livre.titre }}</td>
                    <td>{{ livre.auteur }}</td>
                    <td>{{ livre.isbn }}</td>
                    {% if session.privilege ==1 %}
                    <td>
                        <form action="{{path}}livre/destroy" method="post">
                            <input type="hidden" name="id" value="{{livre.id}}">
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
                    {% endif %}
                </tr>
            {% endfor %}
        </table>
        <br><br>
        {% if session.privilege ==1 %}
        <a href="{{path}}livre/create" class="btn">Ajouter</a>
        {% endif %}
    </div>
    
</body>
</html>