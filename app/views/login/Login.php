

        <div class="container-2">

                <form method="POST" action="<?=DIRPAGE?>login\fazerLogin" >
                <h1>Login</h1>
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
                        <label for="senha">Senha</label>
                        <div class="input-img">
                        <img src="<?=DIRIMG?>eye_15px.png" alt="" srcset="">
                        <input type="password" name="senha" id="senha" placeholder="Insira a sua senha">   
                        </div> 
                    </div>
                    <div class="full-box">
                    <label>Esqueceu-se da palavra passe? <a href="<?=DIRPAGE?>login\viewRecuperarSenha">Recuperar senha!</a></label>
                        <input type="submit"  value="Fazer login">
                    </div>
                </form>
            </div>
