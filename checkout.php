<?php
require 'vendor/autoload.php';
require 'braintree-credentials.php';

$nonce = $_POST["payment_method_nonce"];

$transData = array(	'amount' => '100',
					'paymentMethodNonce' => $nonce,
					'options' =>	array ("submitForSettlement" => true)
			);

try {
	$result = Braintree_Transaction::sale($transData);
	if ($result->success)	{
		echo "<html><body><h1>Congratulations! Now you've a nice car! Your transaction ID is: " . $result->transaction->id;
	}	else 	{
		print_r($result->errors->deepAll());
	}
} catch (Exception $e) {
	var_dump($e->getTraceAsString());
}
?>