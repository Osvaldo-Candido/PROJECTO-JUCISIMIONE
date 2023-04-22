<?php 

namespace App\Controllers;
use Src\Classes\RoutesViews;
use App\Models\ModelActividade;
use App\Models\ModelEscala;
use App\Models\ModelMembro;
use App\Models\ModelFinancas;

class HomeController extends RoutesViews {

    public function index()
    {   
        $numAniversariantes = $this->buscarNumeroAniversariantes();
        $receitas = $this->dashReceitas();
        $actividades = $this->actividadesDash();
        $aniversariantes = $this->buscarAniversariantes();
        $class = new ModelEscala();
        $dados = $class->buscarEscalas();
        $report = $this->reportActividades();
        $this->renderizarViews("dashboard/DashboardView",$dados,$report,$aniversariantes, $actividades,$receitas,$numAniversariantes);
    }
    public function carregarNotificacoes()
    {
        $actividades = $this->actividadesDash();
        $numAniversariantes = $this->buscarNumeroAniversariantes();
        $receitas = $this->dashReceitas();
        $aniversariantes = $this->buscarAniversariantes();
        $notificacoes = 
        '
        <h3 class="t-aniversario">Aniversariantes</h3>
        <div class="aniversariantes-card">
            <div class="aniversariantes-edit">';
          if (isset($aniversariantes)) {
        foreach ($aniversariantes as $a) {
        $notificacoes .= '
                <div class="aniversariantes">
                    <span><img src="'.DIRIMG.'ochoa.jpg" alt=""></span>
                    <div class="det-aniv">
                        <h3>'.$a->nome.'</h3>
                        <small class="text-muted">'.$a->nascimento.'</small>
                    </div>
                </div>';
        }
        }
        $notificacoes .= '
            </div>
            <div class="notificao-aniversariantes">
                <h4>'.(isset($numAniversariantes) ? $numAniversariantes : "0").'</h4>
            </div>
            <button class="f-aniversario">Desejar Feliz Aniversário</button>
        </div>';
        $notificacoes .='
        <!-----SECÇÃO DE ACTIVIDADES QUE SE AVIZINHAM -->  
        <div class="actividades-realizar">
            <div class="cab-actividade">
                <h3>Actividades Vizinhas</h3>
            </div>
            <div class="actividades-proximas">';
        if (isset($actividades)) {
            foreach ($actividades as $a) {
                $notificacoes .= '
                    <div class="actividade">
                        <span><img src="'.DIRIMG.'pay_date_15px.png" alt=""></span>
                        <div class="det-act">
                            <h3>'.$a->nome.'</h3>
                            <small class="text-muted">'.$a->data.'</small>
                            <a href="'.DIRPAGE.'actividades\buscarActividade?id='.$a->idActividade.'">Detalhes</a>
                        </div>
                    </div>';
            }
        }
        $notificacoes .='
                    <button><a href="'.DIRPAGE.'actividades">Cron. de Actividades</a></button>
                </div>
            </div>';

        $notificacoes .= '
    <div class="ofertas-mensais">
        <h3 class="receita">Receitas da igreja</h3>
        <div class="ofertas semanal">
            <span><img src="'.DIRIMG.'chart_18px.png" alt=""></span>
            <div class="ofert">
                <h3>Ultima semana</h3>
                <h2>';
                if(isset($receitas["entrada"])) {
                    $notificacoes .= $receitas["entrada"] . "Kz";
                } else {
                    $notificacoes .= "0";
                } 
                $notificacoes .= '</h2>
                <small class="text-muted">Ano 2023</small>
            </div>
        </div>
        <div class="ofertas semanal">
            <span><img src="'.DIRIMG.'chart_18px.png" alt=""></span>
            <div class="ofert">
                <h3>Total de Entradas</h3>
                <h2>';
            if(isset($receitas["saida"])) {
                $notificacoes .= $receitas["saida"] . "Kz";
            } else {
                $notificacoes .= "0";
            } 
            $notificacoes .= '</h2>
                <small class="text-muted">Ano 2023</small>
            </div>
        </div>
        <div class="ofertas semanal">
            <span><img src="'.DIRIMG.'chart_18px.png" alt=""></span>
            <div class="ofert">
                <h3>Resto</h3>
                <h2>';
            if(isset($receitas['total'])) {
                $notificacoes .= $receitas['total'] . "Kz";
            } else {
                $notificacoes .= "0";
            }
            $notificacoes .= '</h2>
                <small class="text-muted">Ano 2023</small>
            </div>
        </div>
        <div class="inserir">
            <a class="btn-receita" href="'.DIRPAGE.'financas/viewAdicionarReceitas">
                <span><img src="'.DIRIMG.'money_bag_bitcoin_18px.png" alt=""></span>
                <div class="ofert">
                    <h3>Registar Receita</h3>
                </div>
            </a>
        </div>
    </div>';


       echo $notificacoes;
    }
    public function carregarDadosMain()
    {
        $classe = new ModelActividade();
        $Planificada =  $classe->estadoActividades('Planificada');
        $Pendente =  $classe->estadoActividades('Pendente');
        $Canceladas =  $classe->estadoActividades('Canceladas');
        $Realizada =  $classe->estadoActividades('Realizadas');
        $class = new ModelEscala();
        $dados = $class->buscarEscalas();
        $main = '
        <div class="topo-dash">
            
            <h1>Painel Administrativo</h1>
        </div>
        
        <div class="itens-dashboard">
            <!-- ACTIVIDADES PLANEJADAS -->
            <div class="act-plan iten">
                <span><img src="' . DIRIMG . 'contacts.svg" alt=""></span> 
                <div class="midles">
                    <h3>Actividades</h3>
                    <h2>' . (isset($Planificada) ? $Planificada : "0") . '</h2>
                </div>
                <small class="text-muted">Ano '.date('Y').'</small>   
            </div>
        
            <!-- ACTIVIDADES CONCLUIDAS -->
            <div class="act-exec iten">
                <span><img src="' . DIRIMG . 'contacts.svg" alt=""></span> 
                <div class="midles">
                    <h3>Realizadas</h3>
                    <h2>' . (isset($Realizada) ? $Realizada : "0") . '</h2>
                </div>
                <small class="text-muted">Ano'.date('Y').'</small>   
            </div>
        
            <!-- ACTIVIDADES NÃO CONCLUIDAS -->
            <div class="act-rest iten">
                <span><img src="' . DIRIMG . 'contacts.svg" alt=""></span> 
                <div class="midles">
                    <h3>Pendentes</h3>
                    <h2>' . (isset($Pendente) ? $Pendente : "0") . '</h2>
                </div>
                <small class="text-muted">Ano '.date('Y').'</small>   
            </div>
        </div>
        
        <!-- PROGRAMA DE ACTIVIDADES TRIMESTRAL -->
        <h2 class="escala-obreiros">Escala de Obreiros</h2>
        <div class="programa-trimestral">
            <section class="cab-table">
                <h2>Escala de Liturgistas e Pregadores</h2>
            </section>
            <section class="t-body">
                <table>
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Pregador</th>
                            <th>Liturgista</th>
                            <th>Suplente Pregador</th>
                            <th>Suplente Liturgist</th>
                        </tr>
                    </thead>
                    <tbody>';
        
        if (isset($dados)) {
            foreach($dados as $dado) {
                $main .= '<tr>
                            <td class="primary">'.$dado->data.'</td>
                            <td>'.$dado->ministro.'</td>
                            <td>'.$dado->liturgista.'</td>
                            <td>'.$dado->suplenteMinistro.'</td>
                            <td>'.$dado->suplenteLiturgista.'</td>
                          </tr>';
            }
        }
        
        $main .= '</tbody>
                </table>
            </section>
        </div>';
        
        echo $main;
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
    public function buscarAniversariantes()
    {
        $membro = new ModelMembro();
        $dados = $membro->buscarAniversariantes();
        return $dados;
    }

    public function actividadesDash()
    {
      $classe = new ModelActividade();
      $dados = $classe->buscarActividadeDashboard();
      return $dados;
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

    public function buscarNumeroAniversariantes()
    {
      $membro = new ModelMembro();
      
      return $membro->buscarNumeroDeAniversariantes();


    }
}