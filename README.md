# Sistem Informasi Mahasiswa

Proyek ini adalah aplikasi sederhana berbasis PHP untuk mengelola data mahasiswa dan dosen menggunakan MySQL sebagai basis data. Proyek ini mencakup berbagai fitur mulai dari manipulasi DOM hingga pengelolaan state menggunakan session, cookie, dan local storage.

---

## **Fitur**

### **1. Manipulasi DOM**
Manipulasi DOM diimplementasikan pada bagian form, termasuk penambahan elemen secara dinamis dan validasi awal pada sisi klien.

![Manipulasi DOM](./assets/manipulasidom.png)

---

### **2. Event Handling**
Event handling digunakan untuk validasi form, memastikan data yang dimasukkan oleh pengguna memenuhi kriteria sebelum dikirim ke server.

![Event Handling](./assets/event_handling.png)

---

### **3. Pengelolaan Data dengan PHP**
Pengelolaan data dilakukan dengan menggunakan method `POST` untuk mengirim data dari form mahasiswa ke server. Data ini kemudian diproses dan disimpan dalam database.

![Pengelolaan Data](./assets/pengelolaan_data1.png)
![Pengelolaan Data](./assets/pengelolaan_data2.png)

---

### **4. OOP (Object-Oriented Programming)**
OOP diterapkan dalam pengelolaan cookie dan database. Kelas khusus digunakan untuk menangani penyimpanan cookie dan manipulasi data di database.

![OOP](./assets/OOP.png)

---

### **5. Pembuatan Tabel Database**
Tabel untuk mahasiswa dan dosen dibuat menggunakan query SQL yang ditulis dalam file `database.sql`. Proses ini melibatkan pembuatan struktur tabel lengkap dengan kolom-kolomnya.

![Pembuatan Tabel](./assets/pembuatan_tabel.png)

---

### **6. Konfigurasi Koneksi**
Konfigurasi koneksi database dilakukan di file `connect.php`, yang mencakup parameter host, username, password, dan nama database.

![Koneksi Database](./assets/koneksi_database.png)

---

### **7. Manipulasi Data pada Database**
Operasi CRUD (Create, Read, Update, Delete) dilakukan pada tabel mahasiswa dan dosen menggunakan query SQL yang didefinisikan di file `database.sql`.

![Manipulasi Data](./assets/manipulasi_data.png)

---

### **8. State Management**
State management dengan `session_start()` digunakan untuk menyimpan data sementara selama sesi pengguna berlangsung.

![State Management](./assets/session_start.png)

---

### **9. Cookie Management**
Cookie digunakan untuk menyimpan informasi yang dikirimkan dari server ke browser. Implementasi ini berguna untuk menyimpan preferensi pengguna atau data lainnya.

![Cookie Management](./assets/cookie_management.png)

---

### **10. Storage Management**
Storage management menggunakan Local Storage untuk menyimpan data dosen di browser secara permanen, bahkan setelah halaman di-refresh.

![Storage Management](./assets/storage_management.png)

---
