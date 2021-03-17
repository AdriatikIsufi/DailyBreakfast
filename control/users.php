<?php 

// include_once('../../path.php');
include_once(ROOT_PATH . '/database/crudMethods.php'); 
include_once(ROOT_PATH . '/validation/validation.php'); 
require_once(ROOT_PATH . '/database/dbconnect.php'); 
require_once(ROOT_PATH . '/login_signup/signup/register.php'); 

// session_start();

class users extends register {
    private $id;
    private $username;
    private $email;
    private $password;
    private $admin;
    public $database;
    public $errors;

    public function __construct(){
        $this->id = "";
        $this->username = "";
        $this->email = "";
        $this->password = "";
        $this->admin = "";
        $this->errors = array();
        $this->database = new dbconnect();
    }

    public function createUser(){
        if(isset($_POST['create-user'])){

            $val = new validation();
            $this->errors = $val->validateUser($_POST);

            if(count($this->errors) == 0){
                $id = $_POST['id'];
                unset($_POST['passwordConf'], $_POST['create-user'], $_POST['id']);
                
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
                
                $crud = new crudMethods();
                $table = 'users';
                $count = $crud->create($table, $_POST);
                header('location:index.php');
                exit();
            }else{
                $this->username = $_POST['username'];
                $this->admin = isset($_POST['admin']) ? 1 : 0;
                $this->email = $_POST['email'];
                $this->password = $_POST['password'];
                $this->passwordConf = $_POST['passwordConf'];
            }
            return $this->errors;
        }
    }

    public function updateUser(){  
        if(isset($_POST['update-user'])){
            $val = new validation();
            $this->errors = $val->validateUser($_POST);

            if(count($this->errors) == 0){
                $id = $_POST['id'];
                unset($_POST['passwordConf'], $_POST['update-user'], $_POST['id']);
                
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
                
                $crud = new crudMethods();
                $table = 'users';
                $count = $crud->update($table, $id, $_POST);
                header('location:index.php');
                exit();
            }else{
                $this->username = $_POST['username'];
                $this->admin = isset($_POST['admin']) ? 1 : 0;
                $this->email = $_POST['email'];
                $this->password = $_POST['password'];
                $this->passwordConf = $_POST['passwordConf'];
            }
            return $this->errors;
        }
    }

    public function getUserID(){
        if(isset($_GET['id'])){
            $crud = new crudMethods();
            $table = 'users';
            $user = $crud->selectOne($table, ['id' => $_GET['id']]);
            $this->id = $user['id'];
            $this->username = $user['username'];
            $this->admin = isset($user['admin']) ? 1 : 0;
            $this->email = $user['email'];
        }
    }

    public function deleteUser(){
        if(isset($_GET['delete_id'])){
            $crud = new crudMethods();
            $table = 'users';
            $count = $crud->delete($table, $_GET['delete_id']);
            header('location:index.php');
            exit();
        }
    }

    //getters
    public function getId(){
        return $this->id;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getAdmin(){
        return $this->admin;
    }

    public function getErrors(){
        return $this->errors;
    }

    //setters
    public function setId($id){
        $this->id = $id;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setAdmin($admin){
        $this->admin = $admin;
    }
}
?>





