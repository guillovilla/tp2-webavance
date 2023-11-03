<?php

RequirePage::model('CRUD');
RequirePage::model('Usager');
RequirePage::model('Emprunt');

class ControllerUsager extends controller {
    public function index(){

        $usager = new Usager;
        $select = $usager->select();
        return Twig::render('usager-index.php', ['usagers'=>$select]);

    }

    public function create(){

        // $ville = new Ville;
        // $selectVilles = $ville->select('ville');
        return Twig::render('usager-create.php');
    }

    public function store(){
       // $ville = new Ville;
       // $insertVille = $ville->insert($_POST);
       // $_POST['ville_id'] = $insertVille;
        $usager = new usager;
        $insert = $usager->insert($_POST);
        RequirePage::url('usager/show/'.$insert);
    }


    public function show($id){
        
        $usager = new usager;
        $selectId = $usager->selectId($id);
        return Twig::render('usager-show.php', ['usager'=>$selectId]);
    }

    public function edit($id){
        $usager = new usager;
        $selectId = $usager->selectId($id);
        return Twig::render('usager-edit.php', ['usager'=>$selectId]);
    }
    public function update(){
        print_r($_POST);

        $usager = new usager;
        $update = $usager->update($_POST);

        //header('Location: ' . $_SERVER['HTTP_REFERER']);
        RequirePage::url('usager/show/'.$_POST['id']);
    }

    public function destroy() {
        $test = new Emprunt;
        $select = $test->empruntUsager();
    
        // Initialiser le drapeau à false
        $peutEffacer = true;
    
        foreach ($select as $item) {
            if ($_POST['id'] == $item['usager_id']) {
                // Desactivar la bandera si se encuentra una coincidencia
                $peutEffacer = false;
                header("HTTP/1.0 404 Not Found");
        Twig::render('noEffacer.html', ['title' => 'Error Efacer']);
        exit;
                // Puedes salir del bucle ya que ya encontraste una coincidencia
            }
        }
    
        if ($peutEffacer) {
        
            $usager = new usager;
            $update = $usager->delete($_POST['id']);
            RequirePage::url('usager/index');
        }
    }
}

 
?>
