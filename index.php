<?php
require __DIR__ . '/vendor/autoload.php';

use Vendor\KarcewiczBingo\newEnter;
$one = new newEnter();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JBJXDXXMG2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JBJXDXXMG2');
</script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Witaj w fascynującej grze online 'Karcewicz Bingo'! Przeżyj nieprzewidywalne wykłady profesora Karcewicza, odznaczając nietypowe pytania i zdobywaj bingo z humorem!">
    <title>Karcewicz Bingo</title>
    <link rel='icon' type='png' href="images/bingo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/button.css">
</head>
<body class="d-flex flex-column justify-content-center position-relative overflow-hidden">
    <div id="pasek-right" class="pasek"></div>
    <div id="pasek-left" class="pasek"></div>
    <div id="imageTitle" ></div>
    <div class="content mt-5">
        <a href="gra" class="button-74 mb-5" role="button">Zagraj</a> 
        <a href="nowe-pytanie" class="button-74 mb-5" role="button">Dodaj pytanie</a> 
        <a href="https://buycoffee.to/qualicc" class="button-74 mb-5" role="button">Postaw kawę</a> 

    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="scripts/script.js"></script>
</body>
</html>