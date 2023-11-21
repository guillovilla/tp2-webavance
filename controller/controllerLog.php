<?php

//RequirePage::model('Log');
RequirePage::model('CRUD');

class ControllerLog extends Controller {
    public function index(){

        $log = new Log;
        $select = $log->select();
      
        return Twig::render('log-index.php', ['logs'=>$select]);

        
    }


}

?>
