<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=DIRCSS?>style.css">
    <title>Document</title>
</head>
<body>

        <div class="container-login">
        <header  class="logo">
        <div>
            <h1>JUCI-SIMIONE</h1>
        </div>
        <nav class="menu">
            <ul>
              <li><a href="#" class="login">Login</a></li>
              <li><a href="#">Sobre</a></li>
              <li><a href="#">Contactos</a></li>
              <li><a href="#">Planos</a></li>
            </ul>
        </nav>
       
     </header>
    <div class="container-1">
        <div class="container-2">
            <div class="lado-A">
                <img src="<?=DIRIMG?>undraw_two_factor_authentication_namy (1).svg" alt="" srcset="">
                
            </div>
            <div class="lado-B">
                <h1>Nova Senha</h1>
                <form method="POST" action="<?=DIRPAGE?>login\trocarSenha" >
                    <div class="full-box">
                        <label for="senha">Senha</label>
                        <div class="input-img">
                        <img src="<?=DIRIMG?>eye_15px.png" alt="" srcset="">
                        <input type="hidden" name="nova_chave" value=" <?php if(isset($this->dados)){ echo $this->dados; } ?>">
                        <input type="password" name="nova_senha" id="senha" placeholder="Insira a sua senha">   
                        </div> 
                    </div>
                    <div class="full-box">
                    <label>Esqueceu-se da palavra passe? <a href="<?=DIRPAGE?>home\recuperarSenha">Recuperar senha!</a></label>
                        <input type="submit"  value="Fazer login">
                    </div>
                </form>
                <h3>Entre em contacto</h3>
                <div class="redes-sociais">
                    <img src="<?=DIRIMG?>instagram_logo.svg" alt="" srcset="">
                    <img src="<?=DIRIMG?>google_plus.svg" alt="" srcset="">
                    <img src="<?=DIRIMG?>whatsapp.svg" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>
        </div>   
</body>
</html>