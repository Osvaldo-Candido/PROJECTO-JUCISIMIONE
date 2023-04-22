<div class="single-actividade">
<div class="edicao-lista">
                <a href="#"><img src="<?=DIRIMG?>export_pdf_25px.png" alt=""></a>
                    <a href="#"><img src="<?=DIRIMG?>print_25px.png" alt=""></a>
                </div>
    <div class="data-de-cadastro">
        <small class="text-muted"><?= $this->dados->dataCriacao ?></small>
    </div>
    <div class="actividade">
        <div class="cabecalho">
        <img src="<?=DIRIMG?>services_34px.png" alt=""><h2 >Tipo de actividade</h2>
        </div>
        <h3><?= $this->dados->nome?></h3>
    </div>
    <div class="actividade">
        <div class="cabecalho">
        <img src="<?=DIRIMG?>marker_27px.png" alt=""><h2>Local da actividade</h2>
        </div>
        <h3><?= $this->dados->lugar ?></h3>
    </div>
    <div class="actividade">
        <div class="cabecalho">
        <img src="<?=DIRIMG?>info_27px.png" alt=""><h2>Observação</h2>
        </div>
        <h3><?= $this->dados->observacao ?></h3>
    </div>
    <div class="actividade">
        <div class="cabecalho">
        <img src="<?=DIRIMG?>pay_date_27px.png" alt=""><h2>Data a Realizar</h2>
        </div>
        <h3><?= $this->dados->data ?></h3>
    </div>
    <div class="actividade">
        <div class="cabecalho">
        <img src="<?=DIRIMG?>time_27px.png" alt=""><h2>Duração da Actividade</h2>
        </div>
        <h3><?= $this->dados->duracao ?></h3>
    </div>
    <div class="actividade">
        <div class="cabecalho">
        <img src="<?=DIRIMG?>businessman_27px.png" alt=""><h2>Responsável</h2>
        </div>
        <h3><?= $this->dados->responsavel ?></h3>
    </div>
    <div class="actividade">
        <div class="cabecalho">
        <img src="<?=DIRIMG?>triumphal_arch_27px.png" alt=""><h2>Departamento</h2>
        </div>
        <h3><?= $this->dados->departamento ?></h3>
    </div>
</div>