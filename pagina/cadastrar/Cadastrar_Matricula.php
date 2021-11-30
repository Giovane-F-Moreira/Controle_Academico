<?php 
    include '../Conexao.php';
$matricula =$_POST["matricula"];
$codDisciplina = $_POST["codDisciplina"];

    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_select_db($conn,'$database');
    $sql = "INSERT INTO Matriculado (matricula, codDisciplina) VALUES ('$matricula', '$codDisciplina')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Matricula Efetivada!'); window.location = '../../Cadastrar_Matricula.html';</script>";
    }else{
        echo "Erro ao matricular!! ".$sql."<br>".mysqli_erro($conn);        
    }
    //bgb
?>