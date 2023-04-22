<div class="perfil-membro">
    <div class="dados-pessoais">
        <ul>
            <li class="imagem-perfil"><img src="<?=DIRIMG?>" alt=""></li>
            <li><?php if(isset($this->dados)) { echo $this->dados->nome; } ?></li>
            <li><?php if(isset($this->dados)) { echo $this->dados->nascimento; } ?></li>
            <li>Pai</li>
            <li><?php if(isset($this->dados)) { echo $this->dados->pai; } ?></li>
            <li>Mãe</li>
            <li><?php if(isset($this->dados)) { echo $this->dados->mae; } ?></li>
            <li>Nacionalidade</li>
            <li><?php if(isset($this->dados)) { echo $this->dados->nacionalidade; } ?></li>
            <li>Nº de identificação</li>
            <li><?php if(isset($this->dados)) { echo $this->dados->numDocumento; } ?></li>
            <li><?php if(isset($this->dados)) { echo $this->dados->estado; } ?></li>
            <li>Formação Acádémica</li>
            <li><?php if(isset($this->dados)) { echo $this->dados->formacao; } ?></li>
        </ul>
    </div>
    <div class="historial">
        <h6>HISTORIAL OU BIOGRAFIA DE MEMBRO</h6>
        <p>
        <?php if(isset($this->dados)) { echo $this->dados->biografia; } ?>
        </p>
    </div>
</div>