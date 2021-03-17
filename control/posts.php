<?php 

// include_once('../path.php');
include_once(ROOT_PATH . '/database/crudMethods.php'); 
include_once(ROOT_PATH . '/validation/validation.php'); 
require_once(ROOT_PATH . '/database/dbconnect.php'); 

session_start();

class posts {
    private $table;
    private $id;
    private $title; 
    private $body;
    private $topic_id;
    private $database;
    public $errors;
    
    public function __construct(){
        $this->table = 'posts';
        $this->id = "";
        $this->title = "";
        $this->body = "";
        $this->topic_id = "";
        $this->errors = array();
        $this->database = new dbconnect();
    }

    public function createPost(){
        try{
            if(isset($_POST['add-post'])){

                $validimi = new validation();
                $this->errors = $validimi->validatePosts($_POST);

                if(!empty($_FILES['image']['name'])){
                    $image_name = time() . '_' . $_FILES['image']['name'];
                    $destionation = ROOT_PATH . "/images/posts/" . $image_name;
            
                    $result = move_uploaded_file($_FILES['image']['tmp_name'], $destionation);
                    
                    if($result){
                        $_POST['image'] = $image_name;
                    }else{
                        array_push($this->errors, "Failed to upload image");
                    }
                }else {
                    array_push($this->errors, "Post image required");
                }

                if(count($this->errors) == 0) {
                    unset($_POST['add-post']);
                    $_POST['user_id'] = $_SESSION['id'];
                    $_POST['body'] = strip_tags($_POST['body']);

                    $crudForm = new crudMethods();
                    // $crudForm->dd($_POST);
                    $post_id = $crudForm->create($this->table, $_POST);
                    header("location:index.php");
                    exit();
                }else {
                    $this->title = $_POST['title'];
                    $this->body = $_POST['body'];
                    $this->topic_id = $_POST['topic_id'];
                }
                return $this->errors;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }   
    }

    public function getIDs(){
        if(isset($_GET['id'])){
            $crud = new crudMethods();
            $getID = $_GET['id'];
            $post = $crud->selectOne($this->table, ['id' => $_GET['id']]);
            $this->setTitle($post['title']);
            $this->setId($post['id']);
            $this->setBody($post['body']);
            $this->setTopicID($post['topic_id']);
        }
    }

    public function updatePost(){
        try{
            if(isset($_POST['update-post'])){ 
                
                $crud = new crudMethods();
                $validimi = new validation();
                $this->errors = $validimi->validatePosts($_POST);
            
                if(!empty($_FILES['image']['name'])){
                    $image_name = time() . '_' . $_FILES['image']['name'];
                    $destionation = ROOT_PATH . "/images/posts/" . $image_name;
            
                    $result = move_uploaded_file($_FILES['image']['tmp_name'], $destionation);
                    
                    if($result){
                        $_POST['image'] = $image_name;
                    }else{
                        array_push($this->errors, "Failed to upload image");
                    }
                }else{
                    array_push($this->errors, "Post image required");
                }

                if(count($this->errors) == 0) {
                    $id = $_POST['id'];
                    unset($_POST['update-post'], $_POST['id']);
                    $_POST['user_id'] = $_SESSION['user_id'];
                    $_POST['body'] = strip_tags($_POST['body']);
                    $table = 'posts';
                    $topic_id = $crud->update($table, $id, $_POST);
                    header("location:index.php");
                }else {
                    $this->title = $_POST['title'];
                    $this->body = $_POST['body'];
                    $this->topic_id = $_POST['topic_id'];
                }
                return $this->errors;
            }
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
        }   
    }

    public function deleteID(){
        if(isset($_GET['delete_id'])){
            $crud = new crudMethods();
            $count = $crud->delete($this->table, $_GET['delete_id']);            
            header("location:index.php");
            exit();
        }
    }

    public function getPostUsername(){
        $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id ORDER BY p.created_at DESC";
        $query = $this->database->pdo->prepare($sql);
        $query->execute();
        $records = $query->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

    public function showPosts(){
        $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id";
        $query = $this->database->pdo->prepare($sql);
        $query->execute();
        $records = $query->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

    public function singlePost($id){
        $sql = "SELECT p.*, u.username 
                FROM posts AS p 
                JOIN users AS u 
                ON p.user_id=u.id 
                AND p.id=:id 
                LIMIT 1";

        $query = $this->database->pdo->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        $records = $query->fetch(PDO::FETCH_ASSOC);
        return $records;
    }

    public function getTechPosts(){
        $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.topic_id=65 ORDER BY p.created_at DESC";
        $query = $this->database->pdo->prepare($sql);
        $query->execute();
        $records = $query->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

    public function getSportPosts(){
        $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.topic_id=68 ORDER BY p.created_at DESC";
        $query = $this->database->pdo->prepare($sql);
        $query->execute();
        $records = $query->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }

    //getters
    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getBody(){
        return $this->body;
    }

    public function getTopicID(){
        return $this->topic_id;
    }

    public function getErrors(){
        return $this->errors;
    }

    //setters
    public function setId($id){
        $this->id = $id;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function setBody($body){
        $this->body = $body;
    }

    public function setTopicID($topic_id){
        $this->topic_id = $topic_id;
    }
}   