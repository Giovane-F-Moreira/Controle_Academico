<?php 
    include '../../Conexao.php';

$codDisciplina =$_POST["codDisciplina"];
$matricula = $_POST["matricula"];
$nota = $_POST["nota"];

    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_select_db($conn,'$database');
    $sql = "UPDATE Concluido SET codDisciplina = '$codDisciplina', matricula = '$matricula', nota = '$nota' WHERE codDisciplina = $codDisciplina AND matricula = $matricula";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Nota Atualizada!');window.location = '../../exibir/Exibir_Concluido.php';</script>";
    }else{
        echo "Erro ao atualizar nota! ".$sql."<br>".mysqli_erro($conn);     
    }

?>