<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama   = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $telp   = mysqli_real_escape_string($koneksi, $_POST['telp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $insert = mysqli_query($koneksi, "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')");

    if ($insert) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menambah data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Supplier Baru</title>
</head>
<body>

    <h3>Tambah Data Supplier Baru</h3>

    <form action="" method="POST">
        <table border="0" cellpadding="5">
            <tr>
                <td>Nama</td>
                <td>: <input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Telp</td>
                <td>: <input type="text" name="telp" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <input type="text" name="alamat" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="simpan">Simpan</button>
                    <a href="index.php">Batal</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>