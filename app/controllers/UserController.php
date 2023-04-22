<?php 

namespace App\Controllers;

use App\Models\ModelMembro;
use Src\Classes\RoutesViews;
use Dompdf\Dompdf;


class UserController extends RoutesViews {

    private $dados = [];
    private $imagem = [];

    public function index ()
    {
        $membro = new ModelMembro();
        $dados = $membro->buscarCriancas();
      
            $membro = new ModelMembro();
            $this->dados = $membro->buscarMembros();
            $this->renderizarViews('dashboard/membros/Mostrar');
    }

    public function carregarMembros()
    {
    $membro = new ModelMembro();
    $this->dados = $membro->buscarMembros();
    
    $html = '';
    if(isset($this->dados)){ 
        foreach($this->dados as $dado) { 
          $html .= 
            '<tr id="'.$dado->idMembro.'">
                    <td data-target="idMembro">'.$dado->idMembro.'</td>
                    <td data-target="nome">'.$dado->nome.'</td>
                    <td data-target="nascimento">'.$dado->nascimento.'</td>
                    <td data-target="provincia">'.$dado->provincia.'</td>
                    <td data-target="estado">'.$dado->estado.'</td>
                    <td data-target="cargo">'.$dado->cargo.'</td>
                    <td data-target="funcao">'.$dado->funcao.'</td>
                    <td data-target="categoria">'.$dado->categoria.'</td>
                    <td data-target="contacto">'.$dado->contacto.'</td>
                    <td data-target="pai" class="dado-none">'.$dado->pai.'</td>
                    <td data-target="mae" class="dado-none">'.$dado->mae.'</td>
                    <td data-target="nacionalidade" class="dado-none">'.$dado->nacionalidade.'</td>
                    <td data-target="municipio" class="dado-none">'.$dado->municipio.'</td>
                    <td data-target="sexo" class="dado-none">'.$dado->sexo.'</td>
                    <td data-target="documento" class="dado-none">'.$dado->documento.'</td>
                    <td data-target="numDocumento" class="dado-none">'.$dado->numDocumento.'</td>
                    <td data-target="batismo" class="dado-none">'.$dado->batismo.'</td>
                    <td data-target="local" class="dado-none">'.$dado->local.'</td>
                    <td data-target="funcao" class="dado-none">'.$dado->funcao.'</td>
                    <td data-target="email" class="dado-none">'.$dado->email.'</td>
                    <td data-target="senha" class="dado-none">'.$dado->senha.'</td>
                    <td data-target="id_unico" class="dado-none">'.$dado->id_unico.'</td>
                    <td data-target="formacao" class="dado-none">'.$dado->formacao.'</td>
                    <td data-target="biografia" class="dado-none">'.$dado->biografia.'</td>
                                        
                    <td class="link-perfil"><a href="'.DIRPAGE.'user/viewPerfilMembro?id='.$dado->idMembro.'">Perfil</a></td>
                    <td id="editar" class="ed-perfil"><a href="" data-role="editar" data-id="'.$dado->idMembro.'"><img class="img-perfil" src="'.DIRIMG.'user-pen-solid.svg" alt=""></a></td>
            </tr>';    
        }   
    }
    echo $html;
    }
           
    public function carregarPdf()
    {
    require_once '../dompdf/dompdf/autoload.inc.php';

    $membro = new ModelMembro();
    $dados = $membro->buscarMembros();
    
    $html = '<table>';
    $html .= '<thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>Contacto</th>
                    <th>Função</th>
                    <th>Email</th>
                </tr>
            </thead>
            </tbody> ';
    foreach ($dados as $dado) {
        $html .= '<tr>
                 <td> '.$dado->idMembro.'</td>
                 <td>'.$dado->nome.'</td>
                 <td>'.$dado->estado.'</td>
                 <td>'.$dado->contacto.'</td>
                 <td>'.$dado->funcao.'</td>
                 <td>'.$dado->email.'</td>
                 </tr>';    
    }

    $html .= '  </tbody>
                </table>';

    $pdf = new Dompdf();
    $pdf->loadHtml($html);
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    $pdf->stream('lista_de_membros.pdf', array('Attachment' => true));
}


public function imprimirPdf()
{
    require_once '../dompdf/dompdf/autoload.inc.php';

    $membro = new ModelMembro();
    $dados = $membro->buscarMembros();
    $dadosPesquisados = $this->procurarUsuario();
    
    $html = '<table>';
    $html .= '<thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>Contacto</th>
                    <th>Função</th>
                    <th>Email</th>
                </tr>
            </thead>
            </tbody> ';

        foreach ($dados as $dado) {
            $html .= '<tr>
                     <td> '.$dado->idMembro.'</td>
                     <td>'.$dado->nome.'</td>
                     <td>'.$dado->estado.'</td>
                     <td>'.$dado->contacto.'</td>
                     <td>'.$dado->funcao.'</td>
                     <td>'.$dado->email.'</td>
                     </tr>';    
        
    }
    
    $html .= '  </tbody>
                </table>';

    $pdf = new Dompdf();
    $pdf->loadHtml($html);
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    $pdf->stream('arquivo.pdf', array('Attachment' => false));
    }
    
    public function procurarUsuario()
    {
        $nome = $_POST['procurar'];
        $membro = new ModelMembro();
        $this->dados = $membro->procurarMembros($nome);
        
        $html = '';
        if(isset($this->dados)){ 
            foreach($this->dados as $dado) { 
              $html .= 
                '<tr id="'.$dado->idMembro.'">
                        <td data-target="idMembro">'.$dado->idMembro.'</td>
                        <td data-target="nome">'.$dado->nome.'</td>
                        <td data-target="nascimento">'.$dado->nascimento.'</td>
                        <td data-target="provincia">'.$dado->provincia.'</td>
                        <td data-target="estado">'.$dado->estado.'</td>
                        <td data-target="cargo">'.$dado->cargo.'</td>
                        <td data-target="funcao">'.$dado->funcao.'</td>
                        <td data-target="categoria">'.$dado->categoria.'</td>
                        <td data-target="contacto">'.$dado->contacto.'</td>
                        <td data-target="pai" class="dado-none">'.$dado->pai.'</td>
                        <td data-target="mae" class="dado-none">'.$dado->mae.'</td>
                        <td data-target="nacionalidade" class="dado-none">'.$dado->nacionalidade.'</td>
                        <td data-target="municipio" class="dado-none">'.$dado->municipio.'</td>
                        <td data-target="sexo" class="dado-none">'.$dado->sexo.'</td>
                        <td data-target="documento" class="dado-none">'.$dado->documento.'</td>
                        <td data-target="numDocumento" class="dado-none">'.$dado->numDocumento.'</td>
                        <td data-target="batismo" class="dado-none">'.$dado->batismo.'</td>
                        <td data-target="local" class="dado-none">'.$dado->local.'</td>
                        <td data-target="funcao" class="dado-none">'.$dado->funcao.'</td>
                        <td data-target="email" class="dado-none">'.$dado->email.'</td>
                        <td data-target="senha" class="dado-none">'.$dado->senha.'</td>
                        <td data-target="id_unico" class="dado-none">'.$dado->id_unico.'</td>
                        <td data-target="formacao" class="dado-none">'.$dado->formacao.'</td>
                        <td data-target="biografia" class="dado-none">'.$dado->biografia.'</td>  
                        <td class="link-perfil"><a href="'.DIRPAGE.'user/viewPerfilMembro?id="'.$dado->nome.'">Perfil</a></td>
                        <td id="editar" class="ed-perfil"><a href="" data-role="editar" data-id="'.$dado->idMembro.'"><img class="img-perfil" src="'.DIRIMG.'user-pen-solid.svg" alt=""></a></td>
                </tr>';    
            }   
        }
     echo $html;
        
    }

    public function viewCadastrarMembro()
    {
        $this->renderizarViews('dashboard/membros/Adicionar');
    }

    public function viewPerfilMembro()
    {
        $membro = new ModelMembro();

        $id = filter_input_array(INPUT_GET,FILTER_DEFAULT);
        $id = $id['id'];

        $dados = $membro->buscarMembro($id);
        $this->renderizarViews('dashboard/membros/perfil',$dados);
    }

    public function adicionarMembro()
    {
        $class = new ModelMembro();
        // Filtra os valores enviados pelo formulário
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); 
        $nome = trim($dados['nome']);
        $pai = trim($dados['pai']);
        $mae = trim($dados['mae']);
        $nascimento = trim($dados['nascimento']);
        $nacionalidade = trim($dados['nacionalidade']);
        $provincia = trim($dados['provincia']);
        $municipio = trim($dados['municipio']);
        $documento = trim($dados['documento']);
        $numDocumento = trim($dados['numDocumento']);
        $sexo = trim($dados['sexo']);
        $contacto = trim($dados['contacto']);
        $estado = trim($dados['estado']);
        $batismo = trim($dados['batismo']);
        $lugar = trim($dados['local']);
        $cargo = trim($dados['cargo']);
        $funcao = trim($dados['funcao']);
        $categoria = trim($dados['categoria']);
        $senha = trim($dados['senha']);
        $email = trim($dados['email']);
        $id = trim($dados['idMembro']);
        $id_unico = trim($dados['id_unico']);
        $formacao = trim($dados['formacao']);
        $biografia = trim($dados['biografia']);

        $senha_codificada = password_hash($senha,PASSWORD_DEFAULT);
        
        //Validação de campos obrigatório apenas
        if(empty($nome) || empty($nascimento) || empty($nacionalidade) || empty($provincia) 
        ){
            echo "Preencha os campos obrigatórios";
        }
        else
        {
            //Verificando
                    if($id == ""){
                        if($senha == "")
                        {
                            $unique_id = rand(time(),10000000);
                           
                            $class->addMembros($unique_id,$nome,$pai,$mae,$nascimento,$nacionalidade,$provincia,$municipio,
                            $documento,$numDocumento,$sexo,$contacto,$estado,$batismo,$lugar,$cargo,$funcao,
                             $categoria,$email,$senha_codificada,$formacao,$biografia);
        
                                        if($class->getResultado())
                                        {
                                            echo "Inserido com sucesso";
                                        }else{
                                            echo "Não inserido com sucesso";
                                        }
                        }else{
                            if(strlen($senha) >= 8)
                                {
                                    $unique_id = rand(time(),10000000);
                                
                                    $class->addMembros($unique_id,$nome,$pai,$mae,$nascimento,$nacionalidade,$provincia,$municipio,
                                    $documento,$numDocumento,$sexo,$contacto,$estado,$batismo,$lugar,$cargo,$funcao,
                                    $categoria,$email,$senha_codificada,$formacao,$biografia);
                
                                                if($class->getResultado())
                                                {
                                                    echo "Inserido com sucesso";
                                                }else{
                                                    echo "Não inserido com sucesso";
                                                }
                                   
                                }else{
                                    echo "A Senha deve ter no mínimo 8 Carácteres";
                                }
                           
                        }
                   
                    }else{
                    /* PARA EDITAR O UNIQUE ID E O ID DEVEM SER IGUAIS */
                    if($senha != "")
                    {
                            if(strlen($senha) >= 8)
                            {
                                $class->editar($id_unico,$id,$nome,$pai,$mae,$nascimento,$nacionalidade,$provincia,$municipio,
                                $documento,$numDocumento,$sexo,$contacto,$estado,$batismo,$lugar,$cargo,$funcao,
                                $categoria,$email,$senha_codificada,$formacao,$biografia);
                                            if($class->getResultado())
                                            {
                                                echo "Editado com sucesso";
                                            }else{
                                                echo "Não editado com sucesso";
                                            }
                            }else{
                                echo "A Senha deve ter no mínimo 8 Carácteres";
                            }
                    }else{
                                $class->editar($id_unico,$id,$nome,$pai,$mae,$nascimento,$nacionalidade,$provincia,$municipio,
                                $documento,$numDocumento,$sexo,$contacto,$estado,$batismo,$lugar,$cargo,$funcao,
                                $categoria,$email,$senha_codificada,$formacao,$biografia);
                                if($class->getResultado())
                                {
                                echo "Editado com sucesso";
                                }else{
                                echo "Não editado com sucesso";
                                }
                    }
                  
                    }
              
            }
        }
    

    public function editarMembro()
    {
        $membro = new ModelMembro();

        $id = filter_input_array(INPUT_GET,FILTER_DEFAULT);
        $id = $id['id'];

        $dados = $membro->buscarMembro($id);
        $this->renderizarViews('dashboard/membros/Adicionar',$dados);

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
        }

    }
    public function reportIdades()
    {
        $membro = new ModelMembro();
        $dados = $membro->buscarCriancas();
        var_dump($dados);
    }
    public function terminarSessao()
    {
        if(isset($_SESSION['nome']) && isset($_SESSION['cargo']) && isset($_SESSION['id_unico'])){
            unset($_SESSION['nome']);
            unset($_SESSION['cargo']);
            unset($_SESSION['id_unico']);
            header('Location:'.DIRPAGE.'login\index');
        }
    }
    public function carregarFoto()
    {
        /*
         //Verificando se existem fotos
         if(isset($_FILES['foto']))
         {
                 if($id == ""){
                 $unique_id = rand(time(),10000000);
                        
                 $class->addMembros($unique_id,$nome,$pai,$mae,$nascimento,$nacionalidade,$provincia,$municipio,
                 $documento,$numDocumento,$sexo,$contacto,$estado,$batismo,$lugar,$cargo,$funcao,
                 $new_image_name=null, $categoria,$email,$senha);

                             if($class->getResultado())
                             {
                                 echo "Inserido com sucesso";
                             }else{
                                 echo "Não inserido com sucesso";
                             }
                 }else{
                 /// PARA EDITAR O UNIQUE ID E O ID DEVEM SER IGUAIS 
                 $class->editar($id_unico,$id,$nome,$pai,$mae,$nascimento,$nacionalidade,$provincia,$municipio,
                 $documento,$numDocumento,$sexo,$contacto,$estado,$batismo,$lugar,$cargo,$funcao,
                 $new_image_name=null, $categoria,$email,$senha);
                             if($class->getResultado())
                             {
                                 echo "Editado com sucesso";
                             }else{
                                 echo "Não editado com sucesso";
                             }
                 }

         }else{

             //----------------------------------------------
             $image_name = $_FILES['foto']['name'];
             $tmp_name = $_FILES['foto']['tmp_name'];
             $image_explode = explode('.',$image_name);
                 $image_ext = end($image_explode);

                 $extension = ['jpg','png','jpeg'];
                 if(in_array($image_ext, $extension) === true)
                 {
                     $time = time();

                     $new_image_name = $time."".$image_name;

                    if(move_uploaded_file($tmp_name, DIRREQ.'public/img/usuarios/'.$new_image_name)){
         
                         $unique_id = rand(time(),10000000);
                        
                         $class->addMembros($unique_id,$nome,$pai,$mae,$nascimento,$nacionalidade,$provincia,$municipio,
                         $documento,$numDocumento,$sexo,$contacto,$estado,$batismo,$lugar,$cargo,$funcao,
                         $new_image_name, $categoria,$email,$senha);
                         
                         if($class->getResultado())
                         {
                             echo "Inserido com sucesso";
                         }else{
                             echo "Não inserido com sucesso";
                         }
                    }else{
                        
                    }
                 }else{
                     echo "Apenas são permitidos ficheiros do tipo PNG, JPG e JPEG";
                 } 
           
         }*/

    }

 //CARREGAR EM FORMA DE PDF TODAS AS CRIANÇAS
 public function carregarPdfEBD()
 {
 require_once '../dompdf/dompdf/autoload.inc.php';

 $membro = new ModelMembro();
 $dados = $membro->buscarCriancas();
 
 $html = '<table>';
 $html .= '<thead>
             <tr>
                 <th>ID</th>
                 <th>Nome</th>
                 <th>Estado</th>
                 <th>Contacto</th>
                 <th>Função</th>
                 <th>Email</th>
             </tr>
         </thead>
         </tbody> ';
 foreach ($dados as $dado) {
     $html .= '<tr>
             <td> '.$dado->idMembro.'</td>
             <td>'.$dado->nome.'</td>
             <td>'.$dado->estado.'</td>
             <td>'.$dado->contacto.'</td>
             <td>'.$dado->funcao.'</td>
             <td>'.$dado->email.'</td>
             </tr>';    
 }

 $html .= '  </tbody>
             </table>';

 $pdf = new Dompdf();
 $pdf->loadHtml($html);
 $pdf->setPaper('A4', 'portrait');
 $pdf->render();
 $pdf->stream('lista_de_membros.pdf', array('Attachment' => false)); 
}

//CARREGAR EM FORMA DE PDF TODAS OS JOVENS
public function carregarPdfJOVENS()
{
require_once '../dompdf/dompdf/autoload.inc.php';

$membro = new ModelMembro();
$dados = $membro->buscarJovens();

$html = '<table>';
$html .= '<thead>
         <tr>
             <th>ID</th>
             <th>Nome</th>
             <th>Estado</th>
             <th>Contacto</th>
             <th>Função</th>
             <th>Email</th>
         </tr>
     </thead>
     </tbody> ';
foreach ($dados as $dado) {
 $html .= '<tr>
         <td> '.$dado->idMembro.'</td>
         <td>'.$dado->nome.'</td>
         <td>'.$dado->estado.'</td>
         <td>'.$dado->contacto.'</td>
         <td>'.$dado->funcao.'</td>
         <td>'.$dado->email.'</td>
         </tr>';    
}

$html .= '  </tbody>
         </table>';

$pdf = new Dompdf();
$pdf->loadHtml($html);
$pdf->setPaper('A4', 'portrait');
$pdf->render();
$pdf->stream('lista_de_membros.pdf', array('Attachment' => false)); 
}
//CARREGAR EM FORMA DE PDF TODAS OS JOVENS

 }
