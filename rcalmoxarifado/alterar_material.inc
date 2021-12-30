 <div class="modal fade" id="alterar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label for="recipient-name" class="col-form-label">Código:</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" readonly>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Material:</label>
                    <input type="text" class="form-control" id="material" name="material" readonly>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Estoque:</label>
                    <input type="number" min='0' class="form-control" id="estoque" name="estoque">
                  </div>  
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Pedida:</label>
                    <input type="number" min='1' class="form-control" id="pedida" name="pedida">
                  </div>    
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="lista" name="lista">
                    <input type="hidden" class="form-control" id="idmaterial" name="idmaterial">
                    <input type="hidden" class="form-control" value="alterar" name="acao">
                  </div>  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-warning">Alterar</button>
                  </div>
                </form>
              </div>
             
            </div>
          </div>
        </div>
        <script type="text/javascript">
            $('#alterar').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Botão que acionou o modal
          var recipient= button.data('whatever')
          var recipientcodigo = button.data('whatevercodigo')
          var recipientmaterial = button.data('whatevermaterial')
          var recipientidmaterial = button.data('whateveridmaterial')
          var recipientestoque = button.data('whateverestoque')
          var recipientpedida = button.data('whateverpedida')
          var recipientlista = button.data('whateverlista')
          //// Extrai informação dos atributos data-*
          // Se necessário, você pode iniciar uma requisição AJAX aqui e, então, fazer a atualização em um callback.
          // Atualiza o conteúdo do modal. Nós vamos usar jQuery, aqui. No entanto, você poderia usar uma biblioteca de data binding ou outros métodos.
          var modal = $(this)
            modal.find('.modal-title').text('Alterar Item: ')
            modal.find('#id').val(recipient)
            modal.find('#codigo').val(recipientcodigo)
            modal.find('#material').val(recipientmaterial)
            modal.find('#idmaterial').val(recipientidmaterial)
            modal.find('#estoque').val(recipientestoque)
            modal.find('#pedida').val(recipientpedida)
            modal.find('#lista').val(recipientlista)
        })
        </script>