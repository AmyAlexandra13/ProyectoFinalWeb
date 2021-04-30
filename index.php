<?php

require_once 'Layout\layout.php';
require_once 'FileHandler\JsonFileHandler.php';
require_once 'databaseHandler\databaseConnection.php';
require_once 'iDataBase\IDatabase.php';
require_once 'PuestoElectivo\PuestosHandler.php';
require_once 'Elecciones\EleccionesHandler.php';
require_once 'objects\Puestos.php';
require_once 'objects\EleccionesAuditoria.php';
require_once 'template\template.php';

session_start();

if (!isset($_SESSION['elecciones'])) {

    echo '<script>alert("No hay elecciones activas");</script>';
}

if (isset($_SESSION['administracion'])) {

    header('Location: PagesAdmin/Administracion.php');
}

if (isset($_SESSION['elecciones']) && isset($_SESSION['ciudadano'])) {

    $currentElecciones = json_decode($_SESSION['elecciones']);
    $currentCiudadano = json_decode($_SESSION['ciudadano']);
} else {

    header('Location: VistaElector\login.php');
}

$layout = new Layout(false, 'Puesto Electivo', true);
$dataPuestos = new PuestosHandler('databaseHandler');
$filterPuestos = new EleccionesHandler('databaseHandler');
$puestosParciales = $dataPuestos->getAll();
$puestos = $filterPuestos->FilterPuesto($currentCiudadano->cedula,$currentElecciones->id_elecciones,$puestosParciales);
$template = new template(false);
?>


<?php $layout->Header(); ?>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-md-8"></div>
</div>
<br>
<br>
<div class="row">
    <div class="col-md-2"></div>
    <?php if ($puestos == "" || $puestos == null) : ?>
        <div class="col-md-4">
            <h2>Ya votaste por los puestos disponibles.</h1>
        </div>

    <?php else : ?>
        <?php foreach ($puestos as $post) : ?>
            <div class="col-md-2 ">
                <div class="card" style="width: 14rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post->nombre; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $post->descripcion; ?></h6>
                        <hr>
                        <a href="VistaElector\CandidatosVotacion.php?id_puesto=<?= $post->id_puesto; ?>" class="btn btn-outline-info">Ver candidatos</a>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php $layout->Footer(); ?>
