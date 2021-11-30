<?php 
    $matricula = $_POST["matricula"];
    $codDisciplina = $_POST["codDisciplina"];
    $conn = mysqli_connect("localhost", "root", "", "controleacademico");
    
    $sql = "DELETE FROM Ministra WHERE matricula = '$matricula' AND codDisciplina = '$codDisciplina'";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Registro excluido!');window.location = '../../pagina/exibir/Exibir_Ministra.php';</script>";
        
    }else{
        echo "Erro ao excluir registro! ".$sql."<br>".mysqli_erro($conn);   
    }
?>