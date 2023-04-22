
<div class="actividades"> 
<header class="configuracoes-actividades">
            <div class="add-plano">
            <img src="<?=DIRIMG?>joyent.svg" alt=""><span>Nova Actividade</span>
            </div>    
                <div class="edicao-lista">
                <a href="<?=DIRPAGE?>actividades\descarregarActividadePdf"><img src="<?=DIRIMG?>export_pdf_25px.png" alt=""></a>
                    <a href="<?=DIRPAGE?>actividades\imprimirActividadePdf"><img src="<?=DIRIMG?>print_25px.png" alt=""></a>
</div>
                <div class="box-procurar actividadeProcura">
                    <form id="formPesquisa">
                    <img src="<?=DIRIMG?>search.svg" alt=""><input type="text" id="procurar" name="procurar" placeholder="Procurar por...">
                </form>
                    
              </div>
            </header>
<div class="dashboard-actividades-central">

</div>      
<h2 class="lista">List' de actividades planificadas</h2>
        <div class="tabela-actividades">
        <table>
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Responsável</th>
                    <th>Objectivo</th>
                    <th>Data</th>
                    <th>Lugar</th>
                    <th>Duração</th>
                    <th>Estado</th>
                    <th>Departamento</th>
                    <th>Data Criação</th>
                    <th>Data Alteração</th>
                    <th>Admin</th>
                    <th>Ver</th>
                    <th>Acção</th>
                </tr>
        </thead>
        <tbody class="dados-tabela">

        </tbody>
        </table>
            </div>
            
        </div>
     
    <div class="caixa-informacao" id="caixa-informacao">

    <form id="formActividade" class="formActividade">
        <div class="fechar-form-actividade">
            X
        </div>
        <div class="erro-text">
         <span>Erro ao cadastrar Planos</span>
         </div>
    <div class="info">
        <input type="hidden" placeholder="Insira o nome" name="id" id="id" value="<?php if(isset($this->dados)){ echo $this->dados->idActividade; }?>">
    </div>

    <div class="info fase">
        <label for="">Dados da Actividade</label>
    </div>
    <div class="info">
        <input type="text" placeholder="Insira o nome da actividade" name="actividade" id="actividade"  value="<?php if(isset($this->dados)){ echo $this->dados->nome; }?>">
    </div>

    <div class="info">
        <input type="text" placeholder="Insira o responsável da actividade" name="responsavel" id="responsavel" value="<?php if(isset($this->dados)){ echo $this->dados->responsavel; }?>">
    </div>
    <div class="info">
        <input type="text" placeholder="Insira o objectivo da actividade" name="objectivo" id="objectivo" value="<?php if(isset($this->dados)){ echo $this->dados->objectivo; }?>">
    </div>

    <div class="info">
        <label for="">Data a realizar</label>
        <input type="date" name="data" id="data">
    </div>
    <div class="info">
        <input type="text" placeholder="Insira o local a se realizar" name="lugar" id="lugar" value="<?php if(isset($this->dados)){ echo $this->dados->lugar; }?>">
    </div>
    <div class="info">
        <input type="text" placeholder="Duração ex. Dias/Horas" name="duracao" id="duracao">
    </div>
    <div class="info">
        <label for="">Observacao</label>
        <textarea name="observacao" id="observacao" cols="30" rows="5"><?php if(isset($this->dados)){ echo $this->dados->observacao; }?></textarea>
    </div>
    <div class="info">
        <label for="">Estado</label>
        <select name="estado" id="estado">
            <option value="Planificada">Planificada</option>
            <option value="Realizadas">Realizadas</option>
            <option value="Canceladas">Canceladas</option>
            <option value="Pendente">Pendente</option>
        </select>
    </div>
    <div class="info">
        <label for="">Departamento</label>
        <select name="departamento" id="departamento">
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
<script src="<?=DIRJS?>actividades.js"></script>