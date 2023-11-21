<?php
require_once('CRUD.php');

class Log extends CRUD {

    protected $table = 'donnes_log';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'ip', 'nom', 'page', 'date_visite'];


}

?>