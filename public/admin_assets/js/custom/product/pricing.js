$(function () {

    $('#has-discount').on('change', function () {

        if ($(this).is(':checked')) {
            $('#discount-wrapper').show();
        } else {
            $('#discount-wrapper').hide()
        }

    });

    $('input[name="s_price"]').keyup(function () {
        $('input[name="d_value"]').val("");
        $('input[name="d_percent"]').val("");
    });

    $('input[name="d_value"]').keyup(function () {
        let sPrice = $('input[name="s_price"]').val();

        if (sPrice && this.value) {

            let percent = this.value / sPrice * 100;
            $('input[name="d_percent"]').val(percent.toFixed(2));
        } else {
            $('input[name="d_percent"]').val("");
        }

    });

    $('input[name="d_percent"]').keyup(function () {
        let sPrice = $('input[name="s_price"]').val();

        if (sPrice && this.value) {

            let percent = this.value / 100 * sPrice;
            $('input[name="d_value"]').val(percent.toFixed(2));

        } else {
            $('input[name="d_value"]').val("");
        }

    });

});//end of document ready