<?php
require __DIR__ . '/vendor/autoload.php';

use Vendor\KarcewiczBingo\Mailer;
if(!empty($_GET['name']))
{
    $mail = new Mailer($_GET['name']);
}
header('Location: index.php');
?>