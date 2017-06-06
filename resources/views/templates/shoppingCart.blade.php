<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1000/xhtml">

@include('common.header')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ URL::asset('js/userDefined/scripts.js') }}"></script>
<script src="{{ URL::asset('js/userDefined/shoppingCart.js') }}"></script>

<body>

	@include('common.navbar')

	<div class="container">

		@include('partials.logo')

		<div class="row" style="margin-top: 10px;">
			<div class="col-xs-12">

				<div class="row">
					<div class="col-xs-6 text-left">
						<a class="btn btn-warning" href="{{ route('bookshelf') }}">Continue shopping</a>
					</div>
					<div class="col-xs-6 text-right">
						<a class="btn btn-primary checkOut" href="">Check Out</a>
					</div>
				</div>
					<br />
					
					<div class="alert alert-warning" id="cartItemOops">Oops,
						your cart is empty. See if you can find what you like in the
						bookshelf and add them to cart.</div>

					<br /> <br />

					<!--**************** display products in cart ****************-->

					<table style="width: 100%; border: none;" id="shoppingCartItems">
						<thead >
							<th><span style="padding-left: 150px">Products</span>
							<span style="padding-left: 580px">Price</span>
							<span style="padding-left: 165px">Delete</span></th>
						</thead>
						<tbody >
							<tr class="tRow">
							<td style="width: 100%">
							
							</td>
						</tr>
					</tbody>
				</table>

					

					<div class="row">						
						<h4 class="col-xs-12 text-right">
							<strong style="font-size: large;">Total Price
							</strong> <span style="color: #db3208; font-szie: large;">$</span><span class="totalPrice" style="color: #db3208; font-szie: large;></span>
						</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end of container -->
@include('common.footer-scripts')	


</body>
</html>
