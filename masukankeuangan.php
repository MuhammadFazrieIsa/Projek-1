<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Approval Keuangan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<?php
include('koneksi.php');

if (isset($_POST['btnkirim'])) {
    $nim = mysqli_real_escape_string($mysqli, $_POST['nim']);
    $statusapprove = mysqli_real_escape_string($mysqli, $_POST['status_approve']);
    $tanggalapprove = mysqli_real_escape_string($mysqli, $_POST['tanggal_approve']);
    $userapprove = mysqli_real_escape_string($mysqli, $_POST['user_approve']);
    $keterangan = mysqli_real_escape_string($mysqli, $_POST['keterangan']);

    if (!empty($nim)) {
        // Check if the NIM exists
        $checkNimQuery = "SELECT nim FROM status WHERE nim = '$nim'";
        $checkResult = mysqli_query($mysqli, $checkNimQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Prepare the update query
            $query = "UPDATE status 
                      SET status_aprove_keuangan = '$statusapprove', 
                          keterangan_keuangan = '$keterangan', 
                          tgl_approve_keuangan = '$tanggalapprove',
                          user_keuangan = '$userapprove'
                      WHERE nim = '$nim'";

            if (mysqli_query($mysqli, $query)) {
                echo "<script>toastr.success('Data updated successfully.');</script>";
                header("Location: tampilapprovalkeuangan.php"); 
            } else {
                echo "<script>toastr.error('Failed to update data. Error: " . mysqli_error($mysqli) . "');</script>";
                header("Location: tampilapprovalkeuangan.php"); 
            }
        } else {
            echo "<script>toastr.error('NIM not found in the database.');</script>";
            header("Location: tampilapprovalkeuangan.php"); 
        }
    } else {
        echo "<script>toastr.error('NIM cannot be empty.');</script>";
        header("Location: tampilapprovalkeuangan.php"); 
    }
}
?>

</html>
