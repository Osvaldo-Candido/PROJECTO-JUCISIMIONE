<?php

namespace App\Models;

use App\Libraries\Database\Database;
use App\Libraries\Persist\Persist;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../src/vendor/PHPMailer/PHPMailer/src/Exception.php';
require '../src/vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require '../src/vendor/PHPMailer/PHPMailer/src/SMTP.php';
class ModelMembro extends Persist {
    
    private $resultado = false;
    
    public function getResultado()
    {
        return $this->resultado;
    }

    public function buscarMembros()
    {
            $query = "SELECT * FROM membro ORDER BY idMembro DESC";
            $this->query($query);

            if($this->selectAll())
            {
                $dados = $this->selectAll();
                return $dados;
            }
    }
    public function buscarMembrosPdf()
    {
            $query = "SELECT * FROM membro ORDER BY idMembro DESC";
            $this->query($query);

            if($this->selectPdf())
            {
                $dados = $this->selectPdf();
                return $dados;
            }
    }
    //FUNÇÃO PARA FAZER LOGIN
    public function loginUser($email,$senha)
    {
        $query = "SELECT * FROM membro WHERE email = :email LIMIT 1";
        $this->query($query);
        $this->bind(':email',$email);
         
        if($this->select())
        {
            $usuario = $this->select();

            if(password_verify($senha,$usuario->senha))
            {
                $_SESSION['nome'] = $usuario->nome;
                $_SESSION['categoria'] = $usuario->categoria;
                $_SESSION['id_unico'] = $usuario->id_unico;
                $this->resultado = true;
            }else{
                $this->resultado = false;
            }
        }else{
                $this->resultado = false;
        }

    }
    //FUNÇÃO PARA RECUPERAR A SENHA
    public function recuperarSenha($email)
    {
        require_once '../src/vendor/autoload.php';
        require_once '../src/vendor/phpmailer/phpmailer/src/PHPMailer.php';
        $query = "SELECT * FROM membro WHERE email = :email LIMIT 1";
        $this->query($query);
        $this->bind(':email',$email);
    
        if($this->select())
        {
            $usuario = $this->select();
            $chave = password_hash($usuario->idMembro,PASSWORD_DEFAULT);
            //echo $chave;
            $trocar_chave_senha = "UPDATE membro SET recuperar_senha = :usuario
            WHERE idMembro = :id LIMIT 1";
            $this->query($trocar_chave_senha);
            $this->bind(':id',$usuario->idMembro);
            $this->bind(':usuario',$chave);
            if($this->executa())
            {
               $link = "http://localhost/JUCI-IEIA-SIMIONE/login/viewNovaSenha?chave=$chave";
               $mail = new PHPMailer(true);
               try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = '0a7ebd22c3fea7';                     //SMTP username
                $mail->Password   = '06d205494ab40f';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                $mail->Port       = 2525; 
                
                $mail->setFrom('jucieiasimione@ieia.com', 'JUCIEIASIMIONE');
                $mail->addAddress($usuario->email, $usuario->email);     //Add a recipient
               
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Recuperar senha';
                $mail->Body    = 'Prezado (a) Sr.'.$usuario->nome.". Voce solicitou a alteração da sua senha
                para dar continuidade click aqui <a href=".$link.">".$link."</a><br><br> Se não solicitou 
                então nenhuma acção é necessária";
                $mail->AltBody = 'Prezado (a) Sr.'.$usuario->nome.". Voce solicitou a alteração da sua senha
                para dar continuidade click aqui".$link."Se não solicitou nenhuma acção é necessária";
            
                $mail->send();
                header('Location:'.DIRPAGE."login\viewLogin");
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            }else{
                header('Location:'.DIRPAGE."login\viewRecuperarSenha");
            }
        
        }else{
            $this->resultado = false;
        }
    }
    //TROCAR DE SENHA DO USUÁRIO
    public function trocarSenha($recuperacaoNova, $novaSenha)
    {
        $query = "SELECT * FROM membro WHERE recuperar_senha = :nova_senha LIMIT 1";
        $this->query($query);
        $this->bind(':nova_senha',$recuperacaoNova);
    
        if($this->select())
        {
            $usuario = $this->select();
            if(!empty($novaSenha))
            {
                $senha = password_hash($novaSenha,PASSWORD_DEFAULT);
                //echo $chave;
                $trocar_chave_senha = "UPDATE membro SET senha = :senha
                WHERE idMembro = :id LIMIT 1";
                $this->query($trocar_chave_senha);
                $this->bind(':id',$usuario->idMembro);
                $this->bind(':senha',$senha);
                if($this->executa())
                {
                    $recuperacaoNova = 'NULL';
                    $query = "UPDATE membro SET  recuperar_senha = :nova_senha
                    WHERE idMembro = :id";
                    $this->query($query);
                    $this->bind(':nova_senha',$recuperacaoNova);
                    $this->bind(':id',$usuario->idMembro);
                    if($this->executa())
                    {
                     $this->resultado = true;
                    }else{
                        $this->resultado = false;
                    }
                }else{
                    $this->resultado = false;
                }
            }
            
        
        }else{
            echo "Email não cadastrado";
        }
        
    }
    public function procurarMembros($nome)
    {
            $query = "SELECT * FROM membro WHERE nome LIKE :nome ORDER BY idMembro DESC";
            $this->query($query);
            $this->bind(':nome','%'.$nome.'%');
            if($this->selectAll())
            {
                $dados = $this->selectAll();
                return $dados;
            }
    }
    public function buscarMembro(int $id)
    {
            $query = "SELECT * FROM membro WHERE idMembro = :id";
            $this->query($query);
            $this->bind(':id',$id);
            if($this->select())
            {
                $dados = $this->select();
                return $dados;
            }
    }

    public function buscarAniversariantes()
    {
            $hoje = date('Y-m-d');
            $query = "SELECT * FROM membro WHERE DAY(nascimento) = DAY(:hoje) 
            AND MONTH(nascimento) = MONTH(:hoje) ORDER BY idMembro ASC";
            $this->query($query);
            $this->bind(':hoje',$hoje);
            if($this->selectAll())
            {
                $dados = $this->selectAll();
                return $dados;
            }
    }
    public function buscarNumeroDeAniversariantes()
    {
            $hoje = date('Y-m-d');
            $query = "SELECT COUNT(idMembro) as aniversariante FROM membro WHERE DAY(nascimento) = DAY(:hoje) 
            AND MONTH(nascimento) = MONTH(:hoje) ORDER BY idMembro ASC";
            $this->query($query);
            $this->bind(':hoje',$hoje);
            if($this->selectColum())
            {
                $dados = $this->selectColum();
                return $dados;
            }
    }

    public function buscarCriancas()
    {

        $sql = "SELECT * FROM membro 
        WHERE  DATEDIFF(CURDATE(), nascimento) <= 17*365";
        $this->query($sql);
        $this->executa();
        if($this->selectAll())
        {
            $dados = $this->selectAll();
            return $dados;
        }
    }
    public function buscarJovens()
    {
        $sql = "SELECT * FROM membro 
        WHERE DATEDIFF(CURDATE(), nascimento) BETWEEN 18*365 AND 45*365";
        $this->query($sql);
        $this->executa();
        if($this->selectAll())
        {
            $dados = $this->selectAll();
            return $dados;
        }
    }

    public function buscarAdolescentes()
    {

    }

    public function buscarAdultos()
    {

    }

    public function addMembros($id_unico,$nome,$pai,$mae,$nascimento,$nacionalidade,$provincia,$municipio,
    $documento,$numDocumento,$sexo,$contacto,$estado,$batismo,$lugar,$cargo,$funcao,
    $categoria,$email,$senha,$formacao,$biografia)
    {
            $query = "INSERT INTO membro (idMembro,id_unico,nome,pai,mae,nascimento,nacionalidade,
            provincia,municipio,documento,numDocumento,sexo,contacto,estado,batismo,local,cargo,funcao,
            categoria,email,senha,dataCriacao,admin,formacao,biografia,recuperar_senha) VALUES 
            (NULL,:id_unico,:nome,:pai,:mae,:nascimento,:nacionalidade,
            :provincia,:municipio,:documento,:numDocumento,:sexo,:contacto,:estado,:batismo,:local,:cargo,:funcao,
            :categoria,:email,:senha,NOW(),:admin,:formacao,:biografia,NULL)";
            $this->query($query);
            $this->bind(':id_unico',$id_unico);
            $this->bind(':nome',$nome);
            $this->bind(':pai',$pai);
            $this->bind(':mae',$mae);
            $this->bind(':nascimento',$nascimento);
            $this->bind(':nacionalidade',$nacionalidade);
            $this->bind(':provincia',$provincia);
            $this->bind(':municipio',$municipio);
            $this->bind(':documento',$documento);
            $this->bind(':numDocumento',$numDocumento);
            $this->bind(':sexo',$sexo);
            $this->bind(':contacto',$contacto);
            $this->bind(':estado',$estado);
            $this->bind(':batismo',$batismo);
            $this->bind(':local',$lugar);
            $this->bind(':cargo',$cargo);
            $this->bind(':funcao',$funcao);
            $this->bind(':categoria',$categoria);
            $this->bind(':email',$email);
            $this->bind(':senha',$senha);
            $this->bind(':formacao',$formacao);
            $this->bind(':biografia',$biografia);
           $this->bind(':admin',$_SESSION['nome']);
    
            if($this->executa()){
                $this->resultado = true;
            }
    }

    public function editar($id_unico,$id,$nome,$pai,$mae,$nascimento,$nacionalidade,$provincia,$municipio,
    $documento,$numDocumento,$sexo,$contacto,$estado,$batismo,$lugar,$cargo,$funcao,
   /* $imagem,*/$categoria,$email,$senha,$formacao,$biografia)
    {
            $query = "UPDATE membro SET nome = :nome, pai = :pai,mae = :mae,nascimento = :nascimento,nacionalidade = :nacionalidade,
            provincia = :provincia, municipio = :municipio, documento = :documento, numDocumento = :numDocumento,sexo = :sexo,contacto = :contacto,
            estado = :estado,batismo=:batismo,local=:local,cargo=:cargo,funcao=:funcao,categoria=:categoria,email=:email,senha=:senha,dataEdicao = Now()
            ,formacao=:formacao,biografia=:biografia
            WHERE idMembro = :id AND id_unico = :id_unico";
            $this->query($query);
            $this->bind(':id',$id);
            $this->bind(':id_unico',$id_unico);
            $this->bind(':nome',$nome);
            $this->bind(':pai',$pai);
            $this->bind(':mae',$mae);
            $this->bind(':nascimento',$nascimento);
            $this->bind(':nacionalidade',$nacionalidade);
            $this->bind(':provincia',$provincia);
            $this->bind(':municipio',$municipio);
            $this->bind(':documento',$documento);
            $this->bind(':numDocumento',$numDocumento);
            $this->bind(':sexo',$sexo);
            $this->bind(':contacto',$contacto);
            $this->bind(':estado',$estado);
            $this->bind(':batismo',$batismo);
            $this->bind(':local',$lugar);
            $this->bind(':cargo',$cargo);
            $this->bind(':funcao',$funcao);
           // $this->bind(':foto',$imagem);
            $this->bind(':categoria',$categoria);
            $this->bind(':email',$email);
            $this->bind(':senha',$senha);
            $this->bind(':formacao',$formacao);
            $this->bind(':biografia',$biografia);
    
            if($this->executa()){
                $this->resultado = true;
            }
        
    }
    //PESQUISAS DO TIPO ESECÍFICO
    //


    public function membrosEBD()
    {
        $currentDate = date('Y-m-d');

        $query = "SELECT * FROM membro WHERE
         sexo = 'Masculino' AND DATE_SUB('$currentDate', INTERVAL 17 YEAR) <= nascimento";
        $this->query($query);

            if($this->selectAll())
            {
                $dados = $this->selectAll();
                return $dados;
            }
    }
    public function membrosJOVENS()
    {
        $currentDate = date('Y-m-d');

        $query = "SELECT * FROM membro WHERE 
        DATE_SUB('$currentDate', INTERVAL 45 YEAR) <= nascimento";
        $this->query($query);

            if($this->selectAll())
            {
                $dados = $this->selectAll();
                return $dados;
            }
    }
    public function membrosAdultos()
    {
        $currentDate = date('Y-m-d');

        $query = "SELECT * FROM membro 
        WHERE sexo = 'masculino' AND DATE_SUB('$currentDate', INTERVAL 45 YEAR) > nascimento";
        $this->query($query);

            if($this->selectAll())
            {
                $dados = $this->selectAll();
                return $dados;
            }
    }

}