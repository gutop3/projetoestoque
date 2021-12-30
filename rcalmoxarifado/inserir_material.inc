<div class="modal fade bd-example-modal-x1" id="inserematerial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Insira Um Item:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action = 'controle_requisicao.php' method = 'POST'>
                                    <div class="form-group">
                                        <label for="material" class="col-form-label">Material</label>
                                        <select class='selectpicker form-control' data-size='5' data-width="auto" 
                                        data-dropup-auto="false" name="material" id="material"
                                        data-live-search="true">
                                        <?php include 'buscar_material.php';?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="estoque" class="col-form-label">Estoque  </label> 
                                        <input class="form-control"  type='number' name="estoque" id="estoque"  class="alert-info" style="width: 6em" min='0' required="" >
                                    </div>
                                    <div class="form-group">
                                        <label for="quantidade" class="col-form-label">Quantidade  </label>
                                        <input class="form-control"  type="number" name="quantidade" id="quantidade" style="width: 6em" class="alert-info" min='1' required="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar
                                        </button>
                                        <input type="submit" value="Adicionar" class="btn btn-success"> <br><br>
                                        <input type="hidden" value="material" name="acao">
                                        <input type="hidden" value='<?=$id_req?>' name="req">

                                    </div>
                                </form>
                                <br>   
                            </div>
                        </div>
                    </div>
                </div>    
                
                