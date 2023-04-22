<div class="caixa-informacao">
    <div class="erro-text">
         <span>Erro ao cadastrar Planos</span>
    </div>
    <form method="POST" action="<?=DIRPAGE?>actividades\inserirActividade">
    <div class="info">
        <input type="hidden" placeholder="Insira o nome" name="id" value="<?php if(isset($this->dados)){ echo $this->dados->idActividade; }?>">
    </div>

    <div class="info fase">
        <label for="">Dados da Actividade</label>
    </div>
    <div class="info">
        <label for="">Nome da Actividade</label>
        <input type="text" placeholder="Insira o nome" name="actividade"  value="<?php if(isset($this->dados)){ echo $this->dados->nome; }?>">
    </div>

    <div class="info">
        <label for="">Responsável</label>
        <input type="text" placeholder="Insira o nome" name="responsavel" value="<?php if(isset($this->dados)){ echo $this->dados->responsavel; }?>">
    </div>
    <div class="info">
        <label for="">Objectivo</label>
        <input type="text" placeholder="Insira o nome" name="objectivo" value="<?php if(isset($this->dados)){ echo $this->dados->objectivo; }?>">
    </div>

    <div class="info">
        <label for="">Data a realizar</label>
        <input type="date" placeholder="Insira o nome" name="data" value="<?php if(isset($this->dados)){ echo $this->dados->data; }?>">
    </div>
    <div class="info">
        <label for="">Lugar</label>
        <input type="text" placeholder="Insira o nome" name="lugar" value="<?php if(isset($this->dados)){ echo $this->dados->lugar; }?>">
    </div>
    <div class="info">
        <label for="">Duração</label>
        <input type="text" name="duracao" value="<?php if(isset($this->dados)){ echo $this->dados->duracao; }?>">
    </div>
    <div class="info">
        <label for="">Observacao</label>
        <textarea name="observacao" id="" cols="30" rows="5"><?php if(isset($this->dados)){ echo $this->dados->observacao; }?></textarea>
    </div>
    <div class="info">
        <label for="">Estado</label>
        <select name="estado" id="">
            <option value="Planificada">Planificada</option>
            <option value="Realizadas">Realizadas</option>
            <option value="Canceladas">Canceladas</option>
            <option value="Pendente">Pendente</option>
        </select>
    </div>
    <div class="info">
        <label for="">Departamento</label>
        <select name="departamento" id="">
            <option value="Igreja Geral">Igreja Geral</option>
            <option value="Socidade de Senhoras">Socidade de Senhoras</option>
            <option value="Juventude">Juventude</option>
            <option value=">Esc. Bíblica Dominical">Esc. Bíblica Dominical</option>
        </select>
    </div>
        <div class="info">
        <input type="submit" value="Cadastrar">
        </div>
    </form>   
</div>