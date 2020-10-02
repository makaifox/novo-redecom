

<link href="modal.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

        

<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="cadastrar" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

    <div class="d-flex justify-content-center h-100">
			<div class="user_card_2">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="./assets/img/Logotipo-Vertical-Colorido-PMM-968x1024.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
                <form class="form-cadastrar" action="cadastrar_action.php" method="POST">
						<div class="input-group mb-3">
							<div class="input-group-append">
                            <label class="input-group-text" for="nome">Nome:</label>
							</div>
							<input type="text" name="nome" class="form-control input_pass" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
                            <label for="email" class="input-group-text">Informe um email válido:</label>
							</div>
							<input type="text" name="email" class="form-control input_pass" required>
                        </div>
    
                        <div class="input-group mb-3">
							<div class="input-group-append">
                            <label for="emailConfirma" class="input-group-text">Repita o email:</label>
							</div>
							<input type="text" name="emailConfirma" class="form-control input_pass" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
                            <label for="senha" class="input-group-text">Informe uma senha:</label>
							</div>
							<input type="password" name="senha" class="form-control input_pass" required>
                        </div>
                        <div class="input-group mb-3">
							<div class="input-group-append">
                            <label for="senhaConfirma" class="input-group-text">Repita a senha:</label>
							</div>
							<input type="password" name="senhaConfirma" class="form-control input_pass" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
                            <label for="telefone" class="input-group-text" >Telefone:</label>
							</div>
                            <input type="text" name="tel" id="telefone" class="form-control input_pass" required>
						</div>
						
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" value="Cadastrar" class="btn login_btn">Cadastrar</button>
				   </div>
					</form>
				</div>
		
				
			</div>
		</div>

    
    

    </div>
  </div>
</div>



    <script type="text/javascript">
    $("#telefone").mask("(00) 0000-0000");
    </script>
        