<?php

include_once('../../path.php');
include_once(ROOT_PATH . '/control/users.php');
include_once(ROOT_PATH . '/database/crudMethods.php');

$crud = new crudMethods();

$tableUser = 'users';
$users = $crud->selectAll($tableUser);

$userIns = new users();

//no
if (isset($_GET['id'])) {
    $userIns->getUserID();
}

//no
if (isset($_GET['delete_id'])) {
    $userIns->deleteUser();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Section - Manage Users</title>

    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
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

                <div class="content">
                    <h2 class="page-title" style="font-size:30px; font-weight: bold;">Manage Users</h2>

                    <?php include(ROOT_PATH . '/includes/messages.php'); ?>

                    <table>
                        <thead>
                            <th>SN</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th colspan="3">Action</th>
                        </thead>

                        <tbody>
                            <?php foreach ($users as $key => $user) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $user['username']; ?></td>

                                    <td style="color:blue;"><?php

                                                            if ($user['admin']) {
                                                                echo 'Admin';
                                                            } else {
                                                                echo 'User';
                                                            }

                                                            ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><a href="edit.php?id=<?php echo $user['id']; ?>" class="edit">Edit</a></td>
                                    <td><a href="index.php?delete_id=<?php echo $user['id']; ?>" class="delete">Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
</body>