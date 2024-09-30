<?php
session_start();
// Cek apakah sesi masih ada
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirect ke halaman awal jika tidak ada sesi
    exit();
}

$score = $_GET['score'] ?? 0; // Ambil skor dari URL
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Hasil Permainan</title>
</head>
<body>
    <div class="container">
        <h1>Hasil Permainan</h1>
        <p>Nama: <?php echo $username; ?></p>
        <p>Skor: <?php echo $score; ?></p>
        <div>
            <form action="exit.php" method="post" style="margin-top: 10px;">
                <input type="submit" value="Keluar">
            </form>
        </div>
    </div>
</body>
</html>
