
            <div class="container-2">
                <form method="POST" action="<?=DIRPAGE?>login\recuperarSenha" >
                <h1>Recuperar senha</h1>
                <?php 
                    if(isset($_SESSION['erro_login']))
                    {
                        echo $_SESSION['erro_login'];
                        unset($_SESSION['erro_login']);
                    }
                ?>   
                <div class="full-box">
                    <label for="email">Email</label>
                        <div class="input-img">
                        <img src="<?=DIRIMG?>email_15px.png" alt="" srcset="">
                        <input type="email" name="email" id="email" placeholder="Insira o seu email">   
                        </div> 
                    </div>
                    <div class="full-box">
                    <label>Lembrou a senha? <a href="<?=DIRPAGE?>login\viewLogin">Clica aqui!</a></label>
                        <input type="submit"  value="Enviar e-mail">
                    </div>
                </form>
                </div>