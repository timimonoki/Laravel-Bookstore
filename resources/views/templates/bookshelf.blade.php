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
            <div>
                <h5 style="font-style: italic;">Oops, no result is found. Try something else or try again later.</h5>
            </div>

            <table border="0" id="bookList">
                <thead>
                <tr>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr class="book-item" >
                    <td>
                        <div ">
                            <div class="row" style="margin-bottom: 50px;">
                                <div class="col-xs-3">
                                    <a href=""><img class="img-responsive shelf-book" src="" /></a>
                                </div>
                                <div class="col-xs-9" >
                                    <a href=""><h4 text=""></h4></a><span text="">Publication Date</span>
                                    <p text="whats up">Author</p>
                                    <a href=""><span text="">Book format</span></a> 
                                        <span text=""><span> pages</span></span><br/>

                                    <a href=""><span style="font-size: x-large; color: #db3208;">$<span                text="">Our price</span></span></a>

                                    <span style="text-decoration: line-through;">$<span
                                                text=""></span>List price</span>

                                    <p utext=""></p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end of container -->


@include('common.footer-scripts')

<script>
    $(document).ready(function() {
        $('#bookList').DataTable({
            "lengthMenu":[[5,10,15,20,-1],[5,10,15,20,"All"]],
            "ordering":false,
             stateSave:true,
            "bServerSide": true,
             "sAjaxSource": "http://localhost:8090/Bookstore/laravel/public/allBooks"
            // "aoColumns": [{
            //     'mData' : 'books',
            //     // 'mRender' : function(data){
            //     //     return data.[0];
            //     // },
            //     "sTitle": "Site name"
            //}]


        });

        $("#bookList").on('page.dt', function() {
            $('html, body').animate({
                scrollTop: $('#bookList').offset().top
            }, 200);
        });
    });
</script>
</body>
</html>
