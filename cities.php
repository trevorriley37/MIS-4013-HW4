<?php require_once("header.php"); ?>


<table class="table table-striped">
  <thead>
    <tr>
      <th>City Name</th>
      <th>Basketball Team</th>
      <th>Football Team</th>
      <th>Baseball Team</th>
    </tr>
  </thead>
  <tbody>
    <?php
    //I know a post is required but im not quite sure where it would be but there is use of a get variable here
    $cid = $_GET['id'];

    
    $sql = "SELECT c.city_ID,Abbreviation ,fullname, Baseball_name, football_name,Team_Name FROM Baseball b join Football f on b.city_ID =f.city_ID join City c on f.city_ID =c.city_ID join Basketball ba on c.city_ID = ba.city_ID where c.city_ID=" . $cid;
$result = $conn->query($sql);

    
 if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  <tr>
    <td><?=$row["fullname"]?></td>
    <td><?=$row["Team_Name"]?></td>
    <td><?=$row["football_name"]?></td>
    <td><?=$row["Baseball_name"]?></td>
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