<?php
require __DIR__ . '/vendor/autoload.php';

use Vendor\KarcewiczBingo\newEnter;
$one = new newEnter();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karcewicz Bingo</title>
    <link rel='icon' type='png' href="images/bingo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column justify-content-center position-relative overflow-hidden">
    <div id="pasek-right" class="pasek">
    </div>
    <div id="pasek-left" class="pasek">
    </div>
    <div class="header d-flex flex-column justify-content-center align-items-center position-absolute mt-5">
        <h1>Karcewicz Bingo</h1>
    </div>
    <div id="bingo">

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
</body>
</html>