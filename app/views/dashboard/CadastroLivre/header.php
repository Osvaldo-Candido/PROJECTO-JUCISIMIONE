<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=DIRCSS?>style.css">
    <link rel="stylesheet" href="<?=DIRCSS?>stylePlanificao.css">
    <link rel="stylesheet" href="<?=DIRCSS?>perfilUsuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="<?=DIRJS?>jquery.js"></script>
    <title>Document</title>
</head>
<body>

     <div class="container-home">
        <header  class="cabecalho">
        <div class="logo">
            <h1>JC<span>S</span></h1>
        </div>
        <nav class="menu">
            <ul>
              <li class="home"><a href="<?=DIRPAGE?>login\index">Perfil</a></li>
              <li><a href="<?=DIRPAGE?>membro\escala">Escala</a></li>
              <li><a href="<?=DIRPAGE?>membro\actividade">Actividades</a></li>
              <li><a href="#">Agenda Telefónica</a></li>
              <li class="login"><a href="<?=DIRPAGE?>membro\terminarSessao"> <span>Sair</span> <i class="fa-solid fa-user" style="color: #fcfcfc;"></i></a></li>
              <li class="perfil-user"> 
                <div class="esquerda">
                <span >Membro</span>
                <h4>Cândido Isaac</h4>
                </div>
                <div class="direita">
                <img src="<?=DIRIMG?>51025_ergdgdfgdf.jpg" alt="">
                </div>
              </li>
            </ul>
        </nav>
     </header>