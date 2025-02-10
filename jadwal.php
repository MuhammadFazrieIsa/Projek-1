<?php
session_start();  // Start session at the very beginning
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Jadwal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

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
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: var(--text-color);
            padding-top: 80px; /* To make space for the fixed header */
        }

        header {
            display: none; /* Hide header */
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
            text-align: center;
        }

        p {
            font-size: 18px;
            text-align: center;
        }

        .table {
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        th, td {
            text-align: center;
            padding: 12px;
        }

        th {
            background-color: rgb(146, 167, 190);
            color: white;
        }

        td {
            font-size: 14px;
            color: #333;
        }

        .table-responsive {
            overflow-x: auto;
        }

        /* Mobile adjustments */
        @media (max-width: 768px) {
            h1 {
                font-size: 28px;
            }

            p {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
<div class="container-fluid text-center col-sm-12">
    <h1>Jadwal Matakuliah</h1>
    <p>Silahkan Mengecek Data Matakuliah!</p>

    <div class="table-responsive mt-3">
        <table id="data-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Matakuliah</th>
                    <th>Dosen</th>
                    <th>Prodi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('koneksi.php');
                $idprodi = $_POST['idprodi'];
                $query = "SELECT * 
                FROM jadwal AS j
                JOIN prodi AS p ON j.idprodi = p.idprodi
                JOIN dosen AS d ON j.nidn = d.nidn
                WHERE j.idprodi = $idprodi";
                $result = mysqli_query($mysqli, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$row['hari']."</td>";
                        echo "<td>".$row['jam']."</td>";
                        echo "<td>".$row['namamatakuliah']."</td>";
                        echo "<td>".$row['namadosen']."</td>";
                        echo "<td>".$row['namaprodi']."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada hasil</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#data-table').DataTable();
    });
</script>

</body>
</html>
