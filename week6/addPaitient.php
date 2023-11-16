<?php 

    include __DIR__ . '/model/model_paitents.php'; 
    if(isPostRequest()){
        $patientFirstName = filter_input(INPUT_POST, 'patientFirstName');
        $patientLastName = filter_input(INPUT_POST, 'patientLastName');
        $patientMarried = filter_input(INPUT_POST, 'patientMarried');
        $patientBirthDate = filter_input(INPUT_POST, 'patientBirthDate'); 
        $res = addPaitient($patientFirstName,$patientLastName,$patientMarried,$patientBirthDate);
    }
    ?> 

<?php 


?>
<html lang="en">
<head>
  <title>Add Paitient</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">


  <h1>Add Paitent</h1>
  <div class="col-sm-offset-1 col-sm-10"><p><a href="./viewPaitients.php">View Paitients</a></p></div>
  <form class="form-horizontal" action="addPaitient.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="Paitient Name">Paitient First Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="paitient" placeholder="Enter Paitient First name" name="patientFirstName">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Paitient Last Name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Enter Paitient Last name" name="patientLastName">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Married</label>
      <div class="col-sm-10">          
        <input type="radio" name="patientMarried" value="1"> Yes
        <input type="radio" name="patientMarried" value="0"> No
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Birthdate</label>
      <div class="col-sm-10">          
        <input type="date" class="form-control" id="division" placeholder="Enter BirthDate" name="patientBirthDate">
      </div>
    </div>
    
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Add Team</button>
        <?php
            if (isPostRequest()) {
                echo "Team added";
            }
        ?>
      </div>
    </div>
  </form>
  
</div>

</body>
</html>