<?php
session_start();

if(!isset($_SESSION['user'])){
    header('Location: restricted.php');
}

?>
<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include __DIR__ . '\model\model_projects.php';
$err = "";
if(isset($_GET['contactId'])){
    $id = filter_input(INPUT_GET, 'contactId');
    $contact = getContact($id); 
 
        $firstName = $contact['firstName'];
        $lastName = $contact['lastName'];
        $projDesc = $contact['projDesc'];
        $readStatus = $contact['readStatus']; 

    //UPDATE TEAM WAS SUBMITTED IN FORM -> GRAB SUBMITTED VALUES AND PASS TO THE updateTeam() METHOD!
}
if(isset($_POST['updateContact'])){
    $id = filter_input(INPUT_POST, 'contactId');
    $readStatus = filter_input(INPUT_POST, 'readStatus');

    updateContact($id, $readStatus); 
    header('Location: viewProjects.php');
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

<?php 
?>
<html lang="en">
<head>
  <title>Read?</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
<main>


  <h1>Admin Contact Edit Form</h1>
  <div class="col-sm-offset-1 col-sm-10"><p><a href="./viewProjects.php">View </a></p></div>
  <div>
      <label class="control-label col-sm-2" for="First Name">First Name:</label>
      <div class="col-sm-10">
        <?php echo($firstName); ?>
      </div>
    </div>

    <div >
      <label class="control-label col-sm-2" for="pwd">Last Name</label>
      <div class="col-sm-10">          
      <?php echo($lastName); ?>
      </div>
    </div>

    <div>
      <label class="control-label col-sm-2" for="pwd">ProjDesc</label>
      <div class="col-sm-10">          
      <?php echo($projDesc); ?>
      </div>
    </div>


  <form class="form-horizontal" action="addContacts.php" method="post">
    <input type="hidden" name="contactId" value="<?= $id ;?>" /> 

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Read?</label>
      <div class="col-sm-10">          
        <input type="radio" name="readStatus" value="1" <?php if($readStatus == 1):?> checked <?php endif; ?>> Yes
        <input type="radio" name="readStatus" value="0"<?php if($readStatus == 0):?> checked <?php endif; ?>> No
      </div>
    </div>


    
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name= "updateContact" class="btn btn-default">Save</input>
        <?php
            if (isPostRequest()) {
                echo "Proposal/Inquriry Submitted!!";
            }
        ?>
      </div>
    </div>
  </form>
  
</div>
        </main>

</body>
</html>
