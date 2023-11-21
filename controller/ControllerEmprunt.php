<?php

RequirePage::model('CRUD');
RequirePage::model('EmpruntLivre');
RequirePage::model('Emprunt');
RequirePage::model('Usager');
RequirePage::model('Livre');
RequirePage::library('Validation');


class ControllerEmprunt extends controller {
    public function index(){

        $emprunt = new emprunt;
        $select = $emprunt->empruntUsager();
        //$usager = new usager;
        //$selectUsager = $usager->select('usager');
        return Twig::render('emprunt-index.php', ['emprunts'=>$select]);

    }

    public function create(){

        // $ville = new Ville;
        // $selectVilles = $ville->select('ville');
        return Twig::render('emprunt-create.php');
    }

    public function store(){
       // $ville = new Ville;
       // $insertVille = $ville->insert($_POST);
       // $_POST['ville_id'] = $insertVille;
        $emprunt = new emprunt;
        $insert = $emprunt->insert($_POST);
        RequirePage::url('emprunt/show/'.$insert);
    }


    public function show($id){

        $emprunt = new emprunt;
        $selectId = $emprunt->selectId($id);
        return Twig::render('emprunt-show.php', ['emprunt'=>$selectId]);
    }

    public function edit($id) {
        
        $emprunt = new Emprunt();
        $emprunt->editEmprunt($id);
        return Twig::render('emprunt-edit.php');
        
    }

    
    public function update(){
        $emprunt = new emprunt;
        $update = $emprunt->update($_POST);

        //header('Location: ' . $_SERVER['HTTP_REFERER']);
        RequirePage::url('emprunt/show/'.$_POST['id']);
    }

    public function destroy(){
        //print_r($_POST);
        $empruntLivre = new empruntLivre;
        $update = $empruntLivre->delete($_POST['id']);
        $emprunt = new emprunt;
        $update = $emprunt->delete($_POST['id']);
        RequirePage::url('emprunt/index');
    }
}

?>