<?php
//4.1
$height = array("Andy"=>"176","Barry"=>"165","Charlie"=>"170");
$height["David"] = "180";
$height["Ethan"] = "172";
$height["Frank"] = "168";
$height["George"] = "175";
$height["Harry"] = "182";
var_dump($height);
echo "<br>" . "<br>";
foreach($height as $name => $value) {
    echo $name . " is " . $value . " cm tall.<br>";
}
echo "<br>";
$weight = array("Andy"=>"70","Barry"=>"65","Charlie"=>"75");
echo var_dump($weight);
echo "<br><br>";
$key = array_keys($weight);
$nilai_nama = count($weight);
for($r = 0; $r < $nilai_nama; $r++){
    $k = $key[$r];
    echo $k." is ". $weight[$k] . " kg." ."<br>";

}

?>