<?php 

    include (__DIR__ . '\db.php'); 

    function login($user, $pass){
        global $db;
        
        $result = [];
        $stmt = $db->prepare("SELECT * FROM users WHERE userName=:user AND userPassword=sha1(:pass)");
        $stmt->bindValue(':user', $user);
        $stmt->bindValue(':pass', $pass);
       
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        
         }
         
         return ($result);
    }
    function searchPaitients ($patientFirstName, $patientLastName) {
        global $db;
        $binds = array();
    
        $sql =  "SELECT * FROM  patients WHERE 0=0";

        if ($patientFirstName != "") {
            $sql .= " AND patientFirstName LIKE :patientFirstName";
            $binds['patientFirstName'] = '%'.$patientFirstName.'%';
        }
    
        if ($patientLastName != "") {
            $sql .= " AND patientLastName LIKE :patientLastName";
            $binds['patientLastName'] = '%'.$patientLastName.'%';
        }
    
        $sql .= " ORDER BY patientFirstName";

        $results = array();

        $stmt = $db->prepare($sql);

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
             
        return ($results);
    }


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
    function getPatient($id) {

        global $db; 

        $result = []; 

        $con = $db->prepare("SELECT id, patientFirstName, patientLastName,patientMarried,patientBirthDate FROM patients WHERE id=:id"); 
        $con->bindValue(':id', $id); 

        if ($con->execute() && $con->rowCount() > 0)
        {
            $result = $con->fetch(PDO::FETCH_ASSOC);
        }

            return($result); 

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
    function updatePaitient($patientFirstName,$patientLastName,$patientMarried, $patientBirthDate){
        global $db; 
        $res = "";
        $sql = "UPDATE patients SET patientFirstName = :patientFirstName, patientLastName = :patientLastName, patientMarried = :patientMarried, patientBirthDate =:patientBirthDate WHERE id=:id"; 
        $stmt = $db->prepare($sql); 
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':patientFirstName', $patientFirstName);
        $stmt->bindValue(':patientLastName', $patientLastName);
        $stmt->bindValue(':patientMarried', $patientMarried);
        $stmt->bindValue(':patientBirthDate', $patientBirthDate);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        
        return ($res);

    }
    function deletePatient ($id) {
        global $db;
        
        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM patients WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        
        return ($results);
    }