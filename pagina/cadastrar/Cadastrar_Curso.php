<?php 
    include '../Conexao.php';
$nome =$_POST["NomeCurso"];
$departamento = $_POST["codDepart"];

    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_select_db($conn,'$database');
    $sql = "INSERT INTO Curso (nome, codDepart) VALUES ('$nome', '$departamento')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Curso Cadastrado!'); window.location = '../../Cadastrar_Curso.html';</script>";
    }else{
        echo "Erro ao cadastrar curso! ".$sql."<br>".mysqli_erro($conn);
    }
?>