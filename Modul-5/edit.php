<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id = '$id'");
$data  = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $nama   = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $telp   = mysqli_real_escape_string($koneksi, $_POST['telp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $update = mysqli_query($koneksi, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'");

    if ($update) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Supplier</title>
</head>
<body>

    <h3>Edit Data Supplier</h3>

    <form action="" method="POST">
        <table border="0" cellpadding="5">
            <tr>
                <td>Nama</td>
                <td>: <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required></td>
            </tr>
            <tr>
                <td>Telp</td>
                <td>: <input type="text" name="telp" value="<?= htmlspecialchars($data['telp']); ?>" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <input type="text" name="alamat" value="<?= htmlspecialchars($data['alamat']); ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="update">Update</button>
                    <a href="index.php">Batal</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>