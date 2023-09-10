<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['entrada'])) {
        registrarEntrada();
    } elseif (isset($_POST['saida'])) {
        registrarSaida();
    }
}






function registrarEntrada() {
    include('conexao.php');
    include('protect.php');

    $placa = mysqli_real_escape_string($conn, $_POST['placa']);
    $user = $_SESSION['Usuario'];
    $table = $user . "Hora";

    $selectp = "SELECT placa FROM $user WHERE placa = '$placa'";
     $result0 = $conn->query($selectp);
    $selectp1 = "SELECT placa FROM $table WHERE placa = '$placa'  AND hora_saida IS NULL";
    $result1 = $conn->query($selectp1);

    if ($result0->num_rows === 1){

        if ($result1->num_rows === 0){

            $insertSql = "INSERT INTO $table (placa, hora_entrada) VALUES ('$placa', NOW())";
            if ($conn->query($insertSql) === TRUE) {
                echo '<script>document.getElementById("resp").innerHTML = "Entrada cadastrada com êxito";</script>';
            } else {
                echo "Erro ao inserir dados: " . mysqli_error();
            }

        }else{
            echo '<script>document.getElementById("resp").innerHTML = "Veículo já no estacionamento";</script>';
        }
    


}else{
    echo '<script>document.getElementById("resp").innerHTML = "Placa não encontrada";</script>';

}
    $conn->close();
}




function registrarSaida() {
    include('conexao.php');
    include('protect.php');

    $placa = mysqli_real_escape_string($conn, $_POST['placa']);
    $user = $_SESSION['Usuario'];
    $table = $user . "Hora";

    $updateSql = "UPDATE $table SET hora_saida = NOW() WHERE placa = '$placa' AND hora_saida IS NULL";
    

    if ($conn->query($updateSql) === TRUE) {
        $calcSql = "SELECT placa, hora_entrada, hora_saida, TIMESTAMPDIFF(MINUTE, hora_entrada, hora_saida) AS tempo_estacionado FROM $table WHERE placa = '$placa' ORDER BY hora_entrada DESC LIMIT 1";
        $result = $conn->query($calcSql);

        if ($result !== FALSE) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $mensagem = "Placa: " . $row['placa'] . ", Tempo Estacionado: " . $row['tempo_estacionado'] . " minutos<br>";

                    echo '<div id="resp" style="display: flex; justify-content: center;">' . $mensagem . '</div>';
                    
                }
            } else {
                
                echo '<script>document.getElementById("resp").innerHTML = "Nenhum resultado encontrado.";</script>';

            }
        } else {
            echo "Erro ao calcular tempo estacionado: " . mysqli_error($conn);
        }}else{
        echo "Erro ao atualizar dados: " . mysqli_error($conn);
    }

    $conn->close();
}
?>
