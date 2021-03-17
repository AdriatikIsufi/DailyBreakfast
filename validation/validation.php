<?php

// include_once('../../path.php');
include_once(ROOT_PATH . '/database/dbconnect.php');
include_once(ROOT_PATH . '/database/crudMethods.php');

class validation {
    public function validatePosts($posts){
        try{
            $errors = array();

            if(empty($posts['title'])) {
                array_push($errors, 'Title is required!');
            }

            if(empty($posts['body'])) {
                array_push($errors, 'Body is required!');
            }

            if(empty($posts['topic_id'])) {
                array_push($errors, 'Please select the topic!');
            }

            $crudForm = new crudMethods();
            $table = 'posts';
            $existingPost = $crudForm->selectOne($table, ['title' => $posts['title']]);

            if($existingPost['title'] == $posts['title']){
                if(isset($posts['update-post'])){
                    array_push($errors, 'Post with that title already exists!');
                }
                if(isset($posts['add-post'])) {
                    array_push($errors, 'Post with that title already exists!');
                }
            }
            // $crudForm2->dd($errors);
            return $errors; 
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function validateTopic($topic){
        
        $errors = array();
    
        if(empty($topic['name'])){
            array_push($errors, 'Name is required');
            return $errors;
        }

        $crudForm = new crudMethods();
        $table = 'topics';
        $existingTopic = $crudForm->selectOne($table, ['name' => $topic['name']]);
        // $crudForm->dd($topic);
        if($existingTopic['name'] == $topic['name']){
            if(isset($topic['update-topic'])) {
                array_push($errors, 'Topic with that name already exists!');
            }
            if(isset($topic['add-topic'])) {
                array_push($errors, 'Topic with that name already exists!');
            }
        }
        return $errors;
    }

    public function validateUser($user){
        $errors = array();
    
        if(empty($user['username'])){
            array_push($errors, 'Username is required!');
        }
    
        if(empty($user['email'])){
            array_push($errors, 'Email is required!');
        }
  
        if(empty($user['password'])){
            array_push($errors, 'Password is required!');
        }else if(strlen($user['password']) < 8){
            array_push($errors, 'Password is to short!');
        }
    
        if(empty($user['passwordConf'])){
            array_push($errors, 'Password confirmation is required!');
        }
    
        if($user['passwordConf'] !== $user['password']){
            array_push($errors, 'Passwords do not match!');
        }
        
        $crudForm = new crudMethods();
        $tableUser = 'users';
        $existingUser = $crudForm->selectOne($tableUser, ['email' => $user['email']]);
        
        if($existingUser['email'] == $user['email']){
            if(isset($user['update-user']) && $existingUser['id'] != $user['id']){
                array_push($errors, 'User with that email already exists!');
            }
            if(isset($user['create-admin'])) {
                array_push($errors, 'User with that email already exists!');
            }
        }
        return $errors;
    }

    public function validateContact($contact){
        $errors = array();
        
        if(trim(empty($contact['name']), " ")){
            array_push($errors, 'Name is required');
        }elseif(strpbrk($contact['name'], '1234567890') !== FALSE){
            array_push($errors, 'Please enter your name correctly!');
        }

        if(trim(empty($contact['phone']), " ")){
            array_push($errors, 'Phone is required');
        }elseif(!ctype_digit($contact['phone'])){
            array_push($errors, 'Please enter your number correctly!');   
        }
            
        if(trim(empty($contact['email']), " ")){
            array_push($errors, 'Name is required');
        }

        if(trim(empty($contact['subject']), " ")){
            array_push($errors, 'Subject is required');
        }

        if(trim(empty($contact['message']), " ")){
            array_push($errors, 'Message is required');
        }
        return $errors;
    }
}
