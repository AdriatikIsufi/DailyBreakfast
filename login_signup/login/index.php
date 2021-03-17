<?php

include_once('../../path.php');
include_once('access.php');

// session_destroy();

$acs = new access();

$data = $acs->logIn();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>ITKosova - Login</title>

  <link rel="stylesheet" href="../style.css">
  <!-- <link rel="stylesheet" href="../../css/style.css"> -->

  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@700&family=Manrope:wght@600&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container" style="background-image: url('https://i.pinimg.com/originals/00/e0/70/00e070179d89cb588bc6fd1ce201ee72.jpg');">
    <div class="form">
      <div class="header" style="background-color: #2c3954;">
        <a href="../../index.php"><img src="../../css/logo2.svg" alt="logo" class="loginlogo" style="width: 240px; margin-left: 27%;">
        </a>
      </div>

      <div class="form-section">

        <?php include(ROOT_PATH . "/includes/messages.php"); ?>

        <form action="" method="POST">
          <div class="group">
            <h3 class="heading">User Login</h3>
          </div>
          <div class="group">
            <input type="email" name="email" class="control" placeholder="Enter Email.." value="<?php if (!empty($data['email'])) : echo $data['email'];
                                                                                                endif; ?>">
            <div class="error">
              <?php if (!empty($data['email_error'])) : ?>
                <?php echo $data['email_error']; ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="group">
            <input type="password" name="password" class="control" placeholder="Enter Password..." value="<?php if (!empty($data['password'])) : echo $data['password'];
                                                                                                          endif; ?>">

            <div class="error">
              <?php if (!empty($data['password_error'])) : ?>
                <?php echo $data['password_error']; ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="group m20">
            <input type="submit" name="login" class="btn" value="Login">
          </div>
          <div class="group m20">
            <a href="../signup/index.php" class="link">Create new account ?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>