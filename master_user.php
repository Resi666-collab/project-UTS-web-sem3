<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php?page=login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Master User</title>
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
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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
    <h2>Data Master User</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
        </tr>

        <?php
        include 'koneksi.php';
        $result = mysqli_query($conn, "SELECT * FROM users ORDER BY id ASC");
        $no = 1;

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['role']}</td>
                  </tr>";
            $no++;
        }
        ?>
    </table>
</main>

<footer>
    <p>&copy; <?= date("Y"); ?> Sistem Admin</p>
</footer>

</body>
</html>
