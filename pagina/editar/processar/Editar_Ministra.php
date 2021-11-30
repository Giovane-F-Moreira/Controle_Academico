<?php 
    include '../../Conexao.php';

$matricula =        $_POST["matricula"];
$codDisciplina=     $_POST["codDisciplina"];
$ano =              $_POST["ano"];
$semestre =         $_POST["semestre"];
$oldMatricula =     $_POST["oldMatricula"];
$oldCodDisciplina=  $_POST["oldCodDisciplina"];

echo $matricula;
echo "<br>";
echo $codDisciplina;
echo "<br>";
echo $oldMatricula;
echo "<br>";
echo $oldCodDisciplina;
echo "<br>";
echo $ano;
echo "<br>";
echo $semestre;

    $conn = mysqli_connect($servername, $username, $password, $database);

    mysqli_select_db($conn,'$database');
    $sql = "UPDATE Ministra SET codDisciplina = $codDisciplina, matricula = $matricula, ano = $ano, semestre = $semestre WHERE matricula = $oldMatricula AND codDisciplina = $oldCodDisciplina";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Disciplinas ministradas atualizadas!'); </script>";
        //window.location = '../Cadastrar_Ministra.html';
    }else{
        echo "Erro ao atualizar disciplinas ministradas! ".$sql."<br>".mysqli_erro($conn);       
    }


?>