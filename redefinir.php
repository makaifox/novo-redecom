<?php
  session_start();
  if(!$_SESSION['idSenha']){
    header("location: index.php");
  }
?>

<!-- Modal -->
<div class="modal fade" id="redefinir" tabindex="-1" role="dialog" aria-labelledby="redefinir" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
    <link href="modal.css" rel="stylesheet">
    


<div class="container-form">
    <form  class="redefinir-form" method="POST" action="redefinir_action.php">
    
        <div class="redefinir-container-item">
            <label for="password"> Digite sua nova senha: </label><br>
            <input type="password" name="senha">
        </div>
    
        <div class="redefinir-container-item">
            <input type="submit" value="Mudar senha">
        </div>
    </form>
</div>



</div>
  </div>
</div>



