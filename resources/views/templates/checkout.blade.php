
<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1000/xhtml">

@include('common.header')

<body>
	@include('common.navbar')

	<div class="container">

		@include('partials.logo')

		<div class="row" style="margin-top: 10px;">
			<form th:action="@{/checkout}" method="post">

				<!-- Left Panel -->
				<div class="col-xs-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<button type="submit" class="btn btn-warning btn-block">Place your order</button>
							<p style="font-size: smaller;">
								By placing your order, you agree to Timea`s Bookstore <a href="">privacy</a>
								notice and <a href="">conditions</a> of use.
							</p>
							<hr />
							<h3>Order Summary</h3>
							<div class="row">
								<div class="col-xs-7 text-left">Total before tax:</div>
								<div class="col-xs-5 text-right">
									$<span th:text="${shoppingCart.grandTotal}"></span>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-7 text-left">Estimated tax:</div>
								<div class="col-xs-5 text-right">
									$<span th:with="tax=${shoppingCart.grandTotal*0.06}"
											th:text="${#numbers.formatDecimal(tax, 0 ,2)}"></span>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-7 text-left">
									<h3 style="color: darkred;"><strong>Order Total: </strong>
									</h3>
								</div>
								<div class="col-xs-5 text-right">
									<h3>
										<strong style="color: darkred;">$<span
											th:with="total=${shoppingCart.grandTotal+shoppingCart.grandTotal*0.06}"
											th:text="${#numbers.formatDecimal(total, 0 ,2)}"></span></strong>
									</h3>
								</div>
							</div>
							<div class="panel-footer">Shipping and handling haven't	applied.</div>
						</div>
					</div>
				</div>

				<!-- Checkout Info -->
				<div class="col-xs-8">
					<div th:if="${missingRequiredField}">
						<h5 class="alert alert-warning">There are some fields missing. Field with * is required.</h5>
					</div>

					<div class="panel-group" id="accordion">

						<!-- 1. Shipping Address -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#shippingInfo"> 1. Shipping Address </a>
								</h4>
							</div>
							<div id="shippingInfo" class="panel-collapse collapse"
								th:classappend="${classActiveShipping}? 'in'">
								<div class="panel-body">
									<table class="table" th:if="${not emptyShippingList}">
										<thead>
											<tr>
												<th>Available Shipping Address</th>
												<th>Operations</th>
											</tr>
										</thead>
										<tbody>
											<tr th:each="userShipping : ${userShippingList}">
												<td
													th:text="${userShipping.userShippingStreet1}+' '+${userShipping.userShippingStreet2}+', '+${userShipping.userShippingCity}
												+', '+${userShipping.userShippingState}"></td>
												<td><a th:href="@{/setShippingAddress(userShippingId=${userShipping.id})}">use
														this address</a></td>
											</tr>
										</tbody>
									</table>

									<div class="form-group">
										<label for="shippingName">* Name</label> <input type="text"
											class="form-control" id="shippingName"
											placeholder="Receiver Name" name="shippingAddressName"
											th:value="${shippingAddress.shippingAddressName}" />
									</div>

									<div class="form-group">
										<label for="shippingStreet">* Street Address</label> <input
											type="text" class="form-control" id="shippingStreet"
											placeholder="Street Address 1" name="shippingAddressStreet1"
											th:value="${shippingAddress.shippingAddressStreet1}" />
									</div>
									<div class="form-group">
										<input type="text" class="form-control"
											placeholder="Street Address 2" name="shippingAddressStreet2"
											th:value="${shippingAddress.shippingAddressStreet2}" />
									</div>

									<div class="row">
										<div class="col-xs-4">
											<div class="form-group">
												<label for="shippingCity">* City</label> <input type="text"
													class="form-control" id="shippingCity"
													placeholder="Shipping City" th:name="shippingAddressCity"
													required="required"
													th:value="${shippingAddress.shippingAddressCity}" />
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label for="shippingState">* State</label> <select
													id="shippingState" class="form-control"
													th:name="shippingAddressState"
													th:value="${shippingAddress.shippingAddressState}"
													required="required">
													<option value="" disabled="disabled">Please select
														an option</option>
													<option th:each="state : ${stateList}" th:text="${state}"
														th:selected="(${shippingAddress.shippingAddressState}==${state})"></option>
												</select>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label for="shippingZipcode">* Zipcode</label> <input
													type="text" class="form-control" id="shippingZipcode"
													placeholder="Shipping Zipcode"
													th:name="shippingAddressZipcode" required="required"
													th:value="${shippingAddress.shippingAddressZipcode}" />
											</div>
										</div>
									</div>
									<a data-toggle="collapse" data-parent="#accordion"
										class="btn btn-warning pull-right" href="#paymentInfo">Next</a>
								</div>
							</div>
						</div>

						<!-- Payment Information -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion"
										href="#paymentInfo"> 2. Payment Information </a>
								</h4>
							</div>

							<div id="paymentInfo" class="panel-collapse collapse"
								th:classappend="${classActivePayment}? 'in'">
								<div class="panel-body">
									<table class="table" th:if="${not emptyPaymentList}">
										<thead>
											<tr>
												<th>Available Credit Card</th>
												<th>Operations</th>
											</tr>
										</thead>
										<tbody>
											<tr th:each="userPayment : ${userPaymentList}">
												<td th:text="${userPayment.cardName}"></td>
												<td><a
													th:href="@{/setPaymentMethod(userPaymentId=${userPayment.id})}">use
														this payment</a></td>
											</tr>
										</tbody>
									</table>

									<!-- Credit Card Information -->
									<div class="row">
										<div class="col-xs-12">
											<img th:src="@{/image/creditcard.png}" class="img-responsive" /><br />
											<div class="form-group">
												<label for="cardType">* Select Card Type: </label> <select
													class="form-control" id="cardType" name="type"
													th:value="${payment.type}">
													<option value="visa">Visa</option>
													<option value="mastercard">Mastercard</option>
													<option value="discover">Discover</option>
													<option value="amex">American Express</option>
												</select>
											</div>

											<div class="form-group">
												<label for="cardHolder">* Card Holder Name:</label> <input
													type="text" class="form-control" id="cardHolder"
													required="required" placeHolder="Card Holder Name"
													th:name="holderName" th:value="${payment.holderName}" />
											</div>
											<div class="form-group">
												<label for="cardNumber">* Card Number:</label>
												<div class="input-group">
													<input type="tel" class="form-control" id="cardNumber"
														required="required" placeHolder="Valid Card Number"
														th:name="cardNumber" th:value="${payment.cardNumber}" />
													<span class="input-group-addon"><i
														class="fa fa-credit-card" aria-hidden="true"></i></span>
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
															required="required" th:value="${payment.expiryMonth}">
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
														<select class="form-control" name="expiryYear"
															th:value="${payment.expiryYear}">
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
													type="tel" class="form-control" name="cvc"
													placeholder="CVC" th:name="cvc"
													th:value="${payment.cvc}" />
											</div>
										</div>
									</div>


									<!-- Billing Address -->
									<div class="checkbox">
										<label> <input id="theSameAsShippingAddress"
											type="checkbox" name="billingSameAsShipping" value="true" />
											The same as shipping address
										</label>
									</div>

									<div class="form-group">
										<label for="billingName">* Name</label> <input type="text"
											class="form-control billingAddress" id="billingName"
											placeholder="Receiver Name" th:name="billingAddressName"
											required="required"
											th:value="${billingAddress.billingAddressName}" />
									</div>
									<div class="form-group">
										<label for="billingAddress">* Street Address</label> <input
											type="text" class="form-control billingAddress" id="billingAddress"
											placeholder="Street Address 1"
											th:name="billingAddressStreet1" required="required"
											th:value="${billingAddress.billingAddressStreet1}" /> <input
											type="text" class="form-control billingAddress" id="billingAddress"
											placeholder="Street Address 2"
											th:name="billingAddressStreet2"
											th:value="${billingAddress.billingAddressStreet2}" />
									</div>

									<div class="row">
										<div class="col-xs-4">
											<div class="form-group">
												<label for="billingCity">* City</label> <input type="text"
													class="form-control billingAddress" id="billingCity"
													placeholder="Billing city" th:name="billingAddressCity"
													required="required"
													th:value="${billingAddress.billingAddressCity}" />
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label for="billingState">* State</label> <select
													id="billingState" class="form-control billingAddress"
													th:name="billingAddressState"
													th:value="${billingAddress.billingAddressState}"
													required="required">
													<option value="" disabled="disabled">Please select
														an option</option>
													<option th:each="state : ${stateList}" th:text="${state}"
														th:selected="(${billingAddress.billingAddressState}==${state})"></option>
												</select>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="form-group">
												<label for="billingZipcode">* Zipcode</label> <input
													type="text" class="form-control billingAddress" id="billingZipcode"
													placeholder="Billing Zipcode"
													th:name="billingAddressZipcode" required="required"
													th:value="${billingAddress.billingAddressZipcode}" />
											</div>
										</div>
									</div>

									<a data-toggle="collapse" data-parent="#accordion"
										class="btn btn-warning pull-right" href="#reviewItems">Next</a>
								</div>
							</div>
						</div>

						<!-- 3. Review Items and Shipping -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion"
										href="#reviewItems"> 3. Review Items and Shipping </a>
								</h4>
							</div>
							<div id="reviewItems" class="panel-collapse collapse">
								<div class="panel-body">
									<h4>Choose your shipping method:</h4>
									<div class="radio">
										<label> <input type="radio" name="shippingMethod"
											value="groundShipping" checked="checked" /> Ground Shipping
										</label>
									</div>
									<div class="radio">
										<label> <input type="radio" name="shippingMethod"
											value="premiumShipping" /> Premium Shipping
										</label>
									</div>

									<div class="row">
										<div class="col-xs-8">
											<h4>Products</h4>
										</div>
										<div class="col-xs-2">
											<h4>Price</h4>
										</div>
										<div class="col-xs-2">
											<h4>Qty</h4>
										</div>
									</div>

									<!-- display products in cart -->
									<div class="row" th:each="cartItem : ${cartItemList}">
											<hr />
											<div class="col-xs-2">
												<a th:href="@{/bookDetail(id=${cartItem.book.id})}"> <img
													class="img-responsive shelf-book"
													th:src="#{adminPath}+@{/image/book/}+${cartItem.book.id}+'.png'"
													style="width: 70px;" />
												</a>
											</div>
											<div class="col-xs-6">
												<div style="margin-left: 50px;">
													<a th:href="@{/bookDetail?id=}+${cartItem.book.id}"><h4
															th:text="${cartItem.book.title}"></h4></a>
													<p th:if="${cartItem.book.inStockNumber&gt;10}"
														style="color: green;">In Stock</p>
													<p
														th:if="${cartItem.book.inStockNumber&lt;10 and cartItem.book.inStockNumber&gt;0}"
														style="color: green;">
														Only <span th:text="${cartItem.book.inStockNumber}"></span>
														In Stock
													</p>
													<p th:if="${cartItem.book.inStockNumber==0}"
														style="color: darkred;">Product Unavailable</p>
													<a th:href="@{/shoppingCart/removeItem?id=}+${cartItem.id}">delete</a>
												</div>
											</div>

											<div class="col-xs-2">
												<h5 style="color: #db3208; font-size: large;">
													$<span th:text="${cartItem.book.ourPrice}"
														th:style="${cartItem.book.inStockNumber}==0? 'text-decoration: line-through' : ''"></span>
												</h5>
											</div>

											<div class="col-xs-2">
												<h5 style="font-size: large;" th:text="${cartItem.qty}"></h5>
											</div>
										
									</div>

									<hr />
									<h4 class="col-xs-12 text-right">
										<strong style="font-size: large;">Order Total (<span
											th:text="${#lists.size(cartItemList)}"></span> items):
										</strong> <span style="color: #db3208; font-szie: large;">$<span
											th:text="${shoppingCart.grandTotal}"></span></span>
									</h4>
									<br />
									<br />
									<button type="submit" class="btn btn-warning btn-block">Place your order</button>
									<p style="font-size: smaller;">
										By placing your order, you agree to Timea`s Bookstore <a href="">privacy</a>
										notice and <a href="">conditions</a> of use.
									</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- end of container -->

@include('common.footer-scripts')
</body>
</html>
