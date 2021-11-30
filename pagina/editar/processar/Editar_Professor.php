<?php 
    include_once '../../Conexao.php';
$id = $_POST["id"];
$matricula =$_POST["matricula"];
$nome = $_POST["nome"];
$titulacao = $_POST["titulacao"];

    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_select_db($conn,'$database');
    $sql = "UPDATE Professor SET matricula = '$matricula', nome = '$nome', titulacao = '$titulacao' WHERE matricula = $id";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Professor(a) Atualizado(a)!'); window.location = '../../exibir/Exibir_Professor.php';</script>";
    }else{
        echo "Erro ao Atualizar professor! ".$sql."<br>".mysqli_erro($conn);       
    }


?>