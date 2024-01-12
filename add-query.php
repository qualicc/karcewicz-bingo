<?php
require __DIR__ . '/vendor/autoload.php';

use Vendor\KarcewiczBingo\AddQuery;

session_start();

if(!empty($_POST['query']) &&
!empty($_POST['submit']))
{

    $mail = new AddQuery($_POST['query'],$_POST['email']);
    if ($mail) {
        $_SESSION['message'] = array(
            'type' => "success",
            'text' => "Wysłano prawidłowo. Poczekaj na rozpatrzenie"
        );
        $_POST['query'] = "";
    }
    else {
        $_SESSION['message'] = array(
            'type' => "fail",
            'text' => "Wystąpił błąd. Poczekaj na rozpatrzenie"
        );
    }
}
header('Location: index.php');
?>