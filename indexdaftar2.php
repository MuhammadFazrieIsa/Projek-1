<?php
session_start();
include('koneksi.php');



    $query = "SELECT * FROM status AS s
    WHERE nim = '$nim'";
    $result = mysqli_query($mysqli, $query);
    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil Mahasiswa</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <style>
            body {
                background: linear-gradient(135deg, #1e3c72, #2a5298);
                font-family: "Roboto", sans-serif;
                margin: 0;
                padding: 0;
            }

            .profile-container {
                max-width: 900px;
                margin: 30px auto;
                background: #fff;
                padding: 25px;
                border-radius: 10px;
                box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
            }

            .profile-header {
                display: flex;
                align-items: center;
                border-bottom: 2px solid #ddd;
                padding-bottom: 20px;
                margin-bottom: 25px;
            }

            .profile-header img {
                border-radius: 50%;
                width: 90px;
                height: 90px;
                object-fit: cover;
                margin-right: 20px;
            }

            h4 {
                font-size: 22px;
                font-weight: bold;
                color: #333;
            }

            p {
                margin: 5px 0;
                font-size: 16px;
                color: #555;
            }

            strong {
                color: #222;
            }

            .info-section {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
            }

            .section-box {
                width: 48%;
                background:rgb(96, 135, 173);
                padding: 15px;
                border-radius: 8px;
                box-shadow: 0px 0px 10px rgba(0,0,0,0.05);
            }

            .info-title {
                font-weight: bold;
                color: #007bff;
                font-size: 18px;
                margin-bottom: 10px;
            }

            .btn-primary {
                display: inline-block;
                padding: 10px 20px;
                background: #007bff;
                color: #fff;
                border-radius: 5px;
                text-decoration: none;
                margin-top: 15px;
                transition: 0.3s;
            }

            .btn-primary:hover {
                background: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="profile-container">
            <div class="profile-header">
                <img src="profile.jpg" alt="Profile Picture">
                <div>
                    <h4><?php echo htmlspecialchars($namamahasiswa); ?></h4>
                    <p>| Semester: 2024/2025</p>
                </div>
                <a href="formlogin2.php"><button type="button text-right" class="btn btn-danger">Keluar</button></a>
            </div>
                  
            <?php
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <p><strong>Status Details</strong></p>
                        <p><strong>ID Status:</strong> <?php echo !empty($row['idstatus']) ? $row['idstatus'] : 'Belum Diisi'; ?></p>
                        <p><strong>NIM:</strong> <?php echo !empty($row['nim']) ? $row['nim'] : 'Belum Diisi'; ?></p>
                        <p><strong>Status Approve Pembimbing:</strong> <?php echo !empty($row['status_approve_pembimbing']) ? $row['status_approve_pembimbing'] : 'Belum Diisi'; ?></p>
                        <p><strong>Tanggal Approve Pembimbing:</strong> <?php echo !empty($row['tgl_approve_pembimbing']) ? $row['tgl_approve_pembimbing'] : 'Belum Diisi'; ?></p>
                        <p><strong>Keterangan Pembimbing:</strong> <?php echo !empty($row['keterangan_pembimbing']) ? $row['keterangan_pembimbing'] : 'Belum Diisi'; ?></p>
                        <p><strong>Status Approve Akademik:</strong> <?php echo !empty($row['status_approve_akademik']) ? $row['status_approve_akademik'] : 'Belum Diisi'; ?></p>
                        <p><strong>Tanggal Approve Akademik:</strong> <?php echo !empty($row['tgl_approve_akademik']) ? $row['tgl_approve_akademik'] : 'Belum Diisi'; ?></p>
                        <p><strong>User Approve Akademik:</strong> <?php echo !empty($row['user_approve_akademik']) ? $row['user_approve_akademik'] : 'Belum Diisi'; ?></p>
                        <p><strong>Keterangan Akademik:</strong> <?php echo !empty($row['keterangan_akademik']) ? $row['keterangan_akademik'] : 'Belum Diisi'; ?></p>
                        <p><strong>Status Approve Keuangan:</strong> <?php echo !empty($row['status_approve_keuangan']) ? $row['status_approve_keuangan'] : 'Belum Diisi'; ?></p>
                        <p><strong>Tanggal Approve Keuangan:</strong> <?php echo !empty($row['tgl_approve_keuangan']) ? $row['tgl_approve_keuangan'] : 'Belum Diisi'; ?></p>
                        <p><strong>User Approve Keuangan:</strong> <?php echo !empty($row['user_approve_keuangan']) ? $row['user_approve_keuangan'] : 'Belum Diisi'; ?></p>
                        <p><strong>Keterangan Keuangan:</strong> <?php echo !empty($row['keterangan_keuangan']) ? $row['keterangan_keuangan'] : 'Belum Diisi'; ?></p>
                        <p><strong>Status Sidang Bikin:</strong> <?php echo !empty($row['status_sidang_bikin']) ? $row['status_sidang_bikin'] : 'Belum Diisi'; ?></p>
                        <p><br>Harap Bersabar jika Approve belum diisi</p>
                        <?php
                    }
                ?>
            
            <a href="#" class="btn btn-primary">View Result</a>
        </div>
    </body>
    </html>
    <?php
?>
