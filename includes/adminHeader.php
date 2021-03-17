<!--HEADER Include-->
<header>
        <div class="logo">
        <a href="index.php"><img src="../../css/logo.svg" alt="image" class="header-logo"></a>
        </div>
        <i class="fa fa-bars menu-toggle"></i>
        <ul class="nav">
            <?php if(isset($_SESSION['is_admin'])): ?>
                <li>
                    <a href="#">
                    <i class="fa fa-user" style="font-size: 1.0em;"></i>
                    <?php echo $_SESSION['username']; ?>
                    <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                    </a>
                    <ul>
                        <li><a href="../../index.php">Page</a></li>
                        <li><a href="../../logout.php" class="logout">Logout</a></li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
</header>