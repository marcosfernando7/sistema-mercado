<?php
    $url = $_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Bom Jesus - Sistema de gestão de produtos</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://<?= $url ?>/mercado/assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <script src="http://<?= $url ?>/mercado/assets/js/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://<?= $url ?>/mercado/assets/css/jquery.dataTables.min.css">
    <script src="http://<?= $url ?>/mercado/assets/js/jquery.dataTables.min.js"></script>
    <script src="http://<?= $url ?>/mercado/assets/js/bootstrap.min.js"></script>
    <!-- Style custom -->
    <link rel="stylesheet" href="http://<?= $url ?>/mercado/assets/css/style.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container">