<?php
require __DIR__ . '/vendor/autoload.php';

use Vendor\KarcewiczBingo\Mailer;
if(!empty($_GET['name']))
{
    $mail = new Mailer($_GET['name'],"Wygrana w Bingo Karcewicza","<h2>Gratuluje</h2> <br> Dnia". date("d-m-Y") . "wygrałeś w Bingo Karcewicza <br><br> <b>Zapraszam ponownie</b>");
}
header('Location: index.php');
?>