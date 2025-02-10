
<?php
include('koneksi.php'); 

if (isset($_POST['btnkirim'])) {
    $nomorpendaftaran = mysqli_real_escape_string($mysqli, $_POST['nomorpendaftaran']);
    $idpendaftaran = mysqli_real_escape_string($mysqli, $_POST['idpendaftaran']);
    $idprodi = mysqli_real_escape_string($mysqli, $_POST['idprodi']);
    $tanggaldaftar = mysqli_real_escape_string($mysqli, $_POST['tanggaldaftar']);
    $nim = mysqli_real_escape_string($mysqli, $_POST['nim']);
    $namamahasiswa = mysqli_real_escape_string($mysqli, $_POST['namamahasiswa']);
    $nomorhp = mysqli_real_escape_string($mysqli, $_POST['nomorhp']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $judulta = mysqli_real_escape_string($mysqli, $_POST['judulta']);
    $keterangandokumen = mysqli_real_escape_string($mysqli, $_POST['ketdok']);

    if (isset($_FILES['filedok']) && $_FILES['filedok']['error'] == 0) {
        // Get file details
        $fileTmpPath = $_FILES['filedok']['tmp_name'];
        $fileName = $_FILES['filedok']['name'];
        $fileSize = $_FILES['filedok']['size'];
        $fileType = $_FILES['filedok']['type'];

        // Set the upload directory
        $uploadDir = 'uploads/';
        $fileDest = $uploadDir . basename($fileName);

        // Check if the file type is allowed (e.g., PDF, DOCX)
        $allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        if (!in_array($fileType, $allowedTypes)) {
            echo "Invalid file type. Only PDF and Word documents are allowed.";
            exit;
        }

        // Optional: Check file size limit (e.g., 5MB)
        if ($fileSize > 5 * 1024 * 1024) {  // 5MB
            echo "File size exceeds the 5MB limit.";
            exit;
        }

        // Create the upload directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);  // Create the directory with full permissions if it doesn't exist
        }

        // Move the uploaded file to the specified directory
        if (!move_uploaded_file($fileTmpPath, $fileDest)) {
            echo "Error uploading the file. Please ensure the 'uploads' folder is writable.";
            exit;
        }
    } else {
        echo "No file uploaded or there was an error during the upload.";
        exit;
    }

    // Prepare SQL queries
    $query1 = "INSERT INTO pendaftaran (
        nomorpendaftaran, idpendaftaran, idprodi, tanggaldaftar, 
        nim, namamahasiswa, nomorhp, email, judulta) 
        VALUES ('$nomorpendaftaran', '$idpendaftaran', '$idprodi', '$tanggaldaftar', 
        '$nim', '$namamahasiswa', '$nomorhp', '$email', '$judulta')";

    session_start();

    // Execute queries and handle possible errors
    if (mysqli_query($mysqli, $query1)) {
        $_SESSION['nim'] = $nim;
        $_SESSION['namamahasiswa'] = $namamahasiswa;
        $_SESSION['idpendaftaran'] = $idpendaftaran;
        $_SESSION['keterangandokumen'] = $keterangandokumen;
        $_SESSION['filedok'] = $fileDest;
        header("Location: indexdaftar.php");
        exit();
    } else {
        echo "Error during insertion: " . mysqli_error($mysqli);
        exit();
    }
}
?>
