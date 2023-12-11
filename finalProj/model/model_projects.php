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
    function searchContacts ($firstName, $lastName) {
        global $db;
        $binds = array();
    
        $sql =  "SELECT * FROM  contacts WHERE 0=0";

        if ($firstName != "") {
            $sql .= " AND firstName LIKE :firstName";
            $binds['firstName'] = '%'.$firstName.'%';
        }
    
        if ($lastName != "") {
            $sql .= " AND lastName LIKE :lastName";
            $binds['lastName'] = '%'.$lastName.'%';
        }
    
        $sql .= " ORDER BY firstName";

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

    function getContacts() {

        global $db; 

        $res = []; 

        $con = $db->prepare("SELECT id, firstName, lastName, projDesc, readStatus FROM contacts"); 

        if ($con->execute() && $con->rowCount() > 0)
        {
            $res = $con->fetchAll(PDO::FETCH_ASSOC);
        }

            return($res); 

    }
    function getContact($id) {

        global $db; 

        $result = []; 

        $con = $db->prepare("SELECT id, firstName, lastName, projDesc, readStatus FROM contacts WHERE id=:id"); 
        $con->bindValue(':id', $id); 

        if ($con->execute() && $con->rowCount() > 0)
        {
            $result = $con->fetch(PDO::FETCH_ASSOC);
        }

            return($result); 

    }

    function addContact($firstName,$lastName,$projDesc,$readStaus){
        global $db; 
        $res = "Not yet!"; 
        $con = $db->prepare("INSERT INTO contacts SET firstName = :firstName, lastName = :lastName, projDesc = :projDesc, readStatus =:readStatus"); 

        $binding = array( 
            ":firstName" => $firstName, 
            ":lastName" => $lastName,
            ":projDesc" => $projDesc,
            ":readStatus" => $readStatus
        ); 

        if ($con ->execute($binding) && $con->rowCount() > 0){
            $res = 'Data Added'; 
        }
        return ($res); 

    }
    function updateContact($id, $readStatus){
        global $db; 
        $res = "";
        $sql ="UPDATE contacts SET readStatus =:readStatus WHERE id=:id"; 
        $stmt = $db->prepare($sql); 
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':readStatus', $readStatus);

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        
        return ($res);

    }
    function deleteContact ($id) {
        global $db;
        
        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM contacts WHERE id=:id");
        
        $stmt->bindValue(':id', $id);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        
        return ($results);
    }