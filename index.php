<!-- Halaman Utama -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manajemen Data ITERA</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Previous styles remain the same */
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
        nav ul li:nth-child(1) a:before {
            content: '\f494';
        }
        nav ul li:nth-child(2) a:before {
            content: '\f0c0';
        }
        nav ul li:nth-child(3) a:before {
            content: '\f563';
        }
        nav ul li a:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        /* New styles for main content */
        .main-content {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .dashboard-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        .dashboard-card h2 {
            color: #2c3e50;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dashboard-card i {
            color: #3498db;
        }

        .quick-actions {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .action-button {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
            text-decoration: none;
            justify-content: center;
        }

        .action-button:hover {
            background: #2980b9;
        }

        .status-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .status-table th,
        .status-table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.875rem;
        }

        .status-active {
            background: #2ecc71;
            color: white;
        }

        footer {
            margin-top: auto;
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 1rem;
            width: 100%;
        }

        @media (max-width: 600px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }
            nav ul li a {
                width: 80vw;
                text-align: center;
            }
            h1 {
                font-size: 1.8rem;
            }
            .main-content {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Sistem Manajemen Data Prodi Informatika</h1>
        <nav>
            <ul>
                <li><a href="inventory.php">Manajemen Mahasiswa</a></li>
                <li><a href="employees.php">Manajemen Dosen</a></li>
                <li><a href="CookiesForm.php">Manajemen Cookies Kampus</a></li>
            </ul>
        </nav>
    </header>

    <div class="main-content">
        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h2><i class="fas fa-users"></i> Students Overview </h2>
                <p>Total 2022 Active Students: 150</p>
                <p>Non-Active Students: 12</p>
                <p>Drop Out: 3</p>
            </div>
            <div class="dashboard-card">
                <h2><i class="fas fa-users"></i> Lecturers Overview </h2>
                <p>Total 2022 Active Lecturers: 23</p>
                <p>Non-Active Lecturer: 4</p>
            </div>
        </div>

        <div class="quick-actions">
            <h2>Quick Actions</h2>
            <div class="action-buttons">
                <a href="inventory.php" class="action-button">
                    <i class="fas fa-plus"></i> Add New Students
                </a>
                <a href="employees.php" class="action-button">
                    <i class="fas fa-user-plus"></i> Add Lecturer
                </a>
                <a href="CookiesForm.php" class="action-button">
                    <i class="fas fa-file-alt"></i> Cookies Form
                </a>
            </div>
        </div>

        <div class="dashboard-card">
            <h2><i class="fas fa-tasks"></i> Recent Activities</h2>
            <table class="status-table">
                <thead>
                    <tr>
                        <th>Activity</th>
                        <th>User</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Updated Students</td>
                        <td>Admin</td>
                        <td>10:30 AM</td>
                        <td><span class="status-badge status-active">Completed</span></td>
                    </tr>
                    <tr>
                        <td>Lecturer Data Update</td>
                        <td>Admin</td>
                        <td>09:15 AM</td>
                        <td><span class="status-badge status-active">Completed</span></td>
                    </tr>
                    <tr>
                        <td>Cookies Has Been Set</td>
                        <td>Staff</td>
                        <td>08:45 AM</td>
                        <td><span class="status-badge status-active">Completed</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 ITERA. All rights reserved.</p>
    </footer>
</body>
</html>