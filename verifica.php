<?php
session_start();
if((!isset($_SESSION['login']) || !isset($_SESSION['senha']))){
header('location:login.php');
}
$logado = $_SESSION['login'];
?>