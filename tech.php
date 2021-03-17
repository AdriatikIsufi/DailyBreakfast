<?php

include_once('path.php');
include_once('control/posts.php');
include_once('control/users.php');
include_once('database/dbconnect.php');
include_once('database/crudMethods.php');

$crud = new crudMethods();
$post = new posts();

$postet = $post->getTechPosts();

$table = 'posts';
$other = $post->getTechPosts();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAILY BREAKFAST</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@700&family=Manrope:wght@600&display=swap" rel="stylesheet">  
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

    <div class="page-wrapper">
        <!-- SLIDER -->
        </div>

        <!-- Clearfix property clear all the floated content of the element that it is applied to. It is also used to clear floated content within a container.  -->
        <div class="content clearfix">
            <div class="main-content">
                <h1 class="recent-post-title" style="font-size: 32px; font-weight: bold;">Teknologji</h1>
                
                <?php foreach($postet as $post): ?>
                <div class="post clearfix">

                    <img src="<?php echo 'images/posts/' . $post['image']; ?>" alt="" class="post-image">
                    
                    <div class="post-preview" style="padding-left: 0px;padding-right: 35px;">
                        <h3 style="font-size: 20px;"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo substr($post['title'], 0, 110) . '...'; ?></a></h3>
                        <i class="fas fa-user">&nbsp;&nbsp;<span style="font-weight: bold;"><?php echo $post['username']; ?></span></i>
                        &nbsp;
                        <?php $phpdate = strtotime($post['created_at']); ?>
                        <?php $mysqldate = date('Y F d', $phpdate ); ?>
                        <i class="fas fa-calendar">&nbsp;&nbsp;<span style="font-weight: bold;"><?php echo $mysqldate; ?></span></i>
                        <p class="preview-text"><?php echo substr($post['body'], 0, 60) . '...'; ?></p>  
                    </div>
                    
                    <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">More</a>
                </div>
                <?php endforeach; ?>
  
            </div>
            <div class="sidebar">
                <h1 class="section-title" style="margin: 20px; font-size: 32px; font-weight: bold;">Të tjera</h1>
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

    <!--FOOTER Include-->
    <?php include 'includes/footer.php'; ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>