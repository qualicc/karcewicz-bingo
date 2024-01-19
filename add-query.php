<?php
require __DIR__ . '/vendor/autoload.php';

use Vendor\KarcewiczBingo\AddQuery;

session_start();

if(!empty($_POST['query']) &&
!empty($_POST['submit']))
{

    $adder = new AddQuery();
    $adder -> addProposition($_POST['query'],$_POST['email']);
    if ($adder) {
        $_SESSION['message'] = array(
            'type' => "success",
            'text' => "Wysłano prawidłowo. Poczekaj na rozpatrzenie"
        );
    }
    else {
        $_SESSION['message'] = array(
            'type' => "fail",
            'text' => "Wystąpił błąd. Poczekaj na rozpatrzenie"
        );
    }
}
header('Location: nowe-pytanie.php');
?>