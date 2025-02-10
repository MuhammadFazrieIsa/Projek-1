<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "projek1";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data prodi
$sql = "SELECT idprodi, namaprodi FROM prodi";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Program Studi</title>

</head>
<body>
    <h2>Daftar Program Studi</h2>
    <table>
        <tr>
            <th>ID Prodi</th>
            <th>Nama Program Studi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["idprodi"] . "</td><td>" . $row["namaprodi"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
