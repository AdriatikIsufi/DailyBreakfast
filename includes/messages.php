<?php if(isset($_SESSION['message'])): ?>
    <div class="msg <?php echo $_SESSION['type']; ?>">
        <li style="
        font-size: 18px;
        color: green;
        width: 100%;
        margin-left: 10px;
        margin-top: 10px;
        text-align: center;
        ">
        <?php echo $_SESSION['message']; ?></li>
        <?php
            unset($_SESSION['message']);
            unset($_SESSION['type']);
        ?>
    </div>
<?php endif; ?>