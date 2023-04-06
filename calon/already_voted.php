<?php 
session_start();
include '../assets/conn.php';
include '../assets/header.php';

if (!isset($_SESSION['nisn'])) {
  header('Location: login.php');
}

?>
<br>
<center>
<h1><font color="red">Kamu sudah melakukan voting!!</font>
<br>
<a href="../kandidat.php" class="btn btn-secondary">Back</a>
</center>