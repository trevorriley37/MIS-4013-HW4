<?php require_once("header.php"); ?>


<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">City ID</th>
      <th scope="col">Basketball Team Name</th>
    </tr>
  </thead>
  <tbody>
<?php

$sql = "SELECT city_ID,Team_Name from Basketball order by city_ID";
$result = $conn->query($sql);






if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 
    ?>
    <tr>
     
   <td><?=$row["city_ID"]?></td>
    <td><?=$row["Team_Name"]?></td>
    </tr>
 
<?php
  }
} else {
  echo "0 results";
}
   
  ?> 
   </tbody>
</table>
</html>
