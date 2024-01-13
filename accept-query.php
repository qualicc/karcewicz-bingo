<?php
require __DIR__ . '/vendor/autoload.php';

use Vendor\KarcewiczBingo\AddQuery;

session_start();
if ($_SESSION['ADMIN'] == true &&
    !empty($_POST['id']) &&
    (!empty($_POST['usun']) || !empty($_POST['dodaj']))) 
{
    $decision = new AddQuery();
    if(isset($_POST['usun']))
    {
        $decision -> cancel($_POST['id']);
     
        $_SESSION['message'] = array(
            'type' => "fail",
            'text' => "Odrzucono prawidłowo"
        );
    }
    else
    {
        $decision -> accept($_POST['id']);
        $_SESSION['message'] = array(
            'type' => "success",
            'text' => "Dodano prawidłowo"
        );
    }
}

header('Location: /lista.php');
