<?php
    
    if(!empty($_GET['id'])){
        include('protect.php');
        include('conexao.php');

        $table = $_SESSION['Usuario'];
    
        $id = $_GET['id'];
    
        $sqlSelect = "SELECT * FROM $table WHERE id=$id";
        $result = $conn->query($sqlSelect);
        
        if($result->num_rows > 0){

            $sqlDelete = "DELETE FROM $table WHERE id=$id";
            $resultDelete = $conn->query($sqlDelete);

        }
    
    
    
    }


    header('Location: ../lista.php')



?>