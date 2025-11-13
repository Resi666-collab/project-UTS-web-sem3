<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: index.php?page=login");
    exit;
}
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #8dc1d6ff;
            color: white;
            padding: 15px 0;
            text-align: center;
        }

        nav {
            background-color: #6c8dacff;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        main {
            margin: 40px auto;
            width: 80%;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #5f88aaff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: #777;
        }
    </style>
</head>
<body>

<header>
    <h2>Dashboard User</h2>
</header>

<nav>
    <a href="user_dashboard.php">Dashboard</a> |
    <a href="product_user.php">Product</a> |
    <a href="user_profile.php">User</a> |
    <a href="logout.php">Logout</a>
</nav>

<main>
    <h2>Daftar Produk</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Supplier</th>
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
                        <td>Rp " . number_format($row['harga'], 2, ',', '.') . "</td>
                        <td>{$row['stok']}</td>
                        <td>{$row['nama_supplier']}</td>
                      </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='5'>Belum ada produk.</td></tr>";
        }
        ?>
    </table>
</main>

<footer>
    <p>&copy; <?= date("Y"); ?> Sistem User</p>
</footer>

</body>
</html>
