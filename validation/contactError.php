<?php 

include_once(ROOT_PATH . '/control/contact.php');

$contact = new contact();
$contactErrors = $contact->getErrors();
$contactErrors = array();

if(isset($_POST['dergo'])){
    $contactErrors = $contact->createMessage();
}

?>

<?php if(count($contactErrors) > 0): ?>
    <div class="msg-error">
    <?php foreach ($contactErrors as $error): ?>
        <li style="color:red"><?php echo $error; ?></li>
    <?php endforeach; ?>
    </div>
<?php endif; ?>