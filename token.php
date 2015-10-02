<?php
require './vendor/autoload.php';
require 'braintree-credentials.php';

echo(Braintree_ClientToken::generate(array("customerId" => null)));
?>