<?php
include 'koneksi.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $query_cek  = "SELECT COUNT(*) AS total FROM transaksi_detail WHERE barang_id = '$id'";
    $result_cek = mysqli_query($conn, $query_cek);
    $row_cek    = mysqli_fetch_assoc($result_cek);

    if ($row_cek['total'] > 0) {
        echo "<script>
                alert('Barang tidak dapat dihapus karena masih digunakan pada data transaksi');
                window.location.href = 'index.php';
              </script>";
    } else {
        $query_delete = "DELETE FROM barang WHERE id = '$id'";
        if (mysqli_query($conn, $query_delete)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal menghapus data: " . mysqli_error($conn);
        }
    }
}
?>