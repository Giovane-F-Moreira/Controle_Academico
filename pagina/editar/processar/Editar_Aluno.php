<?php 

    $matricula =      $_POST["matricula"];
    $dataNascimento = $_POST["dataNascimento"];
    $sexo =           $_POST["sexo"];
    $nome =           $_POST["nome"];
    $rua =            $_POST["rua"];
    $uf =             $_POST["uf"];
    $cidade =         $_POST["cidade"];
    $numero =         $_POST["numero"];
    $bairro =         $_POST["bairro"];

    $conn = mysqli_connect("localhost", "root", "", "controleacademico");
    $sql = "UPDATE Aluno SET matricula = '$matricula', dataNascimento = '$dataNascimento', sexo = '$sexo', nome = '$nome',
    rua = '$rua', uf = '$uf', cidade = '$cidade', numero = '$numero', bairro = '$bairro' WHERE matricula = $matricula";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Aluno atualizado!');window.location = '../../exibir/Exibir_Aluno.php';</script>";
        //
    }else{
        echo "Erro ao atualizar aluno! ".$sql."<br>".mysqli_erro($conn);  
    }

?>