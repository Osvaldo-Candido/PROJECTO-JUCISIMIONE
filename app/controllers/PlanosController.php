<?php

namespace App\Controllers;

use App\Models\ModelEscala;
use Src\Classes\RoutesViews;
use Dompdf\Dompdf;
class PlanosController extends RoutesViews {

    public function index ()
    {

        $this->renderizarViews('dashboard/plano/Planificacao');
    }
    
    public function viewCadastrarPlano()
    {
        $this->renderizarViews('dashboard/plano/AdicionarPlano');
    }
    public function apresentarEscala()
    {
        $class = new ModelEscala();
        $dados = $class->buscarEscalas();
        $escala = '';
        if(isset($dados)) {
        foreach($dados as $dado) {
        $escala .= ' 
            <tr id="'.$dado->idEscala.'">
                    <td data-target="id">'.$dado->idEscala.'</td>
                    <td data-target="data">'.$dado->data.'</td>
                    <td data-target="ministro">'.$dado->ministro.'</td>
                    <td data-target="liturgista">'.$dado->liturgista.'</td>
                    <td data-target="suplenteMinistro">'.$dado->suplenteMinistro.'</td>
                    <td data-target="suplenteLiturgista">'.$dado->suplenteLiturgista.'"</td>
                    <td data-target="tipoACtividade">'.$dado->tipoACtividade.'</td>
                    <td data-target="textoBiblico" class="anotacao">'.$dado->textoBiblico.'</td>
                    <td data-target="departamento">'.$dado->departamento.'</td>
                    <td data-target="observacao">'.$dado->observacao.'</td>
                    <td data-target="">'.$dado->dataCriacao.'</td>
                    <td data-target="">'.$dado->dataEdicao.'</td>
                    <td data-target="">'.$dado->admin.'</td>
                    <td data-target=""><a href="" data-role="editar" data-id="'.$dado->idEscala.'">Editar</a></td>
                    
             </tr>';
            }
        }
             echo $escala;
         
    }
    public function imprimirEscalaPdf()
    {
        require_once '../dompdf/dompdf/autoload.inc.php';
        $class = new ModelEscala();
        $dados = $class->buscarEscalas();
        $escala = '<table>';
        $escala .= '<thead>
                    <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Ministro</th>
                    <th>Liturgista</th>
                    <th>Suplente Ministro</th>
                    <th>Suplente Liturgista</th>
                    <th>Tipo de actividade</th>
                    <th>Texto Bíblico</th>
                    <th>Departamento</th>
                    <th>Observação</th>
                    </tr>
                    </thead>
                 </tbody> ';
        if(isset($dados)) {
        foreach($dados as $dado) {
        $escala .= ' 
            <tr id="'.$dado->idEscala.'">
                    <td data-target="id">'.$dado->idEscala.'</td>
                    <td data-target="data">'.$dado->data.'</td>
                    <td data-target="ministro">'.$dado->ministro.'</td>
                    <td data-target="liturgista">'.$dado->liturgista.'</td>
                    <td data-target="suplenteMinistro">'.$dado->suplenteMinistro.'</td>
                    <td data-target="suplenteLiturgista">'.$dado->suplenteLiturgista.'"</td>
                    <td data-target="tipoACtividade">'.$dado->tipoACtividade.'</td>
                    <td data-target="textoBiblico" class="anotacao">'.$dado->textoBiblico.'</td>
                    <td data-target="departamento">'.$dado->departamento.'</td>
                    <td data-target="observacao">'.$dado->observacao.'</td>
                    
             </tr>';
            }
        }
        $escala .= '</tbody>
                    </table>';
        $pdf = new Dompdf();
        $pdf->setPaper('legal', 'landscape');
        $pdf->loadHtml($escala);
        $pdf->render();
        $pdf->stream('lista_de_actividades.pdf', array('Attachment' => 0));
    }
    public function descarregarEscalaPdf()
    {
        require_once '../dompdf/dompdf/autoload.inc.php';
        $class = new ModelEscala();
        $dados = $class->buscarEscalas();
        $escala = '<table>';
        $escala .= '<thead>
                    <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Ministro</th>
                    <th>Liturgista</th>
                    <th>Suplente Ministro</th>
                    <th>Suplente Liturgista</th>
                    <th>Tipo de actividade</th>
                    <th>Texto Bíblico</th>
                    <th>Departamento</th>
                    <th>Observação</th>
                    </tr>
                    </thead>
                 </tbody> ';
        if(isset($dados)) {
        foreach($dados as $dado) {
        $escala .= ' 
            <tr id="'.$dado->idEscala.'">
                    <td data-target="id">'.$dado->idEscala.'</td>
                    <td data-target="data">'.$dado->data.'</td>
                    <td data-target="ministro">'.$dado->ministro.'</td>
                    <td data-target="liturgista">'.$dado->liturgista.'</td>
                    <td data-target="suplenteMinistro">'.$dado->suplenteMinistro.'</td>
                    <td data-target="suplenteLiturgista">'.$dado->suplenteLiturgista.'"</td>
                    <td data-target="tipoACtividade">'.$dado->tipoACtividade.'</td>
                    <td data-target="textoBiblico" class="anotacao">'.$dado->textoBiblico.'</td>
                    <td data-target="departamento">'.$dado->departamento.'</td>
                    <td data-target="observacao">'.$dado->observacao.'</td>
                    
             </tr>';
            }
        }
        $escala .= '</tbody>
                    </table>';
        $pdf = new Dompdf();
        $pdf->setPaper('legal', 'landscape');
        $pdf->loadHtml($escala);
        $pdf->render();
        $pdf->stream('lista_de_actividades.pdf', array('Attachment' => 1));
    }
    public function addEscala()
    {
        $class = new ModelEscala();

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
       
        $data = $dados['data'];
        $ministro = $dados['ministro'];
        $liturgista = $dados['liturgista'];
        $suplenteMinistro = $dados['suplenteMinistro'];
        $suplenteLiturgista = $dados['suplenteLiturgista'];
        $tipoACtividade = $dados['tipoACtividade'];
        $textoBiblico = $dados['textoBiblico'];
        $departamento = $dados['departamento'];
        $observacao = $dados['observacao'];
        $id = $dados['id'];

            if(empty($data) || empty($ministro) || empty($liturgista))
            {
                echo "Preencha todos os campos";
            }elseif(!empty($id)){
                $class->editarEscala($id,$data,$ministro,$liturgista,
                $suplenteMinistro,$suplenteLiturgista,$tipoACtividade,
                $textoBiblico,$departamento,$observacao);

                if($class->getResultado())
                {
                    echo "Editado com sucesso";
                }else{
                    echo "Não editado com sucesso";
                }
            }else{
                $class->addEscala($data,$ministro,$liturgista,
                $suplenteMinistro,$suplenteLiturgista,$tipoACtividade,
                $textoBiblico,$departamento,$observacao);
                if($class->getResultado())
                {
                    echo "Inserido com sucesso";
                }else{
                    echo "Não inserido com sucesso";
                }
            }
        
    }
    public function pesquisarEscala()
    {
        $dataInicial = $_POST['dataInicial'];
        $dataFinal = $_POST['dataFinal'];
        $class = new ModelEscala();
        $dados = $class->pesquisarEscala($dataInicial, $dataFinal);
        $escala = '';
        if(isset($dados)) {
        foreach($dados as $dado) {
        $escala .= ' 
            <tr id="'.$dado->idEscala.'">
                    <td data-target="id">'.$dado->idEscala.'</td>
                    <td data-target="data">'.$dado->data.'</td>
                    <td data-target="ministro">'.$dado->ministro.'</td>
                    <td data-target="liturgista">'.$dado->liturgista.'</td>
                    <td data-target="suplenteMinistro">'.$dado->suplenteMinistro.'</td>
                    <td data-target="suplenteLiturgista">'.$dado->suplenteLiturgista.'"</td>
                    <td data-target="tipoACtividade">'.$dado->tipoACtividade.'</td>
                    <td data-target="textoBiblico" class="anotacao">'.$dado->textoBiblico.'</td>
                    <td data-target="departamento">'.$dado->departamento.'</td>
                    <td data-target="observacao">'.$dado->observacao.'</td>
                    <td data-target="">'.$dado->dataCriacao.'</td>
                    <td data-target="">'.$dado->dataEdicao.'</td>
                    <td data-target="">'.$dado->admin.'</td>
                    <td data-target=""><a href="" data-role="editar" data-id="'.$dado->idEscala.'">Editar</a></td>
                    
             </tr>';
            }
        }
             echo $escala;
    }
    public function editarEscala()
    {
        $class = new ModelEscala();

        $id = filter_input_array(INPUT_GET,FILTER_DEFAULT);
        $id = $id['id'];
        $dados = $class->buscarEscala($id);
        $this->renderizarViews('dashboard/plano/AdicionarPlano',$dados);

    }
}