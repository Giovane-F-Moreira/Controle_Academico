<?php 
    include '../../Conexao.php';

    $matricula =$_POST["matricula"];
    $codDisciplina = $_POST["codDisciplina"];
    $oldCodDisciplina =   $_POST["oldCodDisciplina"];
    $oldMatricula = $_POST["oldMatricula"];
 
    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_select_db($conn,'$database');
    $sql = "UPDATE Matriculado SET matricula = $matricula, codDisciplina = $codDisciplina WHERE matricula = $oldMatricula AND codDisciplina = $oldCodDisciplina";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Matricula Atualizada!');window.location = '../../exibir/Exibir_Matricula.php';</script>";
    }else{
        echo "Erro ao atualizar!! ".$sql."<br>".mysqli_erro($conn);        
    }
    
?>