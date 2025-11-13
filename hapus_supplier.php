<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: master_supplier.php?msg=ID_tidak_ditemukan");
    exit;
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM supplier WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    header("Location: master_supplier.php?msg=hapus_sukses");
} else {
    $err = urlencode(mysqli_error($conn));
    header("Location: master_supplier.php?msg=hapus_gagal&error=$err");
}
exit;
?>
