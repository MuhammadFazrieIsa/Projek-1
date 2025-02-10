<?php
session_start();  // Start session at the very beginning
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="index.css">
    <script src="index.js"></script>
    <script src="tampil.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Custom CSS for Education Theme -->
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
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            text-align: center;
            padding: 12px;
        }

        th {
            background-color:rgb(146, 167, 190);
            color: white;
        }

        td {
            font-size: 14px;
            color: #333;
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

<script>
        function updateStatus(nim, status) {
            const statusText = status === 'terima' ? 'Sudah Diterima' : 'Tidak Diterima';
            const statusDiv = document.getElementById('status-' + nim);
            const buttonContainer = document.getElementById('buttons-' + nim);

            // Hide buttons
            buttonContainer.style.display = 'none';

            // Show the status text
            statusDiv.innerHTML = statusText;
            statusDiv.style.display = 'block';
        }
    </script>

</head>

<header>
        <a class="logo" href="index.php"> <img src="https://assets.siakadcloud.com/public/polikami-logo.png" alt="Logo"></a>
        
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
                <h5 class="modal-title text-dark" id="laporanModalLabel">Laporan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-dark">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="jenis_kesalahan">Jenis Kesalahan/Keinginan:</label>
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
    </header>

<body id="particles">
    
<div class="container-fluid text-center col-sm-12">
    <h1>Tampil Dokumen</h1>
    <p>Silahkan Mengecek Dokumen Mahasiswa di bawah ini</p>
    <div class="row">
        <div class="col-md-12 text-right">
            <input type="text" id="search" class="form-control w-25 d-inline" placeholder="Cari..."></div>
    </div>
    <div class="table-responsive mt-3">
    <div class="container">
        <?php
        include('koneksi.php');

        // Fetch all records from the dokumendaftar table
        $query = "SELECT * FROM dokumendaftar";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            // Create the table with custom CSS and Bootstrap classes
            echo "<table class='table table-bordered table-striped table-custom'>
                    <thead>
                        <tr>
                            <th>ID Dokumen</th>
                            <th>Keterangan Dokumen</th>
                            <th>File Dokumen</th>
                            <th>Transkrip Nilai</th>
                            <th>Ijazah</th>
                            <th>Foto KTP</th>
                            <th>Foto KRS</th>
                        </tr>
                    </thead>
                    <tbody>";

            // Loop through the rows and display each record
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['iddokumen']) . "</td>
                        <td>" . htmlspecialchars($row['keterangandokumen']) . "</td>
                        <td><a href='" . htmlspecialchars($row['filedokumen']) . "' class='view-button' target='_blank'>Lihat Dokumen</a></td>
                        <td><a href='" . htmlspecialchars($row['transkripnilai']) . "' class='view-button' target='_blank'>Lihat Transkrip Nilai</a></td>
                        <td><a href='" . htmlspecialchars($row['ijazah']) . "' class='view-button' target='_blank'>Lihat Ijazah</a></td>
                        <td><a href='" . htmlspecialchars($row['fotoktp']) . "' class='view-button' target='_blank'>Lihat Foto KTP</a></td>
                        <td><a href='" . htmlspecialchars($row['fotokrs']) . "' class='view-button' target='_blank'>Lihat Foto KRS</a></td>
                    </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-danger alert-custom' role='alert'>Data Error Minta Ulang ke Mahasiswa.</div>";
        }
        ?>
    </div>
</div>
</body>

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
        navList[3].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Dosen</a>';
        navList[2].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Jadwal</a>'; 

        // Add event listeners only for the items that are restricted for 'Dosen'
        navList.forEach((navItem, index) => {
            if (![0, 1, 6].includes(index)) {
                navItem.addEventListener('click', preventAccess);
            }
        });
    } else if (userRole === 'Kaprodi') {
        navList[6].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Pembimbing</a>';
        navList[5].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Akademik</a>';
        navList[4].innerHTML = '<a href="#"> <i class="ri-git-repository-private-line"></i> Keuangan</a>';
        navList[0].innerHTML = '<a href="tampilanapprovalpembimbing"> <i class="ri-git-repository-private-line"></i> Mahasiswa</a>'; 

        // Add event listeners only for the items that are restricted for 'Kaprodi'
        navList.forEach((navItem, index) => {
            if (![1, 2, 3].includes(index)) {
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

</html>
