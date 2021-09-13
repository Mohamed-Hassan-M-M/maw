$(function () {

    if ($('.category-brands').length) {
        brandIds = JSON.parse($('.category-brands').val());
    } else {
        brandIds = []
    }

    if ($('.category-specs').length) {
        specIds = JSON.parse($('.category-specs').val());
    } else {
        specIds = []
    }

    $('select[name="brand_id"]').on('change', function () {

        let id = parseInt(this.value);
        let name = $(this).find(":selected").text();

        if (this.value && !brandIds.includes(id)) {

            let html = `
            <div class="card mb-2" id="${id}">
                <div class="card-body p-2 d-flex justify-content-between">
                    <div>
                        <i class="fa fa-arrows"></i> ${name}
                    </div>
                    <button class="btn btn-danger btn-sm delete-brand" data-id="${id}"><i class="fa fa-trash"></i></button>
                </div>
            </div>
            `;

            brandIds.push(id);
            $('.brands-wrapper').append(html);

            $(this).val("").trigger('change');

            $('input[name="category_brands"]').val(JSON.stringify(brandIds));

            $('.brands-wrapper').sortable({
                tolerance: 'pointer',
                axis: "y",
                opacity: 0.50,
                cursor: "move",
                helper: "clone",

                update: function (event, ui) {

                    brandIds = $(this).sortable('toArray').map(function (id) {
                        return parseInt(id);
                    })

                    $('input[name="category_brands"]').val(JSON.stringify(brandIds))

                }
            })

        }//end of if 

    });

    $(document).on('click', '.delete-brand', function (e) {
        e.preventDefault();

        let id = $(this).data('id');
        console.log(id);
        let brandIndex = brandIds.indexOf(id);
        brandIds.splice(brandIndex, 1);
        $('input[name="category_brands"]').val(JSON.stringify(brandIds));
        $(this).closest('.card').remove();

    })

    $('select[name="spec_id"]').on('change', function () {

        let id = parseInt(this.value);
        let name = $(this).find(":selected").text();

        if (this.value && !specIds.includes(id)) {

            let html = `
            <div class="card mb-2" id="${id}">
                <div class="card-body p-2 d-flex justify-content-between">
                    <div>
                        <i class="fa fa-arrows"></i> ${name}
                    </div>
                    <button class="btn btn-danger btn-sm delete-spec" data-id="${id}"><i class="fa fa-trash"></i></button>
                </div>
            </div>
            `;

            specIds.push(id);
            $('.specs-wrapper').append(html);

            $(this).val("").trigger('change');

            $('input[name="category_specs"]').val(JSON.stringify(specIds))

            $('.specs-wrapper').sortable({
                tolerance: 'pointer',
                axis: "y",
                opacity: 0.50,
                cursor: "move",
                helper: "clone",

                update: function (event, ui) {

                    specIds = $(this).sortable('toArray').map(function (id) {
                        return parseInt(id);
                    })

                    $('input[name="category_specs"]').val(JSON.stringify(specIds))

                }
            })

        }//end of if

    });

    $(document).on('click', '.delete-spec', function (e) {
        e.preventDefault();

        let id = $(this).data('id');
        let specIndex = specIds.indexOf(id);
        specIds.splice(specIndex, 1);
        $('input[name="category_specs"]').val(JSON.stringify(specIds));
        $(this).closest('.card').remove();

    })

    $(document).on('change', 'select[name="category_id"]', function () {

        if (this.value) {

            $('#brands-loading').show();

            let url = $(this).children("option:selected").data('brandsUrl');

            $.ajax({
                url: url,
                //processData: false,
                //contentType: false,
                cache: false,
                success: function (html) {
                    $('#brands-loading').hide();
                    $('#brands-wrapper').empty().append(html);
                },
            });//end of ajax call

        } else {

            $('#brands-wrapper').empty()

        }


    })

});//end of document ready
