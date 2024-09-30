<?php
session_start();
include('../includes/db.php');

// Reset session jika pemain memulai permainan baru
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['score'] = 0; // Inisialisasi skor
    $_SESSION['current_question'] = 0; // Reset pertanyaan
    unset($_SESSION['questions']); // Hapus pertanyaan yang sudah ada
}

// Memeriksa apakah pemain memilih untuk melanjutkan permainan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['continue'])) {
    // Tidak mereset skor, hanya melanjutkan permainan
    if (!isset($_SESSION['score'])) {
        $_SESSION['score'] = 0; // Jika belum ada skor, inisialisasi
    }
}

// Ambil semua soal dari database jika belum ada dalam session
if (!isset($_SESSION['questions'])) {
    $sql = "SELECT * FROM master_kata"; // Ambil semua soal
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Simpan semua soal dalam array session
        $_SESSION['questions'] = [];
        while ($row = $result->fetch_assoc()) {
            $_SESSION['questions'][] = $row;
        }
        shuffle($_SESSION['questions']); // Acak urutan soal
    } else {
        die("No data found");
    }
}

$current_question = $_SESSION['current_question'] ?? 0;

if (isset($_POST['answer'])) {
    $user_answer = implode('', $_POST['answer']);
    $correct_answer = $_SESSION['questions'][$current_question]['kata'];

    if (strtoupper(trim($user_answer)) == strtoupper($correct_answer)) {
        $_SESSION['score'] += 10; // Tambah skor jika jawaban benar
    }

    // Redirect ke halaman hasil
    header("Location: result.php?score=" . $_SESSION['score']);
    exit(); // Pastikan untuk menghentikan eksekusi skrip setelah pengalihan
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Asah Otak Game</title>
</head>
<body>
    <div class="container">
        <h1>Asah Otak Game</h1>
    
        <!-- Form untuk memasukkan username -->
        <?php if (!isset($_SESSION['username'])): ?>
            <form method="post">
                <label for="username">Masukkan Nama Anda:</label>
                <input type="text" name="username" required>
                <input type="submit" value="Mulai Game">
            </form>
        <?php else: ?>
            <p>Petunjuk: <?php echo $_SESSION['questions'][$current_question]['clue']; ?></p>
            <form method="post">
                <?php
                $word = $_SESSION['questions'][$current_question]['kata'];
                for ($i = 0; $i < strlen($word); $i++) {
                    // Menampilkan huruf yang dipilih sebagai helper (contoh posisi ke-2 dan ke-6)
                    if ($i == 2 || $i == 6) {
                        echo '<input type="text" name="answer[]" value="' . $word[$i] . '" readonly>';
                    } else {
                        // Input teks untuk kata lainnya
                        echo '<input type="text" name="answer[]" maxlength="1" required>';
                    }
                }
                ?>
                <input type="submit" value="Submit Answer">
            </form>

            <p style="margin-top: 20px;">Skor Anda: <?php echo $_SESSION['score']; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
