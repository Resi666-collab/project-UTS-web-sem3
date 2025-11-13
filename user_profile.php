<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'koneksi.php';

// pastikan user login
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: index.php?page=login");
    exit;
}

$username = $_SESSION['username'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($query);

// jika user belum punya foto, pakai default
$foto = !empty($user['foto']) ? $user['foto'] : 'default.png';

// proses upload foto
if (isset($_POST['upload'])) {
    if (!empty($_FILES["foto"]["name"])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $fileName = basename($_FILES["foto"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array(strtolower($fileType), $allowTypes)) {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFilePath)) {
                // update nama file foto di database
                mysqli_query($conn, "UPDATE users SET foto='$fileName' WHERE username='$username'");
                $_SESSION['message'] = "Foto profil berhasil diperbarui!";
                header("Location: user_profile.php");
                exit;
            } else {
                $_SESSION['message'] = "Gagal mengupload file.";
            }
        } else {
            $_SESSION['message'] = "Format file tidak valid. Gunakan JPG, PNG, atau GIF.";
        }
    } else {
        $_SESSION['message'] = "Pilih file gambar terlebih dahulu.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #a2d4e0ff;
            color: white;
            padding: 15px 0;
            text-align: center;
        }
        nav {
            background-color: #8ec7ddff;
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
        .container {
            width: 400px;
            background: white;
            margin: 40px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            text-align: center;
        }
        img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
        button {
            background-color: #475d86ff;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #77afb1ff;
        }
        .message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<header>
    <h2>Profil User</h2>
</header>

<nav>
    <a href="user_dashboard.php">Dashboard</a> |
    <a href="product_user.php">Product</a> |
    <a href="user_profile.php">User</a> |
    <a href="logout.php">Logout</a>
</nav>

<div class="container">
    <h3>Halo, <?= htmlspecialchars($user['username']); ?> 👋</h3>
    <img src="uploads/<?= htmlspecialchars($foto); ?>" alt="Foto Profil">
    
    <?php if (isset($_SESSION['message'])): ?>
        <p class="message"><?= $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="foto" accept="image/*" required><br><br>
        <button type="submit" name="upload">Ubah Foto</button>
    </form>
</div>

<footer style="text-align:center; margin-top:40px; color:#777;">
    <p>&copy; <?= date("Y"); ?> Sistem User</p>
</footer>

</body>
</html>
