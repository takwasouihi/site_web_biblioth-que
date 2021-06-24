
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(document).ready(function() {
        var error_ref = '';

        $('#save').click(function(){

            var stock = $('#stock').val();
            var prix = $('#prix').val();
            if (!(stock>0) ) {
                error_stock = 'quantite invalide';
                $('#error_stock').text(error_stock);
                return false;
            }
            else
            {    error_stock = '';
                $('#error_stock').text(error_stock);}
            if (!(prix>0)) {
                error_price = 'prix invalide';
                $('#error_price').text(error_price);
                return false;
            }
            else
            {    error_price = '';
                $('#error_price').text(error_price);}
        });
    });




    $(".myselect").select2({
        placeholder: 'choisir une categorie'
    });


