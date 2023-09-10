<?php 
include('./processos/conexao.php');

$nome = $_POST["nome"];
$snome = $_POST["sobrenome"];
$cpf = $_POST["cpf"];
$tel = $_POST["tel"];
$email = $_POST["email"];
$placa = $_POST["placa"];

$nomeTabela = $_SESSION['Usuario'];

$sql = "SELECT * FROM $nomeTabela WHERE cpf='$cpf';";
    $sql_query = $conn->query($sql) or die("Erro na execução do SQL: ". $conn->error);
    
    $result = $conn->query($sql);
    
    

if (!empty($nome) && !empty($snome) && !empty($cpf) && !empty($tel) && !empty($placa)) {
  if ($result->num_rows === 0){
    $insertSql = "INSERT INTO {$_SESSION['Usuario']} (nome, sobrenome, cpf, tel, email, placa)
    VALUES ('$nome', '$snome', '$cpf', '$tel', '$email', '$placa')";
    
    if (mysqli_query($conn, $insertSql)) {
      echo '<script>document.getElementById("resp").innerHTML = "Cliente cadastrado com êxito";</script>'; 
    } else {
      echo "Erro ao inserir dados: " . mysqli_error($conn);
    }
  
  
  }else{
      echo '<script>document.getElementById("resp").innerHTML = "Já existe um cadastro para esse cpf";</script>'; 
    }
  } else {
    echo '<script>document.getElementById("resp").innerHTML = "Por favor preencha todos os campos obrigátorios";</script>'; 
  }


?>