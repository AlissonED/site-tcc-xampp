<?php 
include('./processos/conexao.php');

$nome =$_POST["n"];
$nome2 = $nome . "Hora";
$senha =$_POST["s"];
$email=$_POST["e"];

if(isset($_POST['n']) || isset($_POST['s']) || isset($_POST['e'])){

  if(strlen($_POST['e']) == 0 ){
      echo '<script>document.getElementById("div").innerHTML = "Preencha o campo email";</script>';    
  } else if(strlen($_POST['n']) == 0 ){
      echo '<script>document.getElementById("div").innerHTML = "Preencha o campo usuário";</script>';
  } else if(strlen($_POST['s']) == 0 ){
      echo '<script>document.getElementById("div").innerHTML = "Preencha o campo senha";</script>';    
  }  else {
    $sql = "SELECT * FROM usuarios WHERE Usuario='$nome';";
    $sql_query = $conn->query($sql) or die("Erro na execução do SQL: ". $conn->error);
    
    $result = $conn->query($sql);
    
    if($result->num_rows === 1){
      echo '<script>document.getElementById("div1").innerHTML = "Usuario ja existente, por favor selecione outro nome de usuário";</script>';
    } else {
    
        $insertSql = "INSERT INTO usuarios (Usuario, Senha, Email)
        VALUES ('$nome', '$senha', '$email')";

        $createTableSql = "CREATE TABLE $nome (
          id int(6) AUTO_INCREMENT PRIMARY KEY,
          nome varchar(30) NOT NULL,
          sobrenome varchar(30),
          cpf int(30) NOT NULL,
          tel int(30) NOT NULL,
          email varchar(50),
          placa varchar(20) NOT NULL
          )";

        $createTableSql2 = "CREATE TABLE $nome2 (
        id INT AUTO_INCREMENT PRIMARY KEY,
        placa VARCHAR(10),
        hora_entrada DATETIME,
        hora_saida DATETIME
          )";

        if ($conn->query($insertSql) === TRUE) {
          if ($conn->query($createTableSql) === TRUE) {
            if ($conn->query($createTableSql2) === TRUE){
              echo '<script>window.location.replace("login.php");</script>';
            }else {
              echo "Error creating table 2: " . $conn->error;
            }
          } else {
            echo "Error creating table: " . $conn->error;
          }
        } else {
          echo "Error inserting record: " . $conn->error;
        }


        $nome = $conn->real_escape_string($_POST['n']);
        $senha = $conn->real_escape_string($_POST['s']);
        
        $conn->close();
      }
    }
  
  }



?>
<script src="./scripts/script.js"></script>