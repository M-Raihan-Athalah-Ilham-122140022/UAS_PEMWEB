<!-- Cookies Form -->

<?php
session_start();
require_once 'includes/CookieHandler.php';
// Membuat objek CookieHandler
$cookieHandler = new CookieHandler();
// Menangani pengaturan cookie
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit_action'])) {
    $action = $_POST['action'];
    $cookieName = $_POST['cookieName'];
    $cookieValue = isset($_POST['cookieValue']) ? $_POST['cookieValue'] : null;
    switch ($action) {
        case 'set':
            if ($cookieName && $cookieValue) {
                // Set the cookie for 1 hour
                $cookieHandler->setCookie($cookieName, $cookieValue, 3600);
                echo "<script>alert('Cookie berhasil diset!');</script>";
            }
            break;
        
        case 'get':
            $cookieData = $cookieHandler->getCookie($cookieName);
            echo "<script>alert('Nilai Cookie: " . htmlspecialchars($cookieData) . "');</script>";
            break;
        
        case 'delete':
            $cookieHandler->deleteCookie($cookieName);
            echo "<script>alert('Cookie berhasil dihapus!');</script>";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Cookies</title>
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
        nav ul li:nth-child(3) a:before { content: '\f2b9'; } /* employee */

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
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2c3e50;
            font-weight: 500;
        }

        input, select {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        input:focus, select:focus {
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
            width: 100%;
            justify-content: center;
        }

        button:hover {
            background: #2980b9;
            transform: translateY(-2px);
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
        }
    </style>
</head>
<body>
    <header>
        <h1>Manajemen Cookies</h1>
        <nav>
            <ul>
                <li><a href="index.php">Halaman Utama</a></li>
                <li><a href="Mahasiswa.php">Manajemen Mahasiswa</a></li>
                <li><a href="Dosen.php">Manajemen Dosen</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form method="POST">
            <h2>
                <i class="fas fa-cookie"></i> 
                <span>Pengelolaan Cookies</span>
            </h2>
            
            <label for="action">
                <i class="fas fa-tasks"></i> Pilih Aksi:
            </label>
            <select id="action" name="action" required>
                <option value="set">Set Cookie</option>
                <option value="get">Get Cookie</option>
                <option value="delete">Delete Cookie</option>
            </select>
            
            <label for="cookieName">
                <i class="fas fa-tag"></i> Nama Cookie:
            </label>
            <input type="text" id="cookieName" name="cookieName" required>
            
            <div id="cookieValueField">
                <label for="cookieValue">
                    <i class="fas fa-edit"></i> Nilai Cookie:
                </label>
                <input type="text" id="cookieValue" name="cookieValue">
            </div>
            
            <button type="submit" name="submit_action">
                <i class="fas fa-save"></i> Submit
            </button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 ITERA. All rights reserved.</p>
    </footer>

    <script>
        const actionSelect = document.getElementById('action');
        const cookieValueField = document.getElementById('cookieValueField');

        actionSelect.addEventListener('change', function() {
            if (this.value === 'set') {
                cookieValueField.style.display = 'block';
            } else {
                cookieValueField.style.display = 'none';
            }
        });

        actionSelect.dispatchEvent(new Event('change'));
    </script>
</body>
</html>