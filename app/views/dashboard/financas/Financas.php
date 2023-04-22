<div class="registo-financeiro">
<div class="configuracoes-planos">
            <div class="add-plano-fin">
                Registar Receita
            </div>    
                <div class="edicao-lista">
                    <a href="<?=DIRPAGE?>financas\descarregarReceitasPdf"><img src="<?=DIRIMG?>export_pdf_25px.png" alt=""></a>
                    <a href="<?=DIRPAGE?>financas\carregarReceitasPdf"><img src="<?=DIRIMG?>print_25px.png" alt=""></a>
                </div>
                <div class="campo-pesquisa">
                    <form id="pesquisarData">
                        <div class="pesqu">
                            <input type="date" id="data-inicial">
                            <input type="date" id="data-final">
                            <input type="submit" value="Pesquisar/Data">
                        </div>
                    </form>
                </div>
</div>
    <header class="financa-cabecalho">
    </header>

    <div class="tabela-financas">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de Receita</th>
                    <th>Entrada</th>
                    <th>Saida</th>
                    <th>Total</th>
                    <th>Departamento</th>
                    <th>Data de Criação</th>
                    <th>Data de Edição</th>
                    <th>Registador </th>
                    <th>Acções </th>
                </tr>
            </thead>
            <tbody class="dados-financas">
                
            </tbody>
        </table>
    </div>
</div>
<div class="caixa-informacao" id="caixa-informacao">

    <form id="formFinancas" class="formFinancas">
    <div class="fechar-form-actividade">
            X
        </div>
    <div class="erro-text">
         <span>Erro ao cadastrar Planos</span>
    </div>
    <div class="info fase">
        <label for="">Adicionar Receitas</label>
    </div>
    <div class="info">
        <input type="hidden" placeholder="Insira o nome do ministro" name="id" id="id">
    </div>
    <div class="info">
    <label for="">Tipo de Receita</label>
        <select name="tipoReceita" id="tipoReceita">
            <option value="Oferta">Oferta</option>
            <option value="Dízimo">Dízimo</option>
            <option value="Acção de Graça">Acção de Graça</option>
            <option value="Oferta Especial">Oferta Especial</option>
            <option value="Outro">Outro</option>
        </select>
    </div>
    <div class="info">
    <label for="">Departamento</label>
        <select name="departamento" id="departamento">
            <option value="Igreja Geral">Igreja Geral</option>
            <option value="Sociedade de Senhoras">Sociedade de Senhoras</option>
            <option value="Juventude">Juventude</option>
            <option value="E. Bíblica Dominical">E.B.D</option>
        </select>
    </div>
    <div class="info">
        <label for="">Entrada</label>
        <input type="text" placeholder="Insira a entrada" name="entrada" id="entrada">
    </div>

    <div class="info">
        <label for="">Saida</label>
        <input type="text" placeholder="Insira a saida" name="saida" id="saida">
    </div>
    <div class="info">
        <label for="">Observação</label>
       <textarea name="observacao" id="observacao" cols="30" rows="10"></textarea>
    </div>
        <div class="info">
        <input type="submit" value="Cadastrar">
        </div>
    </form>   
</div>
<script src="<?=DIRJS?>financas.js"></script>