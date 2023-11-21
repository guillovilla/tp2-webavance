<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>{{ title }}</title>
                <link rel="stylesheet" href="{{path}}css/style.css">
            </head>
            <nav>
            <h1>Bibliothèque Municipale</h1>
            <ul>
                <li><a href="{{path}}">Accueil</a></li>
                {% if session.privilege ==1 %}
                <li><a href="{{path}}usager">Client</a></li>
                <li><a href="{{path}}user">Users</a></li>
                {% endif %}
                <li><a href="{{path}}livre">Livres</a></li>
                {% if session.privilege ==1 %}
                <li><a href="{{path}}emprunt">Emprunt</a></li>
                {% endif %}
                <li><a href="{{path}}login">Login</a></li>
                {% if session.privilege %}
                    <li><small><a href="{{path}}login/logout"></small>Logout</a></li>
                    {% endif %}
                {% if session.privilege ==1 %}
                <li><a href="{{path}}log">Journal</a></li>
                {% endif %}
            </ul>
        </nav>