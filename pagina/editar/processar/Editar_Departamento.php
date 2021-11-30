<?php 
$id =$_POST["id"];
$nome =$_POST["nome"];
   
    $conn = mysqli_connect("localhost", "root", "", "controleacademico");
    $sql = "UPDATE departamento SET nome = '$nome' WHERE codDepart = $id";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Departamento Atualizado!'); window.location = '../.././exibir/Exibir_Departamento.php';</script>";
    }else{
        echo "Erro ao atualizar departamento! ".$sql."<br>".mysqli_erro($conn);   
    }

?>