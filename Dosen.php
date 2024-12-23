<!-- Manajemen Dosen -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Dosen</title>
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

        h1 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 2rem;
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
        nav ul li:nth-child(2) a:before { content: '\f494'; } /* inventory */
        nav ul li:nth-child(3) a:before { content: '\f563'; } /* cookie */

        nav ul li a:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        h2 {
            color: #2c3e50;
            margin: 2rem 0 1rem;
            text-align: center;
        }

        form {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2c3e50;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52,152,219,0.3);
        }

        button {
            background: #3498db;
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        button:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        table {
            width: 100%;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-collapse: collapse;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #2c3e50;
            color: white;
            font-weight: 500;
        }

        tr:hover {
            background: #f8f9fa;
        }

        td button {
            padding: 0.5rem 1rem;
            margin-right: 0.5rem;
        }

        .edit-btn {
            background: #f39c12;
        }

        .edit-btn:hover {
            background: #d68910;
        }

        .delete-btn {
            background: #e74c3c;
        }

        .delete-btn:hover {
            background: #c0392b;
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

            main {
                padding: 1rem;
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
        <h1>Manajemen Dosen</h1>
        <nav>
            <ul>
                <li><a href="index.php">Halaman Utama</a></li>
                <li><a href="Mahasiswa.php">Manajemen Mahasiswa</a></li>
                <li><a href="CookiesForm.php">Manajemen Cookies Kampus</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form id="lecturerForm">
            <h2>
                <i class="fas fa-user-plus"></i> 
                <span id="formTitle">Tambah Dosen Baru</span>
            </h2>
            <input type="hidden" id="lecturerIndex" name="lecturerIndex" value="">
            
            <label for="lecturerName">
                <i class="fas fa-user"></i> Nama Dosen:
            </label>
            <input type="text" id="lecturerName" name="lecturerName" required>
            
            <label for="lecturerPosition">
                <i class="fas fa-book"></i> Mata Kuliah:
            </label>
            <input type="text" id="lecturerPosition" name="lecturerPosition" required>
            
            <button type="submit">
                <i class="fas fa-save"></i> Simpan Data Dosen
            </button>
        </form>

        <h2><i class="fas fa-users"></i> Daftar Dosen </h2>
        <table id="lecturerTable">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Mata Kuliah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 ITERA. All rights reserved.</p>
    </footer>

    <script>
        // Load Lecturers from localStorage
        function loadLecturers() {
            const lecturers = JSON.parse(localStorage.getItem('lecturers')) || [];
            const tableBody = document.getElementById('lecturerTable').getElementsByTagName('tbody')[0];
            tableBody.innerHTML = '';

            lecturers.forEach((lecturer, index) => {
                const row = tableBody.insertRow();
                row.innerHTML = `
                    <td><i class="fas fa-user"></i> ${lecturer.name}</td>
                    <td><i class="fas fa-book"></i> ${lecturer.position}</td>
                    <td>
                        <button class="edit-btn" onclick="editLecturer(${index})">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="delete-btn" onclick="deleteLecturer(${index})">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </td>
                `;
            });
        }

        // Add or Edit Lecturer
        document.getElementById('lecturerForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const name = document.getElementById('lecturerName').value;
            const position = document.getElementById('lecturerPosition').value;
            const index = document.getElementById('lecturerIndex').value;

            const lecturers = JSON.parse(localStorage.getItem('lecturers')) || [];

            if (index !== "") {
                lecturers[index].name = name;
                lecturers[index].position = position;
            } else {
                lecturers.push({ name, position });
            }

            localStorage.setItem('lecturers', JSON.stringify(lecturers));

            // Reset form
            document.getElementById('lecturerName').value = '';
            document.getElementById('lecturerPosition').value = '';
            document.getElementById('lecturerIndex').value = '';
            document.getElementById('formTitle').textContent = 'Tambah Dosen Baru';

            loadLecturers();
        });

        // Delete Lecturer
        function deleteLecturer(index) {
            if (confirm('Apakah Anda yakin ingin menghapus Dosen ini?')) {
                const lecturers = JSON.parse(localStorage.getItem('lecturers')) || [];
                lecturers.splice(index, 1);
                localStorage.setItem('lecturers', JSON.stringify(lecturers));
                loadLecturers();
            }
        }

        // Edit Lecturer
        function editLecturer(index) {
            const lecturers = JSON.parse(localStorage.getItem('lecturers')) || [];
            const lecturer = lecturers[index];

            document.getElementById('lecturerName').value = lecturer.name;
            document.getElementById('lecturerPosition').value = lecturer.position;
            document.getElementById('lecturerIndex').value = index;
            document.getElementById('formTitle').textContent = 'Edit Dosen';

            // Scroll to form
            document.getElementById('lecturerForm').scrollIntoView({ behavior: 'smooth' });
        }

        // Load Lecturers when page loads
        loadLecturers();
    </script>
</body>
</html>