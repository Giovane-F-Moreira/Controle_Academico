<?php
    include_once './pagina/Conexao.php'; 

    $matricula =      $_POST["matricula"];
    $conn = mysqli_connect($servername, $username, $password, $database);
    mysqli_select_db($conn,'$database');

    $sql = "DELETE FROM Aluno WHERE matricula = $matricula";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Aluno Excluido!'); window.location = 'Exibir_Aluno.php';</script>";
    }else{
        echo "Erro ao excluir aluno! ".$sql."<br>".mysqli_erro($conn);   
    }

?>