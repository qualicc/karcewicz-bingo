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
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/button.css">
</head>
<body class="d-flex flex-column justify-content-center position-relative overflow-hidden">
    <div id="pasek-right" class="pasek"></div>
    <div id="pasek-left" class="pasek"></div>
    <div id="imageTitle" ></div>

    <div class="content mt-5">
        <form class="content" action="add-query.php" method="post">
            <!-- Email -->
            <div class="mb-3 button-75">
                <label for="basic-url" class="form-label">Email (opcjonalny)</label>
                <div class="input-group">
                    <input name="email" type="email" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
                </div>
                <div class="form-text" id="basic-addon4">Podaj jeśli chcesz otrzymać wiadomość o decyjzji w sprawie dodania.</div>
            </div>
            <!-- Pytanie -->
            <div class="mb-3 button-75">
                <label for="basic-query" class="form-label">Treść</label>
                <div class="input-group">
                    <input name="query" type="text" class="form-control" id="basic-query" aria-describedby="basic-addon3 basic-addon4" required>
                </div>
            </div>
            <input class="button-74 mb-3"name="submit" type="submit" value="Wyślij">
        </form>

    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="scripts/script.js"></script>
</body>
</html>