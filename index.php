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

/*/if(isset($_SESSION['ciudadano'])){
  $currentCiudadano = json_decode($_SESSION['ciudadano']);
  if($currentCiudadano->estado ==1)
{
  echo '<script>alert("activo");</script>';
}
else {
  echo '<script>alert("inactivo");</script>';
  
  
}

}*/

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
$template = new template(false, 'Puesto Electivo', true);


?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>SADVO</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">
  <?php $template->printLink()?>
  <!-- Custom fonts for this template-->
  <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="template/css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="navbar-top-fixed.css" rel="stylesheet">
</head>
<body>
  <main id="page-top">
    <div id="wrapper">

      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
          SADVO</a>

     <!--   php if ($_SESSION['usuario'] == "Administrador") : ?> -->

          <hr class="sidebar-divider my-0">

          <li class="nav-item">
            
          </li>

          <hr class="sidebar-divider">

          <li class="nav-item">
            
          </li>

          <li class="nav-item">
            
          </li>

          <li class="nav-item">
            
          </li>

          <li class="nav-item">
            
          </li>
          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>
        <!-- php endif ?> -->

      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto d-flex justify-content-between align-items-center">

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <!-- php 
                    if (isset($_SESSION['usuario'])) {
                      echo $_SESSION['usuario'];
                    }
                    ?> -->
                  </span>
                  <img class="img-profile rounded-circle" src="template\img\profile.png">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Salir
                  </a>
                </div>
              </li>

            </ul>

          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Contenido de las vistas  -->
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
            <!-- <php require_once("core/router.php") ?> -->

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

 
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Proyecto final 2021</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Estas seguro?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="VistaElector\logout.php">Cerrar sesion</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="template/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="template/js/demo/chart-area-demo.js"></script>
    <script src="template/js/demo/chart-pie-demo.js"></script>

  </main>
  <?php $template->printScript() ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
</body>
