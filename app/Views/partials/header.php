<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=chrome" />
    <title><?= !isset($title) ? "SIRESE | Sistem Rekomendasi Smartphone" : "SIRESE | ".$title ?></title>
    <meta name="author" content="wahyu nur cahyo" />
    <meta name="description" content="description here" />
    <meta name="keywords" content="keywords,here" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.5.1/css/all.css" />
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/customStyle.css">
    <!-- <link rel="shortcut icon" href="logo.ico" type="image/x-icon"> -->


</head>

<body class="bg-cyan-950 font-sans leading-normal tracking-normal mt-12 ">

    <!-- loader -->
    <div class="loader-container" id="onload">

        <div class="loader"></div>
    </div>
