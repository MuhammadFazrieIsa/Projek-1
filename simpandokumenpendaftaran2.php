

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('koneksi.php');
session_start();

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Secure form input
    $idprodi = mysqli_real_escape_string($mysqli, $_POST['idprodi']);
    $tanggaldaftar = mysqli_real_escape_string($mysqli, $_POST['tanggaldaftar']);
    $nim = mysqli_real_escape_string($mysqli, $_POST['nim']);
    $namamahasiswa = mysqli_real_escape_string($mysqli, $_POST['namamahasiswa']);
    $nomorhp = mysqli_real_escape_string($mysqli, $_POST['nomorhp']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $judulta = mysqli_real_escape_string($mysqli, $_POST['judulta']);
    $keterangandokumen = mysqli_real_escape_string($mysqli, $_POST['keterangandokumen']);

    // File upload settings
    $uploadDir = 'uploads/';
    $uploads = [];

    function handleFileUpload($fileKey, $allowedTypes, $maxSize = 5 * 1024 * 1024) {
        global $uploadDir;
        if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES[$fileKey]['tmp_name'];
            $fileName = basename($_FILES[$fileKey]['name']);
            $fileSize = $_FILES[$fileKey]['size'];
            $fileType = mime_content_type($fileTmpPath);

            // Validate file type
            if (!in_array($fileType, $allowedTypes)) {
                return ["error" => "Invalid file type for $fileKey. Only " . implode(", ", $allowedTypes) . " are allowed."];
            }

            // Validate file size
            if ($fileSize > $maxSize) {
                return ["error" => "$fileKey exceeds the " . ($maxSize / 1024 / 1024) . "MB size limit."];
            }

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $newFileName = time() . "_" . $fileName;
            $fileDest = $uploadDir . $newFileName;

            if (!move_uploaded_file($fileTmpPath, $fileDest)) {
                return ["error" => "Failed to upload $fileKey. Check folder permissions."];
            }

            return ["success" => $fileDest];
        }

        return ["error" => "No file uploaded for $fileKey or upload error occurred."];
    }

    // Define allowed file types
    $allowedFileTypes = [
        'filedokumen' => ['application/pdf'],
        'fotoktp' => ['image/jpeg', 'image/png', 'image/jpg'],
        'ijazah' => ['application/pdf', 'image/jpeg', 'image/png'],
        'fotokrs' => ['image/jpeg', 'image/png'],
        'transkripnilai' => ['application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']
    ];

    foreach ($allowedFileTypes as $fileKey => $allowedTypes) {
        $result = handleFileUpload($fileKey, $allowedTypes);
        if (isset($result['error'])) {
            $response['status'] = 'error';
            $response['message'] = $result['error'];
            echo json_encode($response);
            exit;
        } else {
            $uploads[$fileKey] = $result['success'];
        }
    }

    // Insert into pendaftaran table
    $query1 = "INSERT INTO pendaftaran (idprodi, tanggaldaftar, nim, namamahasiswa, nomorhp, email, judulta) 
               VALUES ('$idprodi', '$tanggaldaftar', '$nim', '$namamahasiswa', '$nomorhp', '$email', '$judulta')";

    if (!mysqli_query($mysqli, $query1)) {
        $response['status'] = 'error';
        $response['message'] = 'Error inserting into pendaftaran: ' . mysqli_error($mysqli);
        echo json_encode($response);
        exit;
    }

    // Insert into dokumendaftar table
    $query2 = "INSERT INTO dokumendaftar (filedokumen, fotoktp, ijazah, fotokrs, transkripnilai, keterangandokumen) 
               VALUES ('{$uploads['filedokumen']}', '{$uploads['fotoktp']}', '{$uploads['ijazah']}', '{$uploads['fotokrs']}', '{$uploads['transkripnilai']}', '$keterangandokumen')";

    if (!mysqli_query($mysqli, $query2)) {
        $response['status'] = 'error';
        $response['message'] = 'Error inserting into dokumendaftar: ' . mysqli_error($mysqli);
        echo json_encode($response);
        exit;
    }

    $query3 = "INSERT INTO login2 (email, password) 
    VALUES ('$email', SHA1('$password'))";

    if (!mysqli_query($mysqli, $query3)) {
        $response['status'] = 'error';
        $response['message'] = 'Error inserting into dokumendaftar: ' . mysqli_error($mysqli);
        echo json_encode($response);
        exit;
    }

    $_SESSION['namamahasiswa'] = $namamahasiswa;
    $_SESSION['nim'] = $nim;

    $response['status'] = 'success';
    $response['message'] = 'Pendaftaran successful!';
    echo json_encode($response);
}
?>
