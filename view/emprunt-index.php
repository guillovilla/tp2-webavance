{{ include('header.php', {title: 'usager List'}) }}
<body>
    <div class="container">
        <h1>Emprunts</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date d'emprunt</th>
                <th>Date de retour</th>
                <th>Livre retourné</th>
            </tr>
            {% for emprunt in emprunts %}
                <tr>
                    <td>{{ emprunt.nom }}</td>
                    <td>{{ emprunt.prenom }}</td>
                    <td>{{ emprunt.titre }}</td>
                    <td>{{ emprunt.auteur }}</td>
                    <td>{{ emprunt.date_emprunt }}</td>
                    <td>{{ emprunt.date_retour }}</td>
                    <td>
                        <form action="{{path}}emprunt/destroy" method="post">
                            <input type="hidden" name="id" value="{{emprunt.idEmprunt}}">
                            <input type="submit" value="Livre retourné">
                        </form>
                    </td>

                </tr>
            {% endfor %}
        </table>
    </div>
    
</body>
</html>