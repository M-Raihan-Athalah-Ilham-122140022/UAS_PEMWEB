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

class MahasiswaController extends Koneksi {
    // Fungsi untuk mendapatkan data mahasiswa
    public function getMahasiswa() {
        $conn = $this->getConnection();
        $sql = "SELECT * FROM mahasiswa";
        $result = $conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    // Fungsi untuk menambahkan data mahasiswa
    public function addMahasiswa($name, $category, $quantity, $price) {
        $conn = $this->getConnection();
        $sql = "INSERT INTO mahasiswa (name, category, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $name, $category, $quantity, $price);
        return $stmt->execute();
    }

    // Fungsi untuk memperbarui data mahasiswa
    public function updateMahasiswa($id, $name, $category, $quantity, $price) {
        $conn = $this->getConnection();
        $sql = "UPDATE mahasiswa SET name = ?, category = ?, quantity = ?, price = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiii", $name, $category, $quantity, $price, $id);
        return $stmt->execute();
    }

    // Fungsi untuk menghapus data mahasiswa
    public function deleteMahasiswa($id) {
        $conn = $this->getConnection();
        $sql = "DELETE FROM mahasiswa WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
