<?php

namespace App\Controllers;

use App\Models\ModelFinancas;
use Src\Classes\RoutesViews;
use Dompdf\Dompdf;
class FinancasController extends RoutesViews {

    public function index()
    {
        $class = new ModelFinancas();
        $dados = $class->buscarReceitas();
        $this->renderizarViews('dashboard/financas/Financas',$dados);
    }

    public function viewAdicionarReceitas()
    {
        $this->renderizarViews('dashboard/financas/AdicionarReceitas');
    }

    public function apresentaReceitas()
    {
        $class = new ModelFinancas();
        $dados = $class->buscarReceitas();
        $apresentar = '';
        if(isset($dados)){
        foreach($dados as $dado) {
        $apresentar .= '
                <tr id="'.$dado->idReceita.'">
                    <td data-target="id">'.$dado->idReceita.'</td>
                    <td data-target="tipoReceita">'.$dado->tipoReceita.'</td>
                    <td data-target="entrada">'.$dado->entrada.'</td>
                    <td data-target="saida">'.$dado->saida.'</td>
                    <td data-target="total">'.$dado->total.'</td>
                    <td data-target="departamento">'.$dado->departamento.'</td>
                    <td data-target="dataCriacao">'.$dado->dataCriacao.'</td>
                    <td data-target="dataEdicao">'.$dado->dataEdicao.'</td>
                    <td data-target="observacao" class="dado-none">'.$dado->observacao.'</td>
                    <td data-target="admin">'.$dado->admin.'</td>
                    <td data-target=""><a href="" data-role="editar" data-id="'.$dado->idReceita.'">Editar</a></td>
                </tr>';
            }} 

        echo $apresentar;
    } 

    public function carregarReceitasPdf()
    {
        require_once '../dompdf/dompdf/autoload.inc.php';
        $class = new ModelFinancas();
        $dados = $class->buscarReceitas();
        $apresentar = '<table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tipo de Receita</th>
                                <th>Entrada</th>
                                <th>Saida</th>
                                <th>Total</th>
                                <th>Departamento</th>
                            </tr>
                        </thead>';
        if(isset($dados)){
        foreach($dados as $dado) {
        $apresentar .= '<tbody>';
        $apresentar .= '
                <tr id="'.$dado->idReceita.'">
                    <td data-target="id">'.$dado->idReceita.'</td>
                    <td data-target="tipoReceita">'.$dado->tipoReceita.'</td>
                    <td data-target="entrada">'.$dado->entrada.'</td>
                    <td data-target="saida">'.$dado->saida.'</td>
                    <td data-target="total">'.$dado->total.'</td>
                    <td data-target="departamento">'.$dado->departamento.'</td>
                </tr>';
            }} 
            $apresentar .= '</tbody>
                            </table>';
            $pdf = new Dompdf();
            $pdf->setPaper('A4', 'portrait');
            $pdf->loadHtml($apresentar);
            $pdf->render();
            $pdf->stream('lista_de_actividades.pdf', array('Attachment' => 0));
    }
    public function descarregarReceitasPdf()
    {
        require_once '../dompdf/dompdf/autoload.inc.php';
        $class = new ModelFinancas();
        $dados = $class->buscarReceitas();
        $apresentar = '<table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tipo de Receita</th>
                                <th>Entrada</th>
                                <th>Saida</th>
                                <th>Total</th>
                                <th>Departamento</th>
                            </tr>
                        </thead>';
        if(isset($dados)){
        foreach($dados as $dado) {
        $apresentar .= '<tbody>';
        $apresentar .= '
                <tr id="'.$dado->idReceita.'">
                    <td data-target="id">'.$dado->idReceita.'</td>
                    <td data-target="tipoReceita">'.$dado->tipoReceita.'</td>
                    <td data-target="entrada">'.$dado->entrada.'</td>
                    <td data-target="saida">'.$dado->saida.'</td>
                    <td data-target="total">'.$dado->total.'</td>
                    <td data-target="departamento">'.$dado->departamento.'</td>
                </tr>';
            }} 
            $apresentar .= '</tbody>
                            </table>';
            $pdf = new Dompdf();
            $pdf->setPaper('A4', 'portrait');
            $pdf->loadHtml($apresentar);
            $pdf->render();
            $pdf->stream('lista_de_actividades.pdf', array('Attachment' => 1));
    }
    public function reportFinacas()
    {
        $report = $this->dashReceitas();
        $reportar = 
            '<div class="fin-report">
            <div class="left">
                <img src="'.DIRIMG.'cash_app.svg" alt="">
                <h2>Total de Entradas</h2>
                <small class="text-muted">Ano 2023</small>
            </div>
            <div class="rigth">
            <h2>'.(isset($report['entrada'])?$report['entrada']:"0").'</h2>
            </div>
        </div>
        <div class="fin-report rep1">
            <div class="left">
                <img src="'.DIRIMG.'cash_app.svg" alt="">
                <h2>Total de Saidas</h2>
                <small class="text-muted">Ano 2023</small>
            </div>
            <div class="rigth">
        <h2>'.(isset($report['saida'])?$report['saida']:"0").'</h2>
            </div>
        </div>
        <div class="fin-report rep2">
            <div class="left">
                <img src="'.DIRIMG.'cash_app.svg" alt="">
                <h2>Total de Geral</h2>
                <small class="text-muted">Ano 2023</small>
            </div>
            <div class="rigth">
                <h2>'.(isset($report['total'])?$report['total']:"0").'</h2>
            </div>
            </div>
        ';
        echo $reportar;
    }
    public function addReceitas()
    {
        $class = new ModelFinancas();
        $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
       
        $tipoReceita = $dados['tipoReceita'];
        $departamento = $dados['departamento'];
        $entrada = $dados['entrada'];
        $saida = $dados['saida'];
        $observacao = $dados['observacao'];
        $id = $dados['id'];

        if(empty($entrada) )
        {
                echo "O campo entrada é obrigatório";
        }
        else{
           
            if(!empty($id))
            { 
                if(is_numeric($entrada) AND is_numeric($saida)){
                    $total = $entrada - $saida;
                    $class->editarReceitas($id,$tipoReceita,$entrada,
                    $saida,$total,$departamento,$observacao);
                    if($class->getResultado())
                    {
                        echo "Editado com sucesso";
                    }else{
                        echo "Não editado com sucesso";
                    }
                }else{
                    echo "Apenas são permitido valores númericos"; 
                }
               
            }else{
                if(is_numeric($entrada) AND is_numeric($saida)){
                    $total = $entrada - $saida;
                    $class->addReceitas($tipoReceita,$entrada,
                    $saida,$total,$departamento,$observacao);
                    if($class->getResultado())
                    {
                        echo "Inserido com sucesso";
                    }else{
                        echo "Não inserido com sucesso";
                    }
                }else{
                    echo "Apenas são permitido valores númericos"; 
                }
               
            }}
        }
    
    public function editarReceita()
    {
        $class = new ModelFinancas();

        $id = filter_input_array(INPUT_GET,FILTER_DEFAULT);
        $id = $id['id'];
        $dados = $class->buscarReceita($id);
        $this->renderizarViews('dashboard/financas/AdicionarReceitas',$dados);

    }
    public function pesquisarFinancas()
    {
        $dataInicial = $_POST['dataInicial'];
        $dataFinal = $_POST['dataFinal'];
        $class = new ModelFinancas();
        $dados = $class->pesquisarFinancas($dataInicial, $dataFinal);
        $apresentar = '';
        if(isset($dados)){
        foreach($dados as $dado) {
        $apresentar .= '
                <tr id="'.$dado->idReceita.'">
                    <td data-target="id">'.$dado->idReceita.'</td>
                    <td data-target="tipoReceita">'.$dado->tipoReceita.'</td>
                    <td data-target="entrada">'.$dado->entrada.'</td>
                    <td data-target="saida">'.$dado->saida.'</td>
                    <td data-target="total">'.$dado->total.'</td>
                    <td data-target="departamento">'.$dado->departamento.'</td>
                    <td data-target="dataCriacao">'.$dado->dataCriacao.'</td>
                    <td data-target="dataEdicao">'.$dado->dataEdicao.'</td>
                    <td data-target="admin">'.$dado->admin.'</td>
                    <td data-target=""><a href="" data-role="editar" data-id="'.$dado->idReceita.'">Editar</a></td>
                </tr>';
            }} 

        echo $apresentar;
    }
    public function dashReceitas()
    {
        $class = new ModelFinancas();
        $saidas = $class->calcularReceitas('saida');
        $entrada = $class->calcularReceitas('entrada');
        $total = $class->calcularReceitas('total');

        $receitas = [
            'saida' => $saidas,
            'entrada' => $entrada,
            'total' => $total
        ];

        return $receitas;
    }
}