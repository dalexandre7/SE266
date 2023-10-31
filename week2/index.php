<?php 

$firstname = "";
$lastname = ""; 
$married = null; 
$Birthdate = date("Y/m/d"); 
$feet = 0; 
$inch = 0; 
$weight = 0; 


function age ($bdate) {
    $date = new DateTime($bdate);
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
    $bmi = 0;
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
    //write 
 }
 function isPostRequest() 
{
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function isGetRequest() 
{
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' && !empty($_GET) );
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
    <form action="patient" method="post" action="patient.php">
        <div class="label">
            <label>First Name: </label> 
        </div> 
        <div> 
           <input type="text" name="first_name" value="<?php echo $firstname ?>">
        </div>
        <div class="label">
            <label>Last Name: </label> 
        </div> 
        <div> 
           <input type="text" name="last_name" value>
        </div>
        <div class="label">
            <label>Married: </label> 
        </div> 
        <div>
        <input type="radio" name="married" value="yes">
        Yes
        <input type="radio" name="married" value="no">
        No
        <div class="label">
            <label>Birth Date: </label> 
        </div> 
        <div> 
           <input type="date" name="birth_date" value>
        </div>
        <div class="label">
            <label>Height: </label> 
        </div>
        <div>
            Feet: 
            <input type="text" name="ft" value="" style="width:40px;">
            Inches: 
            <input type="text" name="ft" value="" style="width:40px;">
        </div>
        <div class="label">
            <label>Weight(pounds): </label> 
        </div>
        <div>
        <input type="text" name="weight" value="" style="width:40px;">
        <div> 
        <div> 
        <input type="submit" name="storePatient" value="Store Patient Information">
        </div> 
       



    </form>
</body>
</html>

