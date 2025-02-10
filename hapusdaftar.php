<?php
include('koneksi.php');

if(isset($_POST['nim'])) {
    $nim = $_POST['nim'];

    // Tanpa prepared statement (Kurang Aman)
    $query = "DELETE FROM pendaftaran WHERE nim = '$nim'";
    if (mysqli_query($mysqli, $query)) {
        header("Location: tampildaftar.php?status=deleted");
    } else {
        header("Location: tampildaftar.php?status=error");
    }

    mysqli_close($mysqli);
}
?>
