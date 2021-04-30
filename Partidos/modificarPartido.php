<?php

require_once '../Layout/layout.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../iDataBase/IDatabase.php';
require_once '../Partidos/PartidosHandler.php';
require_once '../objects/Puestos.php';
require_once '../objects/Partidos.php';
require_once '../template/template.php';

session_start();

$layout = new Layout(true, 'Modificar Partido', false);
$data = new PartidosHandler('../databaseHandler');
$template = new template(true, 'Modificar Partido', false);

if (isset($_SESSION['administracion'])) {
    $administrador = json_decode($_SESSION['administracion']);
} else {
    header('Location: ../PagesAdmin/loginAdministracion.php');
}

if (isset($_GET['id_partido'])) {

    $idPartido = $_GET['id_partido'];

    $partidoCharge = $data->getById($idPartido);

    if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_FILES['logo'])) {

        if (isset($_GET['id_partido'])) {

            $idPartido = $_GET['id_partido'];

            if ($_POST['nombre'] == "" || $_POST['descripcion'] == "" || $_FILES['logo'] == "") {
                echo "<script> alert('Llene los espacios en blanco.'); </script>";
            } else {

                //var_dump($idPartido);
                //exit();

                $partido = new Partidos();
                $partido->id_partido = $idPartido;
                $partido->nombre = $_POST['nombre'];
                $partido->descripcion = $_POST['descripcion'];

                $data->Edit($partido);
                echo "<script> alert('El puesto ha sido modificado correctamente.'); </script>";

                header('Location: PartidoAdministracion.php');
            }
        }
    }
}

?>


<?php $template->printHeaderAdmin();?>
<?php $template->printLink()?>
<?php $template->printScript() ?>

<br>
<br>
<br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <img class="mb-4" src="../assets/img/partidos2.jpg" alt="" width="350" height="120">
        <br>
        <form enctype="multipart/form-data" action='modificarPartido.php?id_partido=<?= $idPartido; ?>' method="POST">
            <div class="form-group">
                <label for="nombrepartido">Nombre del partido</label>
                <input type="text" class="form-control" id="nombrepartido" placeholder="Ingrese el nombre del nuevo puesto" value="<?= $partidoCharge->nombre; ?>" name='nombre'>
            </div>
            <div class="form-group">
                <label for="descripcionpartido">Descripción del partido</label>
                <input type="text" class="form-control" id="descripcionpartido" placeholder="Ingrese una descripción del puesto" value="<?= $partidoCharge->descripcion; ?>" name='descripcion'>
            </div>
            <div class="form-group">
                <label for="logo">Cargar logo:</label>
                <input type="file" class="form-control" id="logo" name="logo">
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-outline-dark btn-block" type="submit">Modificar</button>
            </div>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>

<?php $template->printFooterAdmin(); ?>