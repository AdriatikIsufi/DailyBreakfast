<?php

include_once('../../path.php');
include_once('register.php');

$reg = new register();

$data = $reg->signUp();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>ITKosova - Signup</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>

  <div class="container" style="background-image: url('https://i.pinimg.com/originals/00/e0/70/00e070179d89cb588bc6fd1ce201ee72.jpg');">
    <div class="form">
      <div class="header" style="background-color: #2c3954;">
        <a href="../../index.php"><img src="../../css/logo2.svg" alt="logo" class="loginlogo" style="width: 240px; margin-left: 27%;">
        </a>
        <div class="form-section">
          <form action="" method="POST">
            <div class="group">
              <h3 class="heading">Create account</h3>
            </div>
            <div class="group">
              <input type="text" name="username" class="control" placeholder="Enter Username..." value="<?php if (!empty($data['username'])) : echo $data['username'];
                                                                                                        endif; ?>">

              <div class="error">
                <?php if (!empty($data['username_error'])) : ?>
                  <?php echo $data['username_error']; ?>
                <?php endif; ?>
              </div>
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
              <input type="password" name="password" class="control" placeholder="Create Password..." value="<?php if (!empty($data['password'])) : echo $data['password'];
                                                                                                              endif; ?>">
              <div class="error">
                <?php if (!empty($data['password_error'])) : ?>
                  <?php echo $data['password_error']; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="group">
              <input type="password" name="confirm" class="control" placeholder="Confirm Password..." value="<?php if (!empty($data['confirm_pass'])) : echo $data['confirm_pass'];
                                                                                                              endif; ?>">
              <div class="error">
                <?php if (!empty($data['confirm_error'])) : ?>
                  <?php echo $data['confirm_error']; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="group m20">
              <input type="submit" name="signup" class="btn" value="Create Account">
            </div>
            <div class="group m20">
              <a href="../login/index.php" class="link">Already have an account ?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>

</html>