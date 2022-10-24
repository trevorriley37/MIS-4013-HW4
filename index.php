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
      <h1>Courses</h1>
      <table class="table table-striped">
          
          <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourse">
        Add New
      </button>

      <!-- Modal -->
      <div class="modal fade" id="addcity" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addCourseLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="addcityLabel">Add City</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <div class="mb-3">
                  <label for="editCourse<?=$row["CourseID"]?>Name" class="form-label">InstructorID</label>
                          <input type="text" class="form-control" id="editCourse<?=$row["CourseID"]?>Name" aria-describedby="editCourse<?=$row["CourseID"]?>Help" name="cInsID">
                          <label for="editCourse<?=$row["CourseID"]?>Name" class="form-label">Course</label>
                          <input type="text" class="form-control" id="editCourse<?=$row["CourseID"]?>Name" aria-describedby="editCourse<?=$row["CourseID"]?>Help" name="cCourse">
                          <label for="editCourse<?=$row["CourseID"]?>Name" class="form-label">Section</label>
                          <input type="text" class="form-control" id="editCourse<?=$row["CourseID"]?>Name" aria-describedby="editCourse<?=$row["CourseID"]?>Help" name="cSection">
                          <div id="editCourse<?=$row["CourseID"]?>Help" class="form-text">Enter the Course information.</div>
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




</html>
