<?php

require_once '../Layout/layout.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../iDataBase/IDatabase.php';
require_once 'CiudadanosHandler.php';
require_once '../objects/Ciudadanos.php';
require_once '../template/template.php';

session_start();

if (isset($_SESSION['administracion'])) {
    $administrador = json_decode($_SESSION['administracion']);
} else {
    header('Location: ../PagesAdmin/loginAdministracion.php');
}

$layout = new Layout(true, 'Ciudadano', false);
$dataCiudadanos = new CiudadanosHandler('../databaseHandler');
$puestosCiudadanos = $dataCiudadanos->getAll();
$template = new template(true, 'Ciudadano', false);
?>

<?php $template->printHeaderAdmin();?>
<?php $template->printLink()?>
<?php $template->printScript() ?>


<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-2"><a class="btn btn-outline-primary" href="agregarCiudadano.php">Agregar ciudadano</a></div>
    <div class="col-md-9"></div>
</div>
<br>
<br>
<div class="row">
    <div class="col-md-2"></div>
    <?php if ($puestosCiudadanos == "" || $puestosCiudadanos == null) : ?>
        <div class="col-md-4 text-info">
            <h2>No hay ciudadanos agregados.</h2>
        </div>

    <?php else : ?>
        <?php foreach ($puestosCiudadanos as $post) : ?>
            <div class="col-md-3">
                <div class="card" style="width: 14rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post->nombre; ?>  <?= $post->apellido; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $post->cedula; ?><hr><br><?= $post->email; ?></h6>
                        <hr>
                        <br>
                        <?php if ($post->estado == 1) : ?>
                            <a href="desactivarCiudadano.php?cedula=<?= $post->cedula; ?>" class="btn btn-outline-dark ">Desactivar</a>
                        <?php else : ?>
                            <a href="activarCiudadano.php?cedula=<?= $post->cedula; ?>" class="btn btn-outline-success">Activar</a>
                        <?php endif; ?>
                        <a href="editarCiudadano.php?cedula=<?= $post->cedula; ?>" class="btn btn-outline-warning">Editar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php $template->printFooterAdmin() ?>