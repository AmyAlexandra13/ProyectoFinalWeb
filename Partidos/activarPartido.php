<?php

require_once '../Layout/layout.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../iDataBase/IDatabase.php';
require_once '../Partidos/PartidosHandler.php';
require_once '../objects/Puestos.php';
require_once '../objects/Partidos.php'; 

session_start();

if (isset($_SESSION['administracion'])) {
    $administrador = json_decode($_SESSION['administracion']);
} else {
    header('Location: ../PagesAdmin/loginAdministracion.php');
}

$data = new PartidosHandler('../databaseHandler');

if(isset($_GET['id_partido'])) {

    $idPartido = $_GET['id_partido'];

    $data->Habilitar($idPartido);

    header('Location: ../Partidos/PartidoAdministracion.php');
}

?>