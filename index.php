<?php

require 'vendor/autoload.php';
require 'braintree-credentials.php';

$clientToken = Braintree_ClientToken::generate();
?>
<html>
	<head>
		<title>My Fast Shop with PHP & Braintree</title>
		<style>
			div {
				margin-left: 30%;
			}
			h1	{
				margin-left: 25%;
			}
			img	{
				width: 20%;
				height: 35%;
			}
		</style>
	</head>
	<body>
		<h1>Buy this Awesome Car!!</h1>
		<div id='divImg'><img src='https://pbs.twimg.com/media/B9crMEeCcAAiOjw.jpg' width='15%' height='10%'></div>
		<br /><br />
		<form action="checkout.php" method="post">
			<div id='divCheckout'></div>
			<br /><br />
			<div id="divButton"><input type="submit" value="It's only $100" /></div>
		</form>
		<script src="https://js.braintreegateway.com/v2/braintree.js"></script>
		<script>
			braintree.setup(	'<?=$clientToken?>',
						'dropin',
						{ container: 'divCheckout' });
		</script>
	</body>
</html>
