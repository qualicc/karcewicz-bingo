<?php
require __DIR__ . '/vendor/autoload.php';

use Vendor\KarcewiczBingo\Mailer;

$mail = new Mailer($_GET['name']);
header('Location: /index.php');
?>