<!-- Manajemen Mahasiswa -->

<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'informatika_itera';

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses Pengiriman Formulir (Create)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit_mahasiswa'])) {
    $itemName = $conn->real_escape_string($_POST['itemName']);
    $itemCategory = $conn->real_escape_string($_POST['itemCategory']);
    $itemQuantity = (int) $_POST['itemQuantity'];
    $itemPrice = (float) $_POST['itemPrice'];
    
    $query = "INSERT INTO mahasiswa (name, category, quantity, price) VALUES ('$itemName', '$itemCategory', '$itemQuantity', '$itemPrice')";
    
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Data berhasil ditambahkan');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

// Proses Update Data (Update)
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM mahasiswa WHERE id = $id");
    $item = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_mahasiswa'])) {
    $id = $_POST['itemId'];
    $itemName = $conn->real_escape_string($_POST['itemName']);
    $itemCategory = $conn->real_escape_string($_POST['itemCategory']);
    $itemQuantity = (int) $_POST['itemQuantity'];
    $itemPrice = (float) $_POST['itemPrice'];
    
    $query = "UPDATE mahasiswa SET name = '$itemName', category = '$itemCategory', quantity = '$itemQuantity', price = '$itemPrice' WHERE id = $id";
    
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Data berhasil diperbarui'); window.location = 'Mahasiswa.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

// Proses Hapus Data (Delete)
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM mahasiswa WHERE id = $id");
    echo "<script>alert('Data berhasil dihapus'); window.location = 'Mahasiswa.php';</script>";
}

// Query untuk mendapatkan data inventory
$query = "SELECT * FROM mahasiswa";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Mahasiswa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            color: white;
            padding: 2rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        h1, h2 {
            text-align: center;
            margin-bottom: 2rem;
            color: #2c3e50;
        }

        header h1 {
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        nav {
            max-width: 800px;
            margin: 0 auto;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        nav ul li a {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: white;
            padding: 1rem 2rem;
            border-radius: 10px;
            background: rgba(255,255,255,0.1);
            transition: all 0.3s ease;
        }

        nav ul li a:before {
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        nav ul li:nth-child(1) a:before { content: '\f015'; } /* home */
        nav ul li:nth-child(2) a:before { content: '\f0c0'; } /* employees */
        nav ul li:nth-child(3) a:before { content: '\f563'; } /* cookie */

        nav ul li a:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        form {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }

        input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 1rem;
        }

        button {
            background: #3498db;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #2c3e50;
            color: white;
        }

        tr:hover {
            background: #f5f5f5;
        }

        .action-links a {
            text-decoration: none;
            color: #3498db;
            margin-right: 1rem;
            transition: color 0.3s ease;
        }

        .action-links a:hover {
            color: #2980b9;
        }

        footer {
            margin-top: auto;
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 1rem;
        }

        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav ul li a {
                width: 100%;
            }

            table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Manajemen Mahasiswa</h1>
        <nav>
            <ul>
                <li><a href="index.php">Halaman Utama</a></li>
                <li><a href="Dosen.php">Manajemen Dosen</a></li>
                <li><a href="CookiesForm.php">Manajemen Cookies Kampus</a></li>
            </ul>
        </nav>
    </header>

   <main>
        <form id="studentForm" method="POST">
            <h2><?= isset($item['id']) ? 'Edit Mahasiswa' : 'Tambah Mahasiswa' ?></h2>
            
            <label for="itemName">Nama Mahasiswa:</label>
            <input type="text" id="itemName" name="itemName" value="<?= isset($item['name']) ? $item['name'] : '' ?>" required>

            <label for="itemCategory">Prodi:</label>
            <input type="text" id="itemCategory" name="itemCategory" value="<?= isset($item['category']) ? $item['category'] : '' ?>" required>

            <label for="itemQuantity">NIM:</label>
            <input type="number" id="itemQuantity" name="itemQuantity" value="<?= isset($item['quantity']) ? $item['quantity'] : '' ?>" required>

            <label for="itemPrice">Tahun Angkatan:</label>
            <input type="number" id="itemPrice" name="itemPrice" value="<?= isset($item['price']) ? $item['price'] : '' ?>" required>

            <input type="hidden" name="itemId" value="<?= isset($item['id']) ? $item['id'] : '' ?>">

            <button type="submit" name="<?= isset($item['id']) ? 'update_mahasiswa' : 'submit_mahasiswa' ?>">
                <?= isset($item['id']) ? 'Perbarui Data' : 'Tambah Data' ?>
            </button>
        </form>

        <h2>Daftar Barang</h2>
        <table id="inventoryTable">
            <thead>
                <tr>
                    <th>Nama Mahasiswa</th>
                    <th>Prodi</th>
                    <th>NIM</th>
                    <th>Angkatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['category']) ?></td>
                            <td><?= htmlspecialchars($row['quantity']) ?></td>
                            <td><?= htmlspecialchars($row['price']) ?></td>
                            <td class="action-links">
                                <a href="Mahasiswa.php?edit=<?= $row['id'] ?>">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="Mahasiswa.php?delete=<?= $row['id'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                 <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Tidak ada data mahasiswa.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 ITERA. All rights reserved.</p>
    </footer>
</body>
</html>

<?php $conn->close(); ?>
