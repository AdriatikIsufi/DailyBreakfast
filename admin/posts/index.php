<?php

include_once('../../path.php');
include_once(ROOT_PATH . '/control/posts.php');
include_once(ROOT_PATH . '/database/crudMethods.php');

$postIns = new posts();
$crud = new crudMethods();

$table = 'posts';
$posts = $postIns->showPosts($table);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAILY BREAKFAST</title>
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
                    <li><a href="index.php">Manage Posts</a></li>
                    <li><a href="../users/index.php">Manage Users</a></li>
                    <li><a href="../contact/index.php">Contacts</a></li>
                </ul>
            </div>
        </div>

        <div class="right-side">
            <div class="button-group">
                <a href="create.php" class="btn">Add Post</a>
                <a href="index.php" class="btn">Manage Posts</a>
            </div>

            <div class="right-content">
                <h1 class="page-title" style="font-size:30px;">Manage Posts</h2>
                    <table>
                        <thead>
                            <th>Id</th>
                            <th>Titulli</th>
                            <th>Autori</th>
                            <th>Krijuar me</th>
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $key => $post) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $post['title']; ?></td>
                                    <td><?php echo $post['username']; ?></td>
                                    <td><?php echo $post['created_at']; ?></td>
                                    <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">Edit</a></td>
                                    <td><a href="edit.php?delete_id=<?php echo $post['id']; ?>" class="delete">Delete</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
</body>