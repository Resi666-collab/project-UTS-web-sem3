<?php
include 'koneksi.php';

// Pastikan ID ada di URL
if (!isset($_GET['id'])) {
    echo "ID produk tidak ditemukan!";
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM product WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data produk tidak ditemukan!";
    exit;
}

// Proses update data
if (isset($_POST['update'])) {
    $nama = $_POST['nama_product'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $id_supplier = $_POST['id_supplier'];

    $update = mysqli_query($conn, "UPDATE product SET 
        nama_product='$nama',
        harga='$harga',
        stok='$stok',
        id_supplier='$id_supplier'
        WHERE id='$id'
    ");

    if ($update) {
        header("Location: master_product.php");
        exit;
    } else {
        echo "Gagal menyimpan perubahan: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <style>
        body { font-family: Arial; background-color: #f3f4f6; }
        form { width: 400px; margin: 80px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        input, select { width: 100%; padding: 8px; margin: 6px 0; border-radius: 5px; border: 1px solid #ccc; }
        button { background: #a34048; color: white; border: none; padding: 10px; border-radius: 5px; width: 100%; cursor: pointer; }
        button:hover { background: #872f3a; }
    </style>
</head>
<body>
    <form method="post">
        <h3>Edit Data Product</h3>

        <label>Nama Product</label>
        <input type="text" name="nama_product" value="<?= htmlspecialchars($data['nama_product']); ?>" required>

        <label>Harga</label>
        <input type="number" step="0.01" name="harga" value="<?= htmlspecialchars($data['harga']); ?>" required>

        <label>Stok</label>
        <input type="number" name="stok" value="<?= htmlspecialchars($data['stok']); ?>" required>

        <label>Supplier</label>
        <select name="id_supplier" required>
            <option value="">-- Pilih Supplier --</option>
            <?php
            $supplierQuery = mysqli_query($conn, "SELECT * FROM supplier");
            while ($supplier = mysqli_fetch_assoc($supplierQuery)) {
                $selected = ($supplier['id'] == $data['id_supplier']) ? 'selected' : '';
                echo "<option value='{$supplier['id']}' $selected>{$supplier['nama_supplier']}</option>";
            }
            ?>
        </select>

        <button type="submit" name="update">Simpan Perubahan</button>
    </form>
</body>
</html>
