<?php

include_once('../../path.php');
include_once(ROOT_PATH . '/control/users.php');
include_once(ROOT_PATH . '/database/crudMethods.php');

$userIns = new users();
$crud = new crudMethods();

$table1 = 'users';
$users = $crud->selectAll($table1);

if (isset($_GET['id'])) {
    $userIns->updateUser();
}

//good
if (isset($_GET['id'])) {
    $userIns->getUserID();
}

//good
if (isset($_GET['delete_id'])) {
    $userIns->deleteUser();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Section - Edit Users</title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@700&family=Manrope:wght@600&display=swap" rel="stylesheet">
</head>

<body>

    <?php include(ROOT_PATH . '/includes/adminHeader.php'); ?>

    <div class="allcontent">
        <div class="left-side">
        <div class="left-sidebar">
            <ul>
                <li><a href="../posts/index.php">Manage Posts</a></li>
                <li><a href="index.php">Manage Users</a></li>
                <li><a href="../contact/index.php">Contacts</a></li>
            </ul>
        </div>
        </div>
        <div class="right-side">
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Add User</a>
                <a href="index.php" class="btn btn-big">Manage Users</a>
            </div>
            <div class="right-content">
                <h2 class="page-title" style="font-size: 30px">Edit User</h2>
                <?php include_once(ROOT_PATH . "/validation/userError.php"); ?>
                <form action="edit.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $userIns->getId(); ?>">
                    <div>
                        <label>Username</label>
                        <input type="text" name="username" value="<?php echo $userIns->getUsername(); ?>" class="text-input">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="text" name="email" value="<?php echo  $userIns->getEmail(); ?>" class="text-input">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" value="<?php echo  $userIns->getPassword(); ?>" class="text-input">
                    </div>
                    <div>
                        <label>Password Confirmation</label>
                        <input type="password" name="passwordConf" value="" class="text-input">
                    </div>
                    <div>
                        <?php if (null !== $userIns->getAdmin() && $userIns->getAdmin() == 1) : ?>
                            <label>
                                <input type="checkbox" name="admin" checked>Admin</input>
                            </label>
                        <?php else : ?>
                            <label>
                                <input type="checkbox" name="admin">Admin</input>
                            </label>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" name="update-user" class="btn btn-big">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
    <script src="../../js/scripts.js"></script>
</body>