// $(document).ready(function(){

    function sumar () {
        var precio = 9.99;
        var paquete = 29.99;
        var extrapersona = document.getElementById('ExtraPerson').value;
        var subtotal_paquete = document.getElementById('subtotal_paquete').value;
        var moneda = document.getElementById('moneda').value;

        let resultado_pextra;
        resultado_pextra=precio*extrapersona;
        total_pextra = resultado_pextra;
        document.getElementById('subtotal_personaextra').innerHTML = total_pextra + ' $' + moneda;

        let resultado_pago;
        resultado_pago = paquete+total_pextra;
        total_pago = resultado_pago;
        // console.log(total_pago);
        document.getElementById('total').innerHTML = total_pago.toFixed(2) + ' $' + moneda;

        if(extrapersona == '0'){
            document.getElementById('total').innerHTML = paquete + ' $' + moneda;
        }

        // Obtener el dato total del span y pasarlo a un input
        document.getElementById('formPayment').addEventListener('submit', function (e) {
            e.preventDefault();
            let form = document.getElementById('formPayment');
            document.getElementById('total_pago').value = total_pago.toFixed(2);
            form.submit();
        });

        /*let url = window.location.origin + '/buy/pass-checkout';
        let data = {
            'total_pago': total_pago,
        }
        $.ajax({
            type: "post",
            url: url,
            data: data,
            success: function (response) {
                console.log(response)
            }
        });*/



    }

    //-------- PAGO CON TARJETA ------------------------------------------------

    // Create a Stripe client.
	var stripe = Stripe('pk_test_51LC6oCLk6F3VXwEBZdM3cBzbfhCdlPcZsMhJWmN2zHuToXuAM1ZEAtIeIUhejahZVnAoaYL7zh2jjAaVBe8Hx1km00YEyP93Ic');
    // stripe.redirectToCheckout({sessionId:data.id})
    // Create an instance of Elements.
	var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
	// (Note that this demo uses a wider set of styles than the guide below.)
	var style = {
	    base: {
	       	color: '#32325d',
	       	lineHeight: '18px',
	       	fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
	       	fontSmoothing: 'antialiased',
	       	fontSize: '16px',
	         	'::placeholder': {
		           	color: '#7e7e7e'
	          	}
	    },
	    invalid: {
	       	color: '#fa755a',
	       	iconColor: '#fa755a'
	    }
	};

    // Create an instance of the card Element.
	var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>.
	card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
	card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');

      if (event.error) {
            displayError.textContent = event.error.message;
         } else {
             displayError.textContent = '';
      }
  });

  // Handle form submission.
	var form = document.getElementById('pagar_stripe');
	form.addEventListener('click', function(event) {

	   	event.preventDefault();

	    stripe.createToken(card).then(function(result) {

	      	if (result.error) {

	         	// Inform the user if there was an error.
	          	var errorElement = document.getElementById('card-errors');
	           	errorElement.textContent = result.error.message;
	       	} else {

	          	// Send the token to your server.
	            stripeTokenHandler(result.token);
	        }
        });
    });





    // });


