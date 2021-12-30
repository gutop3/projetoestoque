<?php 
$titulo='LOGIN';
include 'head.inc'?>
<style>
      #setup_button {
    display: none;
}
</style>
    </head>
    <body>
        <?php
        include 'conexao.php';   
        ?>
        <br></br><br></br>
        <p><div class='text-center p-3'> <h3><i class="fas fa-user"></i></h3></div></p>
    
      <div class="form-group d-flex justify-content-center">
      
            <form action="controle_requisicao.php" method="post" class="form-group">
                <fieldset
                   
                    <label for="email"><b>Email</b><input type="email" name="email" id="email" class="form-control"  required></label><br><br>
                    <label for="senha"><b>Senha</b><input type="password" name="senha" id= "senha" class="form-control" required></label>
                    <input type="hidden" name="acao" value="logar"><br><br>
                    <input type="submit" value="ENTRAR" class="btn btn-info"> 
                    <input type="reset" value="LIMPAR" class="btn btn-warning">
                    <p></p>
                    <div>
                        Clique <a href="mudar_senha.php" data-toggle="modal" data-target="#mudasenha" >AQUI</a> para alterar a senha.
                    </div>
                    <p></p>
                    <div class='d-none d-lg-block'>
                    <a href="https://drive.google.com/file/d/12QycVuiSBFeKcuQ7kIiYhslcWyzcs1WK/view?usp=sharing" target="_blank">ABRIR NO CELULAR</a>
                    </div>
            
            </fieldset>
            
        </form>
        
        
        </div>
        
        <br><br><br><br>
      
        <button id="setup_button" onclick="installApp()">Installer</button>
        
       <script src="app.js"></script>

        <script src="https://kit.fontawesome.com/9af77f3d88.js" crossorigin="anonymous"></script>
        <? include 'mudar_senha.inc'?>  
         <script>
          /*  if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('sw.js')
              .then(function () {
                console.log('service worker registered');
              })
              .catch(function () {
                console.warn('service worker failed');
              });
          }*/
          const divInstall = document.getElementById('installContainer');
const butInstall = document.getElementById('butInstall');

/* Put code here */



/* Only register a service worker if it's supported */
if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('sw.js');
}

/**
 * Warn the page must be served over HTTPS
 * The `beforeinstallprompt` event won't fire if the page is served over HTTP.
 * Installability requires a service worker with a fetch event handler, and
 * if the page isn't served over HTTPS, the service worker won't load.
 */
if (window.location.protocol === 'http:') {
  const requireHTTPS = document.getElementById('requireHTTPS');
  const link = requireHTTPS.querySelector('a');
  link.href = window.location.href.replace('http://', 'https://');
  requireHTTPS.classList.remove('hidden');
}
        </script>
    </body>
</html>

