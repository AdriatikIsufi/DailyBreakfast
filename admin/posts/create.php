<?php

include_once('../../path.php');
include_once(ROOT_PATH . '/control/posts.php');
include_once(ROOT_PATH . '/database/crudMethods.php');

$postIns = new posts();
$crud = new crudMethods();

$tableTopic = 'topics';
$topics = $crud->selectAll($tableTopic);

$table = 'posts';
$posts = $crud->selectAll($table);

// if(isset($_POST['add-post'])){
//     $postIns->createPost();
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Section - Add Posts</title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">

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
                <a href="create.php" class="btn btn-big">Add Post</a>
                <a href="index.php" class="btn btn-big">Manage Posts</a>
            </div>
            <div class="right-content">
                <h2 class="page-title" style="font-size: 30px">Add Posts</h2>
                <?php include_once(ROOT_PATH . '/validation/postError.php '); ?>
                <form action="create.php" method="POST" enctype="multipart/form-data">
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" value="" class="text-input">
                    </div>
                    <div>
                        <label style="padding-bottom: 10px; display:block;">Body</label>
                        <textarea name="body" style="display:block; width:100%;" value="" id="body"></textarea>
                    </div>
                    <div>
                        <label>Image</label>
                        <input type="file" name="image" class="text-input">
                    </div>
                    <div>
                        <label>Topic</label>
                        <select name="topic_id" class="text-input">
                            <?php foreach ($topics as $key => $topic) : ?>
                                <?php if (!empty($topic_id) && $topic_id == $topic['id']) : ?>
                                    <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                                <?php else : ?>
                                    <option value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <div>
                            <button type="submit" name="add-post" class="btn btn-big">Add Post</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
    <script src="../../js/scripts.js"></script>
</body>