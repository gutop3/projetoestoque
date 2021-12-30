<?php
   $id =  $_SESSION['req'];
        $sql = "SELECT requisicao.id FROM requisicao WHERE requisicao.arrumada = 'sim' AND requisicao.id = $id";
        $resultado = $conn->query($sql);
        $sql1 = "SELECT requisicao.id FROM requisicao, item_requisicao WHERE requisicao.id = item_requisicao.id_requisicao AND item_requisicao.recebido > 0  AND requisicao.id = $id";
            $resultado1 = $conn->query($sql1);
                if(mysqli_num_rows($resultado)>0){
                        echo "<h5 class='text-success'>CONCLUÍDO</h5>" ;
                     }elseif(mysqli_num_rows($resultado1)>0){
                        echo "<h5 class = 'text-warning'>ABERTO</h5>";
                    }else{
                        echo "<h5 class = 'text-danger'>PENDENTE</h5>";
                    }
                    $sql2 = "SELECT requisicao.id FROM requisicao WHERE requisicao.finalizada = 'sim' AND requisicao.id = $id";
        
             ?>
             