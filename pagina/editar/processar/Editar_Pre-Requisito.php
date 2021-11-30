<?php 
include '../../Conexao.php';

$codDisciplina =   $_POST["codDisciplina"];
$codPrerequisito = $_POST["codPrerequisito"];
$oldCodDisciplina =   $_POST["oldCodDisciplina"];
$oldCodPrerequisito = $_POST["oldCodPrerequisito"];

    $conn = mysqli_connect($servername, $username, $password, $database);
 
    mysqli_select_db($conn,'$database');
    $sql = "UPDATE Prerequisito SET codDisciplina = $codDisciplina, codPrerequisito = $codPrerequisito WHERE codPrerequisito = $oldCodPrerequisito AND codDisciplina = $oldCodDisciplina";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Pre-requisito atualizado!');window.location = '../../exibir/Exibir_Pre-Requisito.php'; </script>";
        //';
    }else{
        echo "Erro ao atualizado pre-requisito! ".$sql."<br>".mysqli_erro($conn);        
    }


?>