 <div class="modal fade" id="deletarlista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nova mensagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <form action="controle_requisicao.php" method="post" class="form-group" > 
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nº Lista</label>
                    <input type="number" class="form-control" id="lista" name="id_requisicao" readonly>
                  </div>
                 
                    <label for="recipient-name" class="col-form-label"></label>
                    <input type="hidden" class="form-control" value="cancela" name="acao">
                  </div>  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger">Excluir</button>
                  </div>
                </form>
              </div>
             
            </div>
          </div>
        </div>
        <script type="text/javascript">
            $('#deletarlista').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Botão que acionou o modal
          var recipientlista= button.data('whateverlista')
         
          //// Extrai informação dos atributos data-*
          // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
          // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
          var modal = $(this)
          modal.find('.modal-title').text('Excluir esta lista(ação não poderá ser desfeita!!!)')
                      
                          modal.find('#lista').val(recipientlista)
        })
        </script>