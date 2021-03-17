<header>
    <div class="logo">
        <a href="index.php"><img src="css/logo.svg" alt="image" class="header-logo"></a>
    </div>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
        <?php if (isset($_SESSION['username'])) : ?>
            <li><a href="index.php">Ballina</a></li>
            <li><a href="tech.php">Teknologji</a></li>
            <li><a href="sport.php">Sport</a></li>
            <li><a href="contact.php">Kontakti</a></li>
            <li><a href="aboutus.php">Rreth nesh</a></li>
            <li>
                <a href="#">
                    <i class="fa fa-user" style="font-size: 1.0em;"></i>
                    <?php
                    $username = $_SESSION['username'];
                    echo $username;
                    ?>
                    <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                </a>
                <ul>
                    <li><a href="admin/posts/index.php">Dashboard</a></li>
                    <li><a href="logout.php" class="logout">Logout</a></li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</header>