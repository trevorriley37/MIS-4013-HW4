<?php require_once("header.php"); ?>



<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th>City_ID</th>
      <th>Abbreviation</th>
     <th>Name</th>
     <th>Baseball Team</th>
     <th>Football Team</th>
     <th>Basketball Team</th>
    </tr>
  </thead>
  <tbody>
    <?php
   
   //joining all four tables together
$sql = "SELECT c.city_ID,Abbreviation ,fullname, Baseball_name, football_name,Team_Name FROM Baseball b join Football f on b.city_ID =f.city_ID join City c on f.city_ID =c.city_ID join Basketball ba on c.city_ID = ba.city_ID order by c.city_ID";
$result = $conn->query($sql);
   
   
   
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["c.city_ID"]?></td>
    <td><?=$row["Abbreviation"]?></td>
   <td><?=$row["fullname"]?></td>
    <td><?=$row["Baseball_name"]?></td>
    <td><?=$row["football_name"]?></td>
    <td><?=$row["Team_Name"]?></td>
    
    
  </tr>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
  </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>

 


