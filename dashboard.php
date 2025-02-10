<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sidang Tugas Akhir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
            overflow: hidden;
        }

        .navbar {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 30px;
            padding: 10px 20px;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.3);
        }

        .navbar .btn {
            font-size: 1rem;
            padding: 8px 18px;
            border-radius: 20px;
            font-weight: bold;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .navbar .btn-login {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #ffffff;
            border: none;
        }

        .navbar .btn-login:hover {
            background: linear-gradient(135deg, #0056b3, #003f8c);
            transform: scale(1.05);
            box-shadow: 0px 5px 15px rgba(0, 123, 255, 0.5);
        }

        .container {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1.5s ease;
            width: 80%;
            max-width: 600px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            width: 60px; /* Ukuran logo disesuaikan */
            height: auto;
        }

        .navbar-logo-container {
            display: flex;
            align-items: center;
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .navbar-logo-text {
            font-size: 1.5rem;
            color: rgb(170, 183, 214);
            font-weight: bold;
            margin-left: 10px; /* Memberikan jarak antara logo dan teks */
        }

        .title-container {
            margin-top: 50px;
            margin-bottom: 30px;
        }

        .title-container h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .title-container h2 {
            font-size: 1.5rem;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .requirements-container {
            text-align: left;
            font-size: 1.1rem;
            margin-bottom: 40px;
        }

        .requirements-container ul {
            list-style: none;
            padding-left: 0;
            text-align: left;
        }

        .requirements-container li {
            margin-bottom: 15px;
            padding-left: 25px;
            position: relative;
        }

        .requirements-container li:before {
            content: "✔";
            position: absolute;
            left: 0;
            color: #28a745;
            font-weight: bold;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .btn-register {
            font-size: 1.2rem;
            padding: 12px 25px;
            border-radius: 30px;
            font-weight: bold;
            text-transform: uppercase;
            background: linear-gradient(135deg, #34d058, #28a745);
            color: #ffffff;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #28a745, #218838);
            transform: scale(1.05);
            box-shadow: 0px 5px 15px rgba(40, 167, 69, 0.5);
        }

    </style>
</head>
<body>

    <!-- Logo dan Teks Politeknik Sukabumi di pojok kiri atas -->
    <div class="navbar-logo-container">
    <img src="https://assets.siakadcloud.com/public/polikami-logo.png" alt="Logo" class="logo"> <!-- Logo -->
        <div class="navbar-logo-text">Politeknik Sukabumi</div> <!-- Teks -->
    </div>

    <!-- Navbar Login -->
    <div class="navbar">
        <a href="formlogin.php" class="btn btn-login">Khusus</a>
        <a href="formlogin2.php" class="btn">Login</a>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="title-container">
            <h1 class="title">Pendaftaran Sidang Tugas Akhir</h1>
            <h2 class="subtitle">Persyaratan Sebelum Mendaftar</h2>
        </div>

        <!-- Persyaratan Sebelum Mendaftar -->
        <div class="requirements-container">
            <ul>
                <li>Sudah melakukan KRS untuk semester yang berlaku</li>
                <li>Telah melunasi seluruh pembayaran administrasi</li>
                <li>Sudah menyelesaikan tugas akhir dan memenuhi syarat akademik</li>
                <li>Memiliki rekomendasi dari dosen pembimbing</li>
            </ul>
        </div>

        <!-- Tombol Pendaftaran -->
        <div class="button-group">
            <a href="pendaftaran3.php" class="btn btn-register">Daftar Sekarang</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
