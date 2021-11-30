<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../../css/principal.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="js/chart-js-config.js"></script>
    <link rel="sortcut icon" href="livro.ico" type="image/x-icon" />
    <title>Academic - Atualizar</title>
</head>

<body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="../../index.html" class="easion-logo"><i class="fas fa-cog"></i> <span>Academic</span></a>
            </header>
        </div>
        <nav class="dash-nav-list">
            <a href="../index.html" class="dash-nav-item">
                <i class="fa fa-user"></i> Alunos </a>
            <a href="../exibir/Exibir_Concluido.php" class="dash-nav-item">
                <i class="fa fa-check-square"></i> Notas </a>
            <a href="../exibir/Exibir_Curso.php" class="dash-nav-item">
                <i class="fa fa-laptop"></i> Cursos </a>
            <a href="../exibir/Exibir_Departamento.php" class="dash-nav-item">
                <i class="fa fa-file"></i> Departamentos </a>
            <a href="../exibir/Exibir_Disciplina.php" class="dash-nav-item">
                <i class="fa fa-list"></i> Disciplinas </a>
            <a href="../exibir/Exibir_Pre-Requisito.php" class="dash-nav-item">
                <i class="fa fa-sitemap"></i> Pre-Requsito</a>
            <a href="../exibir/Exibir_Matricula.php" class="dash-nav-item">
                <i class="fa fa-archive"></i> Matriculas </a>
            <a href="../exibir/Exibir_Professor.php" class="dash-nav-item">
                    <i class="fa fa-users"></i> Professores</a>
            <a href="../exibir/Exibir_Ministra.php" class="dash-nav-item">
                <i class="fa fa-edit"></i>Disciplinas Ministradas</a>        
        </nav>
        <div class="dash-app">
            <header class="dash-toolbar">
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <div class="tools">
                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="usuarios.html">Perfil</a>
                            <a class="dropdown-item" href="login.html">Sair</a>
                        </div>
                    </div>
                </div>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <h1 class="dash-title">Usuario</h1>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="easion-card-title"> Dados </div>
                                </div>
                                <div class="card-body ">
                                    <?php 
                                        $conn = mysqli_connect("localhost", "root", "", "controleacademico");

                                        $id = $_GET['id'] ?? '';
                                        $sql = "SELECT * FROM Usuario WHERE Id =  $id";
                                        $dados = mysqli_query($conn, $sql);
                                        $linha = mysqli_fetch_assoc($dados);
                                    ?>
                                    <form name="professor" action="../editar/processar/Editar_Usuario.php" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="">Nome</label>
                                                <input type="text" class="form-control" id="inputname" name="nome" value="<?php echo $linha['nome'] ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Data Nascimento</label>
                                                <input type="date" class="form-control" id="inputbirth" name="dataNascimento" value="<?php echo $linha['dataNascimento'] ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">CPF</label>
                                                <input type="text" class="form-control" id="inputcpf" name="cpf" value="<?php echo $linha['cpf'] ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Telefone</label>
                                                <input type="text" class="form-control" id="inputTel" name="telefone" value="<?php echo $linha['telefone'] ?>" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputsexo">Sexo</label>
                                                <select id="inputsexo" class="form-control" name="sexo" value="<?php echo $linha['sexo'] ?>" required>
                                                    <option value="m" selected>Masculino</option>
                                                    <option value="f">Feminino</option>
                                                    <option value="o">Outros</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Email</label>
                                                <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $linha['email'] ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Senha</label>
                                                <input type="password" class="form-control" id="inputPassword" name="senha" value="<?php echo $linha['senha'] ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword5">Confirme a senha</label>
                                                <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Confirme a senha" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputsexo">Permissão</label>
                                                <select id="inputsexo" class="form-control" name="permissao" value="<?php echo $linha['permissao'] ?>" required>
                                                    <option value = "1" selected>1 - Total</option>
                                                    <option value = "2">2 - Visualização</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $linha['Id'] ?>">
                                        </div>

                                        </div>
                                        <div class="container-fluid">
                                            <button type="submit" class="btn btn-primary">Salvar</button> 
                                            <a class="dropdown-item" href="./pagina/exibir/Exibir_Usuario.php" style="display: contents;"><button type="button" class="btn btn-primary">Visualizar Cadastros</button></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script>
        
        //Formatando campos
        $(document).ready(function () { 
            $("#inputcpf").mask('000.000.000-00');
            $("#inputTel").mask('(00)00000-0000');
            $("#inputZip").mask('00000-000');
        });
        
        function password(){   
            
            //Verifica se o campo senha é valido
            if(password != confirmPassword){
                alert('Os campos senha e confirmar senha são distintos!');
            }

            if(password.length > 8){
                alert('A senha não pode conter mais de 8 digitos');
            }

           //alert(name.val() + birth.val() + cpf.val() + sexo.val() + email.val() + password.val() + 
           //confirmPassword.val() + cep.val() + adressCity.val() + adressStreet.val());
        }
    </script>
</body>

</html>