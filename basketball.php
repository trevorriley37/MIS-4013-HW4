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








if ($_SERVER["REQUEST_METHOD"] == "POST") {
  switch ($_POST['saveType']) {
    case 'Add':
        $sqlAdd = "insert into Basketball (city_ID,Team_Name) value (?, ?)";
        $stmtAdd = $conn->prepare($sqlAdd);
        $stmtAdd->bind_param("is",$_POST['icityID'], $_POST['iteamname']);
        $stmtAdd->execute();   
      echo '<div class="alert alert-success" role="alert">New Team added.</div>';
      break;

      case 'Delete':
        $sqlDelete = "Delete From Basketball where city_ID=?";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bind_param("i", $_POST['iid']);
        $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">Team deleted.</div>';
      break;
     
      
      case 'Edit':
      $sqlEdit = "update basketball set Team_Name=?, city_ID=?";
      $stmtEdit = $conn->prepare($sqlEdit);
      $stmtEdit->bind_param("si", $_POST['editteamname'], $_POST['editcityID']);
      $stmtEdit->execute();
      echo '<div class="alert alert-success" role="alert">Team edited.</div>';
      break;


   }
}
     
?>




<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInstructor">
        Add New
      </button>

      <!-- Modal -->
      <div class="modal fade" id="addInstructor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addInstructorLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addcityLabel">Add Basketball Team</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <div class="mb-3">
                  <label for="editbasketball<?=$row["city_ID"]?>Name" class="form-label">Team Name</label>
                          <input type="text" class="form-control" id="editbasketball<?=$row["city_ID"]?>Name" aria-describedby="editbasketball<?=$row["city_ID"]?>Help" name="iteamname">
                          <div id="editbasketball<?=$row["city_ID"]?>Help" class="form-text">Enter the basketball team name.</div>
                           <label for="editbasketball<?=$row["city_ID"]?>Name" class="form-label">City_ID</label>
                          <input type="text" class="form-control" id="editbasketball<?=$row["city_ID"]?>Name" aria-describedby="editbasketball<?=$row["city_ID"]?>Help" name="icityID">
                        </div>
                <input type="hidden" name="saveType" value="Add">
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<?php

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
          
          <tr>
            <td><?=$row["city_ID"]?></td>
            <td><?=$row["Team_Name"]?></td>
            
            <td>
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editbasketball<?=$row["city_ID"]?>" style = "background-color:white;">
                Edit
              </button>
              <div class="modal fade" id="editbasketball<?=$row["city_ID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editbasketball<?=$row["city_ID"]?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editbasketball<?=$row["city_ID"]?>Label">Edit City</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">
                          <label for="editbasketball<?=$row["city_ID"]?>Name" class="form-label">CityID</label>
                          <input type="text" class="form-control" id="editbasketball<?=$row["city_ID"]?>Name" aria-describedby="editbasketball<?=$row["city_ID"]?>Help" name="editcityID" value="<?=$row['city_ID']?>">
                          <label for="editbasketball<?=$row["city_ID"]?>Name" class="form-label"> Team Name</label>
                          <input type="text" class="form-control" id="editbasketball<?=$row["city_ID"]?>Name" aria-describedby="editbasketball<?=$row["city_ID"]?>Help" name="editteamname" value="<?=$row['Team_Name']?>">
                          <div id="editbasketball<?=$row["city_ID"]?>Help" class="form-text">Enter the Teams CityID and Name.</div>
                        </div>
                        <input type="hidden" name="iid" value="<?=$row['city_ID']?>">
                        <input type="hidden" name="saveType" value="Edit">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <form method="post" action="">
                <input type="hidden" name="iid" value="<?=$row["city_ID"]?>" />
                <input type="hidden" name="saveType" value="Delete">
                <button type="submit" class="btn" onclick="return confirm('Are you sure?')"style = "background-color:white;"> Delete </button>
              </form>
            </td>
          </tr>
          
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>

</html>
