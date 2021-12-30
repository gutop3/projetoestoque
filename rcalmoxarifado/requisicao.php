<?php

include_once 'buscar_dados.inc';
$titulo = 'REQUISIÇÃO';

?>

<body>
    
    <br><br>
    <div>
        <div class="container">
            <form class="form-group">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="requisicao" class="col-form-label">
                            <b>Nº Requisição:</b>
                        </label>
                        <input type="number" class="form-control" id='requisicao' size="5" name="requisicao" value="<?= @$id_req; ?>" readonly="">
                        <? $_SESSION['req'] = $id_req; ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="data" class="col-form-label">
                            <b>Data:</b>
                        </label>
                        <input type='data' class="form-control" name="data" id="data" value="<?= implode('-', array_reverse(explode('-', @$data))); ?>" readonly size="10">
                    </div>
                </div>
                <div class="form-group">
                    <label for="unidade" class='col-form-label'>
                        <b>Unidade:</b>
                    </label>
                    <input class="form-control" type="text" name="unidade" value="<?= $codigo . ' - ' . $unidade; ?>" id="unidade" size="30" readonly=""> <br>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <h6 onmouseover="Tip('Mostra o status do pedido no almoxarifado')" onmouseout="UnTip()">
                            <label for='status'><b>Status:</label></b><span id='status'><?= $valorarrumada ?></span>
                        </h6>
                    </div>
                    <div class="form-group col-md-12">

                        <h3>
                            <div class='text-secundary'><?= $enviada ?></div>
                        </h3>

                    </div>
                </div>


            </form>
            <? include 'inserir_material.inc' ?>

            <div>
                <input type='button' class="btn btn-success d-print-none" data-toggle="modal" data-target="#inserematerial" value='Inserir Item' <?= $escondida ?> readonly="">
            </div><br>
            <fieldset class='mb-1'>
                <form action="index.php?p=requisicao.php" method="GET" class="navbar-form d-print-none">
                    <button class='btn btn-transparent' name='press' value='u'>
                        <i class="fas fa-angle-double-left fa-2x"></i>
                    </button>
                    <button class='btn btn-transparent' name='press' value='e'>
                        <i class="fas fa-angle-left fa-2x"></i>
                    </button>
                    <button class='btn btn-transparent' name='press' value='d'>
                        <i class="fas fa-angle-right fa-2x"></i>
                    </button>
                    <button class='btn btn-transparent' name='press' value='p'>
                        <i class="fas fa-angle-double-right fa-2x"></i>
                    </button>
                    <input type='hidden' name='cont' value="<?= $b; ?>">
                    <input type='hidden' name='acao' value="acionar">
                </form>

        </div>

        </fieldset>
    </div>
    </div>
    </div>
    <script src="wz_tooltip.js" type="text/javascript"></script>
    <div class='container'>
    <div class='table-responsive'>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>código</th>
                <th>material</th>
                <th>tipo</th>
                <th>estoque</th>
                <th>quantidade</th>
                <th>recebido</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <?php
            $n = 1;
            while ($row_materiais = mysqli_fetch_array($seleciona)){
                $unidade = $row_materiais['unidade'];
                
      
        ?>
        <tbody>
            <tr>
                <th><?= $n; ?></th>
                <td><?= $row_materiais['codigo_externo'];?></td>
                <td><?= $row_materiais['material'];?>
                    <?php if($row_materiais['tipo']=='impressos'){
                    echo "<a href=".$row_materiais['imagem']." target='blank' class='d-print-none'><img src='pdf.jpg' length='25' height='30'/></a>";}?>
                </td>
                <td><?= $row_materiais['tipo'];?></td>
                <td><?= $row_materiais['estoque'];?></td>
                <td><?= $row_materiais['quantidade'];?></td>
                <td><?= $row_materiais['recebido'];?></td>
                <td>
                    <input type="button" class="btn btn-warning d-print-none" data-toggle="modal" value="Alterar Item"    data-target="#alterar" 
                    data-whateverlista="<?=$_SESSION['req'];?>"
                    data-whateveridmaterial="<?=$row_materiais['id_material'];?>"
                    data-whatevermaterial="<?=$row_materiais['material'];?>" 
                    data-whateverpedida="<?=$row_materiais['quantidade'];?>"
                    data-whatevercodigo="<?=$row_materiais['codigo_externo'];?>"
                    data-whateverestoque="<?=$row_materiais['estoque'];?>" 
                    <?=$escondida?>>
                </td>
                <td>
                   <input type="button" class="btn btn-danger d-print-none" data-toggle="modal" value="Excluir Item" data-target="#deletar"
                       data-whateverid="<?=$row_materiais['id_material'];?>"  
                       data-whatevermaterial="<?=$row_materiais['material'];?>" 
                       data-whateverlista="<?=$row_materiais['id_requisicao'];?>" 
                       <?=$escondida?>>
                </td>
                <td><input type='checkbox' class='form-check'/>
                </td>
            </tr>
        </tbody>
        <?php
            $n++;       
            };
        ?>    
    </table>
</div>
    <table class='table table-stripped table-responsive d-print-none'>
        <tr>
           <td>
                <input type = 'button' class= 'btn btn-info' value = 'Imprimir' id="imprimir"/>
            </td>
            <td>
                <input type="button" class="btn btn-danger" data-toggle="modal" value="Excluir"
                    data-target="#deletarlista"  data-whateverlista="<?=$_SESSION['req']?>"
                    <?=$escondida?>>
            </td>  
            <td>
                <input type="button" class="btn btn-success" data-toggle="modal" value="Criar"
                    data-target="#criar">
            </td>  
            <td>
                <input type="button" class="btn btn-success" data-toggle="modal" value="Copiar"
                data-target="#copiar">
                    
            </td>  
           
              <td>
                  
                <input type="button" class="btn btn-warning" data-toggle="modal" value='<?=$valorenviar?>'
                    data-target="#enviar">
                
                
            </td>  
            
        </tr>     
    </table>
</div>
  
    <?php
        include 'deletar_material.inc';
        include 'alterar_material.inc';
        include 'deletar_lista.inc';
        include 'criar_requisicao.inc';
        include 'copiar_requisicao.inc';
        include 'enviar_requisicao.inc';
        include 'footer.inc';
    ?>  
</body>
</html>

    </div>
</body>

</html>