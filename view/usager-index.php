{{ include('header.php', {title: 'usager List'}) }}
<body>
    <div class="container">
        <h1>Usager</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Plus de details</th>
                <th>Delete</th>
            </tr>
            {% for usager in usagers %}
                <tr>
                    <td>{{ usager.nom }}</td>
                    <td>{{ usager.prenom }}</td>
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
                </tr>
            {% endfor %}
        </table>
        <br><br>
        <a href="{{path}}usager/create" class="btn">Ajouter</a>
    </div>
    
</body>
</html>