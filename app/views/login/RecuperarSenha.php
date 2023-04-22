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
                <h1>Recuperar Passe</h1>
                <form method="POST" action="<?=DIRPAGE?>login\recuperarSenha" >
                    <div class="full-box">
                    <label for="email">Email</label>
                        <div class="input-img">
                        <img src="<?=DIRIMG?>email_15px.png" alt="" srcset="">
                        <input type="email" name="email" id="email" placeholder="Insira o seu email">   
                        </div> 
                    </div>
                    <div class="full-box">
                    <label><a href="<?=DIRPAGE?>home">Fazer Login!</a></label>
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