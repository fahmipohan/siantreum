<!DOCTYPE html>
<html>

<head>
    <title>Monitoring Antrean</title>
    <link rel="stylesheet"
        type="text/css"
        href="style.css">
    <link rel="stylesheet"
        href="<?= base_url() ?>/template/modules/@fortawesome/fontawesome-free/css/all.css">
</head>

<body>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        padding: 24px;
    }

    .queue-card-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        grid-gap: 20px;
        justify-content: center;
    }

    @media (max-width: 768px) {
        .queue-card-container {
            grid-gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }
    }

    .queue-card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        grid-gap: 20px;
        align-items: center;
    }

    @media (max-width: 768px) {
        .queue-card-grid {
            grid-gap: 20px;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        }
    }

    .queue-card {
        width: 300px;
        height: 300px;
        background-color: #fFFF;
        border-radius: 10px;
        box-shadow: 2px 2px 5px rgba(0, 0, P1);
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        font-family: Arial, sans-serif;
        font-size: 16px;
        border: 1px solid #ddd;
    }

    .queue-number {
        font-size: 38px;
        font-weight: bold;
        color: #333;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin: 0 10px;
    }

    .position {
        font-size: 82px;
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
        font-size: 32px;
        font-weight: bold;
        color: #333;
        text-align: center;
    }

    .code {
        font-size: 32px;
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
        <div class="queue-card-grid">
            <?php
            echo dd($antre);
            foreach ($antre as $antre) : ?>
            <div class="queue-card">
                <div class="queue-number"
                    id="queue-card-<?php echo $antre['id'] ?>">
                    Urutan Antrean Ke-
                    <span class="position"><?php echo $antre['current_antre'] ?></span>
                </div>

                <div class="verification-code">
                    <span class="code"><?php echo $antre['dosen_nama'] ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script>
        function refreshPage() {
            setTimeout(() => {
                location.replace(location.href);
            }, 5000); // Refresh the page every 5 seconds (5000 milliseconds)
        }

        refreshPage();
    </script> -->
</body>

</html>