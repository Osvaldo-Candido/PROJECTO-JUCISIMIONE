<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=DIRCSS?>style.css">
    <link rel="stylesheet" href="<?=DIRCSS?>perfilUsuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
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
              <li class="home"><a href="<?=DIRPAGE?>login\index">Home</a></li>
              <li><a href="#">Sobre</a></li>
              <li><a href="#">Contactos</a></li>
              <li><a href="#">Planificação</a></li>
              <li><a href="#">Escala</a></li>
              <li class="login"><a href="<?=DIRPAGE?>login\viewLogin"> <span>Login</span> <i class="fa-solid fa-user" style="color: #fcfcfc;"></i></a></li>
              <li class="login"><a href="<?=DIRPAGE?>login\viewLogin"> <span>Cadastrar-se</span> <i class="fa-solid fa-user" style="color: #fcfcfc;"></i></a></li>
            </ul>
        </nav>
     </header>