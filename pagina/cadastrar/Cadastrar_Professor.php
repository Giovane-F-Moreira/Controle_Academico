<?php 
    include '../Conexao.php';
$matricula =$_POST["matricula"];
$nome = $_POST["nome"];
$titulacao = $_POST["titulacao"];

    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_select_db($conn,'$database');
    $sql = "INSERT INTO Professor (matricula, nome, titulacao) VALUES ('$matricula', '$nome', '$titulacao')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Professor Cadastrado!'); window.location = '../../Cadastrar_Professor.html';</script>";
    }else{
        echo "Erro ao cadastrar professor! ".$sql."<br>".mysqli_erro($conn);        
    }


?>