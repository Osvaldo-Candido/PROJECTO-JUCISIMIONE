<?php
namespace App\Controllers;

use App\Models\ModelMembro;
use FontLib\Table\Type\head;
use Src\Classes\RoutesViews;

class LoginController extends RoutesViews {

    public function index()
    {
        $this->renderizarLogin('Login/Home');
    }

    public function viewRecuperarSenha()
    {
        $this->renderizarLogin('Login/RecuperarSenha');
    }
    public function viewNovaSenha()
    {
        $chave_trocar = filter_input(INPUT_GET,'chave',FILTER_DEFAULT);
        $this->renderizarLogin('Login/NovaSenha',$chave_trocar);
    }
    public function viewPerfil()
    {
        $this->renderizarUsuario('dashboard/CadastroLivre/PerfilMembro');
    }

    public function recuperarSenha()
    {
        $usuario = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $email = trim($usuario['email']);
        $class = new ModelMembro();
        $class->recuperarSenha($email);

        if($class->getResultado())
        {

        }else{
            $_SESSION['erro_login'] = 'Email não cadastrado';
            header('Location:'.DIRPAGE."login\viewRecuperarSenha");
        }
    }
    public function viewLogin()
    {
        $this->renderizarLogin('Login/Login');
    }
    public function trocarSenha()
    {
        $usuario = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $chave_recuperacao = trim($usuario['nova_chave']);
        $nova_senha = trim($usuario['nova_senha']);
        $class = new ModelMembro();
        if(strlen($nova_senha) >= 8)
        {
            $class->trocarSenha($chave_recuperacao,$nova_senha);
            if($class->getResultado())
            {
                header('Location:'.DIRPAGE.'login\viewLogin');
            }else{
                $_SESSION['msg_rec'] = "Tente novamente";
                header('Location:'.DIRPAGE.'login\viewNovaSenha');
            }

        }else{
            $_SESSION['msg_rec'] = "A senha deve ter no minímo 8 digítos";
            header('Location:'.DIRPAGE.'login\viewNovaSenha');
        }
        

    }

    public function fazerLogin()
    {
        $usuario = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $email = trim($usuario['email']);
        $senha = trim($usuario['senha']);

        $class = new ModelMembro();

        $class->loginUser($email,$senha);

        if($class->getResultado())
        {
            header('Location:'.DIRPAGE.'home');
        }else{
            $_SESSION['erro_login'] = "Não foi possível iniciar a sessão";
            header('Location:'.DIRPAGE.'login\viewLogin');
        }

    }

}