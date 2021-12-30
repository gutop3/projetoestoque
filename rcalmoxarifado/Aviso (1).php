<?php
       
      @session_start();
          if((!isset($_SESSION['email'])) and (!isset($_SESSION['senha'])))
            {
	     unset($_SESSION['email']);
	     unset($_SESSION['senha']);
	     header('refresh:2; login.php');
                echo " <script type='text/javascript'>
                           alert('Faça o login!!!');  
                                  
                           window.location.href ='login_novo.php'
                                  
                      </script>";
               
             }
  ?>
