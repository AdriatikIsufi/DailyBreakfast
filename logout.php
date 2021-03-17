<?php

session_start();

session_destroy();

header('Location:/project-web/login_signup/login/index.php');

?>