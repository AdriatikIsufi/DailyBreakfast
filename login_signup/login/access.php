<?php 

// include_once('../../path.php');
include_once(ROOT_PATH . '/database/crudMethods.php');
require_once(ROOT_PATH . '/database/dbconnect.php');

// Start the session
session_start();

class access {
    protected $database;

    public function __construct(){
        $this->database = new dbconnect();
    }

    public function login(){
        
        if(isset($_POST['login'])){

            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'email_error' => '',
                'password_error' => '',
                ''
            ];

            if(empty($data['email'])){
                $data['email_error'] = "Email is required!";
            }

            if(empty($data['password'])){
                $data['password_error'] = "Password is required!";
                return $data;
            }

            if(empty($data['email_error']) && empty($data['password_error'])){
                $crud = new crudMethods();

                $sql = "SELECT id, username, email, password, admin FROM users WHERE email = :email";
                $query = $this->database->pdo->prepare($sql);
                $query->bindParam(':email', $data['email']);
                $query->execute();

                $user = $query->fetch();   
                // $crud->dd($user);

                if($user && count($user) > 0 && password_verify($data['password'], $user['password']) ){
                    if($user['admin'] == 1){
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['admin'] = $user['admin'];
                        $_SESSION['is_admin'] = true;
                        $username = $_SESSION['username'];
                        $_SESSION['message'] = 'Hi ' . $username . ' you are successfully logged in';
                        $_SESSION['type'] = 'success';
                        $_SESSION['id'] = $user['id'];
                        header("location:../../index.php");
                        exit();
                    }else{
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['admin'] = $user['admin'];
                        $_SESSION['is_admin'] = false;
                        $username = $_SESSION['username'];
                        $_SESSION['message'] = 'Hi ' . $username . ' you are successfully logged in';
                        $_SESSION['type'] = 'success';
                        $_SESSION['id'] = $user['id'];
                        header("location:../../index.php");
                        exit();
                    }
                }else{
                    $data['password_error'] = "Password or email are incorrect!";
                }         
            }else{
                $data['email_error'] = "Password or email are incorrect!";
            }
            return $data;
        }
    }
}

?>