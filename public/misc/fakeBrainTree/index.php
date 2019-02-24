<!DOCTYPE html>
<html class="is-modern card-root js no-touch csstransitions svg inlinesvg placeholder">
<head>
    <title>Cards</title>
    <meta charset="UTF-8">
    <link href="./dropin.css" rel="stylesheet">
</head>
<body class="inline-frame">

	<div id="container">
		<div class="add-payment-method-view"><div class="payment-container">
			<div class="payment-method-options">
				<button id="braintree-paypal-button" class="paypal is-active " title="Pay with PayPal">
					<span class="paypal-button-logo"></span>
				</button>
			</div>
			<div class="form-container">
				<div class="add-payment-method-form-view">
					<form action="#" method="post" class="grid card-form">

						<label class="card-label credit-card-number-label" for="credit-card-number">
							<span class="field-name">Card Number</span>
							<input id="credit-card-number" name="credit-card-number" class="card-field" type="tel" inputmode="numeric" placeholder="Card Number" autocomplete="off" />
							<span class="payment-method-icon"></span>
							<div class="invalid-bottom-bar"></div>
						</label>

						<div class="row">
							<div class="column ">
								<label class="card-label expiration-label" for="expiration">
									<span class="field-name">MM / YY</span>
									<input id="expiration" name="expiration" class="expiration card-field" type="tel" inputmode="numeric" placeholder="Expiration Date" autocomplete="off">
									<div class="invalid-bottom-bar"></div>
								</label>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
	//<![CDATA[

		window.addEventListener('message', function(event) {

				parent.postMessage(JSON.stringify({
						'card': document.getElementById('credit-card-number').value,
						'expiration': document.getElementById('expiration').value
					}), 'https://www.code-poets.co.uk');

			}, false);

	//]]>
	</script>

</body>
</html>