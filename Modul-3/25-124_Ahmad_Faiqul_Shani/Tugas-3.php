<?php
//3.1
$height = array("Andy"=>"176","Barry"=>"165","Charlie"=>"170");
$height["David"] = "180";
$height["Ethan"] = "172";
$height["Frank"] = "168";
$height["George"] = "175";
$height["Harry"] = "182";
var_dump($height);
echo "<br>";
echo "Nilai dengan indeks terakhir: " . end($height);
echo "<br>";
unset($height["Charlie"]);
var_dump($height);
echo "<br>";
echo "Nilai dengan indeks terakhir setelah di hapus: " . end($height);
echo "<br>" . "<br>";
//3.2
$weight = array("Andy"=>"70","Barry"=>"65","Charlie"=>"75");
var_dump($weight);
echo "<br>";
echo "Data kedua: " . $weight["Barry"];

?>