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
        <title>Ben Hur - Beacon's Theater</title>
    </head>
    <body>
        <header>
            <div id="siteTitle">
                Beacon's Theater
            </div>
        </header>
        <div id="container">
            <div id="movieTitle">
                Ben Hur 
            </div>
            <div id="topBuyButton">
                <button id="btnTopBuyButton" value="Go to Checkout" onclick="document.location.href='#t_checkout'">Go to Checkout</button>
            </div>
            <section id="movieAbstract">
                In AD 26, Judah Ben-Hur (Charlton Heston) is a wealthy prince and merchant in Jerusalem, who lives with his mother, Miriam (Martha Scott); his sister, Tirzah (Cathy O'Donnell); their loyal slave, Simonides (Sam Jaffe); and his daughter, Esther (Haya Harareet), who loves Ben-Hur but is betrothed to another. His childhood friend, the Roman citizen Messala (Stephen Boyd), is now a tribune. After several years away from Jerusalem, Messala returns as the new commander of the Roman garrison. Messala believes in the glory of Rome and its imperial power, while Ben-Hur is devoted to his faith and the freedom of the Jewish people.
            </section>
            <div id="movieCartoon">
                <img id="billboardImg" src="ben_hur_billboard.jpg" alt="Ben Hur Billboard" />
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