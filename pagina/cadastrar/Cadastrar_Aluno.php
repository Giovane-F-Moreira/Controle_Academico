<?php 
    include '../Conexao.php';
    $matricula =      $_POST["matricula"];
    $datNasc =        $_POST["dataNascimento"];
    $sexo =           $_POST["sexo"];
    $nome =           $_POST["nome"];
    $rua =            $_POST["rua"];
    $uf =             $_POST["uf"];
    $cidade =         $_POST["cidade"];
    $numero =         $_POST["numero"];
    $bairro =         $_POST["bairro"];
    $codCurso =       $_POST["tel"];

    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_select_db($conn,'$database');
    $sql = "INSERT INTO Aluno (matricula, dataNascimento, sexo, nome, rua, uf, cidade, numero, bairro) 
    VALUES ('$matricula', $datNasc', '$sexo', '$nome', '$rua', '$uf', '$cidade', '$numero','$bairro')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Aluno Cadastrado!'); window.location = '../../index.html';</script>";
    }else{
        echo "<script>alert('Erro ao cadastrar aluno!!');</script>"; 
    }


?>