<?php
@session_start();
include_once 'conexao.php';
    
switch(@$_POST['acao']){
        case 'logar': logar(); break;
            case 'sair': sair(); break;
                case 'requisicao': criar_requisicao(); break;
                    case 'material': insere_material(); break;
                        case 'deleta': deleta(); break;
                            case 'cancela': cancela(); break;
                                case 'escolhe': edita_requisicao(); break;
                                    case 'finaliza': finaliza_requisicao(); break;
                                        case 'mudar': mudar_senha(); break;
                                            case 'incluir': incluir(); break;
                                                case 'copiar': copiar(); break;
                                                    case 'alterar': altera(); break;
                                                        case 'conferir': confere(); break;
                                                            case 'enviar': enviar(); break;
     }       
        
function query($sql){
    include 'conexao.php';
        $sql = $sql;
        $resultado = $conn->query($sql);
            if(!$resultado){
                echo  " <script type='text/javascript'>
                            window.history.go(-1);
                        </script>";
            }else{
                return $resultado;
            }
    } 
function alert($texto){
     echo  " <script type='text/javascript'>
                       alert('$texto'); 
                    history.go(-1);
                    </script>";
}
         
function logar(){
        $email = $_POST['email'];
        $pass = md5($_POST['senha']);
        $sql = "select * from login where email = '$email' and senha = '$pass'";
        $resultado =  query($sql);
      
        if(mysqli_num_rows($resultado)>0){
             while ($row = mysqli_fetch_array($resultado)){
                    $_SESSION['id'] = $row['id_unidade'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['senha'] = $row['senha'];
                    $_SESSION['usuario'] = $row['usuario'];
                    $_SESSION['unidade'] = $row['id_unidade'];
                    
             }
                if($_SESSION['unidade']==NULL){
                    echo " <script type='text/javascript'>
                           alert('USUÁRIO INATIVO. Entre em contato com o almoxarifado.');  
                                  
                           window.location.href ='login_novo.php'
                                  
                      </script>";
                    
                }else{
                      header ('location: requisicao.php');
                }

        }
        else{
                unset ($_SESSION['login']);
                unset ($_SESSION['senha']);
                echo " <script type='text/javascript'>
                           alert('Senha ou usuário estão incorretos!!!');  
                                  
                           window.location.href ='login_novo.php'
                                  
                      </script>";
                }
function sair() {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
              echo "<javascript>alert('Você esta saindo...')</javascript>" ;
              header("refresh: 2; login_novo.php");
             
                    
                }
        }

function insere_material(){
         
    $material = @$_POST['material'];
    $quantidade = @$_POST['quantidade'];
    $estoque = @$_POST['estoque'];
    $un = @$_POST['id_unidade'];
    $email = $_SESSION['email'];
    $requisicao = $_POST['req'];
        if($requisicao==NULL){
            echo  " <script type='text/javascript'>
                       alert('Ainda não existe requisição. Clique em CRIAR!'); 
                    history.go(-1);
                    </script>";
             }
            $sql= "INSERT INTO item_requisicao values";
            $sql.="('$requisicao','$material','$estoque','$quantidade',0)";
            $resultado =  query($sql);
                if(!$resultado){
                  
             $texto = 'Item já inserido!!!';          
             alert($texto);           
                           
            }else{
             
             $texto = 'Incluído com sucesso!!!';          
             alert($texto);
            }
}


function  deleta(){
  
      $id = $_POST['id'];
      $id_requisicao = $_SESSION['req'];
      $sql = "DELETE FROM item_requisicao WHERE id_material = '$id' and id_requisicao = '$id_requisicao'";
      //$resultado =  query($sql);
      $sql1 = "SELECT * FROM requisicao where finalizada = 'sim' and requisicao.id='$id_requisicao'";
      $resultado1 =  query($sql1);
       
      if(mysqli_num_rows($resultado1)>0){
       
                            $texto = 'Erro ao excluir!!!';          
             alert($texto);
        }else{
          $resultado =  query($sql);
       
                            $texto = 'Excluido com sucesso!!!';          
             alert($texto);
        }
     }
     

function cancela() {
 
    $un = @$_POST['un'];
    $id = @$_POST['id_requisicao'];
    $sql1 = "SELECT * FROM requisicao where finalizada = 'sim' and requisicao.id='$id'";
    $resultado1 =  query($sql1);
        if(mysqli_num_rows($resultado1)>0){
          
                   $texto = 'Erro ao excluir!!!';          
             alert($texto);
      }else{
        $sql = "DELETE FROM requisicao WHERE id = '$id'";
        $resultado =  query($sql);
            
                       $texto = 'Excluida com sucesso!!!';          
             alert($texto);
      }  
      
}
function edita_requisicao(){
  
    $id_req = @$_SESSION['req'];
    $und = @$_POST['und'];
    $em = @$_SESSION['email'];
    $query3 = "SELECT *  FROM item_requisicao AS ir, requisicao as r, material AS m, login AS l, unidade as u "
                . "WHERE ir.id_requisicao = r.id AND ir.id_material = m.id AND r.id_unidade = u.id AND l.id_unidade = u.id "
                . "and  ir.id_requisicao='$id_req'";
                 
                $resultado =  query($query3);
                  
       $query = "SELECT *  FROM requisicao WHERE id = '$id_req'";
             
               $resultado2 =  query($query);
               while ($linha = mysqli_fetch_array($resultado2)){
                 $l = $linha['data'];
               }
     if(!$resultado){
        echo 'Não foi selecionado.';
     }else{
         header ('location: lista.php');
     }
}


function mudar_senha(){
      //include_once 'conexao.php';
      $email = $_POST['email'];
      $senhaantiga = MD5($_POST['senha']);
      $senhanova = MD5($_POST['nova']);
      $sql = "UPDATE login SET senha = '$senhanova' WHERE email = '$email' AND senha ='$senhaantiga'";
      $resultado = query($sql);
      $sql1 = "SELECT senha FROM login WHERE senha = '$senhanova'";
      $resultado2 = query($sql1);
        if(mysqli_num_rows($resultado2)>0){
           
                  $texto = 'Senha alterada com sucesso!!!';          
             alert($texto);
                }else{
            
                  
                    $texto = 'Verifique suas informações!!!';          
             alert($texto);
                                  
     }
}

function criar_requisicao() {
           

                $data = date('Y/m/d');
                $email = $_POST['email'];//trocar unidade por unid em caso de erro
                $pass = $_SESSION['senha'];
                $sql = "SELECT * FROM `unidade`,login WHERE unidade.id=login.id_unidade and email = '$email' and login.senha = '$pass'";
           
                $resultado =  query($sql);
                while ($row = mysqli_fetch_array($resultado)) {
                    @$id_unidade = $row['id_unidade'];
                     //$sql2 = "insert into requisicao values";
                     $sql2 = "insert into requisicao(id, id_unidade, data, finalizada, arrumada) values";
                     $sql2 .="(NULL,'$id_unidade', '$data','nao',NULL)";
                     
                      $resultado2 =  query($sql2);
                     header("location:requisicao.php");
                }
            }

function copiar(){
 
    $id = $_POST['id']; 
    $sql1 = "SELECT * FROM item_requisicao as ir, material as m, requisicao as r, unidade as u WHERE ir.id_requisicao = r.id AND ir.id_material = m.id AND r.id_unidade = u.id AND r.id = '$id'";
    
          $data = date('Y/m/d');
          $email = $_POST['email'];//trocar unidade por unid em caso de erro
          $pass = $_SESSION['senha'];
          $sql = "SELECT * FROM `unidade`,login WHERE unidade.id=login.id_unidade and email = '$email' and login.senha = '$pass'";
          
           $resultado =  query($sql);
            while ($row = mysqli_fetch_array($resultado)) {
                @$id_unidade = $row['id_unidade'];
                     //$sql4 = "insert into requisicao values";
                     $sql4 = "insert into requisicao(id, id_unidade, data, finalizada, arrumada) values";
                     $sql4 .="(NULL,'$id_unidade', '$data','nao',NULL)";
                  
                     $resultado4 =  query($sql4);
            }
     
           $resultado1 =  query($sql1);
           while ($row = mysqli_fetch_array($resultado1)) {
           $material = $row['id_material'];
           $estoque = $row['estoque'];
           $quantidade = $row['quantidade'];
           $unidade = $row['id_unidade'];
        
          
          $sql2 = "SELECT id FROM `requisicao` where id_unidade = $unidade ORDER BY id DESC LIMIT 1";
          
           $resultado2 =  query($sql2);
            while ($row = mysqli_fetch_array($resultado2)){
            $requisicao = $row['id'];
            } 
            $sql3 = "INSERT INTO item_requisicao values
                ('$requisicao','$material','$estoque','$quantidade',0)";
               
                  $resultado3 =  query($sql3);
                  echo $requisicao. $material;
                    if(!$resultado3){
                        echo "não entrou";
                    }else{
                         header("location:requisicao.php");
                    }
           }  
        }

 function altera(){
   // include 'conexao.php';
    $quantidade = $_POST['pedida'];
    $codigo = $_POST['idmaterial'];
    $requisicao = $_POST['lista'];
    $estoque = $_POST['estoque'];
    
      $sql1 = "SELECT * FROM requisicao where finalizada = 'sim' and requisicao.id='$requisicao'";
      $resultado1 =  query($sql1);
       
      if(mysqli_num_rows($resultado1)>0){
             $texto = 'Erro ao alterar a requisição!!!';          
             alert($texto);
      }else{
    
      $sql = "UPDATE `item_requisicao` SET estoque = '$estoque', `quantidade` = '$quantidade'  WHERE id_requisicao = '$requisicao' AND id_material = '$codigo'";
      $altera = query($sql);
      $texto = 'Valores foram alterados com sucesso!!!';          
      alert($texto);
        }
   }
function enviar(){
    $id2 = @$_POST['id'];
    $sql2 = "SELECT * FROM requisicao where arrumada = 'sim' and requisicao.id='$id2'";
        $resultado2 =  query($sql2);
        if(mysqli_num_rows($resultado2)>0){
            $texto = 'Requisição foi concluída. Entre em contato com o Almoxarifado!!!';          
            alert($texto);
       }else{
            $sql1 = "SELECT * FROM requisicao where finalizada = 'sim' and requisicao.id='$id2' ";
            $resultado1 =  query($sql1);
       
      if(mysqli_num_rows($resultado1)>0){
            $sql = "UPDATE `requisicao` SET `finalizada` = 'nao' WHERE `requisicao`.`id` = '$id2'";
            $texto = 'Requisição foi reaberta!!!';          
            alert($texto);
                
       }else{
     
         $sql = "UPDATE `requisicao` SET `finalizada` = 'sim' WHERE `requisicao`.`id` = '$id2'";
         $texto = 'Requisição enviada!!!';          
         alert($texto);
             
       }
       }
         $resultado =  query($sql);
      

}
