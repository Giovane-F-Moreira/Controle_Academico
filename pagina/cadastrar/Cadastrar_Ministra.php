<?php 
    include '../Conexao.php';
$matricula =$_POST["matricula"];
$codDisciplina = $_POST["codDisciplina"];
$ano =$_POST["ano"];
$semestre = $_POST["semestre"];

    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_select_db($conn,'$database');
    $sql = "INSERT INTO Ministra (matricula, codDisciplina, ano, semestre) VALUES ('$matricula', '$codDisciplina', '$ano', '$semestre')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Disciplinas ministradas cadastradas!'); window.location = '../../Cadastrar_Ministra.php';</script>";
    }else{
        echo "<script>alert('Erro ao cadastrar Ministra! \n Verique se já está cadastrado.'); window.location = '../../Cadastrar_Ministra.php';</script>";
    }


?>