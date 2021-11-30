<?php 
    $codPrerequisito = $_POST["codPrerequisito"];
    $codDisciplina = $_POST["codDisciplina"];
    $conn = mysqli_connect("localhost", "root", "", "controleacademico");
    $sql = "DELETE FROM Prerequisito WHERE codPrerequisito = '$codPrerequisito' AND codDisciplina = '$codDisciplina'";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Disciplina pre-requisito excluida!');window.location = '../../pagina/exibir/Exibir_Pre-Requisito.php';</script>";
        
    }else{
        echo "Erro ao excluir disciplina! ".$sql."<br>".mysqli_erro($conn);   
    }
?>