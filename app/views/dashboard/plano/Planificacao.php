<div class="tabela-planificao">
            <header class="configuracoes-planos">
            <div class="add-plano">
            <img src="<?=DIRIMG?>joyent.svg" alt=""><span> Nova Escala</span>
            </div>    
                <div class="edicao-lista">
                    <a href="<?=DIRPAGE?>planos\descarregarEscalaPdf"><img src="<?=DIRIMG?>export_pdf_25px.png" alt=""></a>
                    <a href="<?=DIRPAGE?>planos\imprimirEscalaPdf"><img src="<?=DIRIMG?>print_25px.png" alt=""></a>
                </div>
                <div class="campo-pesquisa">
                    <form id="pesquisarData">
                        <div class="pesqu">
                            <input type="date" id="data-inicial" name="data-inicial">
                            <input type="date" id="data-final" name="data-final">
                            <input type="submit" value="Pesquisar/Data">
                        </div>
                    </form>
                </div>
            </header>
            <div class="tabela-escala">
            <table>
                <thead>
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
                        <th>Data Criação</th>
                        <th>Data Edição</th>
                        <th>Admin</th>
                        <th>Acções</th>
                    </tr>
                </thead>
                <tbody class="dados-escala">
           
                </tbody>
            </table>         
            </div>  
</div>
<div class="caixa-informacao" id="caixa-informacao">

    <form id="formPlano" class="formPlano">
        <div class="fechar-form-actividade">
            X
        </div>
    <div class="erro-text">
         <span>Erro ao cadastrar Planos</span>
    </div>
    <div class="info fase">
        <label for="">Dados do Culto</label>
    </div>
    <div class="info">
        <input type="hidden" placeholder="Insira o nome do ministro" name="id" id="id" value="<?php if(isset($this->dados)){ echo $this->dados->idEscala; } ?>">
    </div>
    <div class="info">
        <input type="text" placeholder="Insira o nome do ministro" name="ministro" id="ministro" value="<?php if(isset($this->dados)){ echo $this->dados->ministro; } ?>">
    </div>

    <div class="info">
        <input type="text" placeholder="Insira o nome liturgista" name="liturgista" id="liturgista" value="<?php if(isset($this->dados)){ echo $this->dados->liturgista; } ?>">
    </div>
    <div class="info">
        <label for="">Suplente do Liturgista</label>
        <input type="text" placeholder="Suplente do Ministro" name="suplenteMinistro" id="suplenteMinistro" value="<?php if(isset($this->dados)){ echo $this->dados->suplenteMinistro; } ?>">
    </div>

    <div class="info">
        <label for="">Suplente do Pregador</label>
        <input type="text" placeholder="Suplente do Liturgista" name="suplenteLiturgista" id="suplenteLiturgista" value="<?php if(isset($this->dados)){ echo $this->dados->suplenteLiturgista; } ?>">
    </div>
    <div class="info">
    <label for="">Tipo de culto</label>
        <select name="tipoACtividade" id="tipoACtividade">
            <option value="Pregação">Pregação</option>
            <option value="Estudo">Estudo</option>
            <option value="Palestra">Palestra</option>
            <option value="Acção e graça">Acção e graça</option>
        </select>
    </div>
    <div class="info">
    <label for="">Departamente</label>
        <select name="departamento" id="departamento">
            <option value="Igreja Geral">Igreja Geral</option>
            <option value="Sociedade">Sociedade</option>
            <option value="Juventude">Juventude</option>
        </select>
    </div>
    <div class="info">
        <label for="">Texto Bíblico</label>
        <input type="text" placeholder="Insira o texto Bínlico" name="textoBiblico" id="textoBiblico" value="<?php if(isset($this->dados)){ echo $this->dados->textoBiblico; } ?>">
    </div>
    <div class="info">
        <label for="">Data</label>
        <input type="date" name="data" id="data" value="<?php if(isset($this->dados)){ echo $this->dados->data; } ?>">
    </div>
    <div class="info">
        <label for="">Observacao</label>
        <textarea name="observacao" id="observacao" cols="30" rows="5"> <?php if(isset($this->dados)){ echo $this->dados->observacao; } ?></textarea>
    </div>

        <div class="info">
        <input type="submit" value="Cadastrar">
        </div>
    </form>   
</div>
<script src="<?=DIRJS?>escala.js"></script>