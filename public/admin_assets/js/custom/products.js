$(function () {
    $(document).on('click', '.delete-product-image-btn', function () {

        let url = $(this).data('url');
        let rowId = $(this).data('id');

        $('#' + rowId).remove();

        $.ajax({
            url: url,
            method: 'post',
            data: {
                '_method': 'delete'
            },
            cache: false,

        });//end of ajax call
    })
});//end of document ready