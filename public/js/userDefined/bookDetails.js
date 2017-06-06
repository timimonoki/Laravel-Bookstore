$(document).ready(function(){

    displayInStockNumber();

    $('form.addToShoppingCart').on('submit', function(e){
        e.preventDefault();
        checkQuantity();
        displayInStockNumber();
        data = $('form.addToShoppingCart').serialize();

        $.ajax({
            type: 'POST',
            url: 'http://localhost:8090/Bookstore/laravel/public/addToShoppingCart/timi',
            data: data,
            async: 'false'
        }).done(function(data){
            alert('Added to shopping cart');
            displayInStockNumber();
            $(this).closest('form').find('input[id=quantities], textarea').val('');
        })

    })

    $('#quantities').on('keyup', function(){
        checkQuantity();
    })


})

function checkQuantity(){
    var inStockNumber = $('#inStockNumber').html();
    var quantity = $('#quantities').val();

    if((inStockNumber - quantity) < 0){
        $('#stockAlert').css('display','inline');
        $('#submitButton').attr('disabled','disabled');
    }else{
        $('#stockAlert').css('display','none');
        $('#submitButton').attr('disabled', false);
    }
}

function displayInStockNumber(){
    var bookId = $('#bookId').val();
    $.ajax({
        url: 'http://localhost:8090/Bookstore/laravel/public/bookInStockNumber/'+ bookId,
        type: 'GET',
        async: 'false'
    }).done(function(data){
        $('#inStockNumber').html(data);
        $('#inStockNumberAfterSubmit').html(data);
        $('#oops').html(data);
    })
}

