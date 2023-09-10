<?php
  include('./processos/protect.php');
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/styles-in.css">
    <title>Inicio</title>
</head>
<body>

<div class="container-text">
    <h2>Olá <?php echo $_SESSION['Usuario'];  ?> !!! </h2>

    <p>Seja bem-vindo ao site de gerenciamento de estacionamento, </p>
    <p>o intuito desse site é tornar a gerencia e organização do seu </p>
    <p>estacionamento o mais fácil e agradével possível.</p><br><br><br>
    <p>Vamos começar ?</p><br>
</div>


<div class="container-button">

    <a href='cad_clientes.php'><button type="button" class="btn btn-danger btn-sm">Cadastrar Clientes</button></a>

    <a href='lista.php'>
    <button type="button" class="btn btn-danger btn-sm">Lista de Clientes</button></a>
  
    <a href="entrada.php">
    <button type="button" class="btn btn-danger btn-sm">Entrada / Saída de clientes</button></a>

</div>


    <p></p>
</body>
</html>