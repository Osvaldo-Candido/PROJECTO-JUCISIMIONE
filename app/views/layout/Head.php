<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=DIRPAGE?>public/css/style.css">
    <link rel="stylesheet" href="<?=DIRPAGE?>public/css/stylePlanificao.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="<?=DIRJS?>jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>
<body>
        <header class="estrutura-menu">
            <div class="menu">
                <div class="logo">
                    <h1>JUC<span class="warning">IEIA</span></h1>
                   <button id="abrir-menu" class="abrir-menu"><img src="<?=DIRIMG?>menu_27px.png" alt=""></button> 
                </div>
                <div class="perfil-usuario">
                        <div class="detalhes">
                            <p>Bem-vindo,<b><?php if(isset($_SESSION['nome'])){ 
                                echo $_SESSION['nome'];
                             } ?></b></p>
                            <small class="text-muted">Admin</small>
                        </div>
                        <span><img src="<?=DIRIMG?>ochoa.jpg" alt=""></span>
                </div>  
            </div>
        </header>