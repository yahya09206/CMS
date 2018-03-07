
<!-- TURN ON SESSION -->
<?php session_start(); ?>

<?php 
//CANCEL SESSION
$_SESSION['username'] = null;
$_SESSION['first_name'] = null;
$_SESSION['last_name'] = null;
$_SESSION['user_role'] = null;
//REDIRECT USER
header("Location: ../index.php");
?>