<?php 
    include '../Conexao.php';
$codDisciplina =   $_POST["codDisciplina"];
$codPrerequisito = $_POST["codPrerequisito"];

    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_select_db($conn,'$database');
    $sql = "INSERT INTO Prerequisito (codDisciplina, codPrerequisito) VALUES ('$codDisciplina', '$codPrerequisito')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Pre-requisito Cadastrado!'); window.location = '../../Cadastrar_Pre-Requisito.php';</script>";
    }else{
        echo "<script>alert('Erro ao cadastrar pré-requisito!'); window.location = '../../Cadastrar_Pre-Requisito.php';</script>";        
    }


?>