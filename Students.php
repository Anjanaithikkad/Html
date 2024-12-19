<?php

$students = array("Anjana", "Sojavijay", "Hudha", "Sreya", "Nadafathima");


echo "<h3>Original Array:</h3>";
print_r($students); 

asort($students);
echo "<h3>Sorted Array Using asort:</h3>";
print_r($students); 

arsort($students);
echo "<h3>Sorted Array Using arsort:</h3>";
print_r($students); 

?>

