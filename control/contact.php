<?php 

include_once(ROOT_PATH . '/database/crudMethods.php'); 
include_once(ROOT_PATH . '/validation/validation.php'); 
require_once(ROOT_PATH . '/database/dbconnect.php'); 

class contact {
    private $id;
    private $name; 
    private $email;
    private $phone;
    private $subject; 
    private $message; 
    private $table; 
    private $database;
    public $errors;
    
    public function __construct(){
        $this->table = 'posts';
        $this->id = "";
        $this->name = "";
        $this->email = "";
        $this->phone = "";
        $this->subject = "";
        $this->message = "";
        $this->errors = array();
        $this->database = new dbconnect();
    }

    public function createMessage(){
        if(isset($_POST['dergo'])){

            $validimi = new validation();
            $this->errors = $validimi->validateContact($_POST);
            $crud = new crudMethods();
            
            if(count($this->errors) == 0){
                unset($_POST['dergo']);
                
                $table = 'contact';
                $crud = new crudMethods();
                $contact = $crud->create($table, $_POST);
                
                header('location:contact.php');
                exit();
            }else {
                $this->name = $_POST['name'];
                $this->email = $_POST['phone'];
                $this->phone = $_POST['email'];
                $this->subject = $_POST['subject'];
                $this->message = $_POST['message'];
            }
            return $this->errors;
        }
    }

    public function getContactID(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $crud = new crudMethods();
            // $crud->dd($id);
            $table = 'contact';
            $contact = $crud->selectOne($table, ['id' => $id]);
        }
    }

    public function deleteContact(){
        if(isset($_GET['del_id'])){
            $id = $_GET['del_id'];
            // echo "hello";
            $crud = new crudMethods();
            // $crud->dd($id);
            $tableContact = 'contact';
            $count = $crud->delete($tableContact, $id);
            header('location:index.php');
            exit();
        }
    }

    public function getErrors(){
        return $this->errors;
    }

}