<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="./css/principal.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="js/chart-js-config.js"></script>
    <link rel="sortcut icon" href="livro.ico" type="image/x-icon" />
    <title>Academic - Notas</title>
</head>

<body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="./index.html" class="easion-logo"><i class="fas fa-cog"></i><span>Academic</span></a>
            </header>
            <nav class="dash-nav-list">
                <a href="pagina/exibir/Exibir_Aluno.php" class="dash-nav-item">
                    <i class="fa fa-user"></i> Alunos </a>
                <a href="pagina/exibir/Exibir_Concluido.php" class="dash-nav-item">
                    <i class="fa fa-check-square"></i> Notas </a>
                <a href="pagina/exibir/Exibir_Curso.php" class="dash-nav-item">
                    <i class="fa fa-laptop"></i> Cursos </a>
                <a href="pagina/exibir/Exibir_Departamento.php" class="dash-nav-item">
                    <i class="fa fa-file"></i> Departamentos </a>
                <a href="pagina/exibir/Exibir_Disciplina.php" class="dash-nav-item">
                    <i class="fa fa-list"></i> Disciplinas </a>
                <a href="pagina/exibir/Exibir_Pre-Requisito.php" class="dash-nav-item">
                    <i class="fa fa-sitemap"></i> Pre-Requsito</a>
                <a href="php/Exibir_Matricula.php" class="dash-nav-item">
                    <i class="fa fa-archive"></i> Matriculas </a>
                <a href="pagina/exibir/Exibir_Professor.php" class="dash-nav-item">
                        <i class="fa fa-users"></i>Professores</a>
                <a href="pagina/exibir/Exibir_Ministra.php" class="dash-nav-item">
                    <i class="fa fa-edit"></i>Disciplinas Ministradas</a>        
            </nav>
        </div>
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
                            <a class="dropdown-item" href="./pagina/exibir/Exibir_Usuario.php">Perfil</a>
                            <a class="dropdown-item" href="login.html">Sair</a>
                        </div>
                    </div>
                </div>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <h1 class="dash-title">Notas</h1>

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
                                    <form name="nota" action="./pagina/cadastrar/Cadastrar_Concluido.php" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputDevice">Disciplina</label>
                                                <select name="codDisciplina" class="form-control">
                                                    <?php
                                                            
                                                        $link = mysqli_connect("localhost", "root", "", "controleacademico");

                                                        $result = mysqli_query($link, "SELECT nome FROM Disciplina");
                                                        $cont = 1;
                                                        
                                                        while($dados =  mysqli_fetch_array($result)){        
                                                            $nomeDisciplina = $dados['nome'];
                                                            echo   "<option value='$cont'>$nomeDisciplina</option>";
                                                            $cont++;
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputDevice">Matricula</label>
                                                <select name="matricula" class="form-control">
                                                    <?php
                                                            
                                                        $link = mysqli_connect("localhost", "root", "", "controleacademico");

                                                        $result = mysqli_query($link, "SELECT matricula FROM Concluido");
                                                        $cont = 1;
                                                        
                                                        while($dados =  mysqli_fetch_array($result)){        
                                                            $numeroMatricula = $dados['matricula'];
                                                            echo   "<option value='$cont'>$numeroMatricula</option>";
                                                            $cont++;
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="">Nota</label>
                                                <input type="" class="form-control" name="nota" placeholder="Nota" step="0.01">
                                            </div>
                                            <div class="container-fluid">
                                                <button type="submit" class="btn btn-primary">Cadastrar</button> 
                                                <a class="dropdown-item" href="./pagina/exibir/Exibir_Concluido.php" style="display: contents;"><button type="button" class="btn btn-primary">Visualizar Cadastros</button></a>
                                            </div>
                                            
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
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="../js/main.js"></script>

</body>

</html>