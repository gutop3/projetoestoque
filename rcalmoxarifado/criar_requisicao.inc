<div class="modal fade bd-example-modal-x1" id="criar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Criar uma nova requisição?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="controle_requisicao.php" method="post">
                                    <input type='submit' class="btn btn-success hidden-print" name="req" value="CONTINUAR" readonly="" >
                                    <input type="hidden" value="requisicao" name="acao" >
                                    <input type='hidden' name="email"  value="<?= $_SESSION['email'];?>"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>        
                