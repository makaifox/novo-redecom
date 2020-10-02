<?php
session_start();
require './config.php';
require './classes/Usuario.php';
require './classes/Formulario.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $email = addslashes($_SESSION['email']);
    $user = new Usuario($pdo);
    $formulario = new Formulario($pdo);

    $usuario = $user->selectById($id);
    $info = $formulario->selectForm($id);
    $array = $user->selectArray($email);
    
    $id_usuario = $array['id'];

    if($info) {
        $nomeAnexoDemanda = $info[0]['anexoDemanda'];
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>

    <?php 
        include 'newpainel.php';
    ?>


    <title>Métricas</title>
</head>
<body>



    
<div class="container-metricas">


    <?php 

        if(isset($info) == false) {
            echo "<h1> Não há Demandas </h1>";
        } else {
            echo "<h1> Demandas </h1>"; 


     if ($info): 

            $i = 0;

            foreach($info as $keys => $lista ): 
                


                
                $i= $i + 1;  


                //formatação data
                $data = $lista['data'];
                $idForm = $lista['id'];


                $date = new DateTime($data);
                 
            
        ?>
            
            
             <!--Accordion -->

             
            <div class="accordion md-accordion" id="accordionEx<?php  echo $i; ?>" role="tablist" aria-multiselectable="true">

                <!-- Accordion card -->
                <div class="card">

                    <!-- botão menu retrátil -->
                    <div class="card-header" role="tab" id="headingOne<?php echo $i; ?>">
                        <a data-toggle="collapse" data-parent="#accordionEx<?php echo $i ?>" href="#collapseOne<?php echo $i; ?>" aria-expanded="false"
                            aria-controls="collapseOne<?php echo $i; ?>" class="h5-color">
                            <h6 class="mb-0 container-botao-requerimento ">
                            Requerimento enviado em <?php  echo $date->format('d/m/y');?> <i class="fas fa-angle-down rotate-icon"></i> 
                            
                            
                                <div class="container-excluir-requerimento">  
                                    <a href="excluir-requerimento.php?id=<?=$idForm; ?>">
                                        <img class="botao-excluir" src="./assets/img/icone-excluir.png" width="30px" alt="">
                                    </a>                                                          
                                </div>
    
                          
                            
                            <div class="verifica-status">
                                <form action='verifica_status.php' method='POST'>
                                    <input type='hidden' name='id_usuario' value='<?=  $_GET['id']; ?>'>
                                    <input type='hidden' name='idForm' value='<?= $idForm; ?>'>
                                        <?php  if(!$lista['status']) {
                                           echo "<input type='submit' class='btn btn-light' value='Finalizar'>"; 
                                        } else {
                                            echo "<img   width='30px' src='./assets/img/icon-ok.png'>";
                                        }
                                        ?>
                                </form>

                                 
                                
                            </div>
                            
                        </h6>
                        </a>
                    </div>

                        <!-- corpo do menu -->
                        <div id="collapseOne<?php echo $i; ?>" class="collapse " role="tabpanel" aria-labelledby="headingOne<?php echo $i; ?>" data-parent="#accordionEx<?php echo $i; ?>">
                            <div class="card-body">
                        
                        
                                <div class="container-demanda">
                                			
						<div class="col">
                                    
                                                    <form  method="GET" action="./to_pdf.php"> <input type="submit" class="btn" value="Imprimir Documento" >  
                        
                                                    <input type="hidden" name="idUsuario" value="<?= $_GET['id']; ?>">
                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">


                                                        <fieldset class="fieldset-titulo">
                                                            <h2>REDECOM - REQUERIMENTO DE DEMANDA DE COMUNICAÇÃO</h2>
                                                        </fieldset>
                                                        
                                                        <fieldset class="fieldset-atencao">
                                                            <legend>ATENÇÃO</legend>
                                                            <p>
                                                            Devido a dispensa de alguns profissionais (contratados pela ECOS) que compõem a equipe da Coordenadoria de Comunicação Social (CCS), 
                                                            informamos que o prazo tanto para os feedbacks quanto para a execução das demandas solicitadas, podem ser protelados ou os jobs 
                                                            podem não ser executados em curto prazo. No entanto, assim que a estrutura estiver normalizada informaremos, para que possamos retomar 
                                                            o fluxo constante de produção.
                                                            </p>
                                                        </fieldset>

                                                        <fieldset>
                                                            <legend> 1 - DADOS DO SOLICITANTE</legend>
                                                            
                                                            
                                                            <span>NOME : </span><?php echo $lista['nomeSolicitante']; ?><br><br>
                                                            <span>GABINETE, SECRETARIA, ÓRGÃO OU AUTARQUIA : </span> <?php echo $lista['secretariaSolicitante']; ?><br><br>
                                                            <span>SUBSECRETARIA OU SETOR : </span><?php echo $lista['secretariaSolicitante2']; ?> <br><br>
                                                            <span>CARGO:</span> <?php echo $lista['cargoSolicitante']; ?><br><br>
                                                            <span>E-MAIL:</span> <?php  echo $lista['emailSolicitante']; ?> <br><br>
                                                            <span>TELEFONE:</span> <?php echo $lista['telefoneSolicitante']; ?>

                                                    
                                                        </fieldset>

                                                        <fieldset>
                                                            <legend> 2 - DESCRIÇÃO DO REQUERIMENTO</legend>

                                                            <span>ASSUNTO : </span> <?php echo $lista['assuntoDemanda']; ?> <br><br>
                                                            <span>NECESSIDADES : </span> <?php echo $lista['tipoDemanda']; ?>
                                                        </fieldset>

                                                        <fieldset>
                                                            <legend> 3 - INFORMAÇÕES DA AÇÃO, EVENTO OU INAUGURAÇÃO </legend>
                                                            <span>DATA : </span> <?php  echo $date->format('d-m-Y');?> <br><br>
                                                            <span>HORARIO : </span> <?php echo $lista['hora']; ?> <br><br>
                                                            <span>ENDEREÇO : </span> <?php echo $lista['endereco']; ?> <br><br>
                                                            <span>PRESENÇA DA PERSONALIDADE : </span> <?php echo $lista['personalidadeDemanda']; ?>
                                                        </fieldset>

                                                        <fieldset>
                                                            <legend> 4 - OUTROS DADOS SOBRE A DEMANDA </legend>
                                                            <span>DESCRIÇÃO : </span> <?php echo $lista['demanda']; ?>
                                                        </fieldset>

                                                        <fieldset>
                                                            <legend> 5 - MATERIAL DE REFERÊNCIA </legend>
                                                            <span>ARQUIVOS ANEXO : </span> <?php if($info[$keys]['anexoDemanda']) {
                                                                echo "<a class='btn' href='./arquivos/{$nomeAnexoDemanda}'  download>Download Anexo</a> ";
                                                                echo "<pre>";
                                                                print_r($info[$keys]['anexoDemanda']);
                                                                               
                                                            } else {
                                                                echo "<span style='font-weight: bold;'> Arquivo não enviado </span>";
                                                            }
                                                            ?>
                                                        </fieldset>

                                                        <fieldset>
                                                            <legend> 6 - COM A CIÊNCIA DO CHEFE IMEDIATO </legend>
                                                            <span>NOME : </span> <?php echo $lista['nomeChefe']; ?><br><br>
                                                            <span>EMAIL : </span> <?php echo $lista['emailChefe']; ?><br><br>
                                                            <span>TELEFONE : </span> <?php echo $lista['telefoneChefe']; ?>
                                                        </fieldset>

                                                       </div> 

                                                    </form>   
                            











                                                    
                                
                                </div>

                            </div>    
                        
                        </div><!-- Accordion card -->
                    
                </div>
                    <!-- Accordion wrapper --> 

            </div>
        <?php

  

            endforeach; 
     endif; 
     
    }
    
     ?>



</div>

<?php 
    include 'newpainel-fim.php';
?>

<div class="modal-container-usuario">
                                        <div class="modal-usuario">
                                            <div class="close-modal">
                                                <span class="material-icons">
                                                    close
                                                </span>
                                            </div>
                                            <div class="modal-content-usuario">
                                                <div class="container-content-usuario">
                                                    <p>Clique em confirmar para excluir</p>
                                                        <div class="img-modal-container">
                                                            <a class="link-img-modal" href="">
                                                                <img  src="./assets/img/icon-ok.png" alt="confirmar" width="50px">
                                                                
                                                            </a>
                                                        </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

<script src="assets/js/modal-visualizar.js"></script>



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
