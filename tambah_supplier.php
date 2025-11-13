<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php?page=login");
    exit;
}
include 'koneksi.php';

// Proses simpan data
if (isset($_POST['simpan'])) {
    $nama_supplier = $_POST['nama_supplier'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    if (!empty($nama_supplier) && !empty($alamat) && !empty($telepon)) {
        $query = "INSERT INTO supplier (nama_supplier, alamat, telepon) 
                  VALUES ('$nama_supplier', '$alamat', '$telepon')";
        if (mysqli_query($conn, $query)) {
            header("Location: master_supplier.php");
            exit;
        } else {
            echo "Gagal menambah supplier: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Semua kolom wajib diisi!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #a34048;
            color: white;
            padding: 15px;
            text-align: center;
        }
        nav {
            background-color: #772929;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }
        main {
            margin: 50px auto;
            width: 50%;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        label {
            font-weight: bold;
        }
        input, textarea {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #a34048;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #772929;
        }
    </style>
</head>
<body>

<header>
    <h2>Tambah Supplier</h2>
</header>

<nav>
    <a href="admin_dashboard.php">Dashboard</a> |
    <a href="master_user.php">Master User</a> |
    <a href="master_supplier.php">Master Supplier</a> |
    <a href="master_product.php">Master Product</a> |
    <a href="logout.php">Logout</a>
</nav>

<main>
    <h2>Form Tambah Supplier</h2>
    <form method="POST">
        <label>Nama Supplier:</label>
        <input type="text" name="nama_supplier" required>

        <label>Alamat:</label>
        <textarea name="alamat" required></textarea>

        <label>No. Telepon:</label>
        <input type="text" name="telepon" required>

        <button type="submit" name="simpan">Simpan</button>
    </form>
</main>

</body>
</html>
