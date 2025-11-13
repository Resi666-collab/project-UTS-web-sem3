<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM supplier WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $nama = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    mysqli_query($conn, "UPDATE supplier SET 
        nama_supplier='$nama', 
        alamat='$alamat', 
        telepon='$telepon' 
        WHERE id='$id'");

    header("Location: master_supplier.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Supplier</title>
    <style>
        body { font-family: Arial; background-color: #f3f4f6; }
        form { width: 400px; margin: 80px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        input, textarea { width: 100%; padding: 8px; margin: 6px 0; }
        button { background: #a34048; color: white; border: none; padding: 8px 15px; border-radius: 5px; }
    </style>
</head>
<body>
    <form method="post">
        <h3>Edit Data Supplier</h3>
        <label>Nama Supplier</label>
        <input type="text" name="nama_supplier" value="<?= $data['nama_supplier']; ?>" required>

        <label>Alamat</label>
        <textarea name="alamat" required><?= $data['alamat']; ?></textarea>

        <label>Telepon</label>
        <input type="text" name="telepon" value="<?= $data['telepon']; ?>" required>

        <button type="submit" name="update">Simpan Perubahan</button>
    </form>
</body>
</html>
