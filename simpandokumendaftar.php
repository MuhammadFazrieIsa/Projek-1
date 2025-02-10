<?php
include('koneksi.php'); 

if (isset($_POST['terima'])) {
    // Sanitize inputs
    $idpendaftaran = mysqli_real_escape_string($mysqli, $_POST['id']);
    $nomorpendaftaran = mysqli_real_escape_string($mysqli, $_POST['nomorpendaftaran']);
    $keterangandokumen = mysqli_real_escape_string($mysqli, $_POST['ketdok']);
    
    // Handle file upload
    if (isset($_FILES['filedok']) && $_FILES['filedok']['error'] == 0) {
        $fileTmpPath = $_FILES['filedok']['tmp_name'];
        $fileName = $_FILES['filedok']['name'];
        $fileSize = $_FILES['filedok']['size'];
        $fileType = $_FILES['filedok']['type'];

        $uploadDir = 'uploads/';
        $fileDest = $uploadDir . basename($fileName);

        // Allowed file types
        $allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        
        // Check file type
        if (!in_array($fileType, $allowedTypes)) {
            echo "Invalid file type. Only PDF and Word documents are allowed.";
            exit;
        }

        // Move file to destination folder
        if (!move_uploaded_file($fileTmpPath, $fileDest)) {
            echo "Error uploading the file.";
            exit;
        }
    } else {
        echo "No file uploaded or there was an error during the upload.";
        exit;
    }

    // Ensure $id is set before proceeding
    if (empty($idpendaftaran)) {
        echo "ID is required.";
        exit;
    }

    // First query: Insert into dokumendaftar
    $query1 = "INSERT INTO dokumendaftar (id, nomorpendaftaran, keterangandokumen, filedokumen)
               VALUES ('$idpendaftaran', '$nomorpendaftaran', '$keterangandokumen', '$fileDest')";


    // Second query: Insert into status (or update if necessary)
    $query2 = "INSERT INTO status (id) VALUES ('$idpendaftaran')";

    // Execute query2 and check for errors
    if (!mysqli_query($mysqli)) {
        echo "Error: " . mysqli_error($mysqli);
        exit;
    }

    // If everything was successful
    echo "Data successfully submitted.";
}
?>
