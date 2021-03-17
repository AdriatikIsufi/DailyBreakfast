<?php 

include_once(ROOT_PATH . '/control/users.php');

//users

$users = new users();
$userErrors = $users->getErrors();
$userErrors = array();

if(isset($_POST['create-user'])){
    $userErrors = $users->createUser();
}

if(isset($_POST['update-user'])){
    $userErrors = $users->updateUser();
}

?>

<?php if(count($userErrors) > 0): ?>
    <div class="msg-error">
    <?php foreach ($userErrors as $error): ?>
        <li style="color:red"><?php echo $error; ?></li>
    <?php endforeach; ?>
    </div>
<?php endif; ?>