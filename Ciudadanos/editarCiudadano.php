<?php 

    require_once '../Layout/layout.php';
    require_once '../FileHandler/JsonFileHandler.php';
    require_once '../iDataBase/IDatabase.php';
    require_once '../databaseHandler/databaseConnection.php';
    require_once 'CiudadanosHandler.php';
    require_once '../objects/Ciudadanos.php';
    require_once '../template/template.php';

    session_start();

    $layout = new Layout(true, 'Editar Ciudadano', false);
    $data = new CiudadanosHandler('../databaseHandler');
    $template = new template(true, 'Editar Ciudadano', false);

    if (isset($_SESSION['administracion'])) {
        $administrador = json_decode($_SESSION['administracion']);
    } else {
        header('Location: ../PagesAdmin/loginAdministracion.php');
    }

    if (isset($_GET['id_ciudadano'])){

        $idCiudadano = $_GET['id_ciudadano'];

        $ciudadanoCharge = $data->getById($idCiudadano);

        if(isset($_POST['nombre']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email'])){

            if(isset($_GET['id_ciudadano'])){

                $idCiudadano = $_GET['id_ciudadano'];

                if($_POST['cedula'] == "" || $_POST['nombre'] == "" || $_POST['apellido'] == "" || $_POST['email'] == "") {
                    echo "<script> alert('Llene los espacios en blanco.'); </script>";
                }
                else{

                    $Ciudadanos = new Ciudadanos();
                    $Ciudadanos->cedula = $_POST['cedula'];
                    $Ciudadanos->nombre = $_POST['nombre'];
                    $Ciudadanos->apellido = $_POST['apellido'];
                    $Ciudadanos->email = $_POST['email'];

                    $data->Edit($Ciudadanos);
                    echo "<script> alert('El ciudadano ha sido modificado correctamente.'); </script>";
                    header('Location: CiudadanosAdmin.php');
                }

            }

        }
    }
?>


<?php $template->printHeaderAdmin();?>
<?php $template->printLink()?>
<?php $template->printScript() ?>

    <!-- <br>
    <br>
    <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <img class="mb-4" src="../assets/img/ciudadano.png" alt="" width="350" height="120">
                <br>
                <form enctype="multipart/form-data" action='editarCiudadano.php?id_ciudadano=<?= $idCiudadano; ?>' method="POST">
                    <div class="form-group">
                        <label for="cedulaciudadano">Editar cédula:</label>
                        <input type="text" class="form-control" id="cedulaciudadano" placeholder="Edite la cédula del ciudadano"  value="<?= $ciudadanoCharge->cedula; ?>" required name='cedula'>
                    </div>
                    <div class="form-group">
                        <label for="nombreciudadano">Editar nombre del Ciudadano</label>
                        <input type="text" class="form-control" id="nombreciudadano" placeholder="Edite el nombre del ciudadano" value="<?= $ciudadanoCharge->nombre; ?>" required name='nombre'>
                    </div>
                    <div class="form-group">
                        <label for="apellidociudadano">Editar apellido del Candidato</label>
                        <input type="text" class="form-control" id="apellidociudadano" placeholder="Edite el apellido del ciudadano" value="<?= $ciudadanoCharge->apellido; ?>" required name='apellido'>
                    </div>
                    <div class="form-group">
                        <label for="apellidocandidato">Editar correo electrónico</label>
                        <input type="email" class="form-control" id="emailciudadano" placeholder="example@correo.com" value="<?= $ciudadanoCharge->email; ?>" required name='email'>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-outline-dark btn-block" type="submit">Editrtar</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>   -->  

        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <img class="mb-4" src="../assets/img/ciudadano.png" alt="" width="440" height="120">
                <br>
                <form action='editarCiudadano.php?id_ciudadano=<?= $idCiudadano; ?>' method="POST">
                    <div class="form-group text text-dark">
                        <label for="cedulaciudadano">Cedula del ciudadano</label>
                        <input type="text" class="form-control" id="cedulaciudadano" placeholder="Ingrese la cedula del ciudadano" value="<?= $ciudadanoCharge->cedula; ?>" name='cedula'>
                    </div>
                    <div class="form-group text-dark">
                        <label for="nombreciudadano">Nombre del ciudadano</label>
                        <input type="text" class="form-control" id="nombreciudadano" placeholder="Ingrese el nombre del ciudadano" value="<?= $ciudadanoCharge->nombre; ?>" name='nombre'>
                    </div>
                    <div class="form-group text-dark">
                        <label for="apellidociudadano">Apellido del ciudadano</label>
                        <input type="text" class="form-control" id="apellidociudadano" placeholder="Ingrese el apellido del ciudadano" value="<?= $ciudadanoCharge->apellido; ?>" name='apellido'>
                    </div>
                    <div class="form-group text-dark">
                        <label for="emailciudadano">Email del ciudadano</label>
                        <input type="text" class="form-control" id="emailciudadano" placeholder="Ingrese una descripción del ciudadano" value="<?= $ciudadanoCharge->email; ?>" name='email'>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-outline-dark btn-block" type="submit">Editar</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>


<?php $template->printFooterAdmin() ?>