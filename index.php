<?php
session_start();  // Start session at the very beginning
?>
<!DOCTYPE html>
<html lang="ind">
<head>
  <title>Beranda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
  <link rel="stylesheet" href="index.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100..900&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="index.js"></script>

</head>

<style>
        * {
            padding: 10px;
            margin: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            font-family: "Poppins", sans-serif;
        }

        :root {
            --bg-color: #03346E;
            --text-color: #ffffff;
            --main-color: #ae8957;
            --big-font: 6.6rem;
            --p-font: 13px;
        }

        body {
            background: var(--bg-color);
            color: var(--text-color);
            padding-top: 80px; /* To make space for the fixed header */
        }

        header {
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            padding: 10px 3%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.50s ease;
            background-color: var(--bg-color);
        }

        .logo img {
            width: 70px;
            height: auto;
        }

        .navlist {
            display: flex;
            margin: 0 auto;
            justify-content: center;
            flex-grow: 1;
        }

        .navlist a {
            color: var(--text-color);
            margin: 0 25px;
            font-size: var(--p-font);
            transition: all 0.6s ease;
        }

        .nav-btn {
            display: inline-block;
            background: transparent;
            border: 2px solid var(--text-color);
            border-radius: 7px;
            color: var(--text-color);
            font-size: 12px;
            transition: all 0.6s ease;
        }

        .nav-btn:hover {
            transform: translateY(-5px);
            border: 2px solid var(--main-color);
            color: var(--main-color);
        }

        .right-content {
            display: flex;
            align-items: center;
        }

        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        .container-fluid {
            padding: 20px;
            color: white;
            border-radius: 5px;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
        }

        p {
            font-size: 18px;
        }

        .table {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            text-align: center;
            padding: 12px;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        td {
            font-size: 14px;
            color: #333;
        }

        .btn {
            margin-top: 10px;
            font-size: 16px;
        }

        .btn-terima {
            background-color: #28a745;
            color: white;
        }

        .btn-terima:hover {
            background-color: #218838;
        }

        .btn-tidak-terima {
            background-color: #dc3545;
            color: white;
        }

        .btn-tidak-terima:hover {
            background-color: #c82333;
        }

        .form-container {
            margin-top: 20px;
        }

        .form-container form {
            display: inline-block;
            margin-right: 10px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .status-text {
            font-weight: bold;
            margin-top: 10px;
        }

    /* Mobile adjustments */
    @media (max-width: 768px) {
        header {
            padding: 15px 5%;
            justify-content: space-between;
        }

        .navlist {
            display: none;
        }

        .menu-icon {
            display: block;
        }

        .logo img {
            width: 100px;
        }
    }

    .navlist.active {
        display: flex;
        flex-direction: column;
    }

        @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
    .card {
        position: relative;
        transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out; /* Add opacity transition */
        opacity: 1; /* Initially fully visible */
        animation: fadeIn 1s ease-out forwards;
    }

    .card:hover {
        transform: scale(1.05); /* Zoom in effect when hovered */
        opacity: 0.9; /* Slightly fade when hovered */
        cursor: pointer;
    }

    /* Adding zoom effect on click (Optional) */
    .card:active {
        transform: scale(0.98); /* Zoom out effect when clicked */
        opacity: 1; /* Fully visible when clicked */
    }

    /* Optional shadow effect to enhance the visual */
    .card:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    /* Optionally, reduce opacity when the card is not hovered */
    .card:not(:hover) {
        opacity: 1; /* Make sure the card is fully visible when not hovered */
    }

    h2, .card {
    opacity: 0;
    animation: fadeIn 1s ease-in-out forwards;
    }

    header {
    opacity: 0;
    animation: fadeIn 1s ease-in-out forwards;
    }

    
</style>

<body id="particles">
    <header>
        <a class="logo"> <img src="https://assets.siakadcloud.com/public/polikami-logo.png" alt="Logo"></a>
        
        <ul class="navlist">
            <li><a href="tampildaftar.php">Mahasiswa</a></li> 
            <li><a href="tampildokumen.php">Dokumen</a></li>
            <li><a href="tampiljadwal.php">Jadwal</a></li>
            <li><a href="tampildosen.php">Dosen</a></li>
            <li><a href="tampilapprovalkeuangan.php">Keuangan</a></li>
            <li><a href="tampilapprovalakademik.php">Akademik</a></li>
            <li><a href="tampilapprovalpembimbing.php">Pembimbing</a></li>
        </ul>

        <div class="right-content dropdown">
            <a type="button" class="nav-btn ri-user-2-line btn dropdown-toggle" data-toggle="dropdown">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<span class="username-style">' .$_SESSION['username']. '</span>';
                } else {
                    echo "<span class=username-style> Admin </span>";
                }
                ?>
            </a>
            </button>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="formlogin.php">Keluar</a>
            <a class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#laporanModal">Lapor Kesalahan</a>
            </div>
        </div>
        
    </header>


    <div class="modal fade" id="laporanModal" tabindex="-1" role="dialog" aria-labelledby="laporanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="laporanModalLabel">Tambah Laporan Kesalahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-dark">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="jenis_kesalahan">Jenis Kesalahan:</label>
                            <select name="jenis_kesalahan" id="jenis_kesalahan" class="form-control" required>
                                <option value="Bug">Bug</option>
                                <option value="Error">Error</option>
                                <option value="Request Fitur">Request Fitur</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required></textarea>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Database connection (replace with your own database details)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projek1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to get the count of students registered
    $sql = "SELECT COUNT(*) AS count FROM pendaftaran";
    $result = $conn->query($sql);

    // Fetch the count from the result
    $row = $result->fetch_assoc();
    $count = $row['count'];

    $sql2 = "SELECT COUNT(*) AS count FROM login";
    $result2 = $conn->query($sql2);

    // Fetch the count from the result
    $row2 = $result2->fetch_assoc();
    $count2 = $row2['count']; // Use the 'count' alias here

    $conn->close();
    ?>


    <div class="container mt-5 pt-5">
        <h2>Laporan</h2>
        <div class="row mb-4">
            <!-- Summary Cards -->
            <div class="col-12 col-md-4 mb-4">
                <div class="card text-center bg-primary p-4">
                    <div class="icon ri-team-line"></div>
                    <div class="number"><?php echo $count; ?></div> 
                    <div class="label">Mahasiswa Mendaftar</div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card text-center bg-primary p-4">
                    <div class="icon ri-user-5-line"></div>
                    <div class="number"><?php echo $count2; ?></div>
                    <div class="label">Karyawan</div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card text-center bg-primary p-4">
                    <div class="icon ri-user-5-line"></div>
                    <div class="number">1942</div>
                    <div class="label">Transactions</div>
                </div>
            </div>
        </div>

        <!-- KPI Section -->
        <h2>Indikasi</h2>
        <div class="row mb-4">
            <div class="col-12 col-md-3 mb-4">
                <div class="card text-center bg-primary p-4">
                    <div class="kpi-label">Revenue</div>
                    <div class="kpi-value">$6,800.00</div>
                </div>
            </div>
            <div class="col-12 col-md-3 mb-4">
                <div class="card text-center bg-primary p-4">
                    <div class="kpi-label">Net</div>
                    <div class="kpi-value">$4,900.24</div>
                </div>
            </div>
            <div class="col-12 col-md-3 mb-4">
                <div class="card text-center bg-primary p-4">
                    <div class="kpi-label">Profit</div>
                    <div class="kpi-value">$1,000.56</div>
                </div>
            </div>
            <div class="col-12 col-md-3 mb-4">
                <div class="card text-center bg-primary p-4">
                    <div class="kpi-label">Sales</div>
                    <div class="kpi-value">$5,000.00</div>
                </div>
            </div>
        </div>
            </div>

        <!-- Chart Container -->

        <script>
    // Conditionally add icons based on user role
    const userRole = "<?php echo $_SESSION['level'] ?? ''; ?>";
    const navList = document.querySelectorAll(".navlist a");

    // Remove event listeners for all items first (in case there's a previous state)
    navList.forEach((navItem) => {
        navItem.removeEventListener('click', preventAccess);
    });

    // User role-specific changes
    if (userRole === 'Dosen') {
        navList[5].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Akademik</a>';
        navList[4].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Keuangan</a>';
        navList[2].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Jadwal</a>'; 

        // Add event listeners only for the items that are restricted for 'Dosen'
        navList.forEach((navItem, index) => {
            if (![0, 1, 3, 6].includes(index)) {
                navItem.addEventListener('click', preventAccess);
            }
        });
    } else if (userRole === 'Kaprodi') {
        navList[6].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Pembimbing</a>';
        navList[5].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Akademik</a>';
        navList[4].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Keuangan</a>';
        navList[3].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Dosen</a>';
        navList[0].innerHTML = '<a href="tampilanapprovalpembimbing"> <i class="ri-git-repository-private-line"></i> Mahasiswa</a>'; 

        // Add event listeners only for the items that are restricted for 'Kaprodi'
        navList.forEach((navItem, index) => {
            if (![1, 2].includes(index)) {
                navItem.addEventListener('click', preventAccess);
            }
        });
    } else if (userRole === 'Keuangan') {
        navList[6].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Pembimbing</a>';
        navList[5].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Akademik</a>';
        navList[3].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Dosen</a>';
        navList[2].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Jadwal</a>';
        navList[1].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Dokumen</a>'; 
        navList[0].innerHTML = '<a href="tampilanapprovalkeuangan"> <i class="ri-git-repository-private-line"></i> Mahasiswa</a>'; 
  

        // Add event listeners only for the items that are restricted for 'Keuangan'
        navList.forEach((navItem, index) => {
            if (![1, 4].includes(index)) {
                navItem.addEventListener('click', preventAccess);
            }
        });
    } else if (userRole === 'Akademik') {
        navList[6].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Pembimbing</a>';
        navList[4].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Keuangan</a>';
        navList[3].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Dosen</a>';
        navList[2].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Jadwal</a>';
        navList[0].innerHTML = '<a href="tampilanapprovalkeuangan"> <i class="ri-git-repository-private-line"></i> Mahasiswa</a>'; 
 

        // Add event listeners only for the items that are restricted for 'Akademik'
        navList.forEach((navItem, index) => {
            if (![1, 5].includes(index)) {
                navItem.addEventListener('click', preventAccess);
            }
        });
    }

    // Function to prevent access for restricted nav items
    function preventAccess(event) {
        event.preventDefault();
        alert("Anda Tidak diperkenankan untuk Masuk");
    }

    // Mobile menu toggle (optional)
    const menuIcon = document.getElementById("menu-icon");
    const navListMobile = document.querySelector(".navlist");

    menuIcon.addEventListener("click", () => {
        navListMobile.classList.toggle("active");
    });
</script>

</body>
</html>
