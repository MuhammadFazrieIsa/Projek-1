<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pendaftaran</title>
    <link rel="stylesheet" href="pendaftaran.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
    <div class="container-fluid p-3 bg-primary text-white text-center mb-0">
        <h1>Dokumen</h1>
        <p>Silahkan Untuk Isi File!</p>
    </div>

    <div class="container justify-content-center align-items-center col-sm-6" style="height: 2vh;"></div>

    <div class="container text-white text-center col-sm-6" style="margin-bottom: 50px;">
        <h2>Progress Pengisian Data</h2>
        <div class="progress">
            <div class="progress-bar" id="progressBar" style="width:0%">0%</div>
        </div>
    </div>

    <div class="container justify-content-center align-items-center col-sm-6" style="height: 120vh;">
        <form id="PendaftaranForm" method="POST" action="simpandokumenpendaftaran.php" class="border p-4 rounded bg-light" enctype="multipart/form-data">
            <table class="table table-borderless">
                <tr>
                    <td>File Dokumen</td>
                    <td><input type="file" class="form-control" name="filedokumen" id="filedokumen" required=""></td>
                </tr>
                <tr>
                    <td>Keterangan Dokumen</td>
                    <td><input type="text" class="form-control" name="keterangandokumen" required=""></td>
                </tr>
                <tr>
                    <td>Foto KTP</td>
                    <td><input type="file" class="form-control" name="fotoktp" id="fileDokumen" required=""></td>
                </tr>
                <tr>
                    <td>Ijazah</td>
                    <td><input type="file" class="form-control" name="ijazah" id="ijazah" required=""></td>
                </tr>
                <tr>
                    <td>Foto KTP</td>
                    <td><input type="file" class="form-control" name="fotoktp" id="fotoktp" required=""></td>
                </tr>
                <tr>
                    <td>Ijazah</td>
                    <td><input type="file" class="form-control" name="ijazah" id="ijazah" required=""></td>
                </tr>
                <tr>
                    <td>Foto KRS</td>
                    <td><input type="file" class="form-control" name="fotokrs" id="fotokrs" required=""></td>
                </tr>
                <tr>
                    <td>Transkrip Nilai</td>
                    <td><input type="file" class="form-control" name="transkripnilai" id="transkripnilai" required=""></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="btnkirim" class="btn btn-primary w-100">Kirim</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

<script>
    // Update progress bar
    function updateProgress() {
        var inputs = document.querySelectorAll('#PendaftaranForm input');
        var select = document.querySelector('select[name="idprodi"]');
        var filledInputs = 0;

        // Count non-empty inputs
        inputs.forEach(function(input) {
            if (input.value !== "") {
                filledInputs++;
            }
        });

        // Count selected "Prodi"
        if (select.value !== "") {
            filledInputs++;
        }

        // Include file input
        if (document.getElementById("fileDokumen").files.length > 0) {
            filledInputs++;
        }

        var totalInputs = inputs.length + 1; // Add 1 for "Prodi" select and file input
        var progress = (filledInputs / totalInputs) * 100;

        var progressBar = document.getElementById('progressBar');
        progressBar.style.width = progress + '%';
        progressBar.innerHTML = Math.round(progress) + '%';
    }

    // Add event listeners for inputs and select
    var inputs = document.querySelectorAll('#PendaftaranForm input');
    inputs.forEach(function(input) {
        input.addEventListener('input', updateProgress);
    });

    var selectProdi = document.querySelector('select[name="idprodi"]');
    selectProdi.addEventListener('change', updateProgress);

    var fileInput = document.getElementById("fileDokumen");
    fileInput.addEventListener('change', updateProgress);

    window.onload = updateProgress;

</script>

</html>
