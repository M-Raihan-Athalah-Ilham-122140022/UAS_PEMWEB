<?php
session_start();
header('Content-Type: application/json');

// Koneksi ke database
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'informatika_itera';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => $conn->connect_error]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['category']) && isset($_POST['quantity']) && isset($_POST['price'])) {
        // Validasi input mahasiswa
        $name = trim($_POST['name']);
        $category = trim($_POST['category']);
        $quantity = (int)$_POST['quantity'];
        $price = (int)$_POST['price'];

        if (empty($name) || empty($category) || $quantity <= 0 || $price <= 0) {
            die(json_encode(['success' => false, 'error' => 'Input tidak valid!']));
        }

        // Simpan data ke tabel mahasiswa
        $stmt = $conn->prepare("INSERT INTO mahasiswa (name, category, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $name, $category, $quantity, $price);

        if (!$stmt->execute()) {
            die(json_encode(['success' => false, 'error' => $stmt->error]));
        }

        echo json_encode(['success' => true]);
    } elseif (isset($_POST['name']) && isset($_POST['position'])) {
        // Validasi input dosen
        $name = trim($_POST['name']);
        $position = trim($_POST['position']);

        if (empty($name) || empty($position)) {
            die(json_encode(['success' => false, 'error' => 'Input tidak valid!']));
        }

        // Simpan data ke tabel dosen
        $stmt = $conn->prepare("INSERT INTO dosen (name, position) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $position);

        if (!$stmt->execute()) {
            die(json_encode(['success' => false, 'error' => $stmt->error]));
        }

        echo json_encode(['success' => true]);
    }
}

$conn->close();
?>