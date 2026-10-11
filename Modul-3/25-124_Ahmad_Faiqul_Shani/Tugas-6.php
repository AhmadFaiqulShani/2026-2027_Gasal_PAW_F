<?php
$array1 = array("A");
echo 'Array awal: ("A")<br>';
array_push($array1, "B");
echo "Hasil array_phus: ";
foreach ($array1 as $x) {
    echo $x . " ";
}
echo "<br><br>";
$array2 = array("A", "B");
$array3 = array("C");
echo 'Array awal: ("A", "B") digabung dengan ("C")<br>';
$m = array_merge($array2, $array3);
echo "Hasil array_merge: ";
foreach ($m as $i) {
    echo $i . " ";
}
echo "<br><br>";
$array4 = array("x" => 1, "y" => 2);
echo 'Array awal: ("x" => 1, "y" => 2)<br>';
$value = array_values($array4);
echo "Hasil array_values: ";
foreach ($value as $i) {
    echo $i . " ";
}
echo "<br><br>";
$array5 = array("x" => 1, "y" => 2);
echo 'Array awal: ("x" => 1, "y" => 2)<br>';
$values = array_values($array5);
echo "Hasil array_values: ";
foreach ($values as $i) {
    echo $i . " ";
}
echo "<br><br>";
$array6 = array("A", "B", "C");
echo 'Mencari "B" pada array: ("A", "B", "C")<br>';
$search = array_search("B", $array6);
echo "Hasil array_search: " . $search . "<br><br>";

$array7 = array(0, 1, false, 2, "", 3, "array");
echo 'Array awal: (0, 1, false, 2, "", 3, "array")<br>';
$filtered = array_filter($array7);
echo "Hasil array_filter: ";
foreach ($filtered as $i) {
    echo $i . " ";
}
echo "<br><br>";
// Sorting Array sort dan rsort
$arr6 = array(3, 1, 2);
echo 'Array awal: (3, 1, 2)<br>';

$arrSort = $arr6;
sort($arrSort);
echo "Hasil sort: ";
foreach ($arrSort as $val) {
    echo $val . " ";
}
echo "<br>";

$arrRsort = $arr6;
rsort($arrRsort);
echo "Hasil rsort: ";
foreach ($arrRsort as $val) {
    echo $val . " ";
}
echo "<br><br>";

$Array8 = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
echo 'Array awal: ("Peter"=>35, "Ben"=>37, "Joe"=>43)<br>';

// asort
$asortArr = $Array8;
asort($asortArr);
echo "Hasil asort: ";
foreach($asortArr as $k => $v) {
    echo $k . "=>" . $v . ", ";
}
echo "<br>";

// ksort
$ksortArr = $Array8;
ksort($ksortArr);
echo "Hasil ksort: ";
foreach($ksortArr as $k => $v) {
    echo $k . "=>" . $v . ", ";
}
echo "<br>";

// arsort
$arsortArr = $Array8;
arsort($arsortArr);
echo "Hasil arsort: ";
foreach($arsortArr as $k => $v) {
    echo $k . "=>" . $v . ", ";
}
echo "<br>";

// krsort
$krsortArr = $Array8;
krsort($krsortArr);
echo "Hasil krsort: ";
foreach($krsortArr as $k => $v) {
    echo $k . "=>" . $v . ", ";
}
?>