<?php 

    $id =               $_POST["id"];
    $nome =             $_POST["nome"];
    $dataNascimento =   $_POST["dataNascimento"];
    $cpf =              $_POST["cpf"];
    $telefone =         $_POST["telefone"];
    $sexo =             $_POST["sexo"];
    $email =            $_POST["email"];
    $senha =            $_POST["senha"];
    $permissao =        $_POST["permissao"];
 
    $conn = mysqli_connect("localhost", "root", "", "controleacademico");
    $sql = "UPDATE Usuario SET dataNascimento = '$dataNascimento', nome = '$nome', cpf = '$cpf', telefone = '$telefone', 
    sexo = '$sexo',email = '$email', senha = '$senha', permissao = '$permissao' WHERE Id = $id";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Usuário atualizado!');window.location = '../../exibir/Exibir_Usuario.php';</script>";
    }else{
        echo "Erro ao atualizar usuário! ".$sql."<br>".mysqli_erro($conn);  
    }

?>