<?php
session_start();

if (isset($_POST['btnlogin'])) {
    // Ambil input dari form
    $email = $_POST['email'];
    $password = SHA1($_POST['password']); // Hash password dengan SHA1

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "projek1");

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Buat query untuk mencari user berdasarkan username
    $query = "SELECT * 
    FROM login2 AS l
    JOIN pendaftaran AS p
      ON l.email = p.email
    WHERE l.email = '$email'";

    // Eksekusi query
    $result = $conn->query($query);

    // Periksa apakah user ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Periksa password
        if ($password == $row['password']) {
            
            // Login berhasil, simpan session
            $_SESSION['email'] = $row['email'];
            $_SESSION['namamahasiswa'] = $row['namamahasiswa'];
            $_SESSION['nim'] = $row['nim'];
            $_SESSION['idprodi'] = $row['idprodi'];

            // Redirect ke index.php
            echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>";
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Berhasil',
                            text: 'Anda login sebagai " . $row['email'] . "',
                            showConfirmButton: false,
                            timer: 1200
                        }).then(() => {
                            window.location = 'indexdaftar.php';
                        });
                    });
                  </script>";
        } else {
            echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>";
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Gagal',
                            text: 'Password salah!',
                            showConfirmButton: true
                        }).then(() => {
                            window.location = 'formlogin2.php';
                        });
                    });
                  </script>";
        }
    } else {
        echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>";
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal',
                        text: 'Username tidak ditemukan!',
                        showConfirmButton: true
                    }).then(() => {
                        window.location = 'formlogin2.php';
                    });
                });
              </script>";
    }

    $conn->close();
} else {
    echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>";
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Tidak Ada Post',
                    text: 'Akses tidak valid.',
                    showConfirmButton: true
                 }).then(() => {
                        window.location = 'formlogin2.php';
                    });
                });
          </script>";
}
?>
