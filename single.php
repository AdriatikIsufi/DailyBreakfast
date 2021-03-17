<?php

include_once('path.php');
include_once(ROOT_PATH . '/control/posts.php');
include_once(ROOT_PATH . '/database/crudMethods.php');

$posts = new posts();
$crud = new crudMethods();

$table = 'posts';

if(isset($_GET['id'])){
    // $post = $crud->selectOne($table, ['id' => $_GET['id']]);
    $post = $posts->singlePost($_GET['id']);
    // $crud->dd($post);
}

$table = 'posts';
$other = $posts->getPostUsername();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAILY BREAKFAST</title>

	<link rel="stylesheet" type="text/css" href="css/single.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@700&family=Manrope:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@800;900&display=swap" rel="stylesheet"> 
</head>
<body>
    
    <!-- Headeri -->
    <?php
        if(isset($_SESSION['admin'])){
            if($_SESSION['admin'] == 1){
                include('includes/headerAdmin.php');
            }else{
                include('includes/headerUser.php');
            }
        }else {
            include('includes/header.php');
        }
    ?>

    <div class="page">
        <!-- Clearfix property clear all the floated content of the element that it is applied to. It is also used to clear floated content within a container.  -->
        <div class="single-content clearfix">
            <div class="single-main-content">
                <h2 class="topic-title" style="font-size: 32px;">Lajmi</h2>
                <div class="single-post">
                    <img src="<?php echo 'images/posts/' . $post['image']; ?>" alt="" class="single-foto">
                    <h2 class="single-post-title"><?php echo $post['title']; ?></h2>
                    <!-- UserIcon -->
                    <i class="fas fa-user" style="margin-left: 30px; font-size: 16px">
                    &nbsp;
                    <span style="
                    font-family: 'Manrope', sans-serif; 
                    font-weight: 500;
                    ">
                    <?php echo $post['username']; ?>
                    </span>
                    </i>
                    &nbsp; 
                    <!-- DATE ICON -->
                    <i class="fas fa-calendar" style="margin-left: 8px; font-size: 16px">
                    &nbsp;
                    <span style="
                    font-family: 'Manrope', sans-serif;
                    font-weight: 500;
                    ">
                    <?php $phpdate = strtotime($post['created_at']); ?>
                    <?php $mysqldate = date('Y F d', $phpdate ); ?>
                    <?php echo $mysqldate; ?>
                    </span></i>   

                    <div class="single-post-content">
                        <p><?php echo $post['body']; ?></p>
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <h1 class="section-title" style="font-family: 'Arial', sans-serif; margin: 20px; font-size: 32px;">Tjera</h1>
                    <div class="section topics">
                        <?php foreach($other as $post): ?>
                        <div class="post">
                            <img src="<?php echo 'images/posts/' . $post['image']; ?>" alt="" class="post-image">
                            <div class="post-info">
                                <h4 style="font-size: 15px;"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo substr($post['body'], 0, 49) . '...';?></a></h4>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
            </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/scripts.js"></script>

</body>