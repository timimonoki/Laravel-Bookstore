
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

            $("td[class='orderDate").each(function(index, obj){
                        $(this).html(orderDetails[index]['order_date']);    
                    });
            $("td[class='orderNumber").each(function(index, obj){
                        $(this).html(orderDetails[index]['id']);    
                    });
            $("td[class='total").each(function(index, obj){
                        $(this).html(orderDetails[index]['order_total']);    
                    });
            $("td[class='status").each(function(index, obj){
                        $(this).html(orderDetails[index]['order_status']);    
                    });

            displayOrderDetails();
        })
    })
})



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

                $('td.creditCard span.cardName').each(function(index, obj){
                        $(this).html(json['creditCards'][index]['card_name']);    
                    });
                $('td.creditCard span.cardNumber').each(function(index, obj){
                        $(this).html(json['creditCards'][index]['card_number']);    
                    });
                $('td.creditCard span.expMonth').each(function(index, obj){
                        $(this).html(json['creditCards'][index]['expiry_month']);    
                    });
                $('td.creditCard span.expYear').each(function(index, obj){
                        $(this).html(json['creditCards'][index]['expiry_year']);    
                    });

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
                alert('Default credit card was succesfully set!');
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


$(document).ready(function(){
     $('a[href="#tab-4"]').on('click', function (){
        hideListOfShippingAddressesForm();
        hideAddUpdateShippingAddressesForm();

        $('button.listOfShippingAddresses').on('click', function(){
            displayListOfShippingAddressesForm();
            hideAddUpdateShippingAddressesForm();

            $.ajax({
                url: 'http://localhost:8090/Bookstore/laravel/public/listOfShippingAddresses/timi',
                type: 'GET'
            }).done(function (data) {
                var jsonString = JSON.stringify(data);
                var json = JSON.parse(jsonString);

                    $('td.shippingAddress span.country').each(function(index, obj){
                        $(this).html(json['shippingAddresses'][index]['country']);    
                    });
                    $('td.shippingAddress span.city').each(function(index, obj){
                        $(this).html(json['shippingAddresses'][index]['city']);    
                    });
                    $('td.shippingAddress span.street').each(function(index, obj){
                        $(this).html(json['shippingAddresses'][index]['street']);    
                    });
                    $('td.shippingAddress span.streetNumber').each(function(index, obj){
                        $(this).html(json['shippingAddresses'][index]['street_number']);    
                    });
                    $('td.shippingAddress span.zipcode').each(function(index, obj){
                        $(this).html(json['shippingAddresses'][index]['zipcode']);    
                    });
            
            })

                 $("form.listOfShippingAddressesForm").on('submit', function(e) {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var parent = $(this).parent();
                var streetNumber = parent.find('td.shippingAddress span.streetNumber').html();
                alert(JSON.stringify(streetNumber));
        
                $.ajax({
                    type: "POST",
                    url: 'http://localhost:8090/Bookstore/laravel/public/setDefaultShippingAddress/timi',
                    data: JSON.stringify(streetNumber),
                    contentType: "application/json; charset=utf-8"
                }).done(function(){
                    alert('Default shipping address was succesfully set!');
                })
        
            })
        })

        $('button.addUpdateShippingAddress').on('click', function(){
            displayAddUpdateShippingAddressesForm();
            hideListOfShippingAddressesForm();

            $("form.addUpdateShippingAddressForm").on('submit', function(e) {
                e.preventDefault(); //avoid to execute the actual submit of the form
                var data = $("form.addUpdateShippingAddressForm").serialize();

                $.ajax({
                    type: "POST",
                    url: 'http://localhost:8090/Bookstore/laravel/public/addUpdateShippingAddress/timi',
                    data: data
                }).done(function() {
                    alert('Shipping Address was succesfully added/updated!')
                    $("form.addUpdateShippingAddressForm")[0].reset();
                })

              })
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



function displayListOfShippingAddressesForm(){
    $('form.listOfShippingAddressesForm').css("display", "block");
}

function displayAddUpdateShippingAddressesForm(){
    $('form.addUpdateShippingAddressForm').css("display", "block");
}

function hideListOfShippingAddressesForm(){
    $('form.listOfShippingAddressesForm').css("display", "none");
}

function hideAddUpdateShippingAddressesForm(){
    $('form.addUpdateShippingAddressForm').css("display", "none");
}


