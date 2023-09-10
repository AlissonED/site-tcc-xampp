<?php
if(!isset($_SESSION)) {
    session_start();
}

include('./processos/conexao.php');

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/styles-login.css">
    <title>Login</title>
</head>
<body>
<div class="main-login">
    
    <div class="esquerda-login">
    <h1>Bem-Vindo ao gerenciador de estacionamentos online.</h1>
    <img src="./img/estacionamento.svg" class="img-login" alt="estacionameno">



    </div>


    
    <div class="direita-login">
        <div class="card">
        <h2 id="t1">Login</h2><br><br><br>
        <form action="index.php" method="post" onsubmit="submitForm(event)">
        <div class="container-sm">

                <div class="textfield">
                    <label for="usuario">Usuário</label>
                    <input type="text" class="form-control" name="n" placeholder="Usuário">
                </div><br><br>



                <div class="textfield">
                    <label for="senha">Senha</label>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" name="s" id="s" placeholder="Senha">
                    <button type="button" id="bt3" class="btn btn-secondary"  onclick="mostrarSenha()"><img class="img1" id="img1" src="./img/olho1.svg" ></img></button>
                    </div>
                </div><br><br>

           
                <div id="div"></div><br>
           
                <button id="bt1" type="submit" name="submit" class="btn btn-success">Login</button><br><br>
        </form>
        </div> 
        <a href='cadastro.php'><button class="btn btn-warning btn-sm" id="bt2">Cadastre-se aqui</button></a>
        
        
        
        
    </div>
</div>
<?php

if(isset($_POST['submit'])){
$nome =$_POST["n"];
$senha =$_POST["s"];

if(isset($_POST['n']) || isset($_POST['s'])){

if(strlen($_POST['n']) == 0 ){
        echo '<script>document.getElementById("div").innerHTML = "Preencha o campo usuário";</script>';
    } else if(strlen($_POST['s']) == 0 ){
        echo '<script>document.getElementById("div").innerHTML = "Preencha o campo senha";</script>';    
    } else {
        $sql = "SELECT * FROM usuarios WHERE Usuario='$nome' AND Senha='$senha'; ";
        $sql_query = $conn->query($sql) or die("Erro na execução do SQL: ". $conn->error);

        $result = $conn->query($sql);

        if($result->num_rows === 1){

            $usuario = $sql_query->fetch_assoc();


            $_SESSION['Usuario'] = $usuario['Usuario'];

            echo '<script>window.location.replace("inicio.php");</script>';
            
        } else {
            echo '<script>document.getElementById("div").innerHTML = "Verifique as informações e tente novamente, ou registre-se";</script>';
            
        }

        $nome = $conn->real_escape_string($_POST['n']);
        $senha = $conn->real_escape_string($_POST['s']);

        $conn->close();
    }

}

        
}
?>



<script src="./scripts/script.js"></script>

</body>
</html>