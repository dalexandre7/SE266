<?php 

    include __DIR__ . '/model/model_projects.php'; 
    if(isPostRequest()){
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $projDesc = filter_input(INPUT_POST, 'projDesc');
        $readStatus = filter_input(INPUT_POST, 'readStatus'); 
        $res = addContact($firstName,$lastName,$projDesc,$readStatus);
    }
    ?> 

<?php 
?>
<html lang="en">
<head>
  <title>Contact Me!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">


  <h1>Contact Me!</h1>
  <form class="form-horizontal" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="First Name">First Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Contact" placeholder="Enter Contact First name" name="firstName">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Last Name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Enter Contact Last name" name="lastName">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">ProjDesc</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="division" placeholder="Enter Project Description" name="projDesc">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Connect</button>
        <?php
            if (isPostRequest()) {
                echo "Proposal/Inquriry Submitted!!";
            }
        ?>
      </div>
    </div>
  </form>
  
</div>

</body>
</html>
