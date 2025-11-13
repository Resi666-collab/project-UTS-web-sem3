<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_product'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $id_supplier = $_POST['id_supplier'];

    mysqli_query($conn, "INSERT INTO product (nama_product, harga, stok, id_supplier)
                         VALUES ('$nama', '$harga', '$stok', '$id_supplier')");
    header("Location: master_product.php");
    exit;
}

$supplier = mysqli_query($conn, "SELECT * FROM supplier ORDER BY nama_supplier ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Product</title>
<style>
    body { font-family: Arial; background-color: #f3f4f6; }
    form { width: 400px; margin: 80px auto; background: white; padding: 20px;
           border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    input, select { width: 100%; padding: 8px; margin: 6px 0; }
    button { background: #a34048; color: white; border: none; padding: 8px 15px; border-radius: 5px; }
</style>
</head>
<body>
<form method="post">
    <h3>Tambah Data Product</h3>
    <label>Nama Product</label>
    <input type="text" name="nama_product" required>

    <label>Harga</label>
    <input type="number" name="harga" required>

    <label>Stok</label>
    <input type="number" name="stok" required>

    <label>Supplier</label>
    <select name="id_supplier" required>
        <option value="">-- Pilih Supplier --</option>
        <?php while ($s = mysqli_fetch_assoc($supplier)) { ?>
            <option value="<?= $s['id']; ?>"><?= $s['nama_supplier']; ?></option>
        <?php } ?>
    </select>

    <button type="submit" name="simpan">Simpan</button>
</form>
</body>
</html>
