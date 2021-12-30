 <!--<!DOCTYPE html>
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
                                   font-family: 'helvetica'; 
                                   font-size: 0.9rem;
                                   background-color: #F5FFFA;
                                   padding-bottom: 70px;
                                     }
                                    
                                  table{
                                   font-size: 0.9rem;
                                 }
                                    label{  
                                   font-weight: bold; 
                                    margin-top: 6px
                                 }
                                 footer{
                                     
                                     background-color: #fff;
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
                                   
                    </head>-->
                    
            
    <?php
     $titulo = 'Relatório Fiscal';
     include 'head.inc';?>  

    <body id = monospace>
       
       <? include 'header.inc'?>
       <div class='container'>
        <form action="relatoriofiscal2.php" method="POST">
            
            <fieldset class="form-control-static hidden-print"> 
            <label for="processo">PROCESSO: </label> <input type="number" class="input-sm" id="processo" name="processo" size='3' /> <label for="ye">ANO: </label>
   <select name="anoprocesso" class="selectpicker">
      <option>2018</option>
      <option>2019</option>
      <option>2020</option>
      <option>2021</option>
      <option>2022</option>
      <option>2023</option>
      <option>2024</option>
      <option>2025</option>
      <option>2026</option>
      <option>2027</option>
      <option>2028</option>
      <option>2029</option>
   </select><br><br>
            <label for= 'af'>AF:</label> <input type="number" class = 'input-sm' id = 'af' name = 'af' />
                   <br><br>

           <label for="contratado">CONTRATADO: </label> <select id = 'empresa' name = "empresa" onmouseover = "combo('empresa')" class="selectpicker" data-live-search="true"><option>Selecione...</option></select><br><br>                
                                 
                 
               <label for= 'ano'>MÊS/ ANO AVALIAÇÃO:</label> <input type="month" class = 'input-sm' id = 'ano' name = 'ano' /><br><br>
              
                 <label for= 'data'>DATA:</label> <input type="date" class = 'input-sm' id = 'data' name = 'data' />
                   <br><br>
                  
                  <label for= 'nota'>NOTAS:</label> <input type="text" class = 'input-sm' id = 'nota' name = 'nota' />
                   <br><br>
                    
                   
                 <input type="submit" value="ENVIAR" class="btn btn-info">
                 <input type="button" value="Voltar" class="btn btn-link" onclick="javascript:window.history.go(-1)" >
                 
             </fieldset>
        </form>
      <!--  <script>
            function combo(x){
                 var select = document.getElementById(x); 
                 var cont = 0;
                 if(x=='empresa'){
                  var options = ["DISKMED", "PATRIFARMA", "LAZZARI", "CIRÚRGICA RIOCLARENSE", "MEDICOM" , "RAM MARQUES"];
                 
                 }else if(x=='contrato'){
                   var options = ["registro de preço para aquisição de material hospitalar", "Registro de preço para aquisição de medicamentos"]; 
                  
                 }else if(x=='fiscal'){
                   var options = ["Fiscal1", "Fiscal2"];
                   
                 }else if(x=='gestor'){
                     var options = ["Gestor1", "Gestor2", "Gestor3"];
                     
                 }
               
                 for(var i = 0; i < options.length; i++) {
                 var opt = options[i];
                 var el = document.createElement("option");
                  el.textContent = opt;
                   el.value = opt;
                select.appendChild(el);
                 
                 }
            }
        </script>-->
           
   <script>
         
           var select = document.getElementById("empresa"); 
           var options = ["DISKMED", "PATRIFARMA", "LAZZARI", "CIRÚRGICA RIOCLARENSE", "MEDICOM" , "RAM MARQUES","DIMASTER", "HIGITECH", "AMANBELLA","DIMASTER", "HIGITECH", "AMANBELLA", "BIOHOSP", "CHIQUINHO MATERIAL DE CONSTRUÇÃO", "DIRECTAMED", "BRAZLIMP", "DROGAFONTE","ENZIPHARMA","GA MEDICAL", "JM GOL", "LAZZARI ", "KASAMED", "LIFETEC", "LINEA", "LUG 66", "MEDLEVENSOHN", "MERCADO LUIZA", "TIDIMAR", "TS FARMA", "R TARGINO", "NAHERA", "OMG4", "CLEAN MIX", "CAMEPEL", "S. JORGE", "D. FREITAS DIAS","ACÁCIA"];
          
         for(var i = 0; i < options.length; i++) {
         var opt = options[i];
         var el = document.createElement("option");
          el.textContent = opt;
           el.value = opt;
        //console.log(el);
        select.appendChild(el);
         }    
    </script>    
   <script>
         
           var select = document.getElementById("contrato"); 
           var options1 = ["Registro de preço para aquisição de material hospitalar.", "Registro de preço para aquisição de medicamentos.", "Registro de preços para aquisição de material de limpeza.", "Registro de preços para aquisição de material de expediente."]; 
          
         for(var i = 0; i < options1.length; i++) {
         var opt1 = options1[i];
         var el = document.createElement("option");
          el.textContent = opt1;
           el.value = opt1;
        //console.log(el);
        select.appendChild(el);
        
        
    }</script>
     <script>
         
           var select = document.getElementById("fiscal"); 
           var options2 = ["Humberto de Oliveira Portugal","Cláudia Teresinha Cunha da Silva"];
          
         for(var i = 0; i < options2.length; i++) {
         var opt2 = options2[i];
         var el = document.createElement("option");
          el.textContent = opt2;
           el.value = opt2;
        //console.log(el);
        select.appendChild(el);
        
        
    }</script>
     <script>
       var select = document.getElementById("matricula"); 
        var options3 = ["21145", "21312"];
        
         for(var i = 0; i < options3.length; i++) {
         var opt3 = options3[i];
         var el = document.createElement("option");
          el.textContent = opt3;
           el.value = opt3;
        //console.log(el);
        select.appendChild(el);
        
        
    }</script>
    <script>
        $(document).ready(function() {
    $('#empresa').on('keyup', function() {
        $('#teste').val($(this).val());
    });
});
    </script>
    
    </body>
</html>