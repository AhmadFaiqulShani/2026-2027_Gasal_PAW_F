<?php
include 'koneksi.php';
$query = "SELECT * FROM barang";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data MAster Barang</title>
</head>
<body>
    <h1> <a href="detail_transaksi.php">tambah data baru</a></h1>
    <table border='1'>
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stock</th>
            <th>Fitur</th>
        </tr>
        <?php if(mysqli_num_rows($result) > 0): ?>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)):  
            ?>  
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row["kode_barang"]; ?></td>
                    <td><?= $row["nama_barang"]; ?></td>
                    <td>Rp <?= number_format($row["harga"], 0, ',', '.'); ?></td>
                    <td><?= $row["stok"]; ?></td>
                    <td>
                        <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('anda yakin ingin menghapus barang ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>
    </table>
</body>
</html>