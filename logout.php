<?php
session_start();
session_destroy();
header("location: login.php");


/*
include('../conexion/db.php');
/*
session_start();
if(isset($_SESSION['username'])){
    echo "existe sesión";
    session_destroy();
    header('location: login.php');
}else{
    //echo "no existe sesión";
}
*/
/*	
	session_start();
	session_destroy();
	
	header("Location: login.php");
*/
?>