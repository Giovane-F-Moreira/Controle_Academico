<?php 
    $codDisciplina = $_POST["codDisciplina"];
    $matricula = $_POST["matricula"];
    $conn = mysqli_connect("localhost", "root", "", "controleacademico");

    $sql = "DELETE FROM Concluido WHERE codDisciplina = $codDisciplina  AND matricula = $matricula";

    if(mysqli_query($conn, $sql)){
        echo "<script>
                alert('Nota Excluida!'); window.location = '../exibir/Exibir_Concluido.php';
            </script>";
    }else{
        echo "Erro ao excluir nota! ".$sql."<br>".mysqli_erro($conn);
    }
?>