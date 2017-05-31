
$(document).ready(function(){
    // btn btn-primary" type="submit
    $('a[href="#tab-2"]').on('click', function(){
        $.ajax({
            url: 'http://localhost:8090/Bookstore/laravel/public/orders-myProfile/timi',
            type: 'GET',
            async: 'false'
        }).done(function(data){
            var jsonString = JSON.stringify(data);
            var json = JSON.parse(jsonString);

            var orderDetails = json["orderDetails"];

            for(var i=0; i<json["orderDetails"].length; i++){
                $("td[class='orderDate']").html(orderDetails[i]["order_date"]);
            }
            for(var i=0; i<json["orderDetails"].length; i++){
                $("td[class='orderNumber']").html(orderDetails[i]["id"]);
            }
            for(var i=0; i<json["orderDetails"].length; i++){
                $("td[class='total']").html(orderDetails[i]["order_total"]);
            }
            for(var i=0; i<json["orderDetails"].length; i++){
                $("td[class='status']").html(orderDetails[i]["order_status"]);
            }

            displayOrderDetails();
        })
    })
})

function displayOrderDetailsDivision() {
    $(document).ready(function () {
        if ($.trim($("td[class='orderDate']").html()) == '') {
            $("#orderDetailsForPurchase").css("display", "none");
        } else {
            $("#orderDetailsForPurchase").css("display", "block");
        }

    })
}

function displayOrderDetails() {
    $(document).ready(function () {
    if ($.trim($("td[class='orderDate']").html()) != ''){
        $("tr[class='orderDetails']").on('click', function () {

            displayOrderDetailsDivision();
            var orderNumber = $(this).find('td.orderNumber').html();

            $.ajax({
                url:'http://localhost:8090/Bookstore/laravel/public//orderDetails-myProfile/timi/'+orderNumber,
                type: 'GET'
            }).done(function (data) {
                var jsonStrin = JSON.stringify(data);
                var json = JSON.parse(jsonStrin);

                $("div[class='text-center'] span").html(orderNumber);

                $("div.billingDetails span.name").html(json['billingDetails']['name']);
                $("div.billingDetails span.country").html(json['billingDetails']['country']);
                $("div.billingDetails span.city").html(json['billingDetails']['city']);
                $("div.billingDetails span.street").html(json['billingDetails']['street']);
                $("div.billingDetails span.streetNumber").html(json['billingDetails']['street_number']);
                $("div.billingDetails span.county").html(json['billingDetails']['county']);
                $("div.billingDetails span.zipcode").html(json['billingDetails']['zipcode']);

                $("div.shippingDetails span.name").html(json['shippingDetails']['name']);
                $("div.shippingDetails span.country").html(json['shippingDetails']['country']);
                $("div.shippingDetails span.city").html(json['shippingDetails']['city']);
                $("div.shippingDetails span.street").html(json['shippingDetails']['street']);
                $("div.shippingDetails span.streetNumber").html(json['shippingDetails']['street_number']);
                $("div.shippingDetails span.county").html(json['shippingDetails']['county']);
                $("div.shippingDetails span.zipcode").html(json['shippingDetails']['zipcode']);

                $("div.cardDetails span.cardName").html(json['paymentInformation']['card_name']);
                $("div.cardDetails span.cardNumber").html(json['paymentInformation']['card_number']);
                $("div.cardDetails span.expYear").html(json['paymentInformation']['expiry_year']);
                $("div.cardDetails span.expMonth").html(json['paymentInformation']['expiry_month']);

                $("td.itemName").html(json['orderSummary'][0]['title']);
                $("td.itemPrice").html(json['orderSummary'][0]['our_price']);
                $("td.itemQuantity").html(json['orderSummary'][0]['quantity']);
                $("td.itemSubtotal").html(json['orderSummary'][0]['subtotal']);
                $("td.itemTotal").html(json['orderSummary'][0]['order_total']);
            })
        })
    }
})
}

function hideUpdateCrediCardFormOnBillingTab(){
    $('form[class="addUpdateCreditCardForm"]').css("display", "none");
}

function displayUpdateCreditCardFormOnBillingTab(){
    $('form[class="addUpdateCreditCardForm"]').css("display", "block");
}

function hideSetDefaultCreditCardOnBillingTab() {
    $('form[class="listOfCreditCardsForm"]').css("display", "none");
}

function displaySetDefaultCreditCardOnBillingTab() {
    $('form[class="listOfCreditCardsForm"]').css("display", "block");
}

$(document).ready(function() {
    $('a[href="#tab-3"]').on('click', function () {
        hideSetDefaultCreditCardOnBillingTab();
        hideUpdateCrediCardFormOnBillingTab();

        $('button.listOfCreditCards').on('click', function () {
            displaySetDefaultCreditCardOnBillingTab();

            $.ajax({
                url: 'http://localhost:8090/Bookstore/laravel/public/listOfCreditCards/timi',
                type: 'GET'
            }).done(function (data) {
                var jsonString = JSON.stringify(data);
                var json = JSON.parse(jsonString);
                for (var i = 0; i < json["creditCards"].length; i++) {
                    $('td.creditCard span.cardName').html(json['creditCards'][0]['card_name']);
                    $('td.creditCard span.cardNumber').html(json['creditCards'][0]['card_number']);
                    $('td.creditCard span.expMonth').html(json['creditCards'][0]['expiry_month']);
                    $('td.creditCard span.expYear').html(json['creditCards'][0]['expiry_year']);
                }
            })
        })


          $("form.listOfCreditCardsForm").on('submit', function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var parent = $(this).parent();
            var cardNumber = parent.find('td.creditCard span.cardNumber').html();
            alert(JSON.stringify(cardNumber));
        
            $.ajax({
              type: "POST",
              url: 'http://localhost:8090/Bookstore/laravel/public/setDefaultCreditCard/timi',
              data: JSON.stringify(cardNumber),
              contentType: "application/json; charset=utf-8"
            }).done(function(){
                alert('Credit card was succesfully set!');
            })
        
        })

          $('button.addUpdateCreditCard').on('click', function () {
              hideSetDefaultCreditCardOnBillingTab();
              displayUpdateCreditCardFormOnBillingTab();

              $("form.addUpdateCreditCardForm").on('submit', function(e) {
                e.preventDefault(); //avoid to execute the actual submit of the form
                var data = $("form.addUpdateCreditCardForm").serialize();
                var json = JSON.stringify(data);
                alert(data);

                $.ajax({
                    type: "POST",
                    url: 'http://localhost:8090/Bookstore/laravel/public/addUpdateCreditCard/timi',
                    data: data
                }).done(function() {
                    alert('Credit card was succesfully added/updated!')
                    $("form.addUpdateCreditCardForm")[0].reset();
                })

              })
          })




    })
})
