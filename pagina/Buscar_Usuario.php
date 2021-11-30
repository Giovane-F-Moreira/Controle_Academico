<?php 
    include '../pagina/Conexao.php';

$email = $_POST["email"];
$senha = $_POST["senha"];

$conn = mysqli_connect($servername, $username, $password, $database);

mysqli_select_db($conn,'$database');
//rever - entra no logon msm com senha errada - talvez linha 11;
$sql = "SELECT * FROM Usuario WHERE email = '$email' AND senha = '$senha'";

if(mysqli_query($conn, $sql)){
    echo "<script>alert('Bem Vindo!');window.location = '../index.html';</script>";
}else{
    echo "Erro ao logar no sistema ".$sql."<br>".mysqli_erro($conn);    
}

?>