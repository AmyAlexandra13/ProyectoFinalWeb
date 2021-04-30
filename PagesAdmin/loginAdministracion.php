<?php

require_once '../Layout/layout.php';
require_once '../FileHandler/JsonFileHandler.php';
require_once '../iDataBase/IDatabase.php';
require_once 'AdministrationHandler.php';
require_once '../objects/Administrador.php';
require_once '../template/template.php';

session_start();

$getUser = new AdministrationHandler('../databaseHandler');

if(isset($_SESSION['ciudadano'])) { 
    header('Location: ../index.php');
}

if (isset($_SESSION['administracion'])) {

    header('Location: Administracion.php');
}

if (isset($_POST['usuario']) && isset($_POST['clave'])) {

    if ($_POST['usuario'] == "" || $_POST['clave'] == "") {
        echo "<script> alert('Llene los espacios en blanco.'); </script>";
    } else {

        $administrador = $getUser->getAdministrador($_POST['usuario'], $_POST['clave']);
        if ($administrador == true) {

            $_SESSION['administracion'] = json_encode($administrador);
            
            header('Location: Administracion.php');
        } else {
            echo "<script> alert('Credenciales incorrectas.'); </script>";
        }
    }
}

$layout = new Layout(true, 'Log in Administración', true);
$template = new template(true);

?>

<link href="../assets/css/loginAdmin.css" rel="stylesheet">
<?php $template->printHeader(); ?>


<main class="text-center mt-4">
  
    <form class="form-signin" method="POST" action="loginAdministracion.php">
        <img class="mb-4" src="../assets/img/images/login.jpg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Administrator</h1>
            
        <label for="usuario" class="sr-only">User</label>
        <input type="text" id="usuario" class="form-control" placeholder="Administrator Account" name="usuario" required="" autofocus="">

        <label for="clave" class="sr-only">Password</label>
        <input type="password" id="clave" class="form-control" placeholder="Password" name="clave" required="">
        <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
    
</main>

<?php $template->printFooter() ?>
