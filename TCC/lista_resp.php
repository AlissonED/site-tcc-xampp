<?php
  include('./processos/protect.php');
  include('./processos/conexao.php');
  include('./processos/pesquisa.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style-cadListaResp.css">
    <title>Cadastro de clientes</title>
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
<div class="lista m-5" id="cu">
  <h2>Lista de clientes</h2>
  <table class="table table-bg">

  <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesq">
        <button id="bt1" onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>





    <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Detalhes</th>
            </tr>
        </thead>

    <tbody>
      <?php
        $table = $_SESSION['Usuario'];
        if(!empty($_GET['search']))
        {
            $data = $_GET['search'];
            $sql = "SELECT * FROM $table WHERE nome LIKE '%$data%' or cpf LIKE '%$data%' or email LIKE '%$data%' or placa LIKE '%$data%' or sobrenome LIKE '%$data%' or tel LIKE '%$data%' ORDER BY id ASC";
        }
        else
        {
          $sql = "SELECT id, nome, sobrenome, cpf, tel, email, placa FROM $table ORDER BY id ASC";
        }
        $result = $conn->query($sql);
      
        while ($user_data = mysqli_fetch_assoc($result) ) {
          echo "<tr>";
          echo "<td>".$user_data['nome']."</td>";
          echo "<td>".$user_data['cpf']."</td>";
          echo "<td class='detalhes'>";
          echo "<button class='hamburguer'>&#9776;</button>";
          echo "<div class='info'>";
          echo "<p>Sobrenome : ".$user_data['sobrenome']."</p>";
          echo "<p>Telefone : ".$user_data['tel']."</p>";
          echo "<p>Email : ".$user_data['email']."</p>";
          echo "<p>Placa : ".$user_data['placa']."</p>";
          echo "</div>";
          echo "</td>";
          echo "</tr>";
        }
      ?>

    </tbody>
  </table>
        
</div>  
<script>// Seleciona todos os botões de hamburguer
        var hamburguers = document.querySelectorAll(".hamburguer");
        
        // Adiciona um ouvinte de eventos de clique a cada botão de hamburguer
        hamburguers.forEach(function (hamburguer) {
            hamburguer.addEventListener("click", function () {
                // Alterna a classe "active" para exibir/ocultar os detalhes
                this.parentElement.classList.toggle("active");
            });
        });
        </script>
<script>
function searchData()
{

        var pesq = document.getElementById('pesq');
        window.location = 'lista_resp.php?search='+pesq.value;

}

function obterLarguraDaTela() {
  var larguraDaJanela = window.innerWidth;

    var larguraDaJanela = window.innerWidth;

    if (larguraDaJanela > 600 ) {
      window.location = 'lista.php';

    }

}

document.addEventListener("DOMContentLoaded", obterLarguraDaTela);

window.addEventListener("resize", obterLarguraDaTela);



</script>
</body>
</html>