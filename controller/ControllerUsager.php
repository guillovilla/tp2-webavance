<?php

RequirePage::model('CRUD');
RequirePage::model('Usager');
RequirePage::model('Emprunt');
RequirePage::model('Livre');
RequirePage::library('Validation');

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
        // Validación de los campos del formulario
        $validation = new Validation;
        extract($_POST);
        $validation->name('nom')->value($nom)->max(45)->min(3);
        $validation->name('prenom')->value($prenom)->max(45)->min(3);
        $validation->name('adresse')->value($adresse)->max(45);
        $validation->name('phone')->value($phone)->max(20);
        $validation->name('courriel')->value($courriel)->max(45)->required()->pattern('email');
    
        if(!$validation->isSuccess()){
            $errors =  $validation->displayErrors();
            return Twig::render('usager-create.php', ['errors' =>$errors, 'usager' => $_POST]);
        }
    
        
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
            $target_dir = '/tp2-webavance-image/uploads/'; 
            $target_file = $target_dir . basename($_FILES['avatar']['name']);
            $ruta_completa = $_SERVER['DOCUMENT_ROOT'] . $target_dir .$_FILES['avatar']['name'];
            // echo $ruta_completa;
            // die();
    
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $ruta_completa)) {
                
                // $_POST['avatar_path'] = $target_dir . $target_file;
                echo 'ok';
            } else {
                return Twig::render('usager-create.php', ['errors' => 'Error', 'usager' => $_POST]);
            }

            unset($_POST['submit']);
            $_POST['avatar'] = $_FILES['avatar']['name'];

            $usager = new Usager;
            $insert = $usager->insert($_POST);
        } else {
            // No se proporcionó un archivo de avatar
            return Twig::render('usager-create.php', ['errors' => 'seleccione une fichier', 'usager' => $_POST]);
        }
    
        // Crear el objeto Usager y realizar la inserción en la base de datos
        $usager = new Usager;
        $insert = $usager->insert($_POST);
    
        // Redireccionar a la página de visualización del usuario
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

        $validation = new Validation;
        extract($_POST);
        $validation->name('nom')->value($nom)->max(45)->min(3);
        $validation->name('prenom')->value($prenom)->max(45)->min(3);
        $validation->name('adresse')->value($adresse)->max(45);
        $validation->name('phone')->value($phone)->max(20);
        $validation->name('courriel')->value($courriel)->max(45)->required()->pattern('email');
        
        if(!$validation->isSuccess()){

            $errors =  $validation->displayErrors();
            return Twig::render('usager-edit.php', ['errors' =>$errors, 'usager' => $_POST]);
            exit();
        }

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
