<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $status = $_POST['status'];
    $comment = $_POST['comment'];

    $query = "UPDATE pendaftaran SET kondisi = '$status', komentar = '$comment' WHERE nim = '$nim'";

    if (mysqli_query($mysqli, $query)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
?>
