<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pendaftaran Berhasil</title>
    <link rel="icon" type="image/png" href="img/logo2.png" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card p-5 shadow-sm text-center">
                    <i class="fas fa-check-circle text-success fa-5x mb-3"></i>
                    <h1 class="text-uppercase text-primary mb-3">Pendaftaran Berhasil!</h1>
                    <p class="mb-4">Terima kasih, data Anda telah kami simpan. Berikut adalah detail pendaftaran Anda:</p>
                    
                    <div class="text-start table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <?php
                                $data = [
                                    "Nama Lengkap" => $_GET['nama'] ?? 'N/A',
                                    "Nomor Identitas" => $_GET['identitas'] ?? 'N/A',
                                    "Email" => $_GET['email'] ?? 'N/A',
                                    "Nomor Telepon" => $_GET['telepon'] ?? 'N/A',
                                    "Tanggal Kegiatan" => $_GET['tanggal'] ?? 'N/A',
                                    "Lokasi Konservasi" => $_GET['lokasi'] ?? 'N/A',
                                    "Tujuan Kegiatan" => $_GET['tujuan'] ?? 'N/A'
                                ];

                                foreach ($data as $key => $value) {
                                    echo "<tr><th>" . htmlspecialchars($key) . "</th><td>" . htmlspecialchars($value) . "</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <a href="daftar-simaksi.html" class="btn btn-primary py-2 px-4">Kembali ke Formulir</a>
                        <button onclick="window.print()" class="btn btn-secondary py-2 px-4"><i class="fa fa-print me-2"></i>Cetak / Simpan PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>