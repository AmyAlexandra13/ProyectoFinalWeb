<?php

require_once '../databaseHandler/databaseConnection.php';
require_once '../iDataBase/IDatabase.php';

require_once 'CandidatosHandler.php';

require_once '../FileHandler/JsonFileHandler.php';
require_once '../objects/Candidatos.php';

require_once '../FileHandler/JsonFileHandler.php';
require_once '../iDataBase/IDatabase.php';
require_once '../template/template.php';

session_start();

if (isset($_SESSION['administracion'])) {
    $administrador = json_decode($_SESSION['administracion']);
} else {
    header('Location: ../PagesAdmin/loginAdministracion.php');
}
$context = new CandidatosHandler('../databaseHandler');
if(isset($_GET['id'])) {

    $ID = $_GET['id'];
  
    //Simplemente se desactiva el candidato con el update
    $context->Deshabilitar($ID);

    header("Location: candidatoIndex.php");
}


?>