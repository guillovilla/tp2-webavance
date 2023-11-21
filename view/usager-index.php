{{ include('header.php', {title: 'usager List'}) }}
<body>
    <div class="container">
        <h1>Client</h1>
        <table>
            <tr>
                <th>Avatar</th>
                <th>Nom</th>
                <th>Prenom</th>
                {% if session.privilege ==1 %}
                <th>Plus de details</th>
                <th>Delete</th>
                {% endif %}
            </tr>
            {% for usager in usagers %}
                <tr>
                    <td><img src="{{path}}uploads/{{ usager.avatar }}" alt="Avatar do client" style="width: 40%;"></td>
                    <td>{{ usager.nom }}</td>
                    <td>{{ usager.prenom }}</td>
                    {% if session.privilege == 1 %}
                    <td>
                        <form action="{{path}}usager/show/{{usager.id}}" method="post">
                            <input type="hidden" name="id" value="{{usager.id}}">
                            <input type="submit" value="Plus de details">
                        </form>
                    </td>
                    <td>
                        <form action="{{path}}usager/destroy" method="post">
                            <input type="hidden" name="id" value="{{usager.id}}">
                            <input type="submit" value="Supprimer">
                        </form>
                    </td>
                    {% endif %}
                </tr>
            {% endfor %}
        </table>
        <br><br>
        {% if session.privilege ==1 %}
        <a href="{{path}}usager/create" class="btn">Ajouter</a>
        {% endif %}
    </div>
    
</body>
</html>