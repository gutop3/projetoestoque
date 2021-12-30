

                <div class="modal fade bd-example-modal-x1" id="mudasenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modifique a sua senha:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="controle_requisicao.php" method="post" class="form-group">
                                    <label for="emailalt">
                                        E-mail:
                                    </label>    
                                    <input type="email" name="email" required="" id="emailalt" class="form-control" required><br><br>
                                    <label for="senhaalt" class='mt-3'>
                                        Senha Atual:
                                        </label>
                                    <input type="password" name="senha" required="" id="senhaalt" class="form-control">
                                    <label for="nova" class='mt-3'>
                                        Nova Senha:
                                    </label>
                                    <input type="password" name="nova" required="" id="nova" class="form-control">
                                    <input type="hidden" name="acao" value="mudar"><br><br>
                                    <input type="submit" value="ALTERAR" class="btn btn-info"> 
                                    <input type="reset" value="LIMPAR" class="btn btn-warning">
                                </form>
                                <br>   
                            </div>
                        </div>
                    </div>
                </div>    
                
                
      
      
