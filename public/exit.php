<?php
session_start(); // Memulai sesi

// Hapus semua variabel sesi
$_SESSION = array();

// Jika Anda ingin menghancurkan sesi sepenuhnya, hapus cookie sesi
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"], $params["secure"], $params["httponly"]
    );
}

// Hancurkan sesi
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keluar dari Permainan</title>
    <link rel="stylesheet" href="../css/style.css"> 
</head>
<body>
    <div class="container">
        <h1>Terima Kasih Telah Bermain!</h1>
        <p>Anda telah keluar dari permainan.</p>
        <a href="index.php" class="back-button">Kembali ke Beranda</a>
    </div>
</body>
</html>
