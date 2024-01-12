<?php
require __DIR__ . '/vendor/autoload.php';

use Vendor\KarcewiczBingo\makeMigrate;
$one = new makeMigrate();
$one -> migrateAll();
?>

