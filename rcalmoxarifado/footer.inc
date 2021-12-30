 <!--modal para contato-->
 <div class="modal fade bd-example-modal-x1" id="contato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Contatos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 <div class='container'>
                        
                      <h2><tr><td><a href="http://api.whatsapp.com/send?1=pt_BR&phone=5524999397658" target=_blank><h2>Augusto</h2></a></td></tr>
           
             </h2>
             <h2></h2> <tr><td><a href="http://api.whatsapp.com/send?1=pt_BR&phone=5524998435155" target=_blank><h2>Vagner</h2></a></td></tr>
              <h2><tr><td><a href="http://api.whatsapp.com/send?1=pt_BR&phone=5524998715650" target=_blank><h2>Vanessa</h2></a></td></tr>

            
     </div>    

                              
                                  
                            
                                <br>   
                            </div>
                        </div>
                    </div>
                </div>        

<!--                 -->
  <!-- modal para usuario-->
       <div class="modal fade bd-example-modal-x1" id="usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Você está logado como</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 <div class='container'>
                        
                                      <?=$_SESSION['usuario']?>

            
                                    </div>    

                              
                                  
                            
                                <br>   
                            </div>
                        </div>
                    </div>
                </div>        
    <!--                   -->



<footer class='page-footer font-small blue  fixed-bottom'>
  
    <div class="row d-print-none"><!-- d-lg-none">-->
        <div class="col-3">
            <div class='nav-item'>
               <center> <button class='btn btn-transparent' onclick="location.href='menu_novo.php'"><i class="fas fa-home fa-2x"></i></button></center>
            </div>
        </div>
        <div class="col-3">
            <div class='nav-item'>
              <center><button class='btn btn-transparent' onclick="location.href='requisicao.php'"><i class="fas fa-list fa-2x"></i></button></center></div></div>
        <div class="col-3">
            <center><button class='btn btn-transparent' data-toggle="modal" data-target="#contato"><i class="fab fa-whatsapp fa-2x"></i></button></center>
        </div>
        <div class="col-3">
            <div class='nav-item'>
               <center><button class='btn btn-transparent' data-toggle="modal" data-target="#usuario"><i class="fas fa-user fa-2x"></i></button></center>
            </div>
        </div>
  </div>
        

    
    
    <script src="https://kit.fontawesome.com/9af77f3d88.js" crossorigin="anonymous"></script>
   
  <!-- Copyright -->
 <!-- <div class="footer-copyright text-center py-3 d-none d-lg-block d-print-block">
  <i class="fas fa-user fa-2x"></i> <?=$_SESSION['usuario']?>
  </div>-->
  
  <!-- Copyright -->

</footer>
