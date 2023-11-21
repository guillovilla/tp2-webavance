<?php

class Usager extends CRUD {

    protected $table = 'usager';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'nom', 'prenom', 'adresse', 'phone', 'courriel', 'avatar'];


}

?>