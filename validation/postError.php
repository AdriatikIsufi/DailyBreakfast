<?php 

include_once(ROOT_PATH . '/control/posts.php');

//posts

$posts = new posts();
$postErrors = $posts->getErrors();
$postErrors = array();

if(isset($_POST['add-post'])){
    $postErrors = $posts->createPost();
}

if(isset($_POST['update-post'])){
    $postErrors = $posts->updatePost();
}

?>

<?php if(count($postErrors) > 0): ?>
    <div class="msg-error">
    <?php foreach ($postErrors as $error): ?>
        <li style="color:red"><?php echo $error; ?></li>
    <?php endforeach; ?>
    </div>
<?php endif; ?>