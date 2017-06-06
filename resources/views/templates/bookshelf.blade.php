<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.w3.org/1000/xhtml">

@include('common.header')

<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ URL::asset('js/userDefined/scripts.js') }}"></script>
<script src="{{ URL::asset('js/userDefined/books.js') }}"></script>

@include('common.navbar')

<div class="container">

    @include('partials.logo')

    <div class="row" style="margin-top: 60px;">
        <div class="col-xs-3">
            <h3><label for="category">Category</label></h3>
            <div class="list-group" id="category">
                <a href="" class="list-group-item" active>All</a>
                <a href="" class="list-group-item">Management</a>
                <a href="" class="list-group-item">Fiction</a>
                <a href="" class="list-group-item">Engineering</a>
                <a href="" class="list-group-item">Programming</a>
                <a href=""class="list-group-item">Arts &amp; Literature</a>
            </div>
        </div>

        <div class="col-xs-9">

            <table border="0" id="bookList">
                <thead>
                <tr>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr class="book-item" >
                    <td> </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end of container -->


@include('common.footer-scripts')


</body>
</html>
