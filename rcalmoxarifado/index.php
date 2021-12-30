<!DOCTYPE html>
<?php @session_start(); 
include_once 'conexao.php';
  $titulo='index';
?>
<html lang='pt-br'>

<head>
    <meta charset='UTF-8'>
    <title><?= $titulo?></title>
    <link rel="manifest" href="manifest.json">
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <meta name="Description" content="login para sistema de requisição.">
    <meta name="theme-color" content="#F5FFFA" />
    <link rel="apple-touch-icon" href="rioclaromenor.png">
    <link rel='icon' type='imagem/png' href='minha512.png' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/js/bootstrap-select.min.js'></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/css/bootstrap-select.min.css' rel='stylesheet' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet' />

    <style>
        body {
            font-family: 'helvetica';
            font-size: 0.9rem;
            background-color: #F5FFFA;
            padding-bottom: 70px;
        }

        table {
            font-size: 0.9rem;
        }

        label {
            font-weight: bold;
            margin-top: 6px
        }

        footer {

            background-color: #fff;
        }
    </style>
    <script>
        function abrir_pedido() {
            window.open('pedidos_resposta.php', '', width = '10', height = '10');
        }
    </script>
    <script>
        window.onload = function() {
            var imprimir = document.querySelector('#imprimir');
            imprimir.onclick = function() {
                imprimir.style.display = 'block';
                window.print();
            };
        };
    </script>

</head>
<header>
    <nav>
        <navbar class='navbar navbar-dark bg-dark'>


            <a class='navbar-brand' href='menu_novo.php'><img src="minha512.png" class="img-rounded" height="60px"> </a>

            <h5>
                <div class='navbar-text'><?= $titulo; ?></div>
            </h5>

            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNavDropdown'>
                <ul class='navbar-nav'>
                    <li class='nav-item active'>
                        <a class='nav-link' href='menu_novo.php'>Home <span class='sr-only'>(current)</span></a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='index.php?p=requisicao.php' target="_self">Requisição</a>
                    </li>

                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            Relatórios
                        </a>
                        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                            <a class='dropdown-item' href="lista.php" data-toggle="modal" data-target="#abrelista">Lista de materiais</a>
                            <a class='dropdown-item disabled' href='rel_data.php'>Relatório por Data</a>
                            <a class='dropdown-item' href='relatorio_demanda.php'>Relatório por Demanda</a>
                            <a class='dropdown-item disabled' href='relatorio_id.php'>Todas as Requisições</a>
                        </div>
                    </li>

                    <li class='nav-item'>
                        <a class='nav-link' href='sair_novo.php'>Sair</a>
                    </li>
                </ul>
            </div>
        </navbar>
        <div class="d-none d-print-inline">
            <img src="rioclaro.png" class="img-rounded" height="70px">
            <div class='text-center mt-5'>
                <h4><?= $titulo ?></h4>
            </div>
    </nav>
</header>
<div class="container">
    <?php
    if(isset($_GET['p'])){
        include $_GET['p'];
    }
    ?>
    conteudo do site aqui
</div>
<!--modal para contato-->
<div class="modal fade bd-example-modal-x1" id="contato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contatos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class='container'>

                    <h2>
                        <tr>
                            <td><a href="http://api.whatsapp.com/send?1=pt_BR&phone=5524999397658" target=_blank>
                                    <h2>Augusto</h2>
                                </a></td>
                        </tr>

                    </h2>
                    <h2></h2>
                    <tr>
                        <td><a href="http://api.whatsapp.com/send?1=pt_BR&phone=5524998435155" target=_blank>
                                <h2>Vagner</h2>
                            </a></td>
                    </tr>
                    <h2>
                        <tr>
                            <td><a href="http://api.whatsapp.com/send?1=pt_BR&phone=5524998715650" target=_blank>
                                    <h2>Vanessa</h2>
                                </a></td>
                        </tr>


                </div>




                <br>
            </div>
        </div>
    </div>
</div>

<!--                 -->
<!-- modal para usuario-->
<div class="modal fade bd-example-modal-x1" id="usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Você está logado como</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class='container'>

                    <?= $_SESSION['usuario'] ?>


                </div>




                <br>
            </div>
        </div>
    </div>
</div>
<!--                   -->



<footer class='page-footer font-small blue  fixed-bottom'>

    <div class="row d-print-none">
        <!-- d-lg-none">-->
        <div class="col-3">
            <div class='nav-item'>
                <center> <button class='btn btn-transparent' onclick="location.href='menu_novo.php'"><i class="fas fa-home fa-2x"></i></button></center>
            </div>
        </div>
        <div class="col-3">
            <div class='nav-item'>
                <center><button class='btn btn-transparent' onclick="location.href='requisicao.php'"><i class="fas fa-list fa-2x"></i></button></center>
            </div>
        </div>
        <div class="col-3">
            <center><button class='btn btn-transparent' data-toggle="modal" data-target="#contato"><i class="fab fa-whatsapp fa-2x"></i></button></center>
        </div>
        <div class="col-3">
            <div class='nav-item'>
                <center><button class='btn btn-transparent' data-toggle="modal" data-target="#usuario"><i class="fas fa-user fa-2x"></i></button></center>
            </div>
        </div>
    </div>




    <script src="https://kit.fontawesome.com/9af77f3d88.js" crossorigin="anonymous"></script>

    <!-- Copyright -->
    <!-- <div class="footer-copyright text-center py-3 d-none d-lg-block d-print-block">
  <i class="fas fa-user fa-2x"></i> <?= $_SESSION['usuario'] ?>
  </div>-->

    <!-- Copyright -->

</footer>