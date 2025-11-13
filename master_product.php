<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php?page=login");
    exit;
}
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Master Product</title>
<style>
    body { font-family: Arial; background-color: #f3f4f6; margin: 0; padding: 0; }
    header { background-color: #a34048; color: white; padding: 15px 0; text-align: center; }
    nav { background-color: #772929; padding: 10px; text-align: center; }
    nav a { color: white; margin: 0 15px; text-decoration: none; font-weight: bold; }
    nav a:hover { text-decoration: underline; }
    main { margin: 50px auto; width: 80%; background: white; border-radius: 10px; padding: 20px;
           box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    h2 { text-align: center; color: #333; }
    table { width: 100%; border-collapse: collapse; margin-top: 15px; }
    th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
    th { background-color: #a34048; color: white; }
    tr:nth-child(even) { background-color: #f9f9f9; }
    .add-btn { display: inline-block; background-color: #a34048; color: white;
               padding: 8px 15px; border-radius: 6px; text-decoration: none; margin-bottom: 15px; }
    .add-btn:hover { background-color: #772929; }
</style>
</head>
<body>

<header><h2>Dashboard Admin</h2></header>
<nav>
    <a href="admin_dashboard.php">Dashboard</a> |
    <a href="master_user.php">Master User</a> |
    <a href="master_supplier.php">Master Supplier</a> |
    <a href="master_product.php">Master Produk</a> |
    <a href="logout.php">Logout</a>
</nav>

<main>
    <h2>Data Master Produk</h2>
    <a href="tambah_product.php" class="add-btn">+ Tambah Produk</a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Supplier</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query = mysqli_query($conn, "SELECT p.*, s.nama_supplier 
                                      FROM product p 
                                      LEFT JOIN supplier s ON p.id_supplier = s.id 
                                      ORDER BY p.id ASC");
        $no = 1;
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama_product']}</td>
                        <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                        <td>{$row['stok']}</td>
                        <td>" . ($row['nama_supplier'] ?? '-') . "</td>
                        <td>
                            <a href='edit_product.php?id={$row['id']}'>Edit</a> |
                            <a href='hapus_product.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                        </td>
                      </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='6'>Belum ada data produk.</td></tr>";
        }
        ?>
    </table>
</main>

<footer style="text-align:center;margin-top:40px;color:#777;">
    <p>&copy; <?= date("Y"); ?> Sistem Admin</p>
</footer>
</body>
</html>
