<div class="container-2">
<form method="POST" action="<?=DIRPAGE?>login\trocarSenha" >
<h1>Nova senha</h1>
<?php 
    if(isset($_SESSION['msg_rec']))
    {
        echo $_SESSION['msg_rec'];
        unset($_SESSION['msg_rec']);
    }
?>   
<div class="full-box">
        <label for="senha">Senha</label>
        <div class="input-img">
        <img src="<?=DIRIMG?>eye_15px.png" alt="" srcset="">
        <input type="hidden" name="nova_chave" value=" <?php if(isset($this->dados)){ echo $this->dados; } ?>">
        <input type="password" name="nova_senha" id="nova_chave" placeholder="Insira a sua senha">   
        </div> 
    </div>
    <div class="full-box">
        <input type="submit"  value="Mudar senha">
    </div>
</form>
</div>   
