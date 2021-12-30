  <?php
    include 'controle.inc';
    $em = @$_SESSION['email'];
    $senha = @$_SESSION['senha'];
    $query = "SELECT requisicao.id, requisicao.data, requisicao.finalizada,
           requisicao.arrumada, login.usuario, requisicao.id_unidade, unidade.unidade,
            unidade.codigo FROM requisicao, login, unidade 
            where login.id_unidade = requisicao.id_unidade AND requisicao.id_unidade =  
            unidade.id AND login.email = '$em' and login.senha = '$senha' 
             GROUP BY requisicao.id order by id DESC  limit $b,1 ";
    $insere = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($insere)) {
        $id_req = $row['id'];
        $data = $row['data'];
        $finalizada = $row['finalizada'];
        $arrumada = $row['arrumada'];
        $usuario = $row['usuario'];
        $codigo = $row['codigo'];
        $id_unidade = $row['id_unidade'];
        $unidade = $row['unidade'];
    }
    $query3 = "SELECT *  FROM item_requisicao AS ir, requisicao as r, material AS m, login AS l, unidade as u, tipo as t "
        . "WHERE ir.id_requisicao = r.id AND ir.id_material = m.id AND r.id_unidade = u.id AND l.id_unidade = u.id and m.tipo = t.id "
        . "and  ir.id_requisicao='$id_req' and l.email='$em' order by m.tipo asc, m.material asc ";
    $seleciona = mysqli_query($conn, $query3);

    if ($finalizada == 'sim') {
        $desabilitada = 'disabled';
        $valorenviar = 'Reabrir';
        $enviada = 'REQUISIÇAO ENVIADA!';
        $escondida = 'hidden';
    } else {
        $valorenviar = 'Enviar';
        $checada = '';
        $enviada = 'REQUISIÇÃO AINDA NÃO FOI ENVIADA!';
        $escondida = '';
    }
    $query4 = "SELECT SUM(recebido) as 'soma' FROM item_requisicao WHERE id_requisicao = '$id_req'";
    $sql = $conn->query($query4);
    while ($row = mysqli_fetch_array($sql)) {
        $soma = $row['soma'];
    }
    if ($arrumada == 'sim') {
        $valorarrumada = "<h5 class ='text-success'>Concluido</h5>";
    } elseif ($soma == 0) {
        $valorarrumada = "<h5 class ='text-danger'>Pendente</h5>";
    } else {
        $valorarrumada = "<h5 class ='text-warning'>Aberto</h5>";
    }
    ?>
        
     