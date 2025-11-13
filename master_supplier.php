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
    <title>Master Supplier</title>
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
            padding: 15px 0;
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

        nav a:hover {
            text-decoration: underline;
        }

        main {
            margin: 50px auto;
            width: 80%;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(24, 22, 22, 1);
        }

        h2 {
            text-align: center;
            color: #2c2626ff;
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
            background-color: #a34048;
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

        .add-btn {
            display: inline-block;
            background-color: #a34048;
            color: white;
            padding: 8px 15px;
            border-radius: 6px;
            text-decoration: none;
            margin-bottom: 15px;
        }

        .add-btn:hover {
            background-color: #772929;
        }

        .no-data {
            text-align: center;
            color: #f7eeeeff;
            font-style: italic;
        }
    </style>
</head>
<body>

<header>
    <h2>Dashboard Admin</h2>
</header>

<nav>
    <a href="admin_dashboard.php">Dashboard</a> |
    <a href="master_user.php">Master User</a> |
    <a href="master_supplier.php">Master Supplier</a> |
    <a href="master_product.php">Master Product</a> |
    <a href="logout.php">Logout</a>
</nav>

<main>
    <h2>Data Master Supplier</h2>
    <a href="tambah_supplier.php" class="add-btn">+ Tambah Supplier</a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th>Aksi</th>
        </tr>

        <?php
        $query = mysqli_query($conn, "SELECT * FROM supplier ORDER BY id ASC");

        if (!$query) {
            echo "<tr><td colspan='5' class='no-data'>Terjadi kesalahan query: " . mysqli_error($conn) . "</td></tr>";
        } elseif (mysqli_num_rows($query) == 0) {
            echo "<tr><td colspan='5' class='no-data'>Belum ada data supplier.</td></tr>";
        } else {
            $no = 1;
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama_supplier']}</td>
                        <td>{$row['alamat']}</td>
                        <td>{$row['telepon']}</td>
                        <td>
                            <a href='edit_supplier.php?id={$row['id']}'>Edit</a> | 
                            <a href='hapus_supplier.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                        </td>
                      </tr>";
                $no++;
            }
        }
        ?>
    </table>
</main>

<footer>
    <p>&copy; <?= date("Y"); ?> Sistem Admin</p>
</footer>

<?php
// Tampilkan notifikasi dari hapus_supplier.php
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    if ($msg == 'hapus_sukses') {
        echo "<script>alert('Data supplier berhasil dihapus.');</script>";
    } elseif ($msg == 'hapus_gagal') {
        $error = addslashes($_GET['error'] ?? '');
        echo "<script>alert('Gagal menghapus data: {$error}');</script>";
    } elseif ($msg == 'ID_tidak_ditemukan') {
        echo "<script>alert('ID supplier tidak ditemukan.');</script>";
    }
}
?>
</body>
</html>
