<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1000/xhtml">

@include('common.header')

<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/userDefined/books.js"></script>
<script src="js/scripts.js"></script>

@include('common.navbar')

<div class="container">

    @include('partials.logo')

    
    <form th:action="@{/shoppingCart/addItem}" method="post">
    	<input hidden="hidden" th:field="*{book.id}" />
    	<div class="row" style="margin-top: 120px;">
    		<div class="col-xs-3">
    			<a th:href="@{/bookshelf}">Back to book list</a><br/>
    			<img class="img-responsive shelf-book" th:src="#{adminPath}+@{/image/book/}+${book.id}+'.png'" />
    		</div>
    		
    		<div class="col-xs-9">
    			<h3><span th:if="${addBookSuccess}" style="color: forestgreen"><i class="fa fa-check" aria-hidden="true" style="color: forestgreen"></i>Added to cart.</span></h3>
    			<h3><span th:if="${notEnoughStock}" style="color: red">Oops, only <span th:text="${book.inStockNumber}"></span> In Stock.</span></h3>
    			<h3 th:text="${book.title}">Book Title</h3>
    			<div class="row">
    				<div class="col-xs-5">
    					<h5><strong>Author: </strong><span th:text="${book.author}"></span></h5>
    					<p><strong>Publisher: </strong><span th:text="${book.publisher}"></span></p>
    					<p><strong>Publication Date: </strong><span th:text="${book.publicationDate}"></span></p>
    					<p><strong>Language: </strong><span th:text="${book.language}"></span></p>
    					<p><strong>Category: </strong><span th:text="${book.category}"></span></p>
    					<p><strong><span th:text="${book.format}"></span>: </strong><span th:text="${book.numberOfPages}"></span> pages</p>
    					<p><strong>ISBN: </strong><span th:text="${book.isbn}"></span></p>
    					<p><strong>Shipping Weight: </strong><span th:text="${book.shippingWeight}"></span> ounces</p>
    				</div>
    				
    				<div class="col-xs-7">
    					<div class="panel panel-default" style="border-width: 5px; margin-top: 20px;">
    						<div class="panel-body">
    							<div class="row">
    								<div class="col-xs-6">
    									<h4>Our Price: <span style="color:#db3208;">$<span th:text="${book.ourPrice}"></span></span></h4>
    									<p>List Price: <span style="text-decoration: line-through">$<span th:text="${book.listPrice}"></span></span></p>
    									<p>You save: $<span th:text="${#numbers.formatDecimal((book.listPrice - book.ourPrice), 0, 'COMMA', 2, 'POINT' )}"></span></p>
    									<span>Qty: </span>
    									<select name="qty">
    										<option th:each="qty : ${qtyList}" th:value="${qty}" th:text="${qty}">
    										</option>
    									</select>
    								</div>
    								<div class="col-xs-6">
    									<h4 th:if="*{book.inStockNumber&gt;10}" style="color: green">In Stock</h4>
    									<h4 th:if="*{book.inStockNumber&lt;10 and book.inStockNumber&gt;0}" style="color: green">Only <span th:text="${book.inStockNumber}"> </span> In Stock</h4>
    									<h4 th:if="*{book.inStockNumber==0}" style="color:darkred;">Unavailable</h4>
    									<button type="submit" class="btn btn-warning" style="color:black;border:1px solid black; padding: 10px 40px 10px 40px;">Add to Cart</button>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    			
    			<hr/>
    			<p th:utext="${book.description}"></p>
    		</div>
    	</div>
    </form>
</div>

<!-- end of container -->
    @include('common.footer-scripts')

</body>
</html>
