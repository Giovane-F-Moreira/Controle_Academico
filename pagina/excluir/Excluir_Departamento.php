<?php 
    $id = $_POST["id"];
    $conn = mysqli_connect("localhost", "root", "", "controleacademico");
    $sql = "DELETE FROM departamento WHERE codDepart = $id";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Departamento Excluido!'); window.location = 'Exibir_Departamento.php';</script>";
    }else{
        echo "Erro ao excluir departamento! ".$sql."<br>".mysqli_erro($conn);   
    }
?>