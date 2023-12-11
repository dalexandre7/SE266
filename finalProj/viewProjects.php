<?php
        
        include __DIR__ . '\model\model_projects.php';

        if(isset($_POST['deleteContact'])){
            $id = filter_input(INPUT_POST, 'contactId');
            deleteContact($id);
        }

        $contacts = getContacts();
        
        
        ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="home.css">
  <title>Contacts</title>
</head>
<body> 
<div class="container">
    <div class="col-sm-offset-2 col-sm-10">
     
                
        
            <h1>Contactss</h1>
                  
            <a href="search.php">Search for Contacts</a> 

       
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Project Description</th>
                    <th>Read?</th> 
                    <th><th>
                <tr> 
            <thead>

            <tbody>

            <?php foreach ($contacts as $row): ?> 
                <tr> 
                    <td>
                        <!-- FORM FOR DELETE FUNCTIONALITY -->
                        <form action='viewProjects.php' method='post'>
                            <input type="hidden" name="contactId" value="<?= $row['id'];?>"/>
                            <input class="" type="submit" name="deleteContact" value="Delete" />
                            <?= $row['id']; ?>
                        </form>
                    </td>
                    <!--<td><?php //echo $row['id']; ?></td>-->
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['projDesc']; ?></td>
                    <td><?php if($row['readStatus'] == 1):?> read <?php else:?>Unread<?php endif; ?></td>
                    <td><a href="addContacts.php?action=Update&contactId=<?= $row['id']; ?>">Edit</a></td>
                </tr>
            
                <?php endforeach; ?> 
            </tbody>
        </table>
    </div> 
</div> 





                
            

    
</body>
</html>