<?php require_once("header.php"); ?>


<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">City ID</th>
      <th scope="col">Baseball Team Name</th>
    </tr>
  </thead>
  <tbody>
<?php

$sql = "SELECT city_ID,Baseball_name from Baseball order by city_ID";
$result = $conn->query($sql);






if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 
    ?>
    <tr>
     
   <td><?=$row["city_ID"]?></td>
    <td><?=$row["Baseball_name"]?></td>
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