<?php 

/* Return Fizz Buzz if multiple of 2 and 3 (6)
   Return Fizz if multiple of 2
   Return Buzz if multiple of 3
   Return $num otherwise
*/
function fizzBuzz($num) 
{

    if ($num % 3 == 0 )
    {
        echo $num; 
        echo "Fizz <br>" ; 
    }
    if ($num % 2 == 0)
    {
        echo $num;
        echo "Buzz <br>"; 
    }
    if ($num % 3 == 0 && $num % 2 == 0)
    {
        echo $num;
        echo "Fizz Buzz <br>";
    }
    if ($num == 0)
    {
        echo $num;
    }
    else 
    {
        $num;
    }

}
?>
<h2> FizzBuzz </h2> 
<p> <?php for($i = 0; $i <=100; $i++){
    fizzbuzz($i);}
    ?> </p> 
