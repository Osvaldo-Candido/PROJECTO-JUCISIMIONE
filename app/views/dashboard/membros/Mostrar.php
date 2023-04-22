<!---------- TABELA DE MEMBROS DA IGREJA EM GERAL -------->
<div class="tabela-membros">
            <div class="configuracoes-membros">
            <div class="add-membro">
                    <img src="<?=DIRIMG?>joyent.svg" alt=""><span> Novo Membro</span>
             </div>    
              <div class="box-procurar">
                <form id="formPesquisa">
                <img src="<?=DIRIMG?>search.svg" alt=""><input type="text" id="procurar" name="procurar" placeholder="Procurar por...">
                </form>
                    
              </div>
                <div class="edicao-lista">
                    <a href="<?=DIRPAGE?>user\carregarPdf"><img src="<?=DIRIMG?>export_pdf_25px.png" alt=""></a>
                    <a href="<?=DIRPAGE?>user\imprimirPdf"><img src="<?=DIRIMG?>print_25px.png" alt=""></a>
                </div>
                <div class="impressao-fase">
                     <a class="btn-listar criancas" href="<?=DIRPAGE?>user\carregarPdfEBD"><img  src="<?=DIRIMG?>export_pdf_25px.png" alt=""><span> Listar Crianças</span></a>
                     <a class="btn-listar criancas" href="<?=DIRPAGE?>user\carregarPdfJOVENS"><img src="<?=DIRIMG?>export_pdf_25px.png" alt=""><span> Listar Jovens</span></a>
                     <a class="btn-listar criancas" href="<?=DIRPAGE?>user\carregarPDFADULTOS"><img  src="<?=DIRIMG?>export_pdf_25px.png" alt=""><span> Listar Adultos</span></a>
                </div>
            </div>
        <div class="lista-membros" id="apresentar-membros">
        <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Nascimento</th>
            <th>Província</th>
            <th>Estado</th>
            <th>Cargo</th>
            <th>Função</th>
            <th>Categoria</th>
            <th>Contacto</th>
            <th>Perfil</th>
            <th>Acções</th>
        </tr>
    </thead> 
                <tbody class='membros-cadastrados'>
<!-----ESTA DIV RECEBE OS DADOS APARTIR DO FICHEIRO JS MEMBROS----->                
                </tbody>
            </table>
            </div>
</div>
<!-------- AQUI TEMOS O FORMALÁRIO PARA CADASTRO EM FORMA MODAL --------->
<div class="caixa-informacao" id="caixa-informacao">

    <form class="formMembro" id="formMembro" enctype="multipart/form-data">
    <div class="botao-fechar">
           <h2>X</h2>
    </div> 
    <div class="erro-text">
    </div>
    <div class="cadastro-membro">  
    <div id="mensagem"></div>
    <div class="info">
        <input type="hidden" id="idMembro" name="idMembro" value="<?php if(isset($this->dados)){ echo $this->dados->idMembro; } ?>" >
    </div>
    <div class="info">
        <input type="hidden" id="id_unico" name="id_unico" value="<?php if(isset($this->dados)){ echo $this->dados->idMembro; } ?>" >
    </div>
    <div class="info">
        <input type="text" id="nome" name="nome" placeholder="Insira o nome" >
        <span class="Erro-nome"></span>
    </div>

    <div class="info nomes">
            <div class="detalhes">
                <input type="text" id="pai" placeholder="Insira o nome da pai" name="pai" id="pai" value="<?php if(isset($this->dados)){ echo $this->dados->pai; } ?>">
            </div>
            <div class="detalhes">
                <input type="text" id="mae" placeholder="Insira o nome do mãe" name="mae" id="mae" value="<?php if(isset($this->dados)){ echo $this->dados->mae; } ?>">
            </div>
    </div>

    <div class="info">
        <label for="">Nascimento</label>
        <input type="date" id="nascimento" name="nascimento" id="nascimento" value="<?php if(isset($this->dados)){ echo $this->dados->nascimento; } ?>">
        <span id="Erro-nascimento"></span>
    </div>

    <div class="info nomes">
            <div class="detalhes">
            <input type="text" id="nacionalidade" placeholder="Insira a nacionalidade" name="nacionalidade" id="nacionalidade" value="<?php if(isset($this->dados)){ echo $this->dados->nacionalidade; } ?>">
            </div>
            <div class="detalhes">
            <select name="provincia" id="provincia">
            <option value="Luanda">Luanda</option>
            <option value="Benguela">Benguela</option>
            <option value="Namibe">Namibe</option>
            <option value="Lunda Norte">Lunda Norte</option>
            <option value="Lunda Su">Lunda Sul</option>
            <option value="Zaire">Zaire</option>
            <option value="Bengo">Bengo</option>
            <option value="Cuanza Sul">Cuanza Sul</option>
            <option value="Cuanza Norte">Cuanza Norte</option>
            <option value="Uíge">Uíge</option>
            <option value="Bié">Bié</option>
            <option value="Cuando Cubango">Cuando Cubango</option>
            <option value="Moxico">Moxico</option>
            <option value="Malanje">Malanje</option>
            <option value="Cunene">Cunene</option>
            <option value="Huambo">Huambo</option>
            <option value="Huíla">Huíla</option>
            <option value="Cabinda">Cabinda</option>
            </select>
            </div>
    </div>

    <div class="info">
        <input type="text" id="municipio" placeholder="Insira o município que nasceste" name="municipio" id="municipio" value="<?php if(isset($this->dados)){ echo $this->dados->municipio; } ?>">
        <span id="Erro-municipio"></span>
    </div>
    
    <div class="info nomes">
            <div class="detalhes">
                    <select name="documento" id="documento" aria-placeholder="Província">
                        <option value="Bilhete de Identidade">Bilhete de Identidade</option>
                        <option value="Passaporte">Passaporte</option>
                        <option value="Cédula">Cédula</option>
                        <option value="Não tem">Não tem</option>
                        <option value="Outro">Outro</option>
                    </select>
            </div>
            <div class="detalhes">
                    <input type="text" id="numDocumento" placeholder="Insira o numero do documento" name="numDocumento" id="numDocumento" value="<?php if(isset($this->dados)){ echo $this->dados->numDocumento; } ?>">
            </div>
    </div>
    <div class="info nomes">
            <div class="detalhes">
                    <select name="sexo" id="sexo">
                        <option value="Masculino">Masculino            </option>
                        <option value="Feminino">Feminino</option>
                    </select>
            </div>
            <div class="detalhes">

            <input type="text" id="contacto" placeholder="Insira o contacto do membro p/ maior" name="contacto" id="contacto" value="<?php if(isset($this->dados)){ echo $this->dados->contacto; } ?>">
            </div>
    </div>
    <div class="info">
        <input type="text" id="formacao" name="formacao" placeholder="Nível e formação acadêmica">
        <span id="Erro-nascimento"></span>
    </div>

    <div class="info">
            <div class="detalhes">
            <select name="estado" id="estado">
            <option value="Activo">Activo</option>
            <option value="Discíplina">Discíplina</option>
            <option value="Desistente">Desistente</option>
            <option value="Doente">Doente</option>
            <option value="Falecido">Falecido</option>
            <option value="Viajem">Viajem</option>
            <option value="Outro">Outro</option>
            </select>
            </div>
    </div>
        <div class="info">
        <label for="">Data de Baptismo</label>
        <input type="date" name="batismo" id="batismo" value="<?php if(isset($this->dados)){ echo $this->dados->batismo; } ?>">
        </div>
        <div class="info">
        <input type="text" placeholder="Igreja onde foi baptizado" name="local" id="local" value="<?php if(isset($this->dados)){ echo $this->dados->local; } ?>">
        </div>
        <div class="info nomes">
            <div class="detalhes">
            <select name="cargo" id="cargo">
                <option value="Membro">Membro</option>
                <option value="Obreiro">Obreiro</option>
                <option value="Pastor">Pastor</option>
                <option value="Diácono">Diácono</option>
                <option value="Zelador">Zelador</option>
                <option value="Evangelista">Evangelista</option>
                <option value="Intercessor">Intercessor</option>
                <option value="Outro">Outro</option>
            </select>
            </div>
            <div class="detalhes">
                <input type="text" placeholder="Insira a função" name="funcao" id="funcao" value="<?php if(isset($this->dados)){ echo $this->dados->funcao; } ?>">
            </div>
        </div>
        <div class="info">
            <select name="categoria" id="categoria">
                <option value="Nenhum">Nenhum</option>
                <option value="Administrador Geral">Administrador Geral</option>
                <option value="Secretario Juventude">Secretario Juventude</option>
                <option value="Secretario Igreja Geral">Secretario Igreja Geral</option>
                <option value="Pastor">Pastor</option>
                <option value="Tecnico">Tecnico</option>
            </select>
        </div>
        <div class="info nomes">
            <div class="detalhes">
                <input id="email" type="email" placeholder="Insira o email" name="email" value="<?php if(isset($this->dados)){ echo $this->dados->email; } ?>">
            </div>
            <div class="detalhes">
                <input id="senha" type="text" placeholder="Insira a senha" name="senha" value="<?php if(isset($this->dados)){ echo $this->dados->senha; } ?>">
            </div>
    </div>
    <div class="info">
        <label for="">Biografia</label>
       <textarea name="biografia" id="biografia" cols="30" rows="10"></textarea>
        </div>
        <div class="info">
        <input type="submit" value="Cadastrar">
        </div>
    </div>
    </form>   
</div>

<script src="<?=DIRJS?>membros.js"></script>