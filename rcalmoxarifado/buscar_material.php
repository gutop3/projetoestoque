 <?php
 include 'Acesso.php';
  $sql = "select * from material order by material asc";
        $consulta = $conn->query($sql);
                    // $r = new acesso($sql, $conn);
                     while($row = mysqli_fetch_array($consulta)){
                         $material = $row['material'];
                         $id = $row['id'];
                         echo "<option value = $id>$material</option>";
                       } 
                       
                      