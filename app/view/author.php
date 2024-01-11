<?php
$title = "author";
ob_start();
?>


<h1>author page</h1>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app\view\layout\layout.php'; ?>