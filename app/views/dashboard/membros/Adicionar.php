
    <div class="erro-text">
        
    </div>
    <form id="formMembro" method="POST" enctype="multipart/form-data">
        <div id="mensagem"></div>
    <div class="info fase">
        <label for="">Dados Pessoais</label>
    </div>
    <div class="info">
        <input type="hidden" name="id" value="<?php if(isset($this->dados)){ echo $this->dados->idMembro; } ?>" >
    </div>
    <div class="info">
        <label for="">Nome</label>
        <input type="text"  id="nome" placeholder="Insira o nome" name="nome"  >
        <span class="Erro-nome"></span>
    </div>

    <div class="info nomes">
            <div class="detalhes">
                <label for="">Pai</label>
                <input type="text" placeholder="Insira o nome da pai" name="pai" id="pai" value="<?php if(isset($this->dados)){ echo $this->dados->pai; } ?>">
            </div>
            <div class="detalhes">
                <label for="">Mãe</label>
                <input type="text" placeholder="Insira o nome do mãe" name="mae" id="mae" value="<?php if(isset($this->dados)){ echo $this->dados->mae; } ?>">
            </div>
    </div>

    <div class="info">
        <label for="">Nascimento</label>
        <input type="date" name="nascimento" id="nascimento" value="<?php if(isset($this->dados)){ echo $this->dados->nascimento; } ?>">
        <span id="Erro-nascimento"></span>
    </div>

    <div class="info nomes">
            <div class="detalhes">
            <label for="">Nacionalidade</label>
            <input type="text" placeholder="Insira a nacionalidade" name="nacionalidade" id="nacionalidade" value="<?php if(isset($this->dados)){ echo $this->dados->nacionalidade; } ?>">
            </div>
            <div class="detalhes">
            <label for="">Província</label>
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
        <label for="">Município</label>
        <input type="text" placeholder="Insira o nome" name="municipio" id="municipio" value="<?php if(isset($this->dados)){ echo $this->dados->municipio; } ?>">
        <span id="Erro-municipio"></span>
    </div>
    
    <div class="info nomes">
            <div class="detalhes">
            <label for="">Tipo de documento</label>
                    <select name="documento" id="documento">
                        <option value="Bilhete de Identidade">Bilhete de Identidade</option>
                        <option value="Passaporte">Passaporte</option>
                        <option value="Cédula">Cédula</option>
                        <option value="Não tem">Não tem</option>
                        <option value="Outro">Outro</option>
                    </select>
            </div>
            <div class="detalhes">
                    <label for="">Nº de documento</label>
                    <input type="text" placeholder="Insira o numero do documento" name="numDocumento" id="numDocumento" value="<?php if(isset($this->dados)){ echo $this->dados->numDocumento; } ?>">
            </div>
    </div>
    <div class="info nomes">
            <div class="detalhes">
            <label for="">Sexo</label>
                    <select name="sexo" id="sexo">
                        <option value="Masculino">Masculino            </option>
                        <option value="Feminino">Feminino</option>
                    </select>
            </div>
            <div class="detalhes">
            <label for="">Contacto</label>
            <input type="text" placeholder="Insira o contacto do membro p/ maior" name="contacto" id="contacto" value="<?php if(isset($this->dados)){ echo $this->dados->contacto; } ?>">
            </div>
    </div>
    <div class="info">
        <label for="">Estado</label>
        <select name="estado" id="estado">
            <option value="Activo">Activo</option>
            <option value="Discíplina">Discíplina</option>
            <option value="Desistente">Desistente</option>
            <option value="Doente">Doente</option>
            <option value="Falecido">Falecido</option>
            <option value="Viajem">Viajem</option>
        </select>
    </div>
        <div class="info">
        <label for="">Data de Baptismo</label>
        <input type="date" placeholder="Insira o nome" name="batismo" id="batismo" value="<?php if(isset($this->dados)){ echo $this->dados->batismo; } ?>">
        </div>
        <div class="info">
        <label for="">Lugar de baptismo</label>
        <input type="text" placeholder="Insira o nome" name="local" id="local" value="<?php if(isset($this->dados)){ echo $this->dados->local; } ?>">
        </div>
        <div class="info nomes">
            <div class="detalhes">
            <label for="">Cargo</label>
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
                <label for="">Função</label>
                <input type="text" placeholder="Insira a função" name="funcao" id="funcao" value="<?php if(isset($this->dados)){ echo $this->dados->funcao; } ?>">
            </div>
        </div>
        <div class="info">
        <label for="">Categoria</label>
            <select name="categoria" id="cargo">
                <option value="Administrador Geral">Administrador Geral</option>
                <option value="Secretario Juventude">Secretario Juventude</option>
                <option value="Secretario Igreja Geral">Secretario Igreja Geral</option>
                <option value="Pastor">Pastor</option>
                <option value="Tecnico">Tecnico</option>
            </select>
        </div>
        <div class="info nomes">
            <div class="detalhes">
                <label for="">Email</label>
                <input type="email" placeholder="Insira o email" name="email" value="<?php if(isset($this->dados)){ echo $this->dados->email; } ?>">
            </div>
            <div class="detalhes">
                <label for="">Senha</label>
                <input type="text" placeholder="Insira a senha" name="senha" value="<?php if(isset($this->dados)){ echo $this->dados->senha; } ?>">
            </div>
    </div>
        <div class="info ficheiro">
        <label for="">Imagem</label>
        <input type="file" name="foto">
        </div>
        <div class="info">
        <input type="submit" value="Cadastrar">
        </div>
    </form>   
</div>

<script src="<?=DIRJS?>membros.js"></script>
