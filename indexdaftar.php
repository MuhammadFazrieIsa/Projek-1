<?php
session_start();  // Start the session to access session variables

include('koneksi.php');

// Check if session contains 'nim'
if (isset($_SESSION['nim'])) {
    $nim = $_SESSION['nim'];  // Retrieve the 'nim' from the session
    $namamahasiswa = $_SESSION['namamahasiswa'];
    $idprodi = $_SESSION['idprodi'];

    // Query to fetch the status details based on 'nim'
    $query = "SELECT * FROM status WHERE nim = '$nim'"; 
    $result = mysqli_query($mysqli, $query);

    // Check if results are returned
    if (mysqli_num_rows($result) > 0) {
        // HTML content to display status details
        ?>
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Beranda</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
            <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100..900&display=swap" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="index.css">
            <script src="index.js"></script>
            <style>
                body {
                    background: linear-gradient(135deg, #1e3c72, #2a5298);
                    height: 100vh;
                    margin: 0;
                    display: flex;
                    color: #ffffff;
                    font-family: "Roboto", sans-serif;
                    overflow: hidden;
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
                    max-width: 100%;
                    overflow-x: auto;
                }
                h3 {
                    font-size: 2.5rem;
                    margin-bottom: 20px;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
                }
                .card {
                    background-color: rgba(255, 255, 255, 0.1);
                    border-radius: 8px;
                    margin-bottom: 20px;
                    padding: 20px;
                    text-align: left;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
                }
                .card-title {
                    font-size: 1.5rem;
                    font-weight: 600;
                    color: #fff;
                }
                .card-body {
                    color: #ddd;
                }
                .card-body .row {
                    margin-bottom: 15px;
                    display: block;
                }
                .card-body .row .col-4 {
                    font-weight: 500;
                    width: 30%;
                    float: left;
                    padding-right: 15px;
                }
                .card-body .row .col-8 {
                    font-weight: 300;
                    width: 70%;
                    float: left;
                }
                @media (max-width: 768px) {
                    h3 {
                        font-size: 1.8rem;
                    }
                    .card-body .row .col-4, .card-body .row .col-8 {
                        width: 10%;
                        float: none;
                        padding-right: 0;
                    }
                }
            </style>
        </head>
        <body>

        <div class="container" id="particles">
            <h3>Selamat Datang, <?php echo htmlspecialchars($namamahasiswa); ?></h3> <!-- Display nim or username -->

            <!-- Display status details from the database -->
            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="card" >
                    <div class="card-title">Status Details</div>
                    <div class="card-body">
                        <div class="row"><div class="col-4">ID Status:</div><div class="col-8"><?php echo !empty($row['idstatus']) ? $row['idstatus'] : 'Belum Diisi'; ?></div></div>
                        <div class="row"><div class="col-4">NIM:</div><div class="col-8"><?php echo !empty($row['nim']) ? $row['nim'] : 'Belum Diisi'; ?></div></div>
                        <div class="row"><div class="col-4">Status Approve Pembimbing:</div><div class="col-8"><?php echo !empty($row['status_approve_pembimbing']) ? $row['status_approve_pembimbing'] : 'Belum Diisi'; ?></div></div>
                        <div class="row"><div class="col-4">Tanggal Approve Pembimbing:</div><div class="col-8"><?php echo !empty($row['tgl_approve_pembimbing']) ? $row['tgl_approve_pembimbing'] : 'Belum Diisi'; ?></div></div>
                        <div class="row"><div class="col-4">Keterangan Pembimbing:</div><div class="col-8"><?php echo !empty($row['keterangan_pembimbing']) ? $row['keterangan_pembimbing'] : 'Belum Diisi'; ?></div></div>
                        <div class="row"><div class="col-4">Status Approve Akademik:</div><div class="col-8"><?php echo !empty($row['status_approve_akademik']) ? $row['status_approve_akademik'] : 'Belum Diisi'; ?></div></div>
                        <div class="row"><div class="col-4">Tanggal Approve Akademik:</div><div class="col-8"><?php echo !empty($row['tgl_approve_akademik']) ? $row['tgl_approve_akademik'] : 'Belum Diisi'; ?></div></div>
                        <div class="row"><div class="col-4">User Approve Akademik:</div><div class="col-8"><?php echo !empty($row['user_approve_akademik']) ? $row['user_approve_akademik'] : 'Belum Diisi'; ?></div></div>
                        <div class="row"><div class="col-4">Keterangan Akademik:</div><div class="col-8"><?php echo !empty($row['keterangan_akademik']) ? $row['keterangan_akademik'] : 'Belum Diisi'; ?></div></div>
                        <div class="row"><div class="col-4">Status Approve Keuangan:</div><div class="col-8"><?php echo !empty($row['status_approve_keuangan']) ? $row['status_approve_keuangan'] : 'Belum Diisi'; ?></div></div>
                        <div class="row"><div class="col-4">Tanggal Approve Keuangan:</div><div class="col-8"><?php echo !empty($row['tgl_approve_keuangan']) ? $row['tgl_approve_keuangan'] : 'Belum Diisi'; ?></div></div>
                        <div class="row"><div class="col-4">User Approve Keuangan:</div><div class="col-8"><?php echo !empty($row['user_approve_keuangan']) ? $row['user_approve_keuangan'] : 'Belum Diisi'; ?></div></div>
                        <div class="row"><div class="col-4">Keterangan Keuangan:</div><div class="col-8"><?php echo !empty($row['keterangan_keuangan']) ? $row['keterangan_keuangan'] : 'Belum Diisi'; ?></div></div>
                        <div class="row"><div class="col-4">Status Sidang Bikin:</div><div class="col-8"><?php echo !empty($row['status_sidang_bikin']) ? $row['status_sidang_bikin'] : 'Belum Diisi'; ?></div></div>
                        <div class="row"><div class="col-4"><br>Harap Bersabar jika Approve belum diisi</div>
                    </div> <!-- Close card-body -->
                </div> <!-- Close card -->
                <?php
            }
            ?>
        </div> <!-- Close container -->

        <a href="jadwal.php"><button type="button text-right" class="btn btn-primary">Jadwal</button></a>
        <a href="formlogin2.php"><button type="button text-right" class="btn btn-danger">Keluar</button></a>

        </body>
        </html>
        <?php
    }
} else {
    echo "<script>alert('Error, Silahkan Daftar Kembali!');window.location='formlogin2.php';</script>";
}
?>
