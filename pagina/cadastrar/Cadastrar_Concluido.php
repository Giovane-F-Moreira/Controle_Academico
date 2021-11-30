<?php 
    include '../Conexao.php';
$codDisciplina =$_POST["codDisciplina"];
$matricula = $_POST["matricula"];
$nota = $_POST["nota"];

    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_select_db($conn,'$database');
    $sql = "INSERT INTO Concluido (codDisciplina, matricula, nota) VALUES ('$codDisciplina', '$matricula', '$nota')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Nota Cadastrada!'); window.location = '../../Cadastrar_Concluido.php';</script>";
    }else{
        echo "Erro ao cadastrar nota! ".$sql."<br>".mysqli_erro($conn);     
    }

?>