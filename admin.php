<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karcewicz Bingo</title>
    <link rel='icon' type='png' href="images/bingo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="/style/button.css">
</head>
<body class="d-flex flex-column justify-content-center position-relative overflow-hidden">
    <div id="pasek-right" class="pasek"></div>
    <div id="pasek-left" class="pasek"></div>
    <div id="imageTitle" ></div>
    <!-- MESSAGE BOX -->
    <?php
        session_start();
        if (is_array($_SESSION['message'])) {
            echo "<div id='message'> <div class='message-box message-" . $_SESSION['message']['type'] . "'>
            " . $_SESSION['message']['text'] . "
                <button type='button' id='hide-message-box' class='btn btn-light mt-2 mb-1'>OK!</button>
            </div></div>";
            $_SESSION['message'] = false;
        }

    ?>
    <div class="content mt-5">
        <form class="content" action="login.php" method="post">
            <div class="mb-3 button-75">
                <label for="basic-query" class="form-label">Hasło</label>
                <div class="input-group">
                    <input name="password" type="password" class="form-control" id="basic-query" aria-describedby="basic-addon3 basic-addon4" required>
                </div>
            </div>
            <input class="button-74 mb-3"name="submit" type="submit" value="Zaloguj">
        </form>

    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/scripts/script.js"></script>
</body>
</html>