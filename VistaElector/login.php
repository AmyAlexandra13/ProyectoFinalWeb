<?php

require_once '../Layout/layout.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../databaseHandler/databaseConnection.php';
require_once '../iDataBase/IDatabase.php';
require_once '../objects/Ciudadanos.php';
require_once '../PagesAdmin/CiudadanosHandler.php';
require_once '../PagesAdmin/PuestosHandler.php';
require_once '../template/template.php';

session_start();

if (isset($_SESSION['administracion'])) {

    header('Location: ../PagesAdmin/Administracion.php');
}

if (isset($_SESSION['ciudadano'])) {

    header('Location: ../index.php');
}

$layout = new Layout(true, 'Log in', true);
$ciudadano = new CiudadanosHandler('../databaseHandler');
$template = new template(true);

if(isset($_POST['cedula'])) {

    $currentCiudadano = $ciudadano->getCiudadanoByCedula($_POST['cedula']);
    if(isset($_SESSION['elecciones'])) {

        if($currentCiudadano == true) {
            $_SESSION['ciudadano'] = json_encode($currentCiudadano);
    
            header('Location: ../index.php');
        }

    } else {
        echo '<script>alert("No hay elecciones activas.")</script>';
    }

} 
?>

<?php $template->printHeader(); ?>


<main role="main" class="container">
  <div class="jumbotron pb-2">
    <h1 class="display-4">Bienvenido a SADVO</h1>
    <p class="lead">A continuación ingrese su documento de identidad para iniciar el proceso de votación.</p>
  </div>
</main>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <form action="login.php" method="POST">
      <form class="pt-4">
        <input type="text" class="fadeIn second" id="documento" name="cedula" required placeholder="Documento de Identidad (Cédula)">
        <input type="submit" class="fadeIn fourth" name="boton" value="Entrar">
      </form>
    </form>
  </div>
  <?php $template->printFooter() ?>
</div>
