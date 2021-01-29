<!DOCTYPE html>
<html lang="en">
<?php
date_default_timezone_set("Asia/Jakarta");
setlocale(LC_ALL, "id_ID");
$img = base64_encode(file_get_contents(base_url() . "assets/img/cert.png"));
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat</title>
    <style>
        @page {
            margin: 0in;
            size: 1056pt 816pt;
        }

        body {
            background-image: url("data:image/png;base64,<?= $img ?>");
            background-position: top left;
            background-repeat: no-repeat;
            background-size: contain;
            width: 100%;
            height: 100%;
        }

        h1 {
            text-align: center;
            font-size: 50px;
            color: #000;
            position: absolute;
            padding: 0px;
            margin-top: 490px;
            margin-left: 35;
            width: 100%;
        }

        h2 {
            text-align: center;
            font-size: 50px;
            color: #000;
            position: absolute;
            padding: 0px;
            margin-top: 605px;
            margin-left: 35;
            width: 100%;
        }

        .tahun {
            text-align: center;
            font-size: 24px;
            font-weight: bolder;
            color: #353536;
            position: absolute;
            padding: 0px;
            margin-top: 689px;
            margin-left: 350;
            width: 100%;
        }

        .date {
            text-align: center;
            font-size: 22px;
            font-weight: bolder;
            color: #353536;
            position: absolute;
            padding: 0px;
            margin-top: 773px;
            margin-left: 100;
            width: 100%;
        }
    </style>
</head>

<body>
    <h1><?= $nama ?></h1>
    <h2><?= $sebagai ?></h2>
    <span class="tahun"><?= date('Y') ?></span>
    <span class="date"><?= strftime('%d %B %Y') ?></span>
</body>

</html>