<div class="caixa-informacao">
    <div class="erro-text">
         <span>Erro ao cadastrar Planos</span>
    </div>
    <form method="POST" action="<?=DIRPAGE?>financas\addReceitas">
    <div class="info fase">
        <label for="">Adicionar Receitas</label>
    </div>
    <div class="info">
        <input type="hidden" placeholder="Insira o nome do ministro" name="id" value="<?php if(isset($this->dados)){ echo $this->dados->idReceita; } ?>">
    </div>
    <div class="info">
    <label for="">Tipo de Receita</label>
        <select name="tipoReceita" id="">
            <option value="Oferta">Oferta</option>
            <option value="Dízimo">Dízimo</option>
            <option value="Acção de Graça">Acção de Graça</option>
            <option value="Oferta Especial">Oferta Especial</option>
            <option value="Outro">Outro</option>
        </select>
    </div>
    <div class="info">
    <label for="">Departamento</label>
        <select name="departamento" id="">
            <option value="Igreja Geral">Igreja Geral</option>
            <option value="Sociedade de Senhoras">Sociedade de Senhoras</option>
            <option value="Juventude">Juventude</option>
            <option value="E. Bíblica Dominical">E.B.D</option>
        </select>
    </div>
    <div class="info">
        <label for="">Entrada</label>
        <input type="text" placeholder="Insira a entrada" name="entrada" value="<?php if(isset($this->dados)){ echo $this->dados->entrada; } ?>">
    </div>

    <div class="info">
        <label for="">Saida</label>
        <input type="text" placeholder="Insira a saida" name="saida" value="<?php if(isset($this->dados)){ echo $this->dados->saida; } ?>">
    </div>
    <div class="info">
        <label for="">Observação</label>
       <textarea name="observacao" id="" cols="30" rows="10"><?php if(isset($this->dados)){ echo $this->dados->observacao; } ?></textarea>
    </div>
        <div class="info">
        <input type="submit" value="Cadastrar">
        </div>
    </form>   
</div>