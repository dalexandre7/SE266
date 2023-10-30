<h1>Task For The Day<h1> 
<?php 
$task = array("title"=>"Finish homework", "due"=>"today", "assigned_to"=>"Jeffrey", "completed" => true);
?>
<ul> 
    <li>
        <strong> Name: </strong>
        <?= $task['title']; ?> 
    <li>
    <li>
        <strong> Due Date: </strong>
        <?= $task['due']; ?> 
    <li>
    <li>
        <strong> Personel Responsible: </strong>
        <?= $task['assigned_to']; ?> 
    <li>
    <li>
        <strong> Status: </strong>
        <?php 

        if ($task['completed']){
            echo '&#9989';
        } else {
            echo 'Incomplete';
        }
        ?>
    <li>



<?php 
?>