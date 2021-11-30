<?php 
    $matricula = $_POST["matricula"];
    $conn = mysqli_connect("localhost", "root", "", "controleacademico");
    $sql = "DELETE FROM Professor WHERE matricula = $matricula";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Professor(a) Excluido(a)!');window.location = 'Exibir_Professor.php';</script>";
    }else{
        echo "Erro ao excluir Professor! ".$sql."<br>".mysqli_erro($conn);   
    }
?>