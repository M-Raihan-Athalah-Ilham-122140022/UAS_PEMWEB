-- Membuat database 'informatika_itera'
CREATE DATABASE IF NOT EXISTS informatika_itera;

-- Menggunakan database 'informatika_itera'
USE informatika_itera;

-- Tabel untuk menyimpan data mahasiswa
CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price INT NOT NULL
);

-- Tabel untuk menyimpan data dosen
CREATE TABLE IF NOT EXISTS dosen (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    position VARCHAR(255) NOT NULL
);