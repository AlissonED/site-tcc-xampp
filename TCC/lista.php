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
    <link rel="stylesheet" href="./styles/style-CadLista.css">
    <title>Document</title>
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
<div class="lista m-5">
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
        <th scope="col">Nome</th>
        <th scope="col">Sobrenome</th>
        <th scope="col">CPF</th>
        <th scope="col">Telefone</th>
        <th scope="col">Email</th>
        <th scope="col">Placa do veiculo</th>
        <th scope="col">...</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $table = $_SESSION['Usuario'];

;
        if(!empty($_GET['search']))
        {
            $data = $_GET['search'];
            $sql = "SELECT * FROM $table WHERE nome LIKE '%$data%' or cpf LIKE '%$data%' or email LIKE '%$data%' or placa LIKE '%$data%' ORDER BY id ASC";
        }
        else
        {
          $sql = "SELECT id, nome, sobrenome, cpf, tel, email, placa FROM $table ORDER BY id ASC";
        }
        $result = $conn->query($sql);
      
        while ($user_data = mysqli_fetch_assoc($result) ) {
          echo "<tr>";
          echo "<td>".$user_data['nome']."</td>";
          echo "<td>".$user_data['sobrenome']."</td>";
          echo "<td>".$user_data['cpf']."</td>";
          echo "<td>".$user_data['tel']."</td>";
          echo "<td>".$user_data['email']."</td>";
          echo "<td>".$user_data['placa']."</td>";
          echo "<td>
            <a class='btn btn-sm btn-outline-primary' href='edit.php?id=$user_data[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
          </svg></a>
            <a class='btn btn-sm btn-outline-danger' href='./processos/delete.php?id=$user_data[id]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
            <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
          </svg></a></td>";
        }
      ?>
    </tbody>
  </table>
</div>  

<script src="./scripts/script_lista.js"></script>
</body>
</html>