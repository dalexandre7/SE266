<?php 

    include (__DIR__ . '\db.php'); 

    function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }

    function getPatients() {

        global $db; 

        $res = []; 

        $con = $db->prepare("SELECT id, patientFirstName, patientLastName,patientMarried,patientBirthDate FROM patients"); 

        if ($con->execute() && $con->rowCount() > 0)
        {
            $res = $con->fetchAll(PDO::FETCH_ASSOC);
        }

            return($res); 

    }

    function addPaitient($patientFirstName,$patientLastName,$patientMarried, $patientBirthDate){
        global $db; 
        $res = "Not yet!"; 
        $con = $db->prepare("INSERT INTO patients SET patientFirstName = :patientFirstName, patientLastName = :patientLastName, patientMarried = :patientMarried, patientBirthDate =:patientBirthDate "); 

        $binding = array( 
            ":patientFirstName" => $patientFirstName, 
            ":patientLastName" => $patientLastName,
            ":patientMarried" => $patientMarried,
            ":patientBirthDate" => $patientBirthDate
        ); 

        if ($con ->execute($binding) && $con->rowCount() > 0){
            $res = 'Data Added'; 
        }
        return ($res); 

    }