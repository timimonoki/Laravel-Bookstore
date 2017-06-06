 $(document).ready(function() {     

        $('#bookList').DataTable({
            "lengthMenu":[[5,10,15,20,-1],[5,10,15,20,"All"]],
            "ordering":false,
            "stateSave" :true,
            "bServerSide": true,
            "sAjaxSource": "http://localhost:8090/Bookstore/laravel/public/allBooks",
            "aoColumns": [{
                'mData' : 'title',
                "sClass" : 'left',
                'mRender' : function(data, type, full){
                    return '  <div> ' +
                                '  <div class="row" style="margin-bottom: 50px;"> ' +
                                    ' <div class="col-xs-4"> ' +
                                      ' <a href="/Bookstore/laravel/public/bookDetails/' + full.id + '"><img class="img-responsive shelf-book" src="image/BookImages/' + full.title.replace(/\s+/g, '') + '.png" onerror="this.src=\'image/BookImages/unexisting2.png\'"/></a> ' +
                                    ' </div> ' +
                                   ' <div class="col-xs-7"> ' +
                                        ' <a href="/Bookstore/laravel/public/bookDetails/' + full.id + '"><h4 text="">' + full.title + '</h4></a> ' +
                                        ' <p "><u>' +full.in_stock_number + '  in stock</u></p> '+
                                        ' <p style = "margin:0">' + full.author + ' </p> ' +
                                        ' <p style = "margin:0>' + full.format + '  format </p> ' +
                                        ' <p style = "margin:0>' + full.number_of_pages + ' pages</p> ' +
                                        ' <a href="/Bookstore/laravel/public/bookDetails/' + full.id + '"><span style="font-size: x-large; color: #db3208;">$<span text=""> ' + full.our_price + ' </span></span></a> ' +
                                        ' <span style="text-decoration: line-through;">$<span text=""></span>' +full.list_price + '</span> '+
                                    ' </div> ' +
                                    ' <div class col-xs-1> ' +
                                        ' <a href="/Bookstore/laravel/public/bookDetails/' + full.id + '" class="btn btn-info" role="button">Add to shopping cart</a>'

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

