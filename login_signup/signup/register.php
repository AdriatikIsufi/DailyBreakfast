<?php

// include_once('../../path.php');
require_once(ROOT_PATH . '/database/crudMethods.php');
require_once(ROOT_PATH . '/database/dbconnect.php');

// session_start();

class register {
    protected $database;

    public function __construct(){
        $this->database = new dbconnect();
    }

    public function signUp(){
        if(isset($_POST['signup'])){        
                
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'confirm_pass' => $_POST['confirm'], 
                'username_error' => '',  
                'email_error' => '',
                'password_error' => '',
                'confirm_error' => ''
                ];
        
            if(empty($data['username'])){
                $data['username_error'] = "Username is required";
            }
        
            if(empty($data['email'])){
                $data['email_error'] = "Email is required";
            }else {
                $query = $this->database->pdo->prepare('SELECT * FROM users WHERE email = :email');
                $query->bindParam(':email', $data['email']);
                $query->execute();
                if($query->rowCount() > 0){
                    $data['email_error'] = "Email already exists";
                }
            }
        
            if(empty($data['password'])){
                $data['password_error'] = "Password is required";
            }else if(strlen($data['password']) < 8){
                $data['password_error'] = "Password is to short";
            }
        
            if(empty($data['confirm_pass'])){
                $data['confirm_error'] = "Password confirm is required!";
            }else if($data['password'] != $data['confirm_pass']){
                $data['confirm_error'] = "Passwords do not match";
            }
    
            if(empty($data['username_error']) && empty($data['email_error']) 
            && empty($data['password_error']) && empty($data['confirm_error'])){

                $data['username'] = trim($data['username'], " ");
                $data['email'] = trim($data['email'], " ");
                $data['password'] = trim($data['password'], " ");

                $password = password_hash($data['password'], PASSWORD_DEFAULT);
                $roli = 0;

                $crud = new crudMethods();
                

                $sql = "INSERT INTO users (username,email,password,admin) VALUES (:username, :email, :password, :admin)";
                
                $query = $this->database->pdo->prepare($sql);
                $query->bindValue(':username', $data['username']);
                $query->bindValue(':email', $data['email']);
                $query->bindValue(':password', $password);
                $query->bindValue(':admin', $roli);
                // $query->execute();
                // $crud->dd($query);
                if($query->execute()){
                    $_SESSION['message'] = "Your Account is successfully created";
                    $_SESSION['type'] = "success";
                    header("location:../login/index.php");    
                }else{
                    echo "Problem creating account!";
                }       
            }
            return $data;
        }
    }
}

?>