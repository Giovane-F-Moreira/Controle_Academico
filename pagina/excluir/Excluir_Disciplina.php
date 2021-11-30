<?php 
    $id = $_POST["id"];
    $conn = mysqli_connect("localhost", "root", "", "controleacademico");
    $sql = "DELETE FROM Disciplina WHERE codDisciplina = $id";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Disciplina Excluido!'); window.location = 'Exibir_Disciplina.php';</script>";
    }else{
        echo "Erro ao excluir disciplina! ".$sql."<br>".mysqli_erro($conn);   
    }

?>