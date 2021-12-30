<?php
  $servidor = 'localhost';
  $banco ='rcalmoxarifado'; 
  $usuario ='root';
  $senha ='';
  $conn = new mysqli($servidor, $usuario, $senha, $banco);
   if (!$conn) {
    die('Não conectado!!!' . mysqli_connect_error());
    mysqli_close($conn);
      }
