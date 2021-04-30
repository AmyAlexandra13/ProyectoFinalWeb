<?php

require_once '../Layout/layout.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../objects/Candidatos.php';
require_once '../objects/Puestos.php';
require_once '../objects/Partidos.php';
require_once '../Candidatos/CandidatosHandler.php';
require_once '../Partidos/PartidosHandler.php';
require_once '../PuestoElectivo/PuestosHandler.php';
require_once '../iDataBase/IDatabase.php';

session_start();

if(isset($_SESSION['cuidadano'])) {
    $currentCiudadano = json_encode($_SESSION['cuidadano']);
}

$layout = new Layout(true, 'Candidatos', true);
$data   = new CandidatosHandler('../databaseHandler');
$dataPartido = new PartidosHandler('../databaseHandler');
$dataPuesto = new PuestosHandler('../databaseHandler');

//estas variables es para q cuando este desactivado el candidato, se ponga en modo oscuro. Mas adelante cambian dependiendo la condicion
$message    = " NO ACTIVO";
$background = " text-white bg-dark";//Cambia el color a negro
$directorio = "activarCandidato.php?id=";
$btnActivar = "Activar";

$candidatos = $data->getActive();

if (isset($_GET['id_puesto'])) {
    $candidatos = $data->getCandidateByPuesto($_GET['id_puesto']);
}

?>

<?php $layout->Header(); ?>

<!-- Puse ese style por unos erroes en unos margenes -->
<div class="container " style="margin: auto auto auto 20%; width:auto">


    <div class="row">


        <?php if (empty($candidatos)) : ?>
            <div class="text-info">
                <h2>No hay Candidatos</h2>
                <a href="agregarCandidato.php" type="submit" class="btn btn-outline-primary btn-lg btn-block">Agregar candidato</a>
            </div>
        <?php else : ?>
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
                                partido <?= $dataPartido->getById($candidato->id_partido)->nombre; ?>
                            </p>
                            <a href="votar.php?id_candidato=<?php echo $candidato->id_candidato; ?>" class="btn text-primary">Votar</a>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
            

        <?php endif; ?>
        <?php ?>

    </div>
</div>

<?php $layout->Footer(); ?>