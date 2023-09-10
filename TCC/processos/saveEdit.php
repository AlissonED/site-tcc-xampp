<?php
    include('./processos/conexao.php');

    $table = $_SESSION['Usuario'];

    $nome = $_POST["nome"];
    $snome = $_POST["sobrenome"];
    $cpf = $_POST["cpf"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $placa = $_POST["placa"];

    $sqlUpdate = "UPDATE $table SET nome='$nome', sobrenome='$snome', cpf='$cpf', tel='$tel', email='$email', placa='$placa' WHERE id='$id'"; 

    $result = $conn->query($sqlUpdate);

    header('Location: lista.php')



?>