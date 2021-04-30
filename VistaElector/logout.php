<?php 

session_start();

unset($_SESSION['ciudadano']);

header('Location: ../VistaElector/login.php');


?>