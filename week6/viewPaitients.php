<?php
        
        include __DIR__ . '\model\model_paitents.php';

        if(isset($_POST['deletePaitient'])){
            $id = filter_input(INPUT_POST, 'paitientId');
            deletePatient($id);
        }

        $paitents = getPatients();
        
        
        
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Paitients</title>
</head>
<body>
<div class="container">
    <div class="col-sm-offset-2 col-sm-10">
     
                
        
            <h1>Paitients</h1>
                  
            <a href="addPaitient.php">Add Paitient</a>

       
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Married?</th>
                    <th>Birthdate</th> 
                <tr> 
            <thead>

            <tbody>

            <?php foreach ($paitents as $row): ?> 


                <tr> 
                    <td>
                        <!-- FORM FOR DELETE FUNCTIONALITY -->
                        <form action='viewPaitients.php' method='post'>
                            <input type="hidden" name="paitientId" value="<?= $row['id'];?>"/>
                            <input class="" type="submit" name="deletePaitient" value="Delete" />
                            <?= $row['id']; ?>
                        </form>
                    </td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['patientFirstName']; ?></td>
                    <td><?php echo $row['patientLastName']; ?></td>
                    <td><?php echo $row['patientMarried']; ?></td>
                    <td><?php echo $row['patientBirthDate']; ?></td>
                    <td><a href="editPaitients.php?action=Update&paitientId=<?= $row['id']; ?>">Edit</a></td>
                </tr>
            
                <?php endforeach; ?> 
            </tbody>
        </table>
    </div> 
</div> 





                
            

    
</body>
</html>
