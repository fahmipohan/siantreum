<!DOCTYPE html>
<html>

<head>
    <title>Ambil Antrean</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/modules/@fortawesome/fontawesome-free/css/all.css">
</head>

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .queue-card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .queue-card {
            width: 350px;
            height: 400px;
            background-color: #fFFF;
            border-radius: 10px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }

        .queue-number {
            font-size: 48px;
            font-weight: bold;
            color: #333;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: 0 10px;
        }

        .position {
            font-size: 72px;
            color: #007bff;
            margin-top: 24px;
        }

        .lecture-name {
            text-align: center;
        }

        .lecture {
            font-weight: 600;
            color: #121212;
        }

        .lecture-name i {
            text-align: center;
            margin-right: 8px;
            color: #121212;
        }

        .verification-code {
            background-color: #eee;
            padding: 10px;
            border-radius: 5px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-align: center;
        }

        .code {
            font-size: 24px;
            color: #007bff;
            text-align: center;
            text-transform: uppercase;
        }

        .back-button {
            display: inline-block;
            color: #007bff;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
        }

        .back-button:hover {
            color: #008cff;
        }
    </style>
    <div class="queue-card-container">
        <div class="queue-card">
            <div class="queue-number">
                Urutan Antrean Ke-
                <span class="position">0<?= session()->getFlashdata('no_urut'); ?></span>
            </div>
            <div class="lecture-name">
                <i class="fas fa-user"></i><span class="lecture"><?= session()->getFlashdata('nama_dosen'); ?></span>
            </div>
            <div class="verification-code">
                Kode Verifikasi: <span class="code"><?= session()->getFlashdata('kode_verif'); ?></span>
            </div>
            <a href="#" onclick="history.back();" class="back-button">Kembali</a>
        </div>
    </div>
</body>

</html>