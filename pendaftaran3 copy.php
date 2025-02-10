<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pendaftaran</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
    <div class="container-fluid p-3 bg-primary text-white text-center mb-0">
        <h1>Pendaftaran</h1>
        <p>Silahkan Untuk Mendaftar!</p>
    </div>

    <div class="container text-white text-center col-sm-6" style="margin-bottom: 50px;">
        <h2>Progress Pengisian Data</h2>
        <div class="progress">
            <div class="progress-bar" id="progressBar" style="width:0%">0%</div>
        </div>
    </div>

    <!-- PendaftaranForm (First Form) -->
    <div class="container justify-content-center align-items-center col-sm-6" style="height: 120vh;" id="pendaftaranForm">
        <form id="PendaftaranForm" method="POST" class="border p-4 rounded bg-light" enctype="multipart/form-data">
            <h3>Pendaftaran Form</h3>
            <table class="table table-borderless">
                <tr>
                    <td>NIM</td>
                    <td><input type="text" class="form-control" name="nim" required="" oninput="updateProgress()"></td>
                </tr>
                <tr>
                    <td>Nama Mahasiswa</td>
                    <td><input type="text" class="form-control" name="namamahasiswa" required="" oninput="updateProgress()"></td>
                </tr>
                <tr>
                    <td>Tanggal Pendaftaran</td>
                    <td><input type="date" class="form-control" name="tanggaldaftar" required="" oninput="updateProgress()"></td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>
                        <select class="form-control" name="idprodi" required oninput="updateProgress()">
                            <option value="">Pilih Prodi</option>
                            <option value="1">Teknik Komputer</option>
                            <option value="2">Teknik Mesin</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nomor HP</td>
                    <td>Nomor HP</td>
                    <td><input type="tel" class="form-control" name="nomorhp" required="" oninput="updateProgress()"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" class="form-control" name="email" required="" oninput="updateProgress()"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" class="form-control" name="password" required="" oninput="updateProgress()"></td>
                </tr>
                <tr>
                    <td>Judul Tugas Akhir</td>
                    <td><input type="text" class="form-control" name="judulta" required="" oninput="updateProgress()"></td>
                </tr>
            </table>

            <button type="button" id="nextButton" class="btn btn-secondary mt-3 w-100" onclick="showDokumenForm()">Lanjutkan ke Dokumen</button>
        </form>
    </div>

    <!-- DokumenForm (Second Form) -->
    <div class="container justify-content-center align-items-center col-sm-6" style="height: 120vh; display: none;" id="dokumenForm">
        <form id="DokumenForm" method="POST" action="simpandokumenpendaftaran2.php" class="border p-4 rounded bg-light" enctype="multipart/form-data">
            <h3>Dokumen Form</h3>
            <table class="table table-borderless">
                <tr>
                    <td>File Dokumen</td>
                    <td><input type="file" class="form-control" name="filedokumen" id="filedokumen" required="" accept=".pdf" oninput="updateProgress()"></td>
                </tr>
                <tr>
                    <td>Foto KTP</td>
                    <td><input type="file" class="form-control" name="fotoktp" id="fotoktp" required="" accept=".png, .jpg, .jpeg" oninput="updateProgress()"></td>
                </tr>
                <tr>
                    <td>Ijazah</td>
                    <td><input type="file" class="form-control" name="ijazah" id="ijazah" required="" accept=".pdf, .png, .jpg, .jpeg" oninput="updateProgress()"></td>
                </tr>
                <tr>
                    <td>Foto KRS</td>
                    <td><input type="file" class="form-control" name="fotokrs" id="fotokrs" required="" accept=".png, .jpg, .jpeg" oninput="updateProgress()"></td>
                </tr>
                <tr>
                    <td>Transkrip Nilai</td>
                    <td><input type="file" class="form-control" name="transkripnilai" id="transkripnilai" accept=".pdf, .docx" required="" oninput="updateProgress()"></td>
                </tr>
                <tr>
                    <td>Keterangan Dokumen</td>
                    <td><input type="text" class="form-control" name="keterangandokumen" required="" oninput="updateProgress()"></td>
                </tr>
            </table>
            <button type="button"  id="previousButton" class="btn btn-secondary mt-3 w-100" onclick="showPendaftaranForm()">Balik ke Pendaftaran</button>
            <button type="button" id="submitButton" class="btn btn-primary w-100" onclick="submitBothForms()">Kirim</button>
        </form>
    </div>

    <script>
        // Function to show DokumenForm and hide PendaftaranForm
        function showDokumenForm() {
            document.getElementById('pendaftaranForm').style.display = 'none';
            document.getElementById('dokumenForm').style.display = 'block';
        }

        function showPendaftaranForm() {
            document.getElementById('pendaftaranForm').style.display = 'block';
            document.getElementById('dokumenForm').style.display = 'none';
        }

        // Function to update the progress bar based on form completion
        function updateProgress() {
            var pendaftaranForm = document.getElementById('PendaftaranForm');
            var dokumenForm = document.getElementById('DokumenForm');

            var pendaftaranInputs = pendaftaranForm.querySelectorAll('input, select');
            var dokumenInputs = dokumenForm.querySelectorAll('input');

            var pendaftaranFilled = 0, dokumenFilled = 0;

            pendaftaranInputs.forEach(function(input) {
                if (input.value !== "" || (input.type === 'file' && input.files.length > 0)) {
                    pendaftaranFilled++;
                }
            });

            dokumenInputs.forEach(function(input) {
                if (input.value !== "" || (input.type === 'file' && input.files.length > 0)) {
                    dokumenFilled++;
                }
            });

            var pendaftaranProgress = (pendaftaranFilled / pendaftaranInputs.length) * 50;
            var dokumenProgress = (dokumenFilled / dokumenInputs.length) * 50;

            var totalProgress = pendaftaranProgress + dokumenProgress;
            var progressBar = document.getElementById('progressBar');

            progressBar.style.width = totalProgress + '%';
            progressBar.innerHTML = Math.round(totalProgress) + '%';
        }

        // Function to submit both forms
// Function to submit both forms
function submitBothForms() {
    var pendaftaranForm = document.getElementById('PendaftaranForm');
    var dokumenForm = document.getElementById('DokumenForm');

    if (pendaftaranForm.checkValidity() && dokumenForm.checkValidity()) {
        var formData = new FormData();

        // Append Pendaftaran Form Data
        var pendaftaranInputs = pendaftaranForm.querySelectorAll('input, select');
        pendaftaranInputs.forEach(function(input) {
            if (input.type === 'file') {
                if (input.files.length > 0) {
                    formData.append(input.name, input.files[0]);
                }
            } else {
                formData.append(input.name, input.value);
            }
        });

        // Append Dokumen Form Data
        var dokumenInputs = dokumenForm.querySelectorAll('input');
        dokumenInputs.forEach(function(input) {
            if (input.type === 'file') {
                if (input.files.length > 0) {
                    formData.append(input.name, input.files[0]);
                }
            } else {
                formData.append(input.name, input.value);
            }
        });

        // Send data via AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'simpandokumenpendaftaran2.php', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                var response = JSON.parse(xhr.responseText);

                if (xhr.status == 200 && response.status === 'success') {
                    toastr.success(response.message);  // Success message

                    // SweetAlert2 for login success message and redirection
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Berhasil',
                        text: 'Anda login sebagai ' + response.level,
                        showConfirmButton: false,
                        timer: 1200  // Show for 1.2 seconds
                    }).then(() => {
                        // Redirect to another page after success
                        window.location.href = "formlogin2.php"; // Redirect URL after successful login
                    });
                } else {
                    toastr.error(response.message);  // Error message
                }
            }
        };

        xhr.send(formData);
    } else {
        toastr.warning('Silahkan Isi dulu Semua.');
    }
}

    </script>


</body>

</html>


