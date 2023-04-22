<div class="container-imagens">
    <div class="container-search">
    <div class="search-box">
        <img src="<?=DIRIMG?>search.svg" alt="">
        <input type="text" placeholder="Procurar por ....">
    </div>
    <div class="add-imagem">
            <img src="<?=DIRIMG?>camera.svg" alt="">
        </div>
    </div>

    <div class="container-2">
        <div class="imagens">
            <!------- ESPAÇO PARA IMEGENS -------->
        </div>
        </div>
    </div>
</div>

<div class="caixa-informacao" id="caixa-informacao">

    <form  id="formFotos" class="formFotos" method="post" enctype="multipart/form-data">
    <div class="fechar-form-actividade">
            X
        </div>
    <div class="erro-text">
         <span>Erro ao cadastrar Planos</span>
    </div>
    
    <div class="info">
        <label for="">Saida</label>
        <input type="file" placeholder="Insira a saida" name="foto" id="foto">
    </div>

        <div class="info">
        <input type="submit" value="Cadastrar">
        </div>
    </form>   
</div>
<script src="<?=DIRJS?>album.js"></script>