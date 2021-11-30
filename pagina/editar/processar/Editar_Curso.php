<?php 

$id = $_POST["id"];
$nome =$_POST["nome"];
$departamento = $_POST["codDepart"];
 
    $conn = mysqli_connect("localhost", "root", "", "controleacademico");
    $sql = "UPDATE Curso SET nome = '$nome' WHERE codCurso = $id";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Curso Atualizado!'); window.location = 'Exibir_Curso.php';</script>";
    }else{
        echo "Erro ao atualizar curso! ".$sql."<br>".mysqli_erro($conn);  
    }

?>