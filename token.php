<?php
require './vendor/autoload.php';
require 'braintree-credentials.php';

echo($clientToken = Braintree_ClientToken::generate(array(
    "customerId" => null
)));
?>