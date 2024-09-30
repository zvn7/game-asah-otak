# Game Tebak Kata

Game Tebak Kata adalah permainan tebak kata berbasis web di mana pemain mencoba menebak kata yang benar berdasarkan petunjuk yang diberikan. Setiap jawaban yang benar akan memberikan poin kepada pemain.

## Struktur Folder

```bash
├── css/
│   └── style.css           # Berisi style untuk tampilan game
├── includes/
│   └── db.php              # File koneksi database
├── public/
│   └── index.php           # Halaman utama untuk memulai permainan
│   └── game.php            # Logika permainan dan tampilan soal
│   └── result.php          # Menampilkan skor pemain setelah permainan
│   └── exit.php            # Mengatur logout pemain dan penghancuran sesi
```

## Teknologi
- Frontend: HTML, CSS, JavaScript
- Backend: PHP
- Database: MySQL
- Alat:
    
    XAMPP/WAMP untuk server lokal dan database
    
    phpMyAdmin untuk manajemen database MySQL

## Database

```bash

-- Membuat Database asah_otak
CREATE DATABASE IF NOT EXISTS asah_otak;
USE asah_otak;

-- Tabel untuk menyimpan master kata (clue dan jawaban)
CREATE TABLE IF NOT EXISTS master_kata (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  kata VARCHAR(255) NOT NULL,
  clue VARCHAR(255) NOT NULL
);

-- Tabel untuk menyimpan poin permainan
CREATE TABLE IF NOT EXISTS point_game (
  id_point INT(11) AUTO_INCREMENT PRIMARY KEY,
  nama_user VARCHAR(255) NOT NULL,
  total_point INT(20) NOT NULL
);

-- Memasukkan contoh data ke dalam tabel master_kata
INSERT INTO master_kata (kata, clue) VALUES
('LEMARI', 'Aku tempat menyimpan pakaian?'),
('PISANG', 'Buah berwarna kuning dan panjang'),
('KASUR', 'Tempat untuk tidur'),
('LAPTOP', 'Alat yang digunakan untuk coding'),
('PAYUNG', 'Digunakan saat hujan untuk melindungi dari air');

```

## Cara Menjalankan Proyek

### Clone Repositori

```bash
git clone https://github.com/zvn7/game-asah-otak
```
Siapkan database:
Impor file database.sql ke database MySQL Anda menggunakan phpMyAdmin atau alat lainnya.

Jalankan permainan:
Buka browser dan akses http://localhost/game-tebak-kata/index.php.

Cara Bermain:
Masukkan nama Anda, pecahkan teka-teki kata, dan lacak skor Anda.