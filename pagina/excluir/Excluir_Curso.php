<?php 

    include '../Conexao.php';
    $id = $_POST["id"];

    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_select_db($conn,'$database');
    $sql = $sql = "DELETE FROM Curso WHERE codCurso = $id";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Curso excluido!'); window.location = '../exibir/Exibir_Curso.php';</script>";
    }else{
        echo "Erro ao excluir curso! ".$sql."<br>".mysqli_erro($conn);
    }
?>