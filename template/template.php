<?php
    class template{
        public $gettingAssetsFolder;

        function __construct($getPage){
            $this->gettingAssetsFolder = ($getPage) ? "../" :"" ;
            $this->gettingImages = ($getPage) ? "../" :"" ;
        }

        public function printHeader(){
            $Header = <<<EOF
            <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
                <meta name="generator" content="Jekyll v3.8.5">
                <title>SADVO</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-grid.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-grid.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-grid.min.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-grid.min.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-reboot.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-reboot.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-reboot.min.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-reboot.min.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap.min.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap.min.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\ourStyle.css">
            </head>
            <body>
            
            <!-- Header -->
            <header>
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <a class="navbar-brand" href="../VistaElector/login.php">Sistema Automatizado de Votaciones</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="../VistaElector/login.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <a href="../PagesAdmin\loginAdministracion.php">
                    
                        <span class="btn btn-outline-success my-2 my-sm-0">Login</span>
                    </a>
                    </div>
                </nav>
            </header>
EOF;

            echo $Header;
        }

        public function printHeaderAdmin(){
            $HeaderAdmin =<<<EOF

            <html lang="en">

            <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
            <meta name="generator" content="Jekyll v3.8.5">
            <title>SADVO</title>
            <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">
            
            <!-- Custom fonts for this template-->
            <link href="../template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
          
            <!-- Custom styles for this template-->
            <link href="../template/css/sb-admin-2.min.css" rel="stylesheet">
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
          
                  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../PagesAdmin/Administracion.php">
                    SADVO</a>
          
            
          
                    <hr class="sidebar-divider my-0">
          
                    <li class="nav-item">
                      <a class="nav-link" href="../Elecciones\EleccionesAdmin.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Elecciones</span></a>
                    </li>
          
                    <hr class="sidebar-divider">
          
                    <li class="nav-item">
                      <a class="nav-link" href="../Ciudadanos\CiudadanosAdmin.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Ciudadanos</span></a>
                    </li>
          
                    <li class="nav-item">
                      <a class="nav-link collapsed" href="../Candidatos\candidatoIndex.php">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Candidatos</span>
                      </a>
                    </li>
          
                    <li class="nav-item">
                      <a class="nav-link collapsed" href="../Partidos\PartidoAdministracion.php">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Partidos</span>
                      </a>
                    </li>
          
                    <li class="nav-item">
                      <a class="nav-link collapsed" href="../PuestoElectivo\PuestoElectivo.php">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Puesto electivo</span>
                      </a>
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
                              
                            </span>
                            <img class="img-profile rounded-circle" src="../template\img\profile.png">
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
          
                    
            EOF;
            echo $HeaderAdmin;
        }

        public function printBody(){
            $Body = <<<EOF

            

            EOF;
            echo $Body;
        }

        public function printFooterAdmin(){
          $FooterAdmin = <<<EOF
          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Contenido de las vistas  -->
            <!-- php require_once("core/router.php") ?> -->

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
            <a class="btn btn-primary" href="../PagesAdmin/Login/logoutAdmin.php">Cerrar sesion</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../template/vendor/jquery/jquery.min.js"></script>
    <script src="../template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../template/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../template/js/demo/chart-area-demo.js"></script>
    <script src="../template/js/demo/chart-pie-demo.js"></script>

  </main>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
EOF;

echo  $FooterAdmin;
        }

        public function printFooter(){
            $Footer = <<<EOF
            <!-- FOOTER -->
            <footer class="py-1 fluid-container bg bg-white" style="padding-top:500px;">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-3 d-flex justify-content-center align-items-center">
                    <img class="mb-2 img-fluid " src="../assets/img/images/Logo.jpg" alt="No images found" width="200" height="200">
                </div>
                <div class="col-md-6 my-auto">
                    <p class="my-3 text-primafy h5">Proyecto Final - Sistema Automatizado De Votaciones</p>
                    <p class="my-3 text-primafy h5">Develop by Team AAL</p>
                    <p class="my-3 text-primafy h5">©2021</p>
                </div>
                <div class="col-md-2"></div>
            </div>
            </footer>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap\bootstrap.bundle.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap\bootstrap.bundle.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap\bootstrap.bundle.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap\bootstrap.bundle.min.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap\bootstrap.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap\bootstrap.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap\bootstrap.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap\bootstrap.min.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\jquery\jquery-3.5.1.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\popper.min.js"></script>
            </body>
            </html>
EOF;
            echo $Footer;
        }

        public function printScript(){
            $Script = <<<EOF
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.bundle.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.bundle.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.bundle.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.bundle.min.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\js\bootstrap.min.js.map"></script>
            <script src="{$this->gettingAssetsFolder}assets\jquery-3.4.1.min.js"></script>
            <script src="{$this->gettingAssetsFolder}assets\popper.min.js"></script>
            </body>
            </html>
EOF;
            echo $Script;
        }

        
        public function printLink(){
            $Link = <<<EOF
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-grid.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-grid.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-grid.min.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-grid.min.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-reboot.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-reboot.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-reboot.min.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap-reboot.min.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap.min.css">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\css\bootstrap\bootstrap.min.css.map">
                <link rel="stylesheet" href="{$this->gettingAssetsFolder}assets\ourStyle.css">
EOF;

            echo $Link;
        }


        
    }
?>
