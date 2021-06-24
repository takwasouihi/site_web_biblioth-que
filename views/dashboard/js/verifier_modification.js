
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(55);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(document).ready(function() {
        var error_ref = '';

        $('#save').click(function(){
            var xs = $('#xs').val();
            var s = $('#s').val();
            var m = $('#m').val();
            var l = $('#l').val();
            var xl = $('#xl').val();
            var xxl = $('#xxl').val();
            var prix = $('#prix').val();
            if (!(xs>=0) || !(s>=0) ||!(m>=0)||!(l>=0)||!(xl>=0)||!(xxl>=0)) {
                error_qua = 'Invalid Quantity';
                $('#error_q').text(error_qua);
                return false;
            }
            else
            {    error_qua = '';
                $('#error_q').text(error_qua);}
            if (!(prix>0)) {
                error_p = 'Invalid Price';
                $('#error_price').text(error_p);
                return false;
            }
            else
            {    error_p = '';
                $('#error_price').text(error_p);}
        });
    });



    $(".myselect").select2({
        placeholder: 'Select an option'
    });

