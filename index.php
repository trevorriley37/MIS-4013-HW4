<?php require_once("header.php"); ?>


<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">City ID</th>
      <th scope="col"></th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
<?php

$sql = "SELECT city_ID,Abbreviation, fullname from City order by city_ID";
$result = $conn->query($sql);




?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  switch ($_POST['saveType']) {
    case 'Add':
        $sqlAdd = "insert into City (Abbreviation, fullname) value (?, ?)";
        $stmtAdd = $conn->prepare($sqlAdd);
        $stmtAdd->bind_param("ss", $_POST['icityabrv'], $_POST['icityname']);
        $stmtAdd->execute();   
      echo '<div class="alert alert-success" role="alert">New City added.</div>';
      break;

      case 'Delete':
        $sqlDelete = "Delete From City where city_ID=?";
        $stmtDelete = $conn->prepare($sqlDelete);
        $stmtDelete->bind_param("i", $_POST['iid']);
        $stmtDelete->execute();
      echo '<div class="alert alert-success" role="alert">City deleted.</div>';

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
              <h1 class="modal-title fs-5" id="addcityLabel">Add City</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <div class="mb-3">
                  <label for="editInstructor<?=$row["InstructorID"]?>Name" class="form-label">City Abbreviation</label>
                          <input type="text" class="form-control" id="editInstructor<?=$row["InstructorID"]?>Name" aria-describedby="editInstructor<?=$row["InstructorID"]?>Help" name="icityabrv">
                          <label for="editInstructor<?=$row["InstructorID"]?>Name" class="form-label">City Full Name</label>
                          <input type="text" class="form-control" id="editInstructor<?=$row["InstructorID"]?>Name" aria-describedby="editInstructor<?=$row["InstructorID"]?>Help" name="icityname">
                          <div id="editInstructor<?=$row["InstructorID"]?>Help" class="form-text">Enter the cities info.</div>
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
            <td><?=$row["Abbreviation"]." "?><?=$row["fullname"]?></a></td>
            <td>
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editInstructor<?=$row["InstructorID"]?>">
                Edit
              </button>
              <div class="modal fade" id="editInstructor<?=$row["InstructorID"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editInstructor<?=$row["city_ID"]?>Label" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editInstructor<?=$row["InstructorID"]?>Label">Edit City</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="">
                        <div class="mb-3">
                          <label for="editInstructor<?=$row["InstructorID"]?>Name" class="form-label">First Name</label>
                          <input type="text" class="form-control" id="editInstructor<?=$row["InstructorID"]?>Name" aria-describedby="editInstructor<?=$row["InstructorID"]?>Help" name="iFirstName" value="<?=$row['FirstName']?>">
                          <label for="editInstructor<?=$row["InstructorID"]?>Name" class="form-label">Last Name</label>
                          <input type="text" class="form-control" id="editInstructor<?=$row["InstructorID"]?>Name" aria-describedby="editInstructor<?=$row["InstructorID"]?>Help" name="iLastName" value="<?=$row['LastName']?>">
                          <div id="editInstructor<?=$row["InstructorID"]?>Help" class="form-text">Enter the instructor's name.</div>
                        </div>
                        <input type="hidden" name="iid" value="<?=$row['InstructorID']?>">
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
                <input type="hidden" name="iid" value="<?=$row["InstructorID"]?>" />
                <input type="hidden" name="saveType" value="Delete">
                <button type="submit" class="btn" onclick="return confirm('Are you sure?')"> Delete </button>
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
