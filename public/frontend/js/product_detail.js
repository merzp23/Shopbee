document.getElementById('increase').addEventListener('click', function() {
    let quantityInput = document.getElementById('quantity');
    quantityInput.value = parseInt(quantityInput.value) + 1;
});

document.getElementById('decrease').addEventListener('click', function() {
    let quantityInput = document.getElementById('quantity');
    if (quantityInput.value > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
    }
});


/**========================RATING============================ */

function remove_background(product_id)
{
    for(var count = 1; count <=5; count++)
        {
            $('#' + product_id + '-' + count).css ('color', "#ccc");
        }
}

$(document).on('mouseenter', '.ratingStar', function(){
    var index = $(this).data("index");
    var product_id = $(this).data('product_id');

    remove_background(product_id);

    for(var count = 1; count <= index; count++)
        {
            $('#'+ product_id + '-' + count).css('color', '#ffcc00')
        }
});