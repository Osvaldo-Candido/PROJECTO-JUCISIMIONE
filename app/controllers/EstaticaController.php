<?php
namespace App\Controllers;

use App\Models\ModelEstatistica;
use Src\Classes\RoutesViews;

class EstaticaController extends RoutesViews {

    public function index()
    {
        $this->renderizarViews('dashboard/relatorios/Relatorios');   
    }
    public function reporte()
    {
        $classe = new  ModelEstatistica();
        $criancasT = $classe->numeroCriancasTotal();
        $criancas = $classe->numeroCriancas();
        $adolescentesT = $classe->numeroAdolescentesTotal();
        $adolescentes = $classe->numeroAdolescentes();
        $jovensT = $classe->numeroJovensTotal();
        $jovens = $classe->numeroJovens();
        $adultosT = $classe->numeroAdultosTotal();
        $adultos = $classe->numeroAdultos();
        $activos = $classe->activos();
        $activosTotal = $classe->activosTotal();
        $falecidos = $classe->falecidos();
        $viajem = $classe->viajem();
        $desistentes = $classe->desistentes();
        $total = $classe->total();
        $totalGeral = $classe->totalGeral();

        $reporte = '<h1 class="titulo-geral">Quadro de estatísticas geral de Membros</h1>
        <div class="dashboard-estatistica">
        <div class="iten">
            <div class="left">
            <img src="<?=DIRIMG?>plus_+.svg" alt="">
            <h3>Crianças</h3>
        </div>
        <div class="rigth">
            <h1>'.(isset($criancasT)?$criancasT:"0").'</h1>
            <small class="text-muted">MF'.(isset($criancas)?$criancas:"0").'|</small> 
            <small class="text-muted">F '.(isset($criancasT)?$criancasT-$criancas:"0").'</small> 
        </div>
        </div>
        <div class="iten">
            <div class="left">
            <img src="<?=DIRIMG?>plus_+.svg" alt="">
            <h3>Adolecentes</h3>
        </div>
        <div class="rigth">
            <h1>'.(isset($adolescentesT)?$adolescentesT:"0").'</h1>
            <small class="text-muted">MF '.(isset($adolescentes)?$adolescentes:"0").'|</small> 
            <small class="text-muted">F '.(isset($adolescentesT)?$adolescentesT-$adolescentes:"0").'</small> 
        </div>
        </div>
        <div class="iten">
            <div class="left">
            <img src="<?=DIRIMG?>plus_+.svg" alt="">
            <h3>Jovens</h3>
        </div>
        <div class="rigth">
            <h1>'.(isset($jovensT)?$jovensT:"0").'</h1>
            <small class="text-muted">MF '.(isset($jovens)?$jovens:"0").'|</small> 
            <small class="text-muted">F '.(isset($jovensT)?$jovensT-$jovens:"0").'</small> 
        </div>
        </div>
        <div class="iten">
            <div class="left">
            <img src="<?=DIRIMG?>plus_+.svg" alt="">
            <h3>Adultos</h3>
        </div>
        <div class="rigth">
            <h1>'.(isset($adultosT)?$adultosT:"0").'</h1>
            <small class="text-muted">MF '.(isset($adultos)?$adultos:"0").'|</small> 
            <small class="text-muted">F '.(isset($adultosT)?$adultosT-$adultos:"0").'</small> 
        </div>
        </div>
        <div class="iten">
            <div class="left">
            <img src="<?=DIRIMG?>plus_+.svg" alt="">
            <h3>Activos</h3>
        </div>
        <div class="rigth">
            <h1> '.(isset($activosTotal)?$activosTotal:"0").'</h1>
            <small class="text-muted">MF'.(isset($activos)?$activos:"0").'|</small> 
            <small class="text-muted">F '.(isset($activosTotal)?$activosTotal-$activos:"0").'</small> 
        </div>
        </div>
        <div class="iten">
            <div class="left">
            <img src="<?=DIRIMG?>plus_+.svg" alt="">
            <h3>Viagem</h3>
        </div>
        <div class="rigth">
            <h1> '.(isset($viajem)?$viajem:"0").'</h1>
        </div>
        </div>
        <div class="iten">
            <div class="left">
            <img src="<?=DIRIMG?>plus_+.svg" alt="">
            <h3>Falecidos</h3>
        </div>
        <div class="rigth">
            <h1>'.(isset($falecidos)?$falecidos:"0").'</h1>
        </div>
        </div>
        <div class="iten">
            <div class="left">
            <img src="<?=DIRIMG?>plus_+.svg" alt="">
            <h3>Desistentes</h3>
        </div>
        <div class="rigth">
            <h1> '.(isset($desistentes)?$desistentes:"0").'</h1>
        </div>
        </div>
        <div class="iten">
            <div class="left">
            <img src="<?=DIRIMG?>plus_+.svg" alt="">
            <h2>TOTAL</h2>
        </div>
        <div class="rigth">
            <h1>'.(isset($totalGeral)?$totalGeral:"0").'</h1>
            <small class="text-muted">MF '.(isset($total)?$total:"0").'|</small> 
            <small class="text-muted">F '.(isset($totalGeral)?$totalGeral-$total:"0").'</small> 
        </div>
        </div>
        </div>
';

        echo $reporte;

    }
}