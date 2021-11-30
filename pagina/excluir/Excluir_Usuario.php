<?php 
include './pagina/Conexao.php';

$id =$_POST["id"];
$conn = mysqli_connect($servername, $username, $password, $database);

echo $id;

mysqli_select_db($conn,'$database');
$sql = "DELETE FROM Usuario WHERE id = $id";

if(mysqli_query($conn, $sql)){
    echo "<script>alert('Usuário Excluido!');</script>";
    //window.location = '../Cadastrar_Usuario.html';
}else{ 
    echo "Erro ao excluir usuário! ".$sql."<br>".mysqli_erro($conn);    
}

?>