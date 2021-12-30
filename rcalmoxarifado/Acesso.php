<?php

@session_start();
require 'conexao.php';

class acesso{
    private $sql;
    private $resultado;
    private $sessao;
    private $conn;
    private $email;
    private $senha;
        function __construct($sql, $conn){
        $this->sql = $sql;
        $this->resultado = $conn->query($sql);
            return $this->resultado;
     }
    
    function getResultado(){
       
        return $this->resultado;
    }
    function getSessaoSenha(){
        $_SESSION['senha'] = $this->senha;
        return $_SESSION['senha'];
    }
    function redireciona_login(){
        if($this->resultado)
        {
         echo "<script type='text/javascript'>
                           alert('Você  será  redirecionado para o login!!!');  
                           window.location.href ='../Interface/login.php';
                  </script>";
        }else
        {
            echo "<script type='text/javascript'>
                           alert('Email  já  está cadastrado!!!');  
                                history.go(-1);
                  </script>";
        }
        }
        function selecionar(){
            while ($row = mysqli_fetch_array($this->resultado)){
                
            }
                   
            
            
        }
        function redireciona_menu(){
        if($this->resultado)
        {
         echo "<script type='text/javascript'>
                           alert('retornando!!!');  
                           window.location.href ='../Interface/menu.php';
                  </script>";
        }else
        {
            echo "<script type='text/javascript'>
                           alert('Não cadastrado!!!');  
                                history.go(-1);
                  </script>";
        }
        }
        function retorna_linhas(){
        if(mysqli_num_rows($this->resultado) > 0)
        {
            return TRUE;  
        }  else {
            return FALSE;
        }
        }
        function retorna_id(){
            while ($row = mysqli_fetch_array($this->resultado)) {
                $id = $row['id'];
                return $id;
        }
    function retorna_valor(){
        while($row = mysqli_fetch_array($this->resultado)){
                         $nome = $row['material'];
                         $id = $row['id'];
                         echo "<option value = '$id'>$nome</option>";
        }
    }    
}
}