<?php

session_start();
require './config.php';
require './classes/Usuario.php';
require './classes/Anual.php';
require './classes/Janeiro.php';
require './classes/Fevereiro.php';
require './classes/Marco.php';
require './classes/Abril.php';
require './classes/Maio.php';
require './classes/Junho.php';
require './classes/Julho.php';
require './classes/Agosto.php';
require './classes/Setembro.php';
require './classes/Outubro.php';
require './classes/Novembro.php';
require './classes/Dezembro.php';


$anual = new Anual($pdo);
$janeiro = new Janeiro($pdo);
$fevereiro = new Fevereiro($pdo);
$marco = new Marco($pdo);
$abril = new Abril($pdo);
$maio = new Maio($pdo);
$junho = new Junho($pdo);
$julho = new Julho($pdo);
$agosto = new Agosto($pdo);
$setembro = new Setembro($pdo);
$outubro = new Outubro($pdo);
$novembro = new Novembro($pdo);
$dezembro = new Dezembro($pdo);
$user = new Usuario($pdo);



if(isset($_SESSION['email'])) {
    $permissao = $user->getPermissao($_SESSION['email']);
} else {
    $permissao = $user->getPermissao(null);
}

$metricas = [
    "anual" => [
        $anual->selectAnual()
    ],
    "anual2" => [
        $anual->selectAnual2()
    ],
    "janeiro" => [
        "requerimentos" => [ 
            $janeiro->selectJaneiroRequerimentos()
        ],
        "imprensa" => [
            $janeiro->selectJaneiroImprensa()
        ],
        "design" => [
            $janeiro->selectJaneiroDesign()
        ],
        "fotografia" => [
            $janeiro->selectJaneiroFotografia()
        ],
        "social" => [
            $janeiro->selectJaneiroSocial()
        ]
    ],
    "fevereiro" => [
        "requerimentos" => [ 
            $fevereiro->selectFevereiroRequerimentos()
        ],
        "imprensa" => [
            $fevereiro->selectFevereiroImprensa()
        ],
        "design" => [
            $fevereiro->selectFevereiroDesign()
        ],
        "fotografia" => [
            $fevereiro->selectFevereiroFotografia()
        ],
        "social" => [
            $fevereiro->selectFevereiroSocial()
        ]
    ],
    "marco" => [
        "requerimentos" => [ 
            $marco->selectMarcoRequerimentos()
        ],
        "imprensa" => [
            $marco->selectMarcoImprensa()
        ],
        "design" => [
            $marco->selectMarcoDesign()
        ],
        "fotografia" => [
            $marco->selectMarcoFotografia()
        ],
        "social" => [
            $marco->selectMarcoSocial()
        ]
    ],
    "Abril" => [
        "requerimentos" => [ 
            $abril->selectAbrilRequerimentos()
        ],
        "imprensa" => [
            $abril->selectAbrilImprensa()
        ],
        "design" => [
            $abril->selectAbrilDesign()
        ],
        "fotografia" => [
            $abril->selectAbrilFotografia()
        ],
        "social" => [
            $abril->selectAbrilSocial()
        ]
    ],
    "maio" => [
        "requerimentos" => [ 
            $maio->selectMaioRequerimentos()
        ],
        "imprensa" => [
            $maio->selectMaioImprensa()
        ],
        "design" => [
            $maio->selectMaioDesign()
        ],
        "fotografia" => [
            $maio->selectMaioFotografia()
        ],
        "social" => [
            $maio->selectMaioSocial()
        ]
    ],    
    "junho" => [
        "requerimentos" => [ 
            $junho->selectJunhoRequerimentos()
        ],
        "imprensa" => [
            $junho->selectJunhoImprensa()
        ],
        "design" => [
            $junho->selectJunhoDesign()
        ],
        "fotografia" => [
            $junho->selectJunhoFotografia()
        ],
        "social" => [
            $junho->selectJunhoSocial()
        ]
    ],
    "julho" => [
        "requerimentos" => [ 
            $julho->selectJulhoRequerimentos()
        ],
        "imprensa" => [
            $julho->selectJulhoImprensa()
        ],
        "design" => [
            $julho->selectJulhoDesign()
        ],
        "fotografia" => [
            $julho->selectJulhoFotografia()
        ],
        "social" => [
            $julho->selectJulhoSocial()
        ]
    ],
    "agosto" => [
        "requerimentos" => [ 
            $agosto->selectAgostoRequerimentos()
        ],
        "imprensa" => [
            $agosto->selectAgostoImprensa()
        ],
        "design" => [
            $agosto->selectAgostoDesign()
        ],
        "fotografia" => [
            $agosto->selectAgostoFotografia()
        ],
        "social" => [
            $agosto->selectAgostoSocial()
        ]
    ],
    "setembro" => [
            "requerimentos" => [ 
                $setembro->selectSetembroRequerimentos()
            ],
            "imprensa" => [
                $setembro->selectSetembroImprensa()
            ],
            "design" => [
                $setembro->selectSetembroDesign()
            ],
            "fotografia" => [
                $setembro->selectSetembroFotografia()
            ],
            "social" => [
                $setembro->selectSetembroSocial()
            ]
        ], 
        "outubro" => [
            "requerimentos" => [ 
                $outubro->selectOutubroRequerimentos()
            ],
            "imprensa" => [
                $outubro->selectOutubroImprensa()
            ],
            "design" => [
                $outubro->selectOutubroDesign()
            ],
            "fotografia" => [
                $outubro->selectOutubroFotografia()
            ],
            "social" => [
                $outubro->selectOutubroSocial()
            ]
        ],
        "novembro" => [
            "requerimentos" => [ 
                $novembro->selectNovembroRequerimentos()
            ],
            "imprensa" => [
                $novembro->selectNovembroImprensa()
            ],
            "design" => [
                $novembro->selectNovembroDesign()
            ],
            "fotografia" => [
                $novembro->selectNovembroFotografia()
            ],
            "social" => [
                $novembro->selectNovembroSocial()
            ]
        ],
        "dezembro" => [
            "requerimentos" => [ 
                $dezembro->selectDezembroRequerimentos()
            ],
            "imprensa" => [
                $dezembro->selectDezembroImprensa()
            ],
            "design" => [
                $dezembro->selectDezembroDesign()
            ],
            "fotografia" => [
                $dezembro->selectDezembroFotografia()
            ],
            "social" => [
                $dezembro->selectDezembroSocial()
            ]
        ] 
];

$json = json_encode($metricas, JSON_NUMERIC_CHECK, JSON_PRETTY_PRINT);
$fp = fopen('./arquivo.json', 'w' );
fwrite($fp, $json);
fclose($fp);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel = "icon" href ="img/logo-vertical.png" type = "image/x-icon"> 
  <title>REDECOM - Métricas</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <script type="text/javascript" src="./assets/js/loader.js"></script>


  <script type="text/javascript" src="./assets/js/2020.js"></script>
     <script type="text/javascript" src="./assets/js/GRAFICOS JULHO-2019.js"></script>
     <script type="text/javascript" src="./assets/js/GRAFICOS AGOSTO-2019.js"></script>
     <script type="text/javascript" src="./assets/js/GRAFICOS SETEMBRO-2019.js"></script>
     <script type="text/javascript" src="./assets/js/GRAFICOS OUTUBRO-2019.js"></script>
     <script type="text/javascript" src="./assets/js/GRAFICOS NOVEMBRO-2019.js"></script>
     <script type="text/javascript" src="./assets/js/GRAFICOS DEZEMBRO-2019.js"></script>
     <script type="text/javascript" src="./assets/js/GRAFICOS JANEIRO-2020.js"></script>
     <script type="text/javascript" src="./assets/js/GRAFICOS FEVEREIRO-2020.js"></script>
     <script type="text/javascript" src="./assets/js/GRAFICOS MARCO-2020.js"></script>
     <script type="text/javascript" src="./assets/js/GRAFICOS ABRIL-2020.js"></script>
     <script type="text/javascript" src="./assets/js/GRAFICOS MAIO-2020.js"></script>
     <script type="text/javascript" src="./assets/js/GRAFICOS JUNHO-2020.js"></script>  
     <script type="text/javascript" src="./assets/js/GRAFICOS JULHO-2020.js"></script>
     <script type="text/javascript" src="./assets/js/GRAFICOS AGOSTO-2020.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="img/logo-white.png" alt="logo"/>
        </div>
        <div class="sidebar-brand-text mx-3">REDECOM</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Início</span></a>
      </li>

      


      <!-- Divider -->
      <hr class="sidebar-divider">

 <!-- Heading -->

 <li class="nav-item">
      <a class="nav-link" href="charts.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Métricas</span></a>

      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
    

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->


      
      <li class="nav-item">
      


      <?php  
        if(isset($_SESSION['email']) && $permissao == 0) {
           echo '<a href="pagina-usuario.php" class="nav-link princ" ><i class="fa fa-wpforms"></i> Enviar requerimentos</a>';
        }else if($permissao == 1 || $permissao == 2){
            echo '<a href="admin.php" class="nav-link princ"><i class="fa fa-user"></i> Página do administrador</a>';
        } else {
            echo '<a href="#" data-toggle="modal" data-target="#login" class="nav-link princ"><i class="fa fa-user"></i> Faça login</a>';
        }
    ?>
    </li>
    <li class="nav-item">
      <?php
            if(isset($_SESSION['email'])) 
            {
            echo '<a href="#" class="nav-link princ" data-toggle="modal" data-target="#logoutModal" ><i class="fa fa-sign-out-alt"></i> Sair</a>';
            }
        ?>

      </li>

 



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <li class="nav-item">
        <a class="nav-link" href="http://www.mesquita.rj.gov.br/pmm/" target="_blank">
          <i class="fas fa-fw fa-undo"></i>
          <span>Retornar ao site PMM</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-purple topbar mb-4 static-top shadow bg-gradient-primary-top">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">



              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

           

            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              
              <span class="mr-2 d-none d-lg-inline small" style="color:#ffffff;">
          <?php  
            if(isset($_SESSION['email']) && $permissao == 0) {
            echo ' Olá, <?php echo $arrayUsuario["nome"]; ?> <i class="fas fa-fw fa-user"></i>  ';
            }else if($permissao == 1 || $permissao == 2){
                echo ' Olá, <?php echo $arrayUsuario["nome"]; ?> <i class="fas fa-fw fa-user"></i>  ';
            } else {
                echo '<a href="#" data-toggle="modal" data-target="#login"> Faça login</a>  <i class="fas fa-fw fa-user"></i>';
            }
                 ?>
            </span>
                 </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                          <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400" style="color: #3E276A"></i>
                            <p style="color: #3E276A">Painel</p>
                          </a>

                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" style="color: #3E276A"></i>
                            <p style="color: #3E276A">Sair</p>
                          </a>
                        </div>
                      </li>

                    </ul>

                  </nav>
        <!-- End of Topbar -->


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" style="color:#3e276a !important;" aria-controls="home" aria-selected="true">2020</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#perfil" role="tab" style="color:#3e276a !important;" aria-controls="profile" aria-selected="false">SETEMBRO 2020</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contato" role="tab" style="color:#3e276a !important;" aria-controls="contact" aria-selected="false">Contato</a>
            </li>
          </ul>



          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

          <br>
          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-6 col-lg-7">
             <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">REQUERIMENTOS    
                  </h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="grafico_REQAN-2020"></canvas>
                  </div>
                  <hr>
                  Total de 24 demandas
                </div>
              </div>
            </div>

              <div class="col-xl-6 col-lg-7">
              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">DEMANDAS EXECUTADAS</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="grafico_DEMANDA-2020"></canvas>
                  </div>
                  <hr>
                  *As demandas qualitativas referente a área de MDS ultrapassam os valores de 600.000 (Seiscentos Mil).
                </div>
              </div>

             

            </div>



          </div>

        </div>
        <div class="tab-pane fade" id="perfil" role="tabpanel" aria-labelledby="profile-tab">


        <br>
          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-4 col-lg-5">
             <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">REQUERIMENTOS

                  </h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="grafico_REQ-JUN20"></canvas>
                  </div>
                  
                </div>
              </div>
            </div>

              <div class="col-xl-4 col-lg-5">
              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">IMPRENSA</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="grafico_I-JUN20"></canvas>
                  </div>
                </div>
              </div>

                    

            </div>

                        <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
             <!-- Bar Chart -->
             <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">DESIGN GRÁFICO

                  </h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="grafico_DG-JUN20"></canvas>
                  </div>
                 
                </div>
              </div>
            </div>

              <div class="col-xl-4 col-lg-5">
              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">FOTOGRAFIA E AUDIOVISUAL</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="grafico_FA-JUN20"></canvas>
                  </div>
                </div>
              </div>

            

          </div>

          <div class="col-xl-4 col-lg-5">
             <!-- Bar Chart -->
             <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">MIDIA SOCIAL

                  </h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="grafico_MS-JUN20"></canvas>
                  </div>
                  <hr>
                  Total de 24 demandas
                </div>
              </div>
            </div>

             

            

          </div>
          

          
        </div>
        <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contact-tab">...</div>
      </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <span>&copy;2020 PMM - Prefeitura Municipal de Mesquita  <br>
              CCS - Coordenadoria de Comunicação Social</span>
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
          <h5 class="modal-title" id="exampleModalLabel">Tem certeza que quer sair ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">clique no botão abaixo e confirme o logout.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="sair.php">Sair</a>
        </div>
      </div>
    </div>
  </div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>



  <script>
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
    })
  </script>




<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
    <link href="modal.css" rel="stylesheet">
    

<!--Coded with love by Mutiullah Samim-->


		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="./assets/img/Logotipo-Vertical-Colorido-PMM-968x1024.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="login_action.php" method="POST">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-at"></i></span>
							</div>
							<input type="text" name="email" required class="form-control input_user" value="" placeholder="Email">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="senha" class="form-control input_pass" value="" placeholder="Senha">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Me lembre</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" value="Login" class="btn login_btn">Login</button>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Ainda não tem uma conta? <a href="cadastrar.php" class="ml-2" data-toggle="modal" data-target="#cadastrar">Cadastre-se</a>
					</div>
					<div class="d-flex justify-content-center links">
                    <a href="#"  data-toggle="modal" data-target="#esqueci">Esqueceu sua senha?</a>
					</div>
				</div>
			</div>
		</div>

    




    </div>
  </div>
</div>



<?php include 'cadastrar.php' ?>
<?php include 'esqueci.html' ?>
</body>

</html>

