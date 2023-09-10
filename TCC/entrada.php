<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/styles-Entrada.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada</title>
</head>
<body>
<nav>
  <div class="header-container">
    <ul class="menu">
      <li><a class="nav-link" href="cad_clientes.php">Cadastro de clientes</a>
      </li>
      <li><a class="nav-link" href="lista.php">Lista de clientes</a>
      </li>
      <li><a class="nav-link" href="entrada.php">Entrada / Saída</a>
      </li>
    </ul>
 
    <ul class="logout">
      <li class="li-logout"><a class="nav-link" id="logout" href="logout.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>

<div class="form-container">

<h1 class="title">Entrada e saída de clientes</h1>

<form method="post">
    <input type="text" name="placa" placeholder="Placa do veículo">

    <div id="resp"></div>
    
    <button type="submit" name="entrada" class="btn-succes">Entrada</button>
    <button type="submit" name="saida" class="btn-saida">Saída</button>
   
</form>

</div>
<?php
include('./processos/registrar.php')
?>





</body>
</html>
