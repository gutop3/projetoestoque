<?php
require_once 'Aviso.php';
//include_once 'conexao.php';  
$titulo = 'HOME';
include 'head.inc';
?>

<body>
    <?php include 'header.inc'; ?>



    <div class='mt-2'><button class='btn btn-success d-none d-lg-block offset-9' onclick="javascript: window.open('requisicao.php');">Criar Requisição</button></div>

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

    <? include 'lista.inc' ?>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <div class='sticky-bottom d-none d-lg-block offset-9'>

        <span class='offset-9'><button class='btn btn-success' data-toggle="modal" data-target="#contato"><i class="fab fa-whatsapp fa-3x"></i></button></span>



    </div>
    <? include 'footer.inc' ?>


</body>