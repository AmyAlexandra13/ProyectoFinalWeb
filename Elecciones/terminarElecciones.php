<?php

session_start();

unset($_SESSION['elecciones']);

header('Location: ../PagesAdmin/loginAdministracion.php');

?>