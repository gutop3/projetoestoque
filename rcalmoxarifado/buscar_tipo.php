 <?php
 include 'Acesso.php';
  $sql = "select * from tipo order by tipo asc";
        $consulta = $conn->query($sql);
                    // $r = new acesso($sql, $conn);
                     while($row = mysqli_fetch_array($consulta)){
                         $material = $row['tipo'];
                         $id = $row['id'];
                         echo "<option value = $id>$material</option>";
                       } 
                       
                      