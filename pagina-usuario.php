<?php
session_start();

require './config.php';
require './classes/Usuario.php';
require './classes/Formulario.php';
require './erro.php';
$email = $_SESSION['email'];
$user = new Usuario($pdo);
$formulario = new Formulario($pdo);

$array = $user->selectArray($email);
$id_usuario = $array['id'];
$permissao = $user->getPermissao($email);

if($formulario->selectForm($id_usuario)) {
    $statusFormulario = $formulario->selectForm($id_usuario);
}

if($permissao == 1 || $permissao == 2) {
    header("location: index.php");
    exit;
}

$info = $user->selectArray($email);
$nome = $info['nome'];
if(!$email) {
    header("location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <link rel = "icon" href ="img/logo-vertical.png" type = "image/x-icon"> 
  <title>REDECOM</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 
    
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">


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
      <li class="nav-item active">
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
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown" >
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400" style="color: #3E276A"></i>
                  <p style="color: #3E276A">Painel</p>
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" style="color: #fffff !important;">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" style="color: #3E276A"></i>
                  <p style="color: #3E276A">Sair</p>
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

    <div class="container-fluid">
        <h1> Área do Usuário </h1>

        <div class="row">

        <div class="col-xl-6 col-lg-7">
             <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Status de Demanda:    
                  </h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar" style="overflow: auto;">
                    
                <?php 
                if(isset($statusFormulario)) {
                    
                    foreach($statusFormulario as $indice) {
                        $data = $indice['data'];
                        $dataArray = explode('-', $data);
                        $dataBr = $dataArray[2].'/'.$dataArray[1].'/'.$dataArray[0];
                        
                        
                        if($indice['status']) {
                            echo "<p class='requerimento-finalizado'>
                                    <span>Data do Requerimento : {$dataBr}</span><br>
                                     Requerimento Finalizado
                                 </p>";
                        } else {
                            echo "<p class='requerimento-pendente'> 
                                    <span>Data do Requerimento : {$dataBr}</span><br>                           
                                    Requerimento Pendente! 
                                  </p>";
                        }
                       
                    }  
                } else {
                    echo "<p class='requerimento-zerado'> Não há requerimentos recentes. </p>";
                }

                ?>
                  </div>

                </div>
              </div>
            </div>
        
            <div class="col-xl-6 col-lg-7">
             <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Faça Seu Requerimento no Botão Abaixo!    
                  </h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                  <div class="button-form">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Formulário de requerimento</button>
                </div>
                  </div>

                </div>
              </div>
            </div>

  

<!-- Modal -->
<div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-content-form">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Formulário de requerimento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST" action="pagina-usuario_action.php" enctype="multipart/form-data" validate>
                      
                      <div class = "col">

                      
                          <h2> ATENÇÃO </h2>

                          <p id = "aviso_requerimento" >Devido a dispensa de alguns profissionais (contratados pela ECOS) que compõem a equipe da Coordenadoria de Comunicação Social (CCS),
                                          informamos que o prazo tanto para os feedbacks quanto para a execução das demandas solicitadas, 
                                          podem ser protelados ou os jobs podem não ser executados em curto prazo. No entanto, assim que a estrutura estiver normalizada informaremos, 
                                          para que possamos retomar o fluxo constante de produção.</p>

                  <br/>
                  <br/>

                          <p >1. IDENTIFIQUE-SE, PARA SABERMOS QUEM É VOCÊ: </p>
                      </div> 
                  
                      <div   class = "form-row">

                          <div   class = "col">
                              <label for   = "NOMESOLICITANTE" class = "form-check-label">NOME:* </label>
                              <?php if(isset($_SESSION['msg']['nomeSolicitanteErro'])) {
                                  echo "<p>".$_SESSION['msg']['nomeSolicitanteErro']."</p>";
                              } ?>
                              <input type  = "text"  class = "form-control " required maxlength = "50" placeholder = "NOME" id = "NOMESOLICITANTE" name= "nomeSolicitante">
                          </div>

                      </div> 

                      <div    class = "form-row">

                          <div    class = "col">
                              <label  for   = "SECRETARIASOLICITANTE" class = "form-check-label">SECRETARIA, ÓRGÃO OU AUTARQUIA:*</label>
                              <select class = "form-control" name= "secretariaSolicitante"  id    = "SECRETARIASOLICITANTE" required>
                                  <option value = "CGM - CONTROLADORIA">CGM - CONTROLADORIA </option>
                                  <option value = "GABINETE DO PREFEITO">GABINETE DO PREFEITO </option>
                                  <option value = "MESQUITA PREV">MESQUITA PREV </option>
                                  <option value = "OUVIDORIA">OUVIDORIA </option>
                                  <option value = "PROCON">PROCON </option>
                                  <option value = "SEMAS - ASSISTÊNCIA SOCIAL">SEMAS - ASSISTÊNCIA SOCIAL</option>
                                  <option value = "SEMED - EDUCAÇÃO">SEMED - EDUCAÇÃO</option>
                                  <option value = "SEMGOV - GOVERNANÇA">SEMGOV - GOVERNANÇA </option>
                                  <option value = "SEMIMSP - INFRAESTRUTURA, MOBILIDADE E SERVIÇOS PÚBLICOS">SEMIMSP - INFRAESTRUTURA, MOBILIDADE E SERVIÇOS PÚBLICOS </option>
                                  <option value = "SEMSOPC - SEGURANÇA, ORDEM PÚBLICA E CIDADANIA">SEMSOPC - SEGURANÇA,                ORDEM PÚBLICA E CIDADANIA</option>
                                  <option value = "SSEMUS - SAÚDE">SEMUS - SAÚDE</option>
                              </select>
                          </div>
                              
                          <div class = "col">
                                          
                              <label  for   = "SECRETARIASOLICITANTE2" class= "form-check-label">SUBSECRETARIA OU SETOR:*</label>
                                  <select class = "form-control" namespace= "SECRETARIASOLICITANTE2" id = "SECRETARIASOLICITANTE2"  name="secretariaSolicitante2" required>
                                      <option value = "AF - ASSISTÊNCIA FARMACÊUTICA">AF - ASSISTÊNCIA FARMACÊUTICA</option>
                                      <option value = "AIG - ARRECADAÇÃO IMOBILIÁRIA E GESTÃO">AIG - ARRECADAÇÃO IMOBILIÁRIA E GESTÃO </option>
                                      <option value = "CSL - COMPRAS, SERVIÇOS E LOGISTICA">CSL - COMPRAS,                              SERVIÇOS E LOGISTICA</option>
                                      <option value = "EE - EXECUTIVA DE EDUCAÇÃO">EE - EXECUTIVA DE EDUCAÇÃO</option>
                                      <option value = "FMS - FUNDO MUNICIPAL DE SAÚDE">FMS - FUNDO MUNICIPAL DE SAÚDE </option>
                                      <option value = "GOVERNO">GOVERNO </option>
                                      <option value = "OF - ORÇAMENTO E FINANÇAS">OF - ORÇAMENTO E FINANÇAS</option>
                                      <option value = "PE - PLANEJAMENTO EDUCACIONAL">PE - PLANEJAMENTO EDUCACIONAL</option>
                                      <option value = "SEMAD - ADMINISTRAÇÃO">SEMAD - ADMINISTRAÇÃO</option>
                                      <option value = "SEMCELT - CULTURA, ESPORTE, LAZER E TURISMO">SEMCELT - CULTURA,                  ESPORTE,                      LAZER E TURISMO</option>
                                      <option value = "SEMEF - FAZENDA">SEMEF - FAZENDA</option>
                                      <option value = "SEMMURB - MEIO AMBIENTE E URBANISMO">SEMMURB - MEIO AMBIENTE E URBANISMO</option>
                                      <option value = "SEMOB - OBRAS">SEMOB - OBRAS</option>
                                      <option value = "SEMSPDEC - SERVIÇOS PÚBLICOS E DEFESA CIVIL">SEMSPDEC - SERVIÇOS PÚBLICOS E DEFESA CIVIL</option>
                                      <option value = "SETRADE - TRABALHO, DESENVOLVIMENTO ECONÔMICO E AGRICULTURA">SETRADE - TRABALHO, DESENVOLVIMENTO ECONÔMICO E AGRICULTURA</option>
                                      <option value = "SETRANS - TRANSPORTE E TRÂNSITO">SETRANS - TRANSPORTE E TRÂNSITO</option>
                                      <option value = "STI - TECNOLOGIA DA INFORMAÇÃO">STI - TECNOLOGIA DA INFORMAÇÃO</option>
                                      <option value = "OUTROS">OUTROS</option>
                                  </select>
                          </div>

                      </div>  

                      <div   class = "form-row">

                          <div   class = "col-7">
                              
                              <label for   = "CARGOSOLICITANTE" class = "form-check-label">CARGO:* </label>
                              <input type  = "text" class= "form-control" required maxlength = "50" name="cargoSolicitante" placeholder = "CARGO" id = "CARGOSOLICITANTE">
                          </div>


                          <div   class = "col-3">
                              <label for   = "EMAILSOLICITANTE" class = "form-check-label">E-MAIL:* </label>
                              <input type  = "email" class = "form-control"  maxlength = "50" placeholder = "E-MAIL" id = "EMAILSOLICITANTE" name="emailSolicitante">
                          </div>

                          <div   class = "col-2">
                              <label for   = "TELEFONESOLICITANTE" class = "form-check-label">TELEFONE:* </label>
                              <input type  = "tel" class  = "form-control" required maxlength = "12" placeholder = "TELEFONE" id = "TELEFONESOLICITANTE" name="telefoneSolicitante">
                  
                          </div>
                      </div>
                                      
                  <br/>
                  <br/>
                                              
                              
                          <div class = "col">
                              <P> 2. DESCREVA A DEMANDA, PARA ENTENDERMOS O QUE VOCÊ PRECISA: </P>
                          </div>

                      <div   class = "form-row">
                          <div   class = "col">
                              <label for   = "ASSUNTODEMANDA" class = "form-check-label">ASSUNTO:* </label>

                              <input type = "text" class = "form-control" required maxlength = "50" placeholder = "DIGITE O ASSUNTO" id = "ASSUNTODEMANDA" name="assuntoDemanda">
                          </div>
                      </div>

                      <div   class = "form-row">
                          <div   class = "col">
                              <label for   = "TIPODEMANDA" class = "form-check-label">QUAL A SUA NECESSIDADE:*</label>

                              <input type = "radio" class = "form-control" id = "ASSESSORIADEIMPRENSA" name = "tipoDemanda" value="imprensa" >
                              <label for  = "ASSESSORIADEIMPRENSA" class = "form-check-label"> ASSESSORIA DE IMPRENSA (Notas Informativas ou Matérias)</label>

                              <input type = "radio"   class = "form-control" id = "DESIGNERGRAFICO" name = "tipoDemanda" value="design">
                              <label for  = "DESIGNERGRÁFICO" class = "form-check-label"> DESIGNER GRÁFICO (Peças Gráficas de Divulgação)</label>

                              <input type = "radio" class = "form-control" id = "MIDIASOCIAL" name = "tipoDemanda" value="social">
                              <label for  = "MIDIASOCIAL" class = "form-check-label">MÍDIA SOCIAL (Propagação de Conteúdo nos Canais Digitais)</label>

                              <input type = "radio" class = "form-control" id = "FOTOGRAFIA" name = "tipoDemanda" value="fotografia">
                              <label for  = "FOTOGRAFIA" class = "form-check-label">FOTOGRAFIA (Sessão ou Cobertura Fotográfica)</label>

                              <input type = "radio" class = "form-control" id = "VIDEO" name = "tipoDemanda" value="video">
                              <label for  = "VIDEO" class = "form-check-label">VÍDEO (Captura de Material Audiovisual)</label>

                              <input type = "radio"  class  = "form-control" id = "DESENVOLVIMENTOWEB" name = "tipoDemanda" value="web">
                              <label for  = "DESENVOLVIMENTOWEB" class = "form-check-label">DESENVOLVIMENTO WEB (Implementações ou Atualizações no Site/Portal)</label>

                              <input type = "radio" class  = "form-control" id = "IMPRESSAO" name = "tipoDemanda" value="impressao">
                              <label for  = "IMPRESSAO" class = "form-check-label">IMPRESSÃO EM PAPEL (Material em Folha A3 ou A4)</label>

                          </div>
                      </div>

                  <br/>
                  <br/>
                                  
                          <div class = "col">
                              <p> 3. SE A SUA DEMANDA É UMA AÇÃO, EVENTO OU INAUGURAÇÃO, INFORME: </p>
                          </div>

                      <div   class = "form-row">
                          <div   class = "col-3">
                              <label for = "DATA" class = "form-check-label ">DATA:</label>
                              <input id    = "DATA" type  = "date" class = "form-control" name= "data" required>
                          </div>
                          <div   class = "col-3">
                              <label for   = "HORA" class = "form-check-inline-label">HORÁRIO:</label>
                              <input type  = "time"  id   = "HORA" class = "form-control" name = "hora" required>
                          </div>
                      </div>

                      <div   class = "form-row">
                          <div   class = "col">
                              <label for   = "ENDERECO" class  = "form-check-label">ENDEREÇO: </label>
                              <input type  = "text"  maxlength = "100"  class = "form-control" placeholder = "ENDEREÇO" id = "ENDERECO" name="endereco" required>
                          </div>
                      </div>

                      <div   class = "form-row">
                          <div   class = "col">
                              <label for   = "PERSONALIDADEDEMANDA" class = "form-check-label">ALGUMA PERSONALIDADE ESTARÁ PRESENTE? CASO SIM, QUEM SERÁ:</label>
                              <input type  = "text"  maxlength = "50" class = "form-control" id = "PERSONALIDADEDEMANDA" name="personalidadeDemanda">

                          </div>
                      </div>

                  <br/>
                  <br/>
                          <div class = "col">
                                  <P> 4. CASO DESEJE, DESCREVA AINDA MAIS SOBRE A SUA NECESSIDADE: </P>
                          </div>
                                      
                          <div class = "col">
                                  <label    for       = "DEMANDA" class = "form-check-label">EXPLIQUE A DEMANDA DE FORMA BREVE (ATÉ 1280 CARACTERES):</label>
                                  <textarea maxlength = "1280" class    = "form-control" id = "DEMANDA" name="demanda"> </textarea>
                          </div>
                                  
                  <br/>
                  <br/>
                                  
                          <div class = "col">
                              <P> 5. CASO TENHA ALGUM MATERIAL DE REFERÊNCIA, NOS ENVIE: </P>
                          </div>
                          <div   class = "col">
                              <label for   = "anexoDemanda" class = "form-check-label"> ANEXE OS ARQUIVOS DESEJADOS (ATÉ 25MB):</label>
                              <input type="file" name="anexoDemanda"/>
                          </div>

                  <br/>
                  <br/>
                          <div class = "col">
                              <p> 6. PARA CIÊNCIA, INFORME QUEM É O SEU CHEFE IMEDIATO: </p>
                          </div>

                      <div   class = "form-row">
                          <div   class = "col-6">
                              <label for   = "NOMECHEFE" class         = "form-check-label"> NOME:* </label>
                              <input type  = "text" required maxlength = "50" class = "form-control" placeholder = "NOME" id = "NOMECHEFE" name="nomeChefe">
                          </Div>

                          <div   class = "col-4">
                              <label for   = "EMAILCHEFE" class         = "form-check-label">E-MAIL:* </label>
                              <input type  = "email"  maxlength = "50" class = "form-control" placeholder = "E-MAIL" id = "EMAILCHEFE" name="emailChefe">
                          </Div>

                          <div   class = "col-2">
                                  <label for   = "TELEFONECHEFE" class    = "form-check-label">TELEFONE:* </label>
                                  <input type  = "tel" required maxlength = "12"  class = "form-control"placeholder = "TELEFONE" id = "TELEFONECHEFE" name="telefoneChefe">
                          </div>
                      </div>
                  <br/>

                          <div class = "col">
                                  <p> 7. É NECESSÁRIO, CONCORDAR COM A METODOLOGIA DE TRABALHO DA CCS: </p>
                          </div>

                      <div   class = "form-row">
                                  
                          <div   class = "col-1">
                              <input type  = "checkbox" class = "form-control" id = "ACEITEMETODOLOGIA"  required>
                          </div> 

                          <div   class = "col-10">
                              <label for   = "ACEITEMETODOLOGIA" >Se possível, a realização de requerimentos deve ser feita com no máximo até 21 dias de antecedência da data necessária de sua demanda, para não ocorrer impasses na entrega.
                                  <br>2) A partir da realização do requerimento, a demanda será inserida na fila de produção da CCS e respeitará a ordem de chegada. 
                                  <br>3) O prazo para o primeiro retorno é de 72 horas, a partir da realização do requerimento, para ciência da existência do job. 
                                  <br>4) Mesmo sendo realizado o requerimento, será considerado na execução as prioridades solicitadas pelo Gabinete do Prefeito e pela Secretaria de Governança, para não afetar estrategicamente o bom funcionamento da instituição . 
                                  <br>5) Dúvidas e feedbacks, é necessário acompanhar e retornar sempre a demanda pelo e-mail recebido no ato da realização do requerimento.</label>
                          </div>
                                  
        
                      
                      </div>

              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">voltar</button>
        <button type="submit" class="btn btn-primary">ENVIAR REQUERIMENTO!</button>
        </form>
      </div>
    </div>
  </div>
</div>

            



          </div>

        </div>

    

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

  <!-- Page level custom scripts -->
  <script src="js/2020-1.js"></script>
  <script src="js/2020-2.js"></script>

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
