<?php

require 'vendor/autoload.php';
require 'braintree-credentials.php';

$nonce = $_POST["payment_method_nonce"];
$amount = is_null($_POST["amount"]) ? "100" : $_POST["amount"];
$transData = array (	"amount" =>		$amount,
			"paymentMethodNonce" =>	$nonce,
			"options" => array ("submitForSettlement" => true)
		);

try	{
	$result = Braintree_Transaction::sale($transData);
	if ($result->success)	{
		echo "Congratulations! Your transaction id is: " . $result->transaction->id;
	} else	{
		echo "Ops... I couldn't charge you.";
	}
} catch (Exception $ex)	{
	echo "An exception happened";
}
?>

