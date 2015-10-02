<?php

require 'vendor/autoload.php';
require 'braintree-credentials.php';

$offline = false;

if (!$offline)  {
    $nonce = $_POST["payment_method_nonce"];
    $amount = is_null($_POST["amount"]) ? "17" : $_POST["amount"];
    $transData = array (	"amount" =>		$amount,
                            "paymentMethodNonce" =>	$nonce,
                            "options" => array ("submitForSettlement" => true)
                    );

    try	{
            $result = Braintree_Transaction::sale($transData);
            if (!$result->success)	{
                echo "Ops... I couldn't charge you.";
                exit;
            }
    } catch (Exception $ex)	{
        echo "An exception happened";
        echo $ex;
        exit;
    }
    
    $tID = $result->transaction->id;
    
}   else    {
    $tID = "qr1234aa";
}
//
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="cinema.css" rel="stylesheet" type="text/css" />
        <title>Ticket Session - Beacon's Theater</title>
    </head>
    <body>
        <header>
            <div id="siteTitle">
                Beacon's Theater
            </div>
        </header>
        <div id="container">
            <div class='subTitle'>Show the ticket image below at the Theater entrance:</div>
            <div class='subTitle' id='ticketImg'><?echo "<img src='qcode.php?c=$tID' />"; ?></div>
            <div class="subTitle">The ticket ID is: <?=$tID?></div>
        </div>
        <div id="footer">Site for demonstration proposals - 2015</div>
    </body>
</html>

