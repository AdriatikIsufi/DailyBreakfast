<?php

include_once('path.php');
include_once(ROOT_PATH . '/control/contact.php');
include_once(ROOT_PATH . '/database/crudMethods.php');

$contact = new contact();

if(isset($_POST['dergo'])){
    $contact->createMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
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

    <div class="container" style="border: 0;">
        <h1 style="margin-bottom: 50px;">Kontakto me ne</h1>
        <?php include(ROOT_PATH . '/includes/messages.php'); ?>
        <div class="contact-box" style="border: 0; height: 550px;">
            <div class="contact-left">
                <h3>Dërgo kërkesën:</h3>

                <?php include(ROOT_PATH . '/validation/contactError.php'); ?>

                <form action="contact.php" method="POST" enctype="multipart/form-data">
                    <div class="input-row">
                        <div class="input-groupt Error">
                            <label for="">Emri:</label>
                            <input type="text" name="name" placeholder="Emri juaj" id="name">
                            <input type="hidden" name="id">
                        </div>
                        <div class="input-group">
                            <label for="">Telefoni:</label>
                            <input type="text" name="phone" placeholder="Numri juaj" id="phone">
                        </div>         
                    </div>
                    <div class="input-row">
                        <div class="input-groupt">
                            <label for="">Email:</label>
                            <input type="email" name="email" placeholder="Emaili juaj" id="email">
                        </div>
                        <div class="input-group">
                            <label for="">Subjekti:</label>
                            <input type="text" name="subject" placeholder="Subjekti" id="subject">
                        </div>         
                    </div>

                    <label>Mesazhi:</label>
                    <textarea rows="10" name="message" placeholder="Mesazhi juaj..." id="textarea"></textarea>

                    <button type="submit" name='dergo' style="background-color: #2c3954;">DERGO</button>

                </form>
            </div>
            <div class="contact-right" style="background-color: #2c3954;">
                <h3>Kontakto</h3>
                <table>
                    <tr>
                        <td>Emaili</td>
                        <td>contact@dailybreakfast.com</td>
                    </tr>

                    <tr>
                        <td>Telefoni</td>
                        <td>+383 44 999 666</td>
                    </tr>

                    <tr>
                        <td>Adresa</td>
                        <td>10000, Prishtina, Kosovo
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!--FOOTER Include-->
	<?php include 'includes/footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>