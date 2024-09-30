
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

-- Script ini dapat dijalankan pada database MySQL untuk menciptakan struktur tabel yang diperlukan
