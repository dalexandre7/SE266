<?php 
$homework = array("Math"=>"95", "English"=>"85", "Science"=>"82");

foreach($homework as $x => $x_value) {
  echo "Subject: " . $x . " <br> Grade:" . $x_value;
  echo "<br>";
}
?>
