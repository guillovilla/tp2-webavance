<?php

RequirePage::model('CRUD');
RequirePage::model('Usager');
RequirePage::model('Emprunt');
RequirePage::model('Livre');

class ControllerLivre extends controller {
    public function index(){

        $livre = new Livre;
        $select = $livre->select();
        return Twig::render('livre-index.php', ['livres'=>$select]);

    }

    public function create(){

        // $ville = new Ville;
        // $selectVilles = $ville->select('ville');
        return Twig::render('livre-create.php');
    }

    public function store(){
       // $ville = new Ville;
       // $insertVille = $ville->insert($_POST);
       // $_POST['ville_id'] = $insertVille;
        $livre = new livre;
        $insert = $livre->insert($_POST);
        RequirePage::url('livre/index/');
    }


    public function show($id){
        
        $livre = new livre;
        $selectId = $livre->selectId($id);
        return Twig::render('livre-show.php', ['livre'=>$selectId]);
    }

    public function edit($id){
        $livre = new livre;
        $selectId = $livre->selectId($id);
        return Twig::render('livre-edit.php', ['livre'=>$selectId]);
    }
    public function update(){
        print_r($_POST);

        $livre = new livre;
        $update = $livre->update($_POST);

        //header('Location: ' . $_SERVER['HTTP_REFERER']);
        RequirePage::url('livre/show/'.$_POST['id']);
    }

    public function destroy() {
        
        //print_r($_POST);
        $livre = new livre;
        $update = $livre->delete($_POST['id']);
       
        $update = $livre->delete($_POST['id']);
        RequirePage::url('livre/index');
        
    }
}

 
?>
