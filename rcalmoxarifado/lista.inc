<div class="modal fade bd-example-modal-x1" id="abrelista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Lista de Materiais:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action = 'relatorio_materiais.php' method = 'POST'>
                                    <div class="form-group">
                                        <label for="material" class="col-form-label">Tipo</label>
                                        <select class='selectpicker form-control'
                                        data-dropup-auto="false" name="id">
                                        
                                        <?php include 'buscar_tipo.php';?>
                                        </select>
                                    </div>
                                   
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar
                                        </button>
                                        <input type="submit" value="Continuar" class="btn btn-info"> <br><br>
                                        

                                    </div>
                                </form>
                                <br>   
                            </div>
                        </div>
                    </div>
                </div>    
                
                