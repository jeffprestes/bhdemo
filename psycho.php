<?php

require 'vendor/autoload.php';
require 'braintree-credentials.php';

$clientToken = Braintree_ClientToken::generate();

?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="cinema.css" rel="stylesheet" type="text/css" />
        <title>Psycho - Beacon's Theater</title>
    </head>
    <body>
        <header>
            <div id="siteTitle">
                Beacon's Theater
            </div>
        </header>
        <div id="container">
            <div id="movieTitle">
                Psycho 
            </div>
            <div id="topBuyButton">
                <button id="btnTopBuyButton" value="Go to Checkout" onclick="document.location.href='#t_checkout'">Go to Checkout</button>
            </div>
            <section id="movieAbstract">
                During a lunchtime tryst in Phoenix, Arizona, a real estate secretary named Marion Crane discusses with her boyfriend, Sam Loomis, how they cannot afford to get married because of Sam's debts. After lunch, Marion returns to work, where a client drops off a $40,000 cash payment on a property. Her boss asks her to deposit the money in the bank, and she asks if she can take the rest of the afternoon off. Returning home, she begins to pack for an unplanned trip, deciding to steal the money and give it to Sam in Fairvale, California. She is seen by her boss on her way out of town, which makes her nervous. During the trip, she pulls over on the side of the road and falls asleep, only to be awakened by a state patrol officer. He is suspicious about her nervous behavior but allows her to drive on. Shaken by the encounter, Marion stops at an automobile dealership and trades in her Ford Mainline, with its Arizona license plates, for a Ford Custom 300 that has California tags. Her transaction is all for naught - the highway patrolman sees her at the car dealership and witnesses her purchase of the newer car...
            </section>
            <div id="movieCartoon">
                <img id="billboardImg" src="psycho_billboard.jpg" alt="Psycho Billboard" />
            </div>
            <a name="t_checkout"></a>
            <form action="cinemacheckout.php" method="post">
                <div id='ticketCost'>
                    Ticket Cost: $ 17
                </div>
                <div id="checkout"></div>
                <br />
                <br />
                <div id="payButton">
                    <input id="btnPay" type="submit" value="Confirm payment" />
                </div>
            </form>
        </div>
        <div id="footer">Site for demonstration proposals - 2015</div>
        <script src="https://js.braintreegateway.com/v2/braintree.js"></script>
        <script>
            braintree.setup(	'<?=$clientToken?>',
				'dropin',
				{ container : 'checkout'});
        </script>
    </body>
</html>