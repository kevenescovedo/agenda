<?php
session_start();
if(! $_SESSION['logado']) {
	header('location:index.php');
	exit();
}
?>