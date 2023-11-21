{{ include('header.php', {title: 'usager List'}) }}
<body>
    <div class="container">
        <h1>Client</h1>
        <table>
            <tr>
                <th>Adresse IP</th>
                <th>Nom</th>
                <th>Page Visité</th>
                <th>Date de visite</th>
            </tr>
            {% for log in logs %}
                <tr>
                    <td>{{ log.ip }}</td>
                    <td>{{ log.nom }}</td>
                    <td>{{ log.page }}</td>
                    <td>{{ log.date_visite }}</td>
                </tr>
            {% endfor %}
        </table>
    </div>
    
</body>
</html>