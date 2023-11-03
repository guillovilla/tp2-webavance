<?php

class Emprunt extends CRUD {

    protected $table = 'emprunt';
    protected $primaryKey = 'id';

    public function empruntUsager(){
        $sql = "SELECT
                    usager.nom,
                    usager.id,
                    usager.prenom,
                    livre.titre,
                    livre.auteur,
                    emprunt.date_emprunt,
                    emprunt_livre.date_retour,
                    emprunt.id AS idEmprunt,
                    usager_id
                FROM
                    usager
                JOIN
                    emprunt ON usager.id = emprunt.usager_id
                JOIN
                    emprunt_livre ON emprunt.id = emprunt_livre.emprunt_id
                JOIN
                    livre ON emprunt_livre.livre_id = livre.id";

    $stmt= $this->query($sql);
    return $stmt->fetchAll();
    }

    public function editEmprunt($idEmprunt, $nuevosDatos) {
        $sql = "UPDATE emprunt
                SET
                    date_emprunt = :date_emprunt,
                    
                WHERE
                    id = :idEmprunt";

        $stmt = $this->prepare($sql);
        

    }



}

?>