<?php 
    $matricula = $_POST["matricula"];
    $codDisciplina = $_POST["codDisciplina"];
    $conn = mysqli_connect("localhost", "root", "", "controleacademico");
    $sql = "DELETE FROM Matriculado WHERE matricula = $matricula AND codDisciplina = $codDisciplina";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Matricula Excluida!'); window.location = 'Exibir_Matricula.php';</script>";
    }else{
        echo "Erro ao excluir Matricula! ".$sql."<br>".mysqli_erro($conn);   
    }
?>