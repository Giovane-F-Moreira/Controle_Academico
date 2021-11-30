<?php 
    include_once '../../Conexao.php';
$id = $_POST["codDisciplina"];
$nome =$_POST["nome"];
$semestre = $_POST["semestre"];
$cargaHoraria = $_POST["cargaHoraria"];

    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_select_db($conn,'$database');
    $sql = "UPDATE Disciplina SET nome = '$nome', semestre = '$semestre', cargaHoraria = '$cargaHoraria' WHERE codDisciplina = $id";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Disciplina Atualizada!'); window.location = '../../exibir/Exibir_Disciplina.php';</script>";
    }else{
        echo "Erro ao atualizada disciplina! ".$sql."<br>".mysqli_erro($conn);       
    }

?>