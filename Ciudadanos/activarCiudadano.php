<?php

require_once '../FileHandler/JsonFileHandler.php';
require_once '../iDataBase/IDatabase.php';
require_once 'CiudadanosHandler.php';

session_start();

if (isset($_SESSION['administracion'])) {
    $administrador = json_decode($_SESSION['administracion']);
} else {
    header('Location: ../PagesAdmin/loginAdministracion.php');
}

$data = new CiudadanosHandler('../databaseHandler');

if(isset($_GET['cedula'])) {

    $cedula = $_GET['cedula'];

    $data->Habilitar($cedula);
    

    header('Location: CiudadanosAdmin.php');
}

?>