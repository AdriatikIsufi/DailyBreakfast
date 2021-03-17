<?php

include_once('../../path.php');
include_once(ROOT_PATH . '/control/contact.php');
include_once(ROOT_PATH . '/database/crudMethods.php');

$contactIns = new contact();
$crud = new crudMethods();

$table = 'contact';
$contacts = $crud->selectAll($table);

//po
if (isset($_GET['id'])) {
    $contactIns->getContactID();
}

//po
if (isset($_GET['del_id'])) {
    $contactIns->deleteContact();
}

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
                    <li><a href="../posts/index.php">Manage Posts</a></li>
                    <li><a href="../users/index.php">Manage Users</a></li>
                    <li><a href="index.php">Contacts</a></li>
                </ul>
            </div>
        </div>

        <div class="right-side">
            <div class="right-content">
                <h1 class="page-title" style="font-size:30px;">Contact Messages</h2>
                    <?php include(ROOT_PATH . "/includes/messages.php"); ?>
                    <table>
                        <thead>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($contacts as $key => $contact) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $contact['name'] ?></td>
                                    <td><?php echo $contact['email']; ?></td>
                                    <td><?php echo $contact['subject']; ?></td>
                                    <td><?php echo $contact['message']; ?></td>
                                    <td><a href="index.php?del_id=<?php echo $contact['id']; ?>" class="delete">Delete</a></td>
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