 <?php 
     require_once 'Aviso.php';
     include_once 'conexao.php';
  $titulo = 'RELATÓRIO DE DEMANDA';
    include 'head.inc';
    include 'header.inc';
       
    require_once 'Aviso.php';
    // include_once 'obrigatorio.php';
    // include_once 'conexao.php';  
   //  include '../Classes/clHead.php';
     // include '../Classes/clTop.php';
     //   $head = new head('RELATÓRIO DE DEMANDA');
      //  $top =new top('LISTA');*/
       
        $un = @$_SESSION['id'];
       
        $data1 = $_POST['data1'];
        $data2 = $_POST['data2'];
        $par = $_POST['par'];
                $s = "select * from login, unidade where unidade.id =  '$un' and unidade.id = login.id_unidade";
                $query = @mysqli_query($conn, $s);
                 while ($linha = mysqli_fetch_array($query)) {
                            $nome = $linha['unidade'];
                            $u = $linha['id'];
                 }
                   if($par=='num'){
                       $op = num;
                   }elseif($par=='pedido'){
                       $op = pedido;
                   }else{
                       $op = enviado;
                   }
                   
        $sql = "SELECT material.material, COUNT(requisicao.id) AS num, SUM(item_requisicao.quantidade) AS pedido, SUM(item_requisicao.recebido) AS enviado FROM material, requisicao, item_requisicao, unidade WHERE material.id=item_requisicao.id_material AND requisicao.id=item_requisicao.id_requisicao AND requisicao.id_unidade=unidade.id AND unidade.id = $u AND requisicao.finalizada = 'sim' AND requisicao.data BETWEEN '$data1' AND '$data2' GROUP BY material.material ORDER BY $op DESC";
       $resultado = $conn->query($sql);
      // $resultado = $conn->consulta($sql);
      
        $n = 1;

   // $titulo = 'RELATÓRIO DE DEMANDA';
    //include 'header.inc';
    ?>        

    <body>
       
       <br><br>
       <div class='container'>
        <form action="relatorio_demanda.php" method="POST">
            <fieldset class="form-group d-print-none"> 
            <label for="unidade">Unidade:  </label><input type="text" class="form-control" id="unidade" name="unidade" value="<?=$nome?>" readonly >
                           
            <div class="form-row">
                <div class="form-group col-md-6"> 
                    <label for="data1">Data Inicial:  </label><input type="date" class="form-control" name="data1" id="data1" />
                </div>
                <div class="form-group col-md-6"> 
                    <label for="data2">Data Final:  </label><input type="date" class="form-control" name="data2" id="data2" />
                </div>
            </div>
               <br>
                <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-2 pt-0"><b>Selecione:</b></legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="par" id="gridRadios1" value="num" checked>
                          <label class="form-check-label" for="gridRadios1">
                            Nº de Requisições
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="par" id="gridRadios2" value="pedido">
                          <label class="form-check-label" for="gridRadios2">
                            Pedido
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="par" id="gridRadios3" value="enviado">
                          <label class="form-check-label" for="gridRadios3">
                            Enviado
                          </label>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                                
                
                
                <br>
                 <input type="submit" value="Selecionar" class="btn btn-info">
                 <input type="hidden" value="demandar" name="acao">
                 <input type="hidden" value="<?=$unidade;?>" name="und">
                 <input type="button" value="Voltar" class="btn btn-link" onclick="javascript:window.history.go(-1)" >
                 
             </fieldset>
        </form>
        
    
                        
                        
         <table class='table table-responsive'>
          <thead>
           <tr>
              <th>#</th>
              <th>material</th>
               <th>nº de requisições</th>
              <th>pedido</th>
              <th>enviado</th>
           </tr>
          </thead>
     
         <?php  while ($row_materiais = mysqli_fetch_array($resultado)){;?>
          <tbody>
            
          <tr>
             <th><?php echo $n.'º'; ?></th>
             <td><?php echo $row_materiais['material'];?></td>
             <td><?php echo $row_materiais['num'];?></td>
             <td><?php echo $row_materiais['pedido'];?></td>
             <td><?php echo $row_materiais['enviado'];?></td>
            
             
             
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
