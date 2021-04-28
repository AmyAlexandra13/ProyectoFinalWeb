<?php

require_once '../Layout/layout.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../databaseHandler/databaseConnection.php';
require_once '../iDataBase/IDatabase.php';
require_once '../PuestoElectivo/PuestosHandler.php';
require_once '../objects/Puestos.php';

session_start();

if (isset($_SESSION['administracion'])) {
    $administrador = json_decode($_SESSION['administracion']);
} else {
    header('Location: ../PagesAdmin/logindAdministracion');
}

$data = new PuestosHandler('../databaseHandler');

if(isset($_GET['id_puesto'])) {

    $idPuesto = $_GET['id_puesto'];

    $data->Habilitar($idPuesto);

    header('Location: PuestoElectivo.php');
}

?>