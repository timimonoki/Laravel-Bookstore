<!DOCTYPE html>
<html lang="en">

@include('common.header')

<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/userDefined/myProfile.js"></script>
<script src="js/scripts.js"></script>
@include('common.navbar')

<div class="container">

    @include('partials.logo')

    <div class="row" style="margin-top: 60px;">
        <div class="col-xs-9 col-xs-offset-3">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-1" data-toggle="tab"><span style="color: red;">Edit</span></a></li>
                <li><a href="#tab-2" data-toggle="tab" id="someSpecial"><span style="color: red;">Orders</span></a></li>
                <li><a href="#tab-3" data-toggle="tab"><span style="color: red;">Billing</span></a></li>
                <li><a href="#tab-4" data-toggle="tab"><span style="color: red;">Shipping</span></a></li>
            </ul>

            <!-- Tab panels -->
            <div class="tab-content">

                <!-- Edit user information -->
                <div class="tab-pane active" id="tab-1">
                    <div class="panel-group">
                        <div class="panel panel-default" style="border: none;">
                            <div class="panel-body" style="background-color: #ededed; margin-top: 20px;">


                                @if (isset($uncorrespondingPassword) && $uncorrespondingPassword == 1)
                                    <div class="alert alert-danger">
                                    <strong>Incorrect Password!</strong> Please enter a correct password for the current user.
                                    </div>
                                @endif

                                    @if (isset($unexisitngUser) && $unexisitngUser == 1)
                                        <div class="alert alert-danger">
                                            <strong>Wrong username! </strong> Please enter the correct username
                                        </div>
                                @endif

                                    {{--<script>--}}
                                        {{--$(function () {--}}
                                            {{--$("#updateUserInfoButton").click(function()  {--}}

                                                {{--$.ajax({--}}
                                                    {{--type: 'POST',--}}
                                                    {{--url: '/edit-myProfile',--}}
                                                    {{--data: $("#editMyProfileForm").serializeArray(),--}}
                                                    {{--success: function () {--}}
                                                        {{--alert('form was submitted');--}}
                                                    {{--}--}}
                                                {{--});--}}

                                              {{--event.preventDefault();// using this page stop being refreshing--}}

                                            {{--});--}}
                                        {{--});--}}
                                    {{--</script>--}}

                                <!-- Send a form with details about profile to be updated -->

                                <form id = "editMyProfileForm" method="POST" action="{{ route('editMyProfile') }}">
                                    <input type="hidden" name="id" value="1"/>

                                    <div class="form-group">
                                        <label for="userName">* Username</label>
                                        <input type="text" class="form-control" id="userName" name="username" required/>
                                    </div>

                                    <div class="form-group">
                                        <label for="currentPassword">* Current Password</label>
                                        <input
                                                type="password" class="form-control" id="currentPassword"
                                                name="password" required/>
                                    </div>
                                    <p style="color: #828282">Enter your current password to change the email address or password.</p>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="firstName">First Name</label>
                                                <input type="text" class="form-control" id="firstName" name="firstName"/>
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="lastName">Last Name</label>
                                                <input type="text" class="form-control" id="lastName" name="lastName"/>
                                            </div>
                                        </div>
                                    </div>
                                    <p  style="color: #828282">Enter your first name and last name if you want to change it</p>

                                    <div class="form-group">
                                        <label for="email">Email Address</label>  <input
                                                type="text" class="form-control" id="email" name="email"/>

                                    </div>
                                    <p style="color: #828282">Enter a valid email address if you want to change your current email address</p>

                                    <div class="form-group">
                                        <label for="txtNewPassword">Password</label>&nbsp;<span
                                                id="checkPasswordMatch" style="color: red;"></span> <input
                                                type="password" class="form-control" id="txtNewPassword"
                                                name="newPassword"/>
                                    </div>
                                    <p style="color: #828282">Enter a new password if you wish to change your current password</p>

                                    <div class="form-group">
                                        <label for="txtConfirmPassword">Confirm Password</label>  <input
                                                type="password" class="form-control" id="txtConfirmPassword"/>
                                    </div>
                                    <p style="color: #828282">Reenter the new password</p>

                                    <button id="updateUserInfoButton" type="submit"
                                            class="btn btn-primary">Save All
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Order Information -->
                <div class="tab-pane fade" id="tab-2">

                    <div class="panel-group">
                        <div class="panel panel-default" style="border: none;">
                            <div class="panel-body" style="background-color: #ededed; margin-top: 20px;">

                                <div id="orderSummaryOnPurchases">
                                <table class="table table-sm table-inverse">
                                    <thead>
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Order Number</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="orderDetails">
                                        <td class="orderDate"></td>
                                        <td class="orderNumber"></td>
                                        <td class="total"></td>
                                        <td class="status"></td>
                                    </tr>
                                    <tr class="orderDetails">
                                        <td class="orderDate"></td>
                                        <td class="orderNumber"></td>
                                        <td class="total"></td>
                                        <td class="status"></td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>


                                <div id="orderDetailsForPurchase" style="display: none">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="text-center">
                                                <h2>
                                                    Order Detail for Purchase <span></span>
                                                </h2>
                                            </div>
                                            <hr/>

                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <div class="panel panel-default height">
                                                        <div class="panel-heading">
                                                            <strong>Billing Details</strong>
                                                        </div>
                                                        <div class="panel-body billingDetails">
                                                            <strong>Name:   </strong><span class="name"></span><br/>
                                                            <strong>Country:   </strong><span class="country"></span><br/>
                                                            <strong>City:   </strong><span class="city"></span><br/>
                                                            <strong>Street:   </strong><span class="street"></span><br/>
                                                            <strong>Street number:   </strong><span class="streetNumber"></span><br/>
                                                            <strong>County:   </strong><span class="county"></span><br/>
                                                            <strong>Zipcode:   </strong><span class="zipcode"></span><br/>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div class="panel panel-default height">
                                                        <div class="panel-heading">
                                                            <strong>Payment Information</strong>
                                                        </div>
                                                        <div class="panel-body cardDetails">
                                                            <strong>Card name:    </strong><span class="cardName"></span><br/>
                                                            <strong>Card number:   </strong><span class="cardNumber"></span><br/>
                                                            <strong>Expiry year:   </strong><span class="expYear"></span><br/>
                                                            <strong>Expiry month:   </strong><span class="expMonth"></span><br/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div class="panel panel-default height">
                                                        <div class="panel-heading">
                                                            <strong>Shipping Details</strong>
                                                        </div>
                                                        <div class="panel-body shippingDetails">
                                                            <strong>Name:   </strong><span class="name"></span><br/>
                                                            <strong>Country:   </strong><span class="country"></span><br/>
                                                            <strong>City:   </strong><span class="city"></span><br/>
                                                            <strong>Street:   </strong><span class="street"></span><br/>
                                                            <strong>Street number:   </strong><span class="streetNumber"></span><br/>
                                                            <strong>County:   </strong><span class="county"></span><br/>
                                                            <strong>Zipcode:   </strong><span class="zipcode"></span><br/>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel-heading">
                                                <h3 class="text-center">
                                                    <strong>Order Summary</strong>
                                                </h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-condensed">
                                                        <thead>
                                                        <tr class="itemDetails">
                                                            <td><strong>Item Name</strong></td>
                                                            <td><strong>Item Price</strong></td>
                                                            <td><strong>Item Quantity</strong></td>
                                                            <td><strong>Subtotal</strong></td>
                                                            <td><strong>Total</strong></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td class="itemName"></td>
                                                            <td class="itemPrice"></td>
                                                            <td class="itemQuantity"></td>
                                                            <td class="itemSubtotal"></td>
                                                            <td class="itemTotal"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="itemName"></td>
                                                            <td class="itemPrice"></td>
                                                            <td class="itemQuantity"></td>
                                                            <td class="itemSubtotal"></td>
                                                            <td class="itemTotal"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="itemName"></td>
                                                            <td class="itemPrice"></td>
                                                            <td class="itemQuantity"></td>
                                                            <td class="itemSubtotal"></td>
                                                            <td class="itemTotal"></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>


                </script>

                <!-- Billing Information -->
                <div class="tab-pane fade" id="tab-3">

                    <div class="panel-group">
                        <div class="panel panel-default" style="border: none;">
                            <div class="panel-body" style="background-color: #ededed; margin-top: 20px;">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item listOfCreditCardsDiv">
                                                <button type="button" class="btn btn-link listOfCreditCards">List of Credit Cards</button>
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="col-xs-6 addUpdateCreditCardDiv">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item active ">
                                                <button type="button" class="btn btn-link addUpdateCreditCard">Add(Update)Credit Card</button>
                                            </li>
                                        </ol>
                                    </div>
                                </div>

                                <div>
                                    <form class="listOfCreditCardsForm" action="/setDefaultCreditCard/timi" method="POST">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Default</th>
                                                <th>Credit Card</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="radio" name="defaultUserPaymentId"/></td>
                                                <td class="creditCard">
                                                    <strong>Card name:   </strong><span class="cardName"></span><br/>
                                                    <strong>Card number:   </strong><span class="cardNumber"></span><br/>
                                                    <strong>Expiry month:   </strong><span class="expMonth"></span><br/>
                                                    <strong>Expiry year:   </strong><span class="expYear"></span><br/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" name="defaultUserPaymentId"/></td>
                                                <td class="creditCard">
                                                    <strong>Card name:   </strong><span class="cardName"></span><br/>
                                                    <strong>Card number:   </strong><span class="cardNumber"></span><br/>
                                                    <strong>Expiry month:   </strong><span class="expMonth"></span><br/>
                                                    <strong>Expiry year:   </strong><span class="expYear"></span><br/>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-primary submitDefaultPayment" type="submit">Save</button>
                                    </form>
                                </div>


                                <!-- Send data about credit card update  -->
                                <div>
                                    <form action="" method="post" class="addUpdateCreditCardForm">

                                        <input type="hidden" name="id">

                                        <!-- Billing Address -->
                                    
                                        <div class="form-group">
                                            <h4>Billing Address</h4>
                                            <hr/>
                                        </div>
                                        <div class="form-group">
                                            <label for="billingName">* Name</label> 
                                            <input type="text" class="form-control" id="billingName" placeholder="Receiver Name"                         name="billingName"  required="required"/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="billingCity">* Street Address</label> 
                                                    <input type="text" class="form-control" id="billingStreet"
                                                                        name="street" placeholder="Billing street address"/>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="billingState">* Street Number</label>
                                                    <input type="text" class="form-control" id="billingStateNr" 
                                                                        name="streetNumber" placeholder="State">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                        <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="billingState">* City</label>
                                                    <input type="text" class="form-control" id="billingCity" 
                                                                        name="city" placeholder="City">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="billingCity">* County</label> 
                                                    <input type="text" class="form-control" id="billingCountry"
                                                                        name="county" placeholder="Billing county"/>
                                                </div>
                                            </div>                                            
                                        </div>


                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="billingCity">* Country</label> 
                                                    <input type="text" class="form-control" id="billingCounty"
                                                                        name="country" placeholder="Billing country"/>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="billingState">* Zipcode</label>
                                                    <input type="text" class="form-control" id="billingZipcode" 
                                                                        name="zipcode" placeholder="Zipcode">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Credit Card Information -->
                                        <hr/>
                                        <div class="form-group">
                                            <h4>Credit Card Information</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <img src="image/creditcard.png" class="img-responsive"/><br/>
                                                <div class="form-group">
                                                    <label for="cardType">* Select Card Type:</label> 
                                                    <select class="form-control" id="cardType" name="cardType">
                                                        <option value="visa">Visa</option>
                                                        <option value="mastercard">Mastercard</option>
                                                        <option value="discover">Discover</option>
                                                        <option value="amex">American Express</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cardHolder">* Card Holder Name:</label>
                                                     <input type="text" class="form-control" id="cardHolder" required="required"                name="cardHolder" placeHolder="Card Holder Name"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cardNumber">* Card Number:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="cardNumber"
                                                               name="cardNumber" required="required" placeHolder="Valid Card Number"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-7">
                                                <div class="form-group">
                                                    <label>* Expiration Date</label>
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <select class="form-control" name="expiryMonth"
                                                                    required="required">
                                                                <option disabled="disabled">-- Month --</option>
                                                                <option value="01">Jan (01)</option>
                                                                <option value="02">Feb (02)</option>
                                                                <option value="03">Mar (03)</option>
                                                                <option value="04">Apr (04)</option>
                                                                <option value="05">May (05)</option>
                                                                <option value="06">June (06)</option>
                                                                <option value="07">July (07)</option>
                                                                <option value="08">Aug (08)</option>
                                                                <option value="09">Sep (09)</option>
                                                                <option value="10">Oct (10)</option>
                                                                <option value="11">Nov (11)</option>
                                                                <option value="12">Dec (12)</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <select class="form-control" name="expiryYear">
                                                                <option disabled="disabled">-- Year --</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                                <option value="19">2019</option>
                                                                <option value="20">2020</option>
                                                                <option value="21">2021</option>
                                                                <option value="22">2022</option>
                                                                <option value="23">2023</option>
                                                                <option value="23">2024</option>
                                                                <option value="23">2025</option>
                                                                <option value="23">2026</option>
                                                                <option value="23">2027</option>
                                                                <option value="23">2028</option>
                                                                <option value="23">2029</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-5">
                                                <div class="form-group">
                                                    <label for="cardCVC">CV Code</label> 
                                                    <input id="cardCVC" type="text" class="form-control" 
                                                                         name="cvc" placeholder="CVC" />         
                                                </div>
                                            </div>
                                        </div>
                                        <hr/>
                                        <button type="submit" class="btn btn-primary btn-lg">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Information -->
                <div class="tab-pane fade" id="tab-4">
                    <div class="panel-group">
                        <div class="panel panel-default" style="border: none;">
                            <div class="panel-body"
                                 style="background-color: #ededed; margin-top: 20px;">

                                <div class="row">
                                    <div class="col-xs-6">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item active"><a>List of Shipping Addresses</a></li>
                                        </ol>
                                    </div>
                                    <div class="col-xs-6">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item active"><a>Add(Update)Shipping Address</a></li>
                                        </ol>
                                    </div>
                                </div>

                                <div>
                                    <form action="" method="post">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Default</th>
                                                <th>Shipping Address</th>
                                                <th>Operations</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="radio"
                                                           name="defaultShippingAddressId"/><span>default</span></td>
                                                <td></td>
                                                <td><a><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a><i
                                                                class="fa fa-times"></i></a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </form>
                                </div>

                                <div>
                                    <form action="" method="post">

                                        <input hidden="hidden" name="id"/>

                                        <!-- Shipping Address -->
                                    
                                        <div class="form-group">
                                            <h4>Shipping Address</h4>
                                    
                                        <div class="form-group">
                                            <label for="billingName">* Name</label> 
                                            <input type="text" class="form-control" id="shippingName" placeholder="Receiver Name"                         name="shippingName"  required="required"/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="billingCity">* Street Address</label> 
                                                    <input type="text" class="form-control" id="billingStreet"
                                                                        name="street" placeholder="Billing street address"/>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="billingState">* Street Number</label>
                                                    <input type="text" class="form-control" id="billingStateNr" 
                                                                        name="streetNumber" placeholder="State">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                        <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="billingState">* City</label>
                                                    <input type="text" class="form-control" id="billingCity" 
                                                                        name="city" placeholder="City">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="billingCity">* County</label> 
                                                    <input type="text" class="form-control" id="billingCountry"
                                                                        name="county" placeholder="Billing county"/>
                                                </div>
                                            </div>                                            
                                        </div>


                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="billingCity">* Country</label> 
                                                    <input type="text" class="form-control" id="billingCounty"
                                                                        name="country" placeholder="Billing country"/>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <label for="billingState">* Zipcode</label>
                                                    <input type="text" class="form-control" id="billingZipcode" 
                                                                        name="zipcode" placeholder="Zipcode">
                                                </div>
                                            </div>
                                        </div>

                                        <hr/>
                                        <button type="submit" class="btn btn-primary btn-lg">Save
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end of container -->


@include('common.footer-scripts')

</body>
</html>
