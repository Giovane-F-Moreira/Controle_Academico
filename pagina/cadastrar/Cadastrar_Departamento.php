<?php 
    include '../Conexao.php';
$nome =$_POST["nome"];

    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_select_db($conn,'$database');
    $sql = "INSERT INTO Departamento (nome) VALUES ('$nome')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Departamento Cadastrado!');window.location = '../../Cadastrar_Departamento.html';</script>";
    }else{
        echo "Erro ao cadastrar departamento! ".$sql."<br>".mysqli_erro($conn);
    }

?>