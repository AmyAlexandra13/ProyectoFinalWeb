<?php

require_once '../Layout/layout.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../iDataBase/IDatabase.php';
require_once '../databaseHandler/databaseConnection.php';
require_once '../Elecciones/EleccionesHandler.php';
require_once '../objects/Elecciones.php';
require_once '../template/template.php';

session_start();

if (isset($_SESSION['administracion'])) {
    $administrador = json_decode($_SESSION['administracion']);
} else {
    header('Location: ../PagesAdmin/loginAdministracion.php');
}

if (isset($_SESSION['elecciones'])) {
    header('Location: ../PagesAdmin/loginAdministracion.php');
}

$layout = new Layout(true, 'Iniciar Elecciones', false);
$eleccionesBegin = new EleccionesHandler('../databaseHandler');
$template = new template(true, 'Iniciar Elecciones', false);

if (isset($_POST['nombre'])) {
    if ($_POST['nombre'] == "" || $_POST['nombre'] == null) {
        echo "<script>alert('Debe introducir un nombre a la elección para iniciarla');</script>";
    } else {

        $eleccionesBegin->Add($_POST['nombre']);
    }
}

if (isset($_GET['ultimate_id'])) {
    $eleccionComplete = $eleccionesBegin->getById($_GET['ultimate_id']);
    $_SESSION['elecciones'] = json_encode($eleccionComplete);

    header("Location: ../PagesAdmin/loginAdministracion.php");
}

?>

<?php $template->printHeaderAdmin();?>
<?php $template->printLink()?>
<?php $template->printScript() ?>

<link rel="stylesheet" href="">

<div class="pricing-header pt-md-5 pb-md-4 mx-auto text-center text-info">
    <h1 class="display-5">Introducir el nombre de la elección.</h1>
</div>

<div class="row">
    <div class="col-md"></div>
    <div class="col-md-3">


        <form action="iniciarElecciones.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control text-info" id="documento" name="nombre" required placeholder="Ingrese el nombre de la elección">
                <div class="nav-scroller py-1 ">
                </div>
                <button type="submit" class="btn btn-block btn-outline-primary">Iniciar</button>
            </div>

        </form>

    </div>
    <div class="col-md"></div>
</div>


<?php $template->printFooterAdmin(); ?>