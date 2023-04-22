<?php 

namespace App\Controllers;

use App\Models\ModelActividade;
use Src\Classes\RoutesViews;
use Dompdf\Dompdf;

class ActividadesController extends RoutesViews {

    public function index()
    {
       
        $this->renderizarViews('dashboard/planosActividades/ActividadesGerais');   
    }

    public function viewCadastrarActividade()
    {
        $this->renderizarViews('dashboard/planosActividades/AdicionarActividade');   
    }
    public function pesquisarActividade(){
        $dado = $_POST['procurar'];
        $classe = new ModelActividade();
        $dados = $classe->pesquisarActividade($dado);
        $actividades = '';
        if(isset($dados)) {
        foreach($dados as $actividade) {
        
        $actividades .= '<tr id="'.$actividade->idActividade.'">
                <td data-target="id">'.$actividade->idActividade.'</td>    
                <td data-target="actividade">'.$actividade->nome.'</td>    
                <td data-target="responsavel">'.$actividade->responsavel.'</td>    
                <td data-target="objectivo">'.$actividade->objectivo.'</td>    
                <td data-target="data">'.$actividade->data.'</td>    
                <td data-target="lugar">'.$actividade->lugar.'</td>    
                <td data-target="duracao">'.$actividade->duracao.'</td>    
                <td data-target="estado">'.$actividade->estado.'</td> 
                <td data-target="departamento">'.$actividade->departamento.'</td>       
                <td data-target="">'.$actividade->dataCriacao.'</td>      
                <td>'.$actividade->dataEdicao.'</td>    
                <td data-target="admin">'.$actividade->admin.'</td> 
                <td data-target="ver"><a href="'.DIRPAGE.'actividades/buscarActividade?id='.$actividade->idActividade.'">Ver</a></td> 
                <td><a href="" data-role="editar" data-id="'.$actividade->idActividade.'">Editar</a></td>    
                <td data-target="observacao" class="dado-none">'.$actividade->observacao.'</td>    
         </tr>';
        } } 

        echo $actividades;
    }
    public function buscarActividade()
    {
        $classe = new ModelActividade();
        $id = filter_input_array(INPUT_GET,FILTER_DEFAULT);
        $id = $id['id'];
        $dados = $classe->buscarActividade($id);
        $this->renderizarViews('dashboard/planosActividades/SingleActividades',$dados);   
    }
    public function apresentarReport()
    {
        $report = $this->reportActividades();
        $reportar = '<h2 class="list-dash">Dashboard de todas as actividades</h2>
        <div class="dashboard dashboard-actividades">
            <div class="planificadas">
                <div class="left">
                    <span><img src="'.DIRIMG.'info.svg" alt=""></span>
                    <h2>Planificadas</h2>
                    <small class="text-muted">Ano 2023</small>
                </div>
                <div class="right">
                    <h1>'.(isset($report['Planificada'])?$report['Planificada']:"0").'</h1>
                </div>
            </div>
            <div class="planificadas sucesso">
                <div class="left">
                    <span><img src="'.DIRIMG.'settings.svg" alt=""></span>
                    <h2>Realizadas</h2>
                    <small class="text-muted">Ano 2023</small>
                </div>
                <div class="right">
                    <h1>'.(isset($report['Realizadas'])?$report['Realizadas']:"0").'</h1>
                </div>
            </div>
            <div class="planificadas alerta">
                <div class="left">
                    <span><img src="'.DIRIMG.'contacts.svg" alt=""></span>
                    <h2>Pendentes</h2>
                    <small class="text-muted">Ano 2023</small>
                </div>
                <div class="right">
                    <h1>'.(isset($report['Pendente'])?$report['Pendente']:"0").'</h1>
                </div>
            </div>
            <div class="planificadas total">
                <div class="left">
                    <span><img src="'.DIRIMG.'services.svg" alt=""></span>
                    <h2>Canceladas</h2>
                    <small class="text-muted">Ano 2023</small>
                </div>
                <div class="right">
                    <h1>'.(isset($report['Canceladas'])?$report['Canceladas']:"0").'</h1>';
        echo $reportar;
    }

    public function apresentarActividades()
    {
        $classe = new ModelActividade();

        $dados = $classe->buscarActividades();
        $actividades ='';
        if(isset($dados)) {
        foreach($dados as $actividade) {
        
        $actividades .= '<tr id="'.$actividade->idActividade.'">
                <td data-target="id">'.$actividade->idActividade.'</td>    
                <td data-target="actividade">'.$actividade->nome.'</td>    
                <td data-target="responsavel">'.$actividade->responsavel.'</td>    
                <td data-target="objectivo">'.$actividade->objectivo.'</td>    
                <td data-target="data">'.$actividade->data.'</td>    
                <td data-target="lugar">'.$actividade->lugar.'</td>    
                <td data-target="duracao">'.$actividade->duracao.'</td>    
                <td data-target="estado">'.$actividade->estado.'</td> 
                <td data-target="departamento">'.$actividade->departamento.'</td>       
                <td data-target="">'.$actividade->dataCriacao.'</td>      
                <td>'.$actividade->dataEdicao.'</td>    
                <td data-target="admin">'.$actividade->admin.'</td> 
                <td data-target="ver"><a href="'.DIRPAGE.'actividades/buscarActividade?id='.$actividade->idActividade.'">Ver</a></td> 
                <td><a href="" data-role="editar" data-id="'.$actividade->idActividade.'">Editar</a></td>    
                <td data-target="observacao" class="dado-none">'.$actividade->observacao.'</td>    
         </tr>';
        } } 

        echo $actividades;
    }
    public function imprimirActividadePdf()
    {
        require_once '../dompdf/dompdf/autoload.inc.php';
        $classe = new ModelActividade();

        $dados = $classe->buscarActividades();
        $actividades = '<table>';
        $actividades .='<thead>
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
        if(isset($dados)) {
        foreach($dados as $actividade) {
        
        $actividades .= '<tr>
                <td>'.$actividade->idActividade.'</td>    
                <td>'.$actividade->nome.'</td>    
                <td>'.$actividade->responsavel.'</td>    
                <td>'.$actividade->objectivo.'</td>    
                <td>'.$actividade->data.'</td>    
                <td>'.$actividade->lugar.'</td>    
                <td>'.$actividade->duracao.'</td>    
                <td>'.$actividade->estado.'</td> 
                <td>'.$actividade->departamento.'</td>       
                <td>'.$actividade->dataCriacao.'</td>      
                <td>'.$actividade->dataEdicao.'</td>    
                <td>'.$actividade->admin.'</td> 
         </tr>';
        } } 
        $actividades .= '</tbody>
                        </table>';
        $pdf = new Dompdf();
        $pdf->setPaper('legal', 'landscape');
        $pdf->loadHtml($actividades);
        $pdf->render();
        $pdf->stream('lista_de_actividades.pdf', array('Attachment' => 0));
    }
    public function descarregarActividadePdf()
    {
        require_once '../dompdf/dompdf/autoload.inc.php';
        $classe = new ModelActividade();

        $dados = $classe->buscarActividades();
        $actividades = '<table>';
        $actividades .='<thead>
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
        if(isset($dados)) {
        foreach($dados as $actividade) {
        
        $actividades .= '<tr>
                <td>'.$actividade->idActividade.'</td>    
                <td>'.$actividade->nome.'</td>    
                <td>'.$actividade->responsavel.'</td>    
                <td>'.$actividade->objectivo.'</td>    
                <td>'.$actividade->data.'</td>    
                <td>'.$actividade->lugar.'</td>    
                <td>'.$actividade->duracao.'</td>    
                <td>'.$actividade->estado.'</td> 
                <td>'.$actividade->departamento.'</td>       
                <td>'.$actividade->dataCriacao.'</td>      
                <td>'.$actividade->dataEdicao.'</td>    
                <td>'.$actividade->admin.'</td> 
         </tr>';
        } } 
        $actividades .= '</tbody>
                        </table>';
        $pdf = new Dompdf();
        $pdf->setPaper('legal', 'landscape');
        $pdf->loadHtml($actividades);
        $pdf->render();
        $pdf->stream('lista_de_actividades.pdf', array('Attachment' => true));
    }
    public function inserirActividade()
    {
        $classe = new ModelActividade();

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


                $actividade = trim($dados['actividade']);
                $responsavel = trim($dados['responsavel']);
                $objectivo = trim($dados['objectivo']);
                $data = trim($dados['data']);
                $lugar = trim($dados['lugar']);
                $duracao = trim($dados['duracao']);
                $observacao = trim($dados['observacao']);
                $departamento = trim($dados['departamento']);
                $estado = trim($dados['estado']);
                $id = $dados['id'];
            if(empty($actividade) || empty( $responsavel) || empty($objectivo) || empty($data)
            || empty($duracao))
            {
                echo "Preencha os campos vazios";
            }elseif(!empty($id))
            {
                $classe->editarActividade($id, $actividade,$responsavel,$objectivo
                ,$data,$lugar,$duracao,$observacao,
                $departamento, $estado);

                if($classe->getResultado())
                {
                    echo "Editado com sucesso";
                }else{
                    echo "Não editado com sucesso";
                }
               
            }else{
                $classe->addActividade($actividade,$responsavel,$objectivo
                ,$data,$lugar,$duracao,$observacao,
                $departamento, $estado);

                if($classe->getResultado())
                {
                    echo "Inserido com sucesso";
                }else{
                    echo "Não inserido com sucesso";
                }
            }
        }
    

    public function editarActividade()
    {
        $classe = new ModelActividade();

        $id = filter_input_array(INPUT_GET,FILTER_DEFAULT);
        $id = $id['id'];
        $dados = $classe->buscarActividade($id);
        $this->renderizarViews('dashboard/planosActividades/AdicionarActividade',$dados);   
    }

    public function reportActividades()
    {
      $classe = new ModelActividade();
      $Planificada =  $classe->estadoActividades('Planificada');
      $Pendente =  $classe->estadoActividades('Pendente');
      $Canceladas =  $classe->estadoActividades('Canceladas');
      $Realizada =  $classe->estadoActividades('Realizadas');

      $actividdades = [
        'Planificada' => $Planificada,
        'Pendente' => $Pendente,
        'Canceladas' => $Canceladas,
        'Realizadas' => $Realizada
      ];
      return $actividdades;
    }
}