<?php

require_once '../Layout/layout.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../iDataBase/IDatabase.php';
require_once '../Partidos/PartidosHandler.php';
require_once '../objects/Partidos.php';
require_once '../template/template.php';

session_start();

if (isset($_SESSION['administracion'])) {
    $administrador = json_decode($_SESSION['administracion']);
} else {
    header('Location: ../PagesAdmin/loginAdministracion.php');
}

$layout = new Layout(true, 'Partidos Políticos', false);
$dataPartidos = new PartidosHandler('../databaseHandler');
$partidosCharge = $dataPartidos->getAll();
$template = new template(true, 'Partidos Políticos', false);

?>

<?php $template->printHeaderAdmin();?>
<?php $template->printLink()?>
<?php $template->printScript() ?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-2"><a class="btn btn-outline-dark" href="agregarPartido.php">Agregar partido</a></div>
    <div class="col-md-8"></div>
</div>
<br>
<br>
<div class="row">
    <div class="col-md-2"></div>
    <?php if ($partidosCharge == "" || $partidosCharge == null) : ?>
        <div class="col-md-4 text-info">
            <h2>No hay puestos agregados.</h1>
        </div>

    <?php else : ?>
        <?php foreach ($partidosCharge as $post) : ?>
            <div class="col-md-3">

                <div class="card" style="width: 18rem;">
                    <img src="../assets/img/partidos/<?= $post->logo; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post->nombre; ?></h5>
                        <p class="card-text"><?= $post->descripcion; ?></p>
                        <hr>
                        <a href="modificarPartido.php?id_partido=<?= $post->id_partido; ?>" class="btn btn-outline-secondary">Modificar</a>
                        <hr>
                        <?php if(isset($_SESSION['elecciones']))  :?>
                       
                       <?php else :?>
                        <?php if ($post->estado == 1) : ?>
                            <a href="desactivarPartido.php?id_partido=<?= $post->id_partido; ?>" class="btn btn-outline-dark">Desactivar</a>
                        <?php else : ?>
                            <a href="activarPartido.php?id_partido=<?= $post->id_partido; ?>" class="btn btn-outline-success">Activar</a>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php $template->printFooterAdmin(); ?>