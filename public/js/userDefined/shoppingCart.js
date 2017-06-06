var clickCount = 0;

$(document).ready(function(){

    $('#shoppingCartItems').DataTable({
    	"lengthMenu":[[5,10,15,20,-1],[5,10,15,20,"All"]],
        "ordering":false,
        "stateSave" :true,
        "bServerSide": true,
        "sAjaxSource": "http://localhost:8090/Bookstore/laravel/public/allShoppingCartItems/timi",
        "aoColumns": [{
        	"mDataProp": "id",
            "sClass" : 'left',
            "mRender" : function(data, type, full){
                return ' <div> ' +
                            ' <form action="" method="POST" class="deleteCartItem"> ' +
                                ' <div class="row"> ' + 
                                    ' <div class="col-xs-2"> ' +

                                        ' <a href="/Bookstore/laravel/public/bookDetails/ ' + full.get_books.id + '"> <img style="width:70px;" class="img-responsive shelf-book center-block" ' +
                                            ' src="" onerror="this.src=\'image/BookImages/unexisting2.png\'"/> ' + 
                                        ' </a> ' +
                                    ' </div> ' +
                                    ' <div class="col-xs-6"> ' +
                                        ' <div style="margin-left:50px;"> ' +
                                        ' <a href="/Bookstore/laravel/public/bookDetails/' + full.get_books.id + '"><h4> ' + full.get_books.title + '</h4></a> ' +
                                        ' <p style = "margin:0">' + full.get_books.author + '</p> ' + 
                                        ' <p style = "margin:0">' + full.get_books.format + '   format</p> ' +
                                        ' <p style = "margin:0">' + full.get_books.number_of_pages +'   pages</p> ' +                                       
                                        ' </div> ' +
                                    ' </div> ' +
                                    ' <div class="col-xs-2"> ' +
                                        ' <h5 style="color: #db3208; font-size: large;"> ' +
                                            ' $<span style="font-size: x-large; color: #db3208" class="subtotal">' + full.subtotal +'</span> ' +
                                        ' </h5> ' +
                                        ' <p style = "margin:0; color: blue"><u>Quantity:  <span id="quantity">' + full.quantity + '</span></u> ' +
                                        ' <button class="iconButton"><span class="glyphicon glyphicon-triangle-top" style="color:black"></span></button> ' +
                                        ' <span class="glyphicon glyphicon-triangle-bottom" style="color:black"></span></p> ' +
                                    ' </div> ' +
                                    ' <div class="col-xs-2"> ' +
                                        ' <input type="hidden" name="cartItemId" value="' + full.id + '"> ' +
                                        ' <button class="btn btn-warning deleteButton" type="submit">Delete</button> ' +
                                    ' </div> ' +
                                ' </div> ' +
                                 ' <hr/>' +
                                ' </form> '
                            ' </div> '
            }
        }]

    })

    verifyShoppingCartItems();
    addBookQuantity();
    deleteCartItem();
    setTimeout(totalPrice(),2000);
    checkOut();
})

function verifyShoppingCartItems(){
    var rowCount = $('#shoppingCartItems >tbody >tr').length;
    if(rowCount == 0){
        $('#cartItemOops').css('display','block');
    }else{
        $('#cartItemOops').css('display','none');
    }
}

function addBookQuantity(){    
    $('button.iconButton').on('click', function(){
        clickCount++;
        var existingQuantity = $('#quantity').html();
        $('#quantity').html(existingQuantity + clickCount);
        
    })
}

function substractBookQuantity(){

}

function deleteCartItem(){
    $('form.deleteCartItem').on('submit', function(e){
        e.preventDefault();
        data = $('form.deleteCartItem').serialize();;
        $.ajax({
            url: "http://localhost:8090/Bookstore/laravel/public/deleteShoppingCartItem/timi",
            type: 'POST',
            data: data
        }).done(function(){
            alert("SUCCESS!!");
        })
    })
}

function totalPrice(){
    var totalPrice = 0;
    $('tr.tRow').each(function(){
        totalPrice =$('span.subtotal').html();
    })
    $('span.totalPrice').html(totalPrice);
}

function checkOut(){
    $('a.checkOut').on('click', function(){
        $.ajax({
            url: 'http://localhost:8090/Bookstore/laravel/public/checkout/timi',
            type: "POST"
        }).done(function(){
            alert('Succesfully checked out!!');
        })

    })
}