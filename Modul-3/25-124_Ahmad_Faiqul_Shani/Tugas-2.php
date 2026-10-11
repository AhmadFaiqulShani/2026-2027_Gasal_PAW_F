<?php
//2.1
$fruits = array("Avocado","Blueberry","Cherry");
$tambah = array("Buah Tambahan 1","Buah Tambahan 2","Buah Tambahan 3","Buah Tambahan 4", "Buah Tambahan 5");

for($x = 0; $x < count($tambah); $x++){
    array_push($fruits, $tambah[$x]);
}
$arrlength = count($fruits);
echo "Panjang array saat ini: " . $arrlength;
echo "<br>";
echo "<br>";
for($r = 0; $r< $arrlength; $r++){ //tetapi tidak harus diubah Alasannya, variabel $arrlength pada awalnya bernilai 3 karena array $fruits hanya berisi tiga data. Setelah ditambahkan lima data baru, jumlahnya menjadi 8. Jika $arrlength tidak diperbarui, perulangan hanya akan menampilkan tiga data pertama.
    echo $fruits[$r];
    echo "<br>";
}
echo "<br>";
var_dump($fruits); 
echo "<br>";
echo "<br>";

//2.2
$vegies = array("Carrot", "Broccoli", "Spinach");
$arrlength2 = count($vegies);
for($s = 0; $s < $arrlength2; $s++){ 
    echo $vegies[$s];
    echo "<br>";
}