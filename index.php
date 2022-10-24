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

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 
    ?>
    <tr>
     
   <td><?=$row["city_ID"]?></td>
    <td><?=$row["Abbreviation"]?></td>
    <td><a href="cities.php?id=<?=$row["city_ID"]?>"><?=$row["fullname"]?></a></td>
    </tr>
 
<?php
  }
} else {
  echo "0 results";
}
   
  ?> 
   </tbody>
</table>

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


</html>
