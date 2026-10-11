<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);
echo "Data awal:";
echo "students = (";
echo "<br>";
for ($i = 0; $i < count($students); $i++) {
    echo '("' . $students[$i][0] . '", "' . $students[$i][1] . '", "' . $students[$i][2] . '")<br>';
}
echo ")<br><br>";
array_push($students, array("Daniel", "220404", "0812345611"));
array_push($students, array("Elena", "220405", "0812345622"));
array_push($students, array("Fiona", "220406", "0812345633"));
array_push($students, array("Gabe", "220407", "0812345644"));
array_push($students, array("Hannah", "220408", "0812345655"));
echo "<br>";
echo "Data setelah ditambah 5 data lain:<br>";
echo "<br>";
echo "students = (";
echo "<br>";
for ($i = 0; $i < count($students); $i++) {
    echo '("' . $students[$i][0] . '", "' . $students[$i][1] . '", "' . $students[$i][2] . '")<br>';
}
echo ")";

?>