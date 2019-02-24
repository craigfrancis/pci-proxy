
braintree = {

	form: null,
	iframe: null,

	setup: function(token, type, config) {

			var container = document.getElementById(config.container),
				form = null,
				iframe = document.createElement('iframe');

			if (container) {

				form = container.parentNode;
				while (form && form.tagName.toLowerCase() != 'form') {
					form = form.parentNode;
				}

				if (form) {

					// token = JSON.parse(atob(token));

					iframe.setAttribute('src', 'https://proxy.krang.org.uk/misc/fakeBrainTree/');
					iframe.style.border = 0;
					iframe.style.width = '100%';
					iframe.style.height = '189px';

					container.appendChild(iframe);

					braintree.form = form;
					braintree.iframe = iframe;

					form.addEventListener('submit', braintree.formSubmit, false);
					window.addEventListener('message', braintree.receiveMessage, false);

				}

			}

		},

	formSubmit: function(event) {

			braintree.iframe.contentWindow.postMessage('data', '*');

			event.preventDefault();

		},

	receiveMessage: function(event) {

			var data = JSON.parse(event.data),
				input = null,
				value = null;

			if (data['card']) {

				data['payment_method_nonce'] = '9z023a32-2czf-4geq-af27-ba1330a9a41a';

				for (var field in data) {
					if (!data.hasOwnProperty(field)) continue;
					input = document.createElement('input');
					input.setAttribute('type', 'hidden');
					input.setAttribute('name', field);
					input.setAttribute('value', data[field]);
					braintree.form.appendChild(input);
				}

				braintree.form.removeEventListener('submit', braintree.formSubmit, false);
				braintree.form.submit();

			}

		}

};
