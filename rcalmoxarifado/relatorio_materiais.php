 <?php 
    require_once 'Aviso.php';
    include_once 'conexao.php';  
    include_once 'buscar_dados.inc';
    $titulo = 'Relatório de materiais'; 
    include 'head.inc';  
  ?>


    <body id = monospace>
       <br><br>
       <div class='container'>
        <form action="relatorio_materiais.php" method="POST">
            <fieldset class="form-control-static d-print-none"> <label for="requisição">TIPO:</label>  <select class="form-control m-1" name="id" >
                     <option class="">selecione...</option>
                <?php 
                    
                      $s = "select * from tipo";
                       $query = @mysqli_query($conn, $s);
                             while ($linha = mysqli_fetch_array($query)) {
                               $id = $linha['id'];
                               $tipo = $linha['tipo'];
                               echo "<option value = ".$id.">".$tipo."</option>";
                               
                             }
                     
                                          
                      ?>
                </select>
                 <input type="submit" value="Selecionar" class="btn btn-info">
                 <input type="hidden" value="escolhe" name="acao">
                 <input type="hidden" value="<?=$unidade;?>" name="und">
                 <input type="button" value="Voltar" class="btn btn-link" onclick="javascript:window.history.go(-1)" >
                  
             </fieldset>
        </form>
        
    
                        
                        
         <table class='table table-responsive'>
          <thead>
           <tr>
              <th>#</th>
              <th>código externo</th>
              <th>material</th>
              <th></th>
           </tr>
          </thead>
     
     <?php
        $ids = $_POST['id'];
        $sql = "select codigo_externo, material, material.tipo as tipo, imagem from material, tipo WHERE material.tipo = tipo.id and tipo.id = '$ids' Order by material ";
        $resultado = mysqli_query($conn, $sql);
        $n = 1;
        while ($row_materiais = mysqli_fetch_array($resultado)){
           
      ?>
          
          <tbody>
            
          <tr>
             <th><?php echo $n; ?></th>
             <td><?php echo $row_materiais['codigo_externo'];?></td>
             <td><?php echo $row_materiais['material'];?> <?php include 'imagens.php'?></td>
            
             
             
          </tr>
        </tbody>
       
       <?php
         $n++;       
        };
        ?>    
      </table> 
      <table class='table table-striped hidden-print'>
          <tr>
               <td>
                     <input type='hidden' name="imprimir"  value ="<?= $id_req;?>"/>
                     <input type = 'submit' class= 'btn btn-info' value = 'Imprimir' id="imprimir"/>
                </td>
                
        </table>

      </div>
    </body>
    </html>
