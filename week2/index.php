<?php 

$firstname = "";
$lastname = ""; 
$married = null; 
$Birthdate = date("Y/m/d"); 
$feet = 0; 
$inch = 0; 
$weight = 0; 
$nameErr = ""; 
$lastErr = ""; 
$lastErr = ""; 
$MarriedErr = ""; 
$birthErr = ""; 
$footErr = ""; 
$inchErr = ""; 
$weightErr = ""; 
$errSum = ""; 
$age = 0; 
$bmi = 0;



function age ($Birthdate) {
    $date = new DateTime($Birthdate);
    $now = new DateTime();
    $interval = $now->diff($date);
    return $interval->y;
 }

 
 function isDate($dt) {
    $date_arr  = explode('-', $dob);
    return checkdate($date_arr[1], $date_arr[2], $date_arr[0]);
 }
 function bmi ($ft, $inch, $weight) {
    // you will need to write
    $met = 0.0254;
    $metP = 2.20462;
    $meters = $ft * 12;
    $totalinch = $meters + $inch;
    $meter = $totalinch * $met; 
    $kG = $weight / $metP;
    $bmi = $kG / ($meter * $meter);
    return $bmi;


 }
 
 function bmiDescription ($bmi) { 
    $bmidesc = ""; 
    if($bmi < 18.5){
        $bmidesc .= "underweight";
    }
    elseif($bmi > 18.5 && $bmi < 24.9 ){
        
        $bmidesc .= "healthy weight";
    }
    elseif($bmi > 25.0 && $bmi <29.9){
        $bmidesc .= "over weight";
    }
    elseif($bmi > 30.0){
        $bmidesc .= "obesity";
    }
    return $bmidesc; 
      
 }
 function isPostRequest() 
{
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function isGetRequest() 
{
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' && !empty($_GET) );
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST['save_info'])){

   
    $errSum = ""; 
    $firstname = filter_input(INPUT_POST, "first_name");
    $lastname = filter_input(INPUT_POST, "last_name");
    $married = filter_input(INPUT_POST, "married") ;
    $Birthdate = filter_input(INPUT_POST, "birth_date");
    $feet = filter_input(INPUT_POST, "ft");
    $inch = filter_input(INPUT_POST, "in");
    $weight = filter_input(INPUT_POST, "weight");
    $age = age($Birthdate); 
    $bmi = bmi($feet, $inch, $weight); 
    $bmidesc = bmiDescription($bmi); 
    if(empty($_POST["first_name"])){
        $nameErr = "Name is required";
        $errSum .= $nameErr; 
        
        
    } else {
        $firstname = test_input($_POST["first_name"]);
    }
    if(empty($_POST["last_name"])){
        $lastErr = "Name is required"; 
        $errSum .= $lastErr; 
    } else {
        $lastname = test_input($_POST["last_name"]);
    }
    if(empty($_POST["married"])){
        $MarriedErr = "Name is required"; 
        $errSum .= $MarriedErr; 
    } else {
        $married = test_input($_POST["married"]);
    }
    if(empty($_POST["birth_date"])){
        $birthErr = "Name is required"; 
        $errSum .= $birthErr; 
    } else {
        $Birthdate = test_input($_POST["birth_date"]);
    }
    if(empty($_POST["ft"])){
        $footErr = "Name is required"; 
        $errSum .= $footErr; 
    } else {
        $feet = test_input($_POST["ft"]);
    }
    if(empty($_POST["in"])){
        $incheErr = "Name is required"; 
        $errSum .= $incheErr; 
    } else {
        $inch = test_input($_POST["in"]);
    }
    if(empty($_POST["weight"])){
        $weightErr = "Name is required"; 
        $errSum .= $weightErr; 
    } else {
        $weight = test_input($_POST["weight"]);
    }
    var_dump($errSum);
}
  
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Forms</title>
</head>
<body>
    <h1>Patient Intake Form</h1>
    <form  method="post" action="index.php">
        <div class="label">
            <label>First Name: </label> 
        </div> 
        <div> 
           <input type="text" name="first_name" value = <?= $firstname;?>>
           <span class = "error"> <?php echo $nameErr;?>
        </div>
        <div class="label">
            <label>Last Name: </label> 
        </div> 
        <div> 
        <input type="text" name="last_name" value = <?= $lastname;?>>
           <span class = "error"> <?php echo $lastErr;?>
        </div>
        <div class="label">
            <label>Married: </label> 
        </div> 
        <div>
        <input type="radio" name="married" value="yes" <?= ($married == "yes") ? "checked" : "";?>>
        Yes
        <input type="radio" name="married" value="no"  <?= ($married == "no") ? "checked" : "";?>>
        No
        <span class = "error"><?php echo $MarriedErr;?>
        </div>
        <div class="label">
            <label>Birth Date: </label> 
        </div> 
        <div> 
           <input type="date" name="birth_date" value = <?= $Birthdate;?>>
           <span class = "error"> <?php echo $birthErr;?>
        </div>
        <div class="label">
            <label>Height: </label> 
        </div>
        <div>
            Feet: 
            <input type="text" name="ft" style="width:40px;" value = <?= $feet;?>>
            <span class = "error"> <?php echo $footErr;?>
            Inches: 
            <input type="text" name="in"  style="width:40px;" value = <?= $inch;?>>
            <span class = "error"> <?php echo $inchErr;?>
        </div>
        <div class="label">
            <label>Weight(pounds): </label> 
        </div>
        <div>
        <input type="text" name="weight" value=<?=$weight;?> style="width:40px;" value = <?= $weight;?>>
        <span class = "error"> <?php echo $weightErr;?>
        <div> 
        <div> 
        <input type = "submit" name = "save_info" value = Submit>
        </div> 

    </form>

<?php if($_SERVER["REQUEST_METHOD"] == "POST" && $errSum == ""):?>
<div> 
    <h1>Paitent Summary<h1> 
    <div id ="info">
    First Name: <?= $firstname;?>     
    <br>
    First Name: <?= $lastname;?>     
    <br>
    Marraige Status: <?= $married;?>     
    <br>
    Birth Date: <?= $Birthdate;?>     
    <br>
    Height: <br> <?= $feet;?> feet <br> <?= $inch;?> inches
    <br>
     weight:  <?= $weight;?>
     <br> 
     bmi: <?= $bmi;?> 
     <br>
     Bmi Description: <?= $bmidesc;?>
     <br>
     Age: <?= $age;?> 

</div>
<?php endif ;?> 

     
        
     </body>
     </html>

