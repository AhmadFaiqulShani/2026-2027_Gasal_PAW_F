<?php

$fruits = array("Avocado","Blueberry","Cherry");
array_push($fruits,"Durian");
array_push($fruits,"Elderberry");
array_push($fruits,"Fig");
array_push($fruits,"Grape");
array_push($fruits,"Honeydew");
var_dump($fruits);
echo "<br>";
echo "Nilai dengan indeks tertinggi : $fruits[7]";
echo "<br>";
echo "<br>";
unset($fruits[1]);
$fruits = array_values($fruits);
echo "Data Blueberry dihapus.";
echo "<br>";
var_dump($fruits);
echo "<br>";
echo "Nilai dengan indeks tertinggi : $fruits[6]";

?>