<div class="modal fade bd-example-modal-x1" id="enviar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Deseja <?=$valorenviar?> Esta Requisição?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="controle_requisicao.php" method="post">

                                    <input type="hidden" value="enviar" name="acao" >
                                    <input type="hidden" name="id" value="<?=$_SESSION['req'];?>"/>
                                   
                      
                                    <input type='submit' class="btn btn-success" value="CONTINUAR">
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>        
                