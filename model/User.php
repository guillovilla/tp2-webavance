<?php

class User extends CRUD {

    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $fillable = ['username', 'password', 'privilege_id'];

    public function checkUser($username, $password){

        $sql = "SELECT * FROM $this->table WHERE username = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($username));
        $count = $stmt->rowCount();

        if($count === 1){
            $salt = "Bl@nc_A";
            $saltPassword = $password.$salt;
            //echo $saltPassword;
            $info_user = $stmt->fetch();
           // echo $info_user['password'];
            
            if(password_verify($saltPassword, $info_user['password'])){
                //session
                session_regenerate_id();
                $_SESSION['user_id'] = $info_user['id'];
                $_SESSION['username'] = $info_user['username'];
                $_SESSION['privilege'] = $info_user['privilege_id'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']);

                RequirePage::url('/home');
                exit();

            }else{
                $errors = "<ul><li>Verifier le mot de passe</li></ul>";
                return $errors;
            }

        }else{
            $errors = "<ul><li>Verifier le username</li></ul>";
            return $errors; 
        }



    }

    
}

?>