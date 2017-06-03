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

<script>
    $(document).ready(function() {     

        $('#bookList').DataTable({
            "lengthMenu":[[5,10,15,20,-1],[5,10,15,20,"All"]],
            "ordering":false,
             stateSave:true,
            "bServerSide": true,
            "sAjaxSource": "http://localhost:8090/Bookstore/laravel/public/allBooks",
            "aoColumns": [{
                'mData' : 'title',
                "sClass" : 'left',
                'mRender' : function(data, type, full){
                    return '  <div> ' +
                                '  <div class="row" style="margin-bottom: 50px;"> ' +
                                    ' <div class="col-xs-4"> ' +
                                      ' <a href="/Bookstore/laravel/public/bookDetails/' +full.id+ '"><img class="img-responsive shelf-book" src="image/BookImages/' + full.title.replace(/\s+/g, '') + '.png" onerror="this.src=\'image/BookImages/unexisting2.png\'"/></a> ' +
                                    ' </div> ' +
                                   ' <div class="col-xs-7"> ' +
                                        ' <a href="/Bookstore/laravel/public/bookDetails"><h4 text="">' + full.title + '</h4></a> ' +
                                        ' <p "><u>' +full.in_stock_number + '  in stock</u></p> '+
                                        ' <p style = "margin:0">' + full.author + ' </p> ' +
                                        ' <p style = "margin:0>' + full.format + '  format </p> ' +
                                        ' <p style = "margin:0>' + full.number_of_pages + ' pages</p> ' +
                                        ' <a href="/Bookstore/laravel/public/bookDetails"><span style="font-size: x-large; color: #db3208;">$<span text=""> ' + full.our_price + ' </span></span></a> ' +
                                        ' <span style="text-decoration: line-through;">$<span text=""></span>' +full.list_price + '</span> '+
                                    ' </div> ' +
                                    ' <div class col-xs-1> ' +
                                        ' <a href="" class="btn btn-info" role="button">Add to shopping cart</a>'

                                    ' </div>' +
                                ' </div>' +


                            ' </div> ' ;
                },
               "sTitle": "Site name"
           }]


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
