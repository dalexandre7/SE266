<?php



function checkage($age){
    if ($age >= 21){
        echo "Old enough!"; 
    } 
    else 
    {
        echo "Too young!"; 
    }
}

?>

<h2> Age Checker! </h2> 
<p> <?php checkage(21); ?> </p> 


