<?php
require 'vendor/phpqrcode/qrlib.php';

$code = htmlspecialchars($_GET["c"]);

QRcode::png($code, false, 1, 8 );
?>
