<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1000/xhtml">

@include('common.header')

<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ URL::asset('js/userDefined/scripts.js') }}"></script>
<script src="{{ URL::asset('js/userDefined/bookDetails.js') }}"></script>

@include('common.navbar')

<div class="container">

    @include('partials.logo')

    
    <form action="" method="" class="addToShoppingCart">
    	<input hidden="hidden" th:field="" />
    	<div class="row" style="margin-top: 120px;">
    		<div class="col-xs-3">
    			<a href=" {{ route('bookshelf') }}">Back to book list</a><br/>
    			<img class="img-responsive shelf-book" src="" />
    		</div>
    		
    		<div class="col-xs-9">

             <!-- An if check should be performed here -->
             
                <div class="alert alert-warning alert-dismissable" id="stockAlert" style="display: none">
    			     <h4>Oops, only <span  id="oops">{{ $books['in_stock_number'] }}</span> books in stock. Please choose a smaller quantity</h4>
                </div>
    			<h3>{{ $books['title'] }}</h3>
    			<div class="row">
    				<div class="col-xs-5">
                        <input type="hidden" name="bookId" id="bookId" value="{{ $books['id'] }}">
                        <input type="hidden" name="price" value="{{ $books['our_price'] }}">
                        <span style="display: none" id="inStockNumber">{{ $books['in_stock_number'] }}</span>
    					<h5><strong>Author: </strong><span>{{ $books['author'] }}</span></h5>
    					<p><strong>Publisher: </strong><span>{{ $books['publisher'] }}</span></p>
    					<p><strong>Publication Date: </strong><span>{{ $books['publication_date'] }}</span></p>
    					<p><strong>Language: </strong><span>{{ $books['language'] }}</span></p>
    					<p><strong>Category: </strong><span>{{ $books['category'] }}</span></p>
    					<p><strong><span>{{ $books['format'] }}</span>: </strong><span>{{ $books['number_of_pages'] }}</span> pages</p>
    					<p><strong>Shipping Weight: </strong><span>{{ $books['shipping_weight'] }}</span> ounces</p>
    				</div>
    				
    				<div class="col-xs-7">
    					<div class="panel panel-default" style="border-width: 5px; margin-top: 20px;">
    						<div class="panel-body">
    							<div class="row">
    								<div class="col-xs-6">
    									<h4>Our Price: <span style="color:#db3208;">$<span>{{ $books['our_price'] }}</span></span></h4>
    									<p>List Price: <span style="text-decoration: line-through">$<span>{{ $books['list_price'] }}</span></span></p>
    									<p>You save: $<span> {{ (int)$books['list_price'] - (int)$books['our_price'] }} </span></p>
                                        <label for="quantities">Quantity:</label>
                                        <input type="numbers" name="quantity" id="quantities" style="width:25%" />
    								</div>
    								<div class="col-xs-6">
                                        @if( $books['in_stock_number'] > 0)
                                            <h4 style="color: green">Only <span id="inStockNumberAfterSubmit">{{ $books['in_stock_number'] }}</span> In Stock</h4>
                                        @endif
                                        @if($books['in_stock_number'] <= 0)
                                            <h4 style="color:darkred;">Unavailable</h4>
                                        @endif    									
    									
    									
    									<button type="submit" class="btn btn-warning" id="submitButton" style="color:black;border:1px solid black; padding: 10px 40px 10px 40px;">Add to Cart</button>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    			
    			<hr/>
    			<p><span>{{ $books['description'] }}</span></p>
    		</div>
    	</div>
    </form>
</div>

<!-- end of container -->
    @include('common.footer-scripts')

</body>
</html>
