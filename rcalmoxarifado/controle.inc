 <?php

   $unidade =  $_SESSION['id'];
   $sql = "SELECT COUNT(id) as 'c' FROM requisicao WHERE id_unidade=$unidade";
   $consulta = $conn->query($sql);
   while ($row = mysqli_fetch_array($consulta)) {
      $n = $row['c'] - 1;
   }
   if (!isset($_GET['cont'])) {
      $b = 0;
   } elseif ($_GET['press'] == 'e') {

      $b = $_GET['cont'];
      $b++;
   } elseif ($_GET['press'] == 'd') {

      $b = $_GET['cont'];
      $b--;
   } elseif ($_GET['press'] == 'p') {
      $b = 0;
   } elseif ($_GET['press'] == 'u') {
      $b = $n;
   }

   if ($b < 0) {
      $b = 0;
   }
   if ($b > $n) {
      $b = $n;
   }
