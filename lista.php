<?php
require __DIR__ . '/vendor/autoload.php';

use Vendor\KarcewiczBingo\Communication;

session_start();
if($_SESSION['ADMIN'] != true)
{
    header('Location: index.php');
}
$obj = new Communication;
?>
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
        if (isset($_SESSION['message'])) {
            if (is_array($_SESSION['message'])) {
                echo "<div id='message'> <div class='message-box message-" . $_SESSION['message']['type'] . "'>
                " . $_SESSION['message']['text'] . "
                    <button type='button' id='hide-message-box' class='btn btn-light mt-2 mb-1'>OK!</button>
                </div></div>";
                $_SESSION['message'] = false;
            }

        }
        

        $i = 0;
        $lista = $obj -> getList();
    ?>
    <div class="content mt-5">
        <table class="button-75">
            <tr>
                <th>#</th>
                <th>Pytanie</th>
                <th>Email</th>
                <th></th>
                <th></th>
            </tr>
                <?php
               
                    foreach ($lista as $one) {
                        // print_r($one['ID']);
                        echo "<tr>";

                        echo "<th>" . $i++ . "</th>"; 
                        echo "<th>" . $one['tresc'] . "</th>"; 
                        if ($one['email'] != null) {
                            $email = $one['email'];
                        }
                        else
                        {
                            $email = "Anonim";
                        }
                        //print_r($email);
                        echo "<th>" . $email . "</th>"; 
                        echo "<form action='accept-query.php' method='post'> <input type='hidden' name='id' value='" . $one['ID'] . "'>";
                        echo "<th><input type='submit' name='dodaj' type=button value='Dodaj' class='btn btn-success'></th>";
                        echo "<th><input type='submit' name='usun' type=button value='Usuń' class='btn btn-danger'></th>";
                        echo "</form>";

                        echo "</tr>";
                    // echo "<br>";
                    }
                ?>           
        </table>

    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/scripts/script.js"></script>
</body>
</html>