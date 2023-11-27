<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT Patients</title>
</head>
<body>
<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '\model\model_paitents.php';
    $err = "";
    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'paitientId');

        if($action == "Update"){
            $patient = getPatient($id);
            $patientFirstName = $patient["patientFirstName"];
            $patientLastName = $patient["patientLastName"];
            $patientMarried = $patient["patientMarried"];
            $patientBirthDate = $patient["patientBirthDate"];
        }else{
            $patientFirstName = "";
            $patientLastName = "";
            $patientMarried = ""; 
            $patientBirthDate = "";
        }

        //UPDATE TEAM WAS SUBMITTED IN FORM -> GRAB SUBMITTED VALUES AND PASS TO THE updateTeam() METHOD!
    }elseif (isset($_POST['Update_Paitient'])){
        $action = filter_input(INPUT_POST, 'action');
        $id = filter_input(INPUT_POST, 'paitientId');
        $patientFirstName = filter_input(INPUT_POST, 'patientFirstName');
        $patientLastName = filter_input(INPUT_POST, 'patientLastName');
        $patientMarried = filter_input(INPUT_POST, 'patientMarried');
        $patientBirthDate = filter_input(INPUT_POST, 'patientBirthDate'); 
        updatePaitient($id,$patientFirstName,$patientLastName,$patientMarried,$patientBirthDate);
        header('Location: viewPaitients.php');
    }
?> 
<style type="text/css">
       .wrapper {
            display: grid;
            grid-template-columns: 180px 400px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
        }
        label {
           font-weight: bold;
        }
        input[type=text] {width: 200px;}
        .error {color: red;}
        div {margin-top: 5px;}
</style>
<div class="container">


  <h1>Add Paitent</h1>
  <div class="col-sm-offset-1 col-sm-10"><p><a href="./viewPaitients.php">View Paitients</a></p></div>
  <form class="form-horizontal" action="addPaitient.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="Paitient Name">Paitient First Name:</label>
      <div class="col-sm-10">
        <input value= "<?=$patientFirstName;?> "type="text" class="form-control" id="paitient" placeholder="Enter Paitient First name" name="patientFirstName">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Paitient Last Name</label>
      <div class="col-sm-10">          
        <input value= "<?=$patientLastName;?> "type="text" class="form-control" id="division" placeholder="Enter Paitient Last name" name="patientLastName">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Married</label>
      <div class="col-sm-10">          
        <input type="radio" name="patientMarried" value="1" <?php if($patientMarried == 1):?> checked <?php endif; ?>> Yes
        <input type="radio" name="patientMarried" value="0"<?php if($patientMarried == 0):?> checked <?php endif; ?>> No
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Birthdate</label>
      <div class="col-sm-10">          
        <input value= "<?=$patientBirthDate;?>" type="date" class="form-control" id="division" placeholder="Enter BirthDate" name="patientBirthDate">
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
