$(function () {

    $('input[name="filterable"]').on('change', function () {

        if ($(this).is(':checked')) {
            $('input[name="editable"]').prop('checked', false);
        }

    });

    $('input[name="editable"]').on('change', function () {

        if ($(this).is(':checked')) {
            $('input[name="filterable"]').prop('checked', false);
        }

    });

});//end of document ready
