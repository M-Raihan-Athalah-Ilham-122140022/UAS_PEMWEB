<!-- dosens -->

<?php
class Lecturer {
    // Properti untuk menyimpan data dosen dalam array
    private $lecturers;

    // Konstruktor untuk inisialisasi
    public function __construct() {
        // Jika data dosen sudah ada di localStorage (disimulasikan dengan sesi PHP)
        $this->lecturers = isset($_SESSION['lecturers']) ? $_SESSION['lecturers'] : [];
    }

    // Menambahkan dosen baru
    public function addLecturer($name, $subject) {
        // Membuat array untuk dosen baru
        $newLecturer = [
            'name' => $name,
            'subject' => $subject
        ];
        $this->lecturers[] = $newLecturer; // Menambahkan dosen ke array

        // Menyimpan data ke session (simulasi penyimpanan ke localStorage)
        $_SESSION['lecturers'] = $this->lecturers;
    }

    // Menghapus dosen berdasarkan nama
    public function deleteLecturer($name) {
        foreach ($this->lecturers as $index => $lecturer) {
            if ($lecturer['name'] == $name) {
                unset($this->lecturers[$index]); // Menghapus dosen dari array
                $_SESSION['lecturers'] = $this->lecturers; // Menyimpan perubahan
                return true;
            }
        }
        return false;
    }

    // Mendapatkan semua data dosen
    public function getAllLecturers() {
        return $this->lecturers;
    }
}
?>
