<?php
$title = "admin";
ob_start();
?>


<h1>admin hhh</h1>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app\view\layout\layout.php'; ?>