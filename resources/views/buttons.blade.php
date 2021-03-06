<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CodePen - Responsive jQuery Shopping Basket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- partial:index.partial.html -->
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Basket</title>
    </head>

    <body>
        <script
            src="https://www.paypal.com/sdk/js?client-id=AV3PPKnU-xEq15a2DkgcIPnABM7MNpEjEUR7obX2YLKvK5-PzKXy9b7TbheF5ZUiM570toeQO1kiQPni&currency=MXN&debug=true&buyer-country=MX">
        </script>
        <main>
            <div class="basket">

                <div class="basket-labels">
                    <ul>
                        <li class="item item-heading">Item</li>
                        <li class="price">Price</li>
                        <li class="quantity">Quantity</li>
                        <li class="subtotal">Subtotal</li>
                    </ul>
                </div>
                <div class="basket-product">
                    <div class="item">
                        <div class="product-image">
                            <img src="http://placehold.it/120x166" alt="Placholder Image 2" class="product-frame">
                        </div>
                        <div class="product-details">
                            <h1><strong><span class="item-quantity">4</span> x Eliza J</strong> Lace Sleeve Cuff Dress
                            </h1>
                            <p><strong>Navy, Size 18</strong></p>
                            <p>Product Code - 232321939</p>
                        </div>
                    </div>
                    <div class="price">26.00</div>
                    <div class="quantity">
                        <input type="number" value="4" min="1" class="quantity-field">
                    </div>
                    <div class="subtotal">104.00</div>
                    <div class="remove">
                        <button>Remove</button>
                    </div>
                </div>
                <div class="basket-product">
                    <div class="item">
                        <div class="product-image">
                            <img src="http://placehold.it/120x166" alt="Placholder Image 2" class="product-frame">
                        </div>
                        <div class="product-details">
                            <h1><strong><span class="item-quantity">1</span> x Whistles</strong> Amella Lace Midi Dress
                            </h1>
                            <p><strong>Navy, Size 10</strong></p>
                            <p>Product Code - 232321939</p>
                        </div>
                    </div>
                    <div class="price">26.00</div>
                    <div class="quantity">
                        <input type="number" value="1" min="1" class="quantity-field">
                    </div>
                    <div class="subtotal">26.00</div>
                    <div class="remove">
                        <button>Remove</button>
                    </div>
                </div>

            </div>
            <aside>
                <div class="summary">
                    <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
                    <div class="summary-subtotal">
                        <div class="subtotal-title">Subtotal</div>
                        <div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
                        <div class="summary-promo hide">
                            <div class="promo-title">Promotion</div>
                            <div class="promo-value final-value" id="basket-promo"></div>
                        </div>
                    </div>
                    <!-- <div class="summary-delivery">
          <select name="delivery-collection" class="summary-delivery-selection">
              <option value="0" selected="selected">Select Collection or Delivery</option>
             <option value="collection">Collection</option>
             <option value="first-class">Royal Mail 1st Class</option>
             <option value="second-class">Royal Mail 2nd Class</option>
             <option value="signed-for">Royal Mail Special Delivery</option>
          </select>
        </div>-->
                    <div class="summary-total">
                        <div class="total-title">Total</div>
                        <div class="total-value final-value" id="basket-total">130.00</div>
                    </div>
                    <div class="summary-checkout">
                        <!--<  <button class="checkout-cta">Go to Secure Checkout</button>-->


                    </div>
                    <div id="paypal-button-container">
                        <script>
                            var total=document.getElementById("basket-total").innerHTML;


		 paypal.Buttons({
		 createOrder: function(data, actions) {


      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: total
          }
        }]
      }

	  ),
	  onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }




  }).render('#paypal-button-container');
                        </script>

                        <script>
                            paypal.Buttons({
    createOrder: function(data, actions) {

		 alert(total);
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: total
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
                        </script>
                    </div>

                </div>
            </aside>
        </main>

    </body>

    </html>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src="{{ asset('js/script.js')}}"></script>
</body>

</html>
