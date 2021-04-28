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
    header('Location: ../PagesAdmin\loginAdministracion.php');
}

$layout = new Layout(true, 'Puesto Electivo', false);
$dataPuestos = new PuestosHandler('../databaseHandler');
$puestos = $dataPuestos->getAll();

?>

<?php $layout->Header(); ?>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-2"><a class="btn btn-danger" href="agregarPuesto.php">Agregar puesto electivo</a></div>
    <div class="col-md-8"></div>
</div>
<br>
<br>
<div class="row">
    <div class="col-md-2"></div>
    <?php if ($puestos == "" || $puestos == null) : ?>
        <div class="col-md-4">
            <h2>No hay puestos agregados.</h1>
        </div>

    <?php else : ?>
        <?php foreach ($puestos as $post) : ?>
            <div class="col-md-2">
                <div class="card" style="width: 14rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post->nombre; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $post->descripcion; ?></h6>
                        <hr>
                        <a href="../Candidatos/candidatoIndex.php?id_puesto=<?= $post->id_puesto; ?>" class="btn btn-danger">Ver candidatos</a>
                        <br>
                        <br>
                        <a href="../PuestoElectivo/modificarPuesto.php?id_puesto=<?= $post->id_puesto; ?>" class="btn btn-danger">Modificar</a>
                        <br>
                        <br>
                        <?php if ($post->estado == 1) : ?>
                            <a href="../PuestoElectivo/desactivarPuesto.php?id_puesto=<?= $post->id_puesto; ?>" class="btn btn-danger">Desactivar</a>
                        <?php else : ?>
                            <a href="../PuestoElectivo/activarPuesto.php?id_puesto=<?= $post->id_puesto; ?>" class="btn btn-dark">Activar</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php $layout->Footer(); ?>