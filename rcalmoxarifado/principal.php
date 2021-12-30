<? @session_start()?> 
<!DOCTYPE html>
    <html lang='pt-br'>
        <head>
            <meta charset='UTF-8'>
            <title><?=$titulo; ?></title>
            <link rel="manifest" href="manifest.json">
            <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
            <meta name="Description" content="login para sistema de requisição.">
            <meta name="theme-color" content="#F5FFFA"/>
            <link rel='icon' type='imagem/png' href='rioclaromenor.png' />
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/js/bootstrap-select.min.js'></script>
            <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.6/css/bootstrap-select.min.css' rel='stylesheet' />
            <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet' />
            <style>body{
                font-family: 'tahoma'; 
                font-size: 1rem;
                background-color: #F5FFFA;
                }
                table{
                font-size: 0.86rem;
                }
                                 
            </style>
            <script>function abrir_pedido(){
                window.open('pedidos_resposta.php','',width = '10', height = '10');
                }
            </script>
            <script> 
               window.onload=function(){
               var imprimir = document.querySelector('#imprimir');
               imprimir.onclick = function(){
               imprimir.style.display = 'block';
               window.print();
                                         };
                                        };
            </script>
                                   
        </head>
        <body>
            <? include 'header.inc'?>
            incluir conteudo aqui.
            <? include 'footer.inc'?>
        </body>
    </html>
        </body>    
