<div class="caixa-informacao">
    <div class="erro-text">
         <span>Erro ao cadastrar Planos</span>
    </div>
    <form method="POST" action="<?=DIRPAGE?>planos\addEscala">
    <div class="info fase">
        <label for="">Dados do Culto</label>
    </div>
    <div class="info">
        <input type="hidden" placeholder="Insira o nome do ministro" name="id" value="<?php if(isset($this->dados)){ echo $this->dados->idEscala; } ?>">
    </div>
    <div class="info">
        <label for="">Nome do Ministro</label>
        <input type="text" placeholder="Insira o nome do ministro" name="ministro" value="<?php if(isset($this->dados)){ echo $this->dados->ministro; } ?>">
    </div>

    <div class="info">
        <label for="">Nome do Liturgista</label>
        <input type="text" placeholder="Insira o nome liturgista" name="liturgista" value="<?php if(isset($this->dados)){ echo $this->dados->liturgista; } ?>">
    </div>
    <div class="info">
        <label for="">Suplente do Liturgista</label>
        <input type="text" placeholder="Insira o nome" name="suplenteMinistro" value="<?php if(isset($this->dados)){ echo $this->dados->suplenteMinistro; } ?>">
    </div>

    <div class="info">
        <label for="">Suplente do Pregador</label>
        <input type="text" placeholder="Insira o nome" name="suplenteLiturgista" value="<?php if(isset($this->dados)){ echo $this->dados->suplenteLiturgista; } ?>">
    </div>
    <div class="info">
    <label for="">Tipo de culto</label>
        <select name="tipoACtividade" id="">
            <option value="Pregação">Pregação</option>
            <option value="Estudo">Estudo</option>
            <option value="Palestra">Palestra</option>
            <option value="Acção e graça">Acção e graça</option>
        </select>
    </div>
    <div class="info">
    <label for="">Departamente</label>
        <select name="departamento" id="">
            <option value="Igreja Geral">Igreja Geral</option>
            <option value="Sociedade">Sociedade</option>
            <option value="Juventude">Juventude</option>
        </select>
    </div>
    <div class="info">
        <label for="">Texto Bíblico</label>
        <input type="text" placeholder="Insira o nome" name="textoBiblico" value="<?php if(isset($this->dados)){ echo $this->dados->textoBiblico; } ?>">
    </div>
    <div class="info">
        <label for="">Data</label>
        <input type="date" name="data"  value="<?php if(isset($this->dados)){ echo $this->dados->data; } ?>">
    </div>
    <div class="info">
        <label for="">Observacao</label>
        <textarea name="observacao" id="" cols="30" rows="5"> <?php if(isset($this->dados)){ echo $this->dados->observacao; } ?></textarea>
    </div>

        <div class="info">
        <input type="submit" value="Cadastrar">
        </div>
    </form>   
</div>