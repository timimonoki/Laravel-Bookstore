<!DOCTYPE html>
<html lang="en"

@include('common.header')

<body>

@include('common.navbar')

<div class="container">

    @include('partials.logo')

    <div class="row" style="margin-top: 60px;">
        <div class="col-xs-9 col-xs-offset-3">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-1" data-toggle="tab"><span style="color: red;">Edit</span></a></li>
                <li><a href="#tab-2" data-toggle="tab"><span style="color: red;">Orders</span></a></li>
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

                                <!-- Send a form with details about profile to be updated -->

                                <form action= "{{ route('editMyProfile') }}" method="post">
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
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="text-center">
                                                <h2>
                                                    Order Detail for Purchase #<span th:text="${order.id}"></span>
                                                </h2>
                                            </div>
                                            <hr/>

                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <div class="panel panel-default height">
                                                        <div class="panel-heading">
                                                            <strong>Billing Details</strong>
                                                        </div>
                                                        <div class="panel-body">

                                                            <!-- To be completed with billing details -->

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div class="panel panel-default height">
                                                        <div class="panel-heading">
                                                            <strong>Payment Information</strong>
                                                        </div>
                                                        <div class="panel-body">
                                                            <span>Card Name</span><br/> <span>Card
																	Number</span><br/>
                                                            <span>Exp Date:</span><span></span>/<span
                                                                    th:text="${order.payment.expiryYear}"></span><br/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div class="panel panel-default height">
                                                        <div class="panel-heading">
                                                            <strong>Shipping Details</strong>
                                                        </div>
                                                        <div class="panel-body">

                                                            <!-- To be completed with shipping details -->

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
                                                        <tr>
                                                            <td><strong>Item Name</strong></td>
                                                            <td class="text-center"><strong>Item
                                                                    Price</strong></td>
                                                            <td class="text-center"><strong>Item
                                                                    Quantity</strong></td>
                                                            <td class="text-right"><strong>Total</strong></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td class="text-center"></td>
                                                            <td class="text-center"></td>
                                                            <td class="text-center"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="highrow"></td>
                                                            <td class="highrow"></td>
                                                            <td class="highrow text-center"><strong>Subtotal</strong>
                                                            </td>
                                                            <td class="highrow text-right"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="emptyrow"></td>
                                                            <td class="emptyrow"></td>
                                                            <td class="emptyrow text-center"><strong>Tax</strong></td>
                                                            <td class="emptyrow text-right"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="emptyrow"><i class="fa fa-barcode iconbig"></i>
                                                            </td>
                                                            <td class="emptyrow"></td>
                                                            <td class="emptyrow text-center"><strong>Total</strong></td>
                                                            <td class="emptyrow text-right"></td>
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

                <!-- Billing Information -->
                <div class="tab-pane fade" id="tab-3">

                    <div class="panel-group">
                        <div class="panel panel-default" style="border: none;">
                            <div class="panel-body" style="background-color: #ededed; margin-top: 20px;">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">List of Credit Cards</a></li>
                                        </ol>
                                    </div>
                                    <div class="col-xs-6">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item active"><a href="#">Add(Update)Credit Card</a>
                                            </li>
                                        </ol>
                                    </div>
                                </div>

                                <div>
                                    <form action="" method="post">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Default</th>
                                                <th>Credit Card</th>
                                                <th>Operations</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="radio" name="defaultUserPaymentId"/></td>
                                                <td></td>
                                                <td><a><i></i>some action</a>&nbsp;
                                                    <a><i></i>some action</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </form>
                                </div>


                                <!-- Send data about credit card update  -->
                                <div>
                                    <form action="" method="post">

                                        <input hidden="hidden" name="id"/>

                                        <div class="form-group">
                                            <h5>* Give a name for your card:</h5>
                                            <input type="text" class="form-control" id="cardName"
                                                   placeholder="Card Name" th:name="cardName"
                                                   required="required" th:value="${userPayment.cardName}"/>
                                        </div>

                                        <!-- Billing Address -->
                                        <hr/>
                                        <div class="form-group">
                                            <h4>Billing Address</h4>
                                        </div>
                                        <div class="form-group">
                                            <label for="billingName">* Name</label> <input type="text"
                                                                                           class="form-control"
                                                                                           id="billingName"
                                                                                           placeholder="Receiver Name"
                                                                                           required="required"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="billingAddress">* Street Address</label>
                                            <input
                                                    type="text" class="form-control" id="billingAddress"
                                                    placeholder="Street Address" required="required"/>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="form-group">
                                                    <label for="billingCity">* City</label> <input type="text"
                                                                                                   class="form-control"
                                                                                                   id="billingCity"
                                                                                                   placeholder="Billing city"/>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-group">
                                                    <label for="billingState">* State</label> <select
                                                            id="billingState" class="form-control" required="required">
                                                        <option value="" disabled="disabled">Please
                                                            select an option
                                                        </option>
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-group">
                                                    <label for="billingZipcode">* Zipcode</label> <input
                                                            type="text" class="form-control" id="billingZipcode"
                                                            placeholder="Billing Zipcode" required="required"/>
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
                                                    <label for="cardType">* Select Card Type:</label> <select
                                                            class="form-control" id="cardType" th:name="type"
                                                            th:value="${userPayment.type}">
                                                        <option value="visa">Visa</option>
                                                        <option value="mastercard">Mastercard</option>
                                                        <option value="discover">Discover</option>
                                                        <option value="amex">American Express</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cardHolder">* Card Holder Name:</label> <input
                                                            type="text" class="form-control" id="cardHolder"
                                                            required="required" placeHolder="Card Holder Name"/>

                                                </div>
                                                <div class="form-group">
                                                    <label for="cardNumber">* Card Number:</label>
                                                    <div class="input-group">
                                                        <input type="tel" class="form-control" id="cardNumber"
                                                               required="required" placeHolder="Valid Card Number"/>
                                                        <span
                                                                class="input-group-addon"><i
                                                                    class="fa fa-credit-card"
                                                                    aria-hidden="true"></i></span>
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
                                                    <label for="cardCVC">CV Code</label> <input id="cardCVC"
                                                                                                type="tel"
                                                                                                class="form-control"
                                                                                                name="cvc"
                                                                                                placeholder="CVC"
                                                                                                th:name="cvc"/>
                                                </div>
                                            </div>
                                        </div>
                                        <hr/>
                                        <button type="submit" class="btn btn-primary btn-lg">Save
                                            All
                                        </button>
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
                                        <hr/>
                                        <div class="form-group">
                                            <h4>Shipping Address</h4>
                                        </div>
                                        <div class="form-group">
                                            <label for="shippingName">* Name</label> <input type="text"
                                                                                            class="form-control"
                                                                                            id="shippingName"
                                                                                            placeholder="Receiver Name"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="shippingAddress">* Street Address</label> <input
                                                    type="text" class="form-control" id="shippingAddress"
                                                    placeholder="Street Address 1" required="required"/> <input
                                                    type="text" class="form-control"
                                                    placeholder="Street Address 2" th:name="userShppingStreet2"/>

                                        </div>

                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="form-group">
                                                    <label for="shippingCity">* City</label> <input
                                                            type="text" class="form-control" id="shippingCity"
                                                            placeholder="Shipping City" required="required"/>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-group">
                                                    <label for="shippingState">* State</label> <select
                                                            id="shippingState" class="form-control" required="required">
                                                        <option value="" disabled="disabled">Please
                                                            select an option
                                                        </option>
                                                        <option></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-group">
                                                    <label for="shippingZipcode">* Zipcode</label> <input
                                                            type="text" class="form-control" id="shippingZipcode"
                                                            placeholder="Shipping Zipcode" required="required"/>
                                                </div>
                                            </div>
                                        </div>

                                        <hr/>
                                        <button type="submit" class="btn btn-primary btn-lg">Save
                                            All
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
