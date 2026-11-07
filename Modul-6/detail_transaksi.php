<?php
include "koneksi.php";

$transaksi_id = isset($_GET['transaksi_id']) ? $_GET['transaksi_id'] : 1;

if (isset($_POST['tambah_detail'])) {
    $barang_id = $_POST['barang_id'];
    $qty       = $_POST['qty'];
    $res_harga = mysqli_query($conn, "SELECT harga FROM barang WHERE id = '$barang_id'");
    $row_harga = mysqli_fetch_assoc($res_harga);
    $harga     = $row_harga['harga'];

    mysqli_query($conn, "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty) VALUES ('$transaksi_id', '$barang_id', '$harga', '$qty')");

    $res_total  = mysqli_query($conn, "SELECT SUM(harga * qty) AS total FROM transaksi_detail WHERE transaksi_id = '$transaksi_id'");
    $row_total  = mysqli_fetch_assoc($res_total);
    $total_baru = $row_total['total'] ? $row_total['total'] : 0;

    mysqli_query($conn, "UPDATE transaksi SET total = '$total_baru' WHERE id = '$transaksi_id'");
    header("Location: detail_transaksi.php?transaksi_id=" . $transaksi_id);
    exit();
}
$res_transaksi = mysqli_query($conn, "SELECT t.*, p.nama AS nama_pelanggan FROM transaksi t LEFT JOIN pelanggan p ON t.pelanggan_id = p.id WHERE t.id = '$transaksi_id'");
$transaksi     = mysqli_fetch_assoc($res_transaksi);

$res_terpakai = mysqli_query($conn, "SELECT barang_id FROM transaksi_detail WHERE transaksi_id = '$transaksi_id'");
$terpakai     = array();
while ($row = mysqli_fetch_assoc($res_terpakai)) {
    $terpakai[] = $row['barang_id'];
}
$result_barang = mysqli_query($conn, "SELECT * FROM barang");
$result_detail = mysqli_query($conn, "SELECT td.*, b.nama_barang FROM transaksi_detail td JOIN barang b ON td.barang_id = b.id WHERE td.transaksi_id = '$transaksi_id'");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Transaksi</title>
</head>
<body>
    <table cellpadding="4">
        <tr>
            <td>Tanggal Transaksi</td>
            <td>: <?= $transaksi['waktu_transaksi']; ?></td>
        </tr>
        <tr>
            <td>Pelanggan</td>
            <td>: <?= $transaksi['nama_pelanggan']; ?></td>
        </tr>
        <tr>
            <td>Total Transaksi</td>
            <td>: Rp <?= number_format($transaksi['total'], 0, ',', '.'); ?></td>
        </tr>
    </table>
    <hr>

    <h3>Tambah Detail Barang</h3>
    <form method="post" action="">
        <table cellpadding="4">
            <tr>
                <td>Pilih Barang</td>
                <td>: 
                    <select name="barang_id" required>
                        <option value="">Pilih Barang</option>
                        <?php if (mysqli_num_rows($result_barang) > 0): ?>
                            <?php while ($b = mysqli_fetch_assoc($result_barang)): ?>
                                <?php $is_disabled = in_array($b['id'], $terpakai); ?>
                                <option value="<?= $b['id']; ?>" <?= $is_disabled ? 'disabled' : ''; ?>>
                                    <?= $b['nama_barang']; ?> - Rp <?= number_format($b['harga'], 0, ',', '.'); ?> <?= $is_disabled ? '(Sudah Ditambahkan)' : ''; ?>
                                </option>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah Qty</td>
                <td>: <input type="number" name="qty" min="1" value="1" required></td>
            </tr>
            <tr>
                <td><button type="submit" name="tambah_detail">tambah</button></td>
            </tr>
        </table>
    </form>
    <br>

    <h3>Barang Terbeli</h3>
    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <td>No</td>
            <td>Nama Barang</td>
            <td>Harga Satuan</td>
            <td>Qty</td>
            <td>Subtotal</td>
        </tr>
        <?php if (mysqli_num_rows($result_detail) > 0): ?>
            <?php 
            $no = 1;
            while ($d = mysqli_fetch_assoc($result_detail)): 
                $subtotal = $d['harga'] * $d['qty'];
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['nama_barang']; ?></td>
                    <td>Rp <?= number_format($d['harga'], 0, ',', '.'); ?></td>
                    <td><?= $d['qty']; ?></td>
                    <td>Rp <?= number_format($subtotal, 0, ',', '.'); ?></td>
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>
    </table>
</body>
</html>