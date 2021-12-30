 <?php
       session_start();
              unset($_SESSION['email']);
              unset($_SESSION['senha']);
              echo " <script type='text/javascript'>
                           alert('você está saindo.');  
                                  
                           window.location.href ='login_novo.php'
                                  
                      </script>";
      
             
          

