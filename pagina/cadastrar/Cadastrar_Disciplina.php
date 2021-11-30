<?php 
    include '../Conexao.php';

$nome =$_POST["nome"];
$semestre = $_POST["semestre"];
$cargaHoraria = $_POST["cargaHoraria"];

    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_select_db($conn,'$database');
    $sql = "INSERT INTO Disciplina (nome, semestre, cargaHoraria) VALUES ('$nome', '$semestre', '$cargaHoraria')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Disciplina Cadastrada!'); window.location = '../../Cadastrar_Disciplina.html';</script>";
    }else{
        echo "Erro ao cadastrar disciplina! ".$sql."<br>".mysqli_erro($conn);       
    }

?>