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
    if (isset($_POST['itemName'])) {
        // Validasi input mahasiswa
        $name = trim($_POST['itemName']);
        $pekerjaan = trim($_POST['itemPekerjaan']);
        $nim = (int)$_POST['itemNim'];
        $usia = (int)$_POST['itemUsia'];

        if (empty($name) || empty($pekerjaan) || $nim <= 0 || $usia <= 0) {
            die(json_encode(['success' => false, 'error' => 'Input tidak valid!']));
        }

        // Simpan data ke database
        $stmt = $conn->prepare("INSERT INTO mahasiswa (name, pekerjaan, nim, usia) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $name, $pekerjaan, $nim, $usia);

        if (!$stmt->execute()) {
            die(json_encode(['success' => false, 'error' => $stmt->error]));
        }

        echo json_encode(['success' => true]);
    } elseif (isset($_POST['lecturerName'])) {
        // Validasi input lecturer
        $name = trim($_POST['lecturerName']);
        $position = trim($_POST['lecturerPosition']);

        if (empty($name) || empty($position)) {
            die(json_encode(['success' => false, 'error' => 'Input tidak valid!']));
        }

        // Simpan data ke database
        $stmt = $conn->prepare("INSERT INTO lecturer (name, position) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $position);

        if (!$stmt->execute()) {
            die(json_encode(['success' => false, 'error' => $stmt->error]));
        }

        echo json_encode(['success' => true]);
    }
}

$conn->close();
?>