<?php 
    include '../Conexao.php';

$nome =$_POST["nome"];
$dataNascimento = $_POST["dataNascimento"];
$cpf =$_POST["cpf"];
$telefone = $_POST["telefone"];
$sexo =$_POST["sexo"];
$email = $_POST["email"];
$senha =$_POST["senha"];
$permissao =$_POST["permissao"];

$conn = mysqli_connect($servername, $username, $password, $database);

mysqli_select_db($conn,'$database');
$sql = "INSERT INTO Usuario (nome, dataNascimento, cpf, telefone, sexo, email, senha, permissao) 
VALUES ('$nome', '$dataNascimento','$cpf','$telefone','$sexo','$email','$senha','$permissao')";

if(mysqli_query($conn, $sql)){
    echo "<script>alert('Usuário Cadastrado!'); window.location = '../../Cadastrar_Usuario.html';</script>";
}else{
    echo "Erro ao cadastrar usuário! ".$sql."<br>".mysqli_erro($conn);    
}

?>