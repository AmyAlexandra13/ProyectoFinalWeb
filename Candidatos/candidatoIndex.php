<?php

require_once '../Layout/layout.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../objects/Candidatos.php';
require_once '../objects/Puestos.php';
require_once '../objects/Partidos.php';
require_once 'CandidatosHandler.php';
require_once '../Partidos/PartidosHandler.php';
require_once '../PuestoElectivo/PuestosHandler.php';
require_once '../iDataBase/IDatabase.php';
require_once '../template/template.php';

session_start();

if (isset($_SESSION['administracion'])) {
    $administrador = json_decode($_SESSION['administracion']);
} else {
    header('Location: ../PagesAdmin/loginAdministracion.php');
}

$layout = new Layout(true, 'Candidatos', false);
$data   = new CandidatosHandler('../databaseHandler');
$dataPartido = new PartidosHandler('../databaseHandler');
$dataPuesto = new PuestosHandler('../databaseHandler');
$template = new template(true, 'Candidatos', false);

//estas variables es para q cuando este desactivado el candidato, se ponga en modo oscuro. Mas adelante cambian dependiendo la condicion
$message    = " NO ACTIVO";
$background = " text-white bg-dark";
$directorio = "activarCandidato.php?id=";
$btnActivar = "Activar";

$candidatos = $data->getActive();

if (isset($_GET['id_puesto'])) {
    $candidatos = $data->getCandidateByPuesto($_GET['id_puesto']);
}

?>

<?php $template->printHeaderAdmin();?>
<?php $template->printLink()?>
<?php $template->printScript() ?>

<!-- Puse ese style por unos erroes en unos margenes -->
<div class="container " style="margin: auto auto auto 20%; width:auto">


    <div class="row">


        <?php if (empty($candidatos)) : ?>
            <div class="text-info">
                <h2>No hay candidatos</h2>
                <a href="agregarCandidato.php" type="submit" class="btn btn-outline-primary btn-lg btn-block">Agregar candidato</a>
            </div>
        <?php else : ?>
            <a href="agregarCandidato.php" type="submit" class="btn btn-outline-primary btn-lg btn-block my-5">Agregar candidato</a>
            <?php foreach ($candidatos as $candidato) : ?>
                <!-- Aca cambia el modo dependiendo di esta activo o no. En el card pueden ver la diferencia -->
                <?php if ($candidato->estado == 1) {
                    $message    = " ACTIVO";
                    $background = "";
                    $directorio = "desactivarCandidato.php?id=";
                    $btnActivar = "Desactivar";
                }
                
                ?><div class="col-md-4">
                    <div class="card<?php echo $background ?>" style="width: 18rem;">
                        <img src="<?php echo "../assets/img/candidatos/" . $candidato->foto_perfil ?>" class="card-img-top" alt=".">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $candidato->apellido; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $candidato->nombre; ?></h6>
                            <p class="card-text text-info">Postula como <?= $dataPuesto->getById($candidato->id_puesto)->nombre; ?> para el
                                partido <?= $dataPartido->getById($candidato->id_partido)->nombre; ?> y se
                                encuentra<?php echo $message; ?></p>
                            <a href="editarCandidato.php?id=<?php echo $candidato->id_candidato; ?>" class="btn text-outline-dark">Editar</a>

                            <a href="<?php echo $directorio . $candidato->id_candidato; ?>" class="btn btn-outline-primary"><?php echo $btnActivar ?></a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
            

        <?php endif; ?>
        <?php ?>

    </div>
</div>

<?php $template->printFooterAdmin(); ?>