<?php
$errors = array();
// Memeriksa apakah form telah di-submit
if (isset($_POST['submit'])) {
    require 'validate.inc';
    // Memanggil fungsi validasi
    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');

    if ($errors) {
        echo "<h1 style='color:red;'>Invalid, correct the following errors:</h1>";
        echo "<ul>";
        foreach ($errors as $field => $error) {
            echo "<li><strong>$field</strong>: $error</li>";
        }
        echo "</ul>";
        // Tampilkan kembali form beserta data yang telah diisi
        include 'form.inc';
    } else {
        echo "<h1 style='color:green;'>Form submitted successfully with no errors!</h1>";
        echo "<h3>Posted data:</h3>";
        foreach ($_POST as $key => $value) {
            echo "($key) => (" . htmlspecialchars($value) . ")<br/>";
        }
    }
} else {
    // Tampilkan form kosong pada saat akses pertama kali
    include 'form.inc';
}
?>