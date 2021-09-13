<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    {{--csrf--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>موارد</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin_assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('admin_assets/css/colors/blue.css') }}" id="theme" rel="stylesheet">

    {{--wokiee-icons--}}
    <link rel="stylesheet" href="{{ asset('admin_assets/css/icons/wokiee/css/wokiee.css') }}">

    {{--datatable--}}
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}">

    {{--jquery--}}
    <script src="{{ asset('admin_assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/jqueryui/jquery-ui.min.js') }}"></script>

    {{--magnific pop up--}}
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/Magnific-Popup-master/dist/magnific-popup.css') }}">

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/noty/noty.css')}}">
    <script src="{{ asset('admin_assets/plugins/noty/noty.min.js')}}"></script>

    {{--drop zone--}}
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/dropzone/dropzone.min.css') }}">

    {{--select2--}}
    <link href="{{ asset('admin_assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('admin_assets/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>

    {{--js tree--}}
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/jstree/jstree.min.css') }}">
    <script src="{{ asset('admin_assets/plugins/jstree/jstree.min.js') }}"></script>

    {{--google font for arabic--}}
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600&display=swap" rel="stylesheet">

    @if (app()->getLocale() == 'ar')
        <link href="{{ asset('admin_assets/css/style_rtl.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('admin_assets/css/custom_rtl.css') }}">
    @else
        <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet">
    @endif

    {{--custom css--}}
    <link rel="stylesheet" href="{{ asset('admin_assets/css/custom.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .topbar .top-navbar .navbar-header .navbar-brand {
            margin-top: 8px;
        }
    </style>
</head>

<body class="fix-header fix-sidebar card-no-border">

<div id="main-wrapper">

    @include('layouts.admin._header')

    @include('layouts.admin._aside')

    <div class="page-wrapper">

        <div class="container-fluid">

            @include('admin.partials._session')

            @yield('content')

        </div>

        @include('layouts.admin._footer')

        <div class="modal fade general-modal" id="add-brand">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>

                </div>
            </div>
        </div>

    </div><!-- end of page wrapper -->

</div><!-- end of main wrapper -->

<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('admin_assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('admin_assets/js/jquery.slimscroll.js') }}"></script>

<!--Wave Effects -->
<script src="{{ asset('admin_assets/js/waves.js') }}"></script>

<!--Menu sidebar -->
<script src="{{ asset('admin_assets/js/sidebarmenu.js') }}"></script>

<!--stickey kit -->
<script src="{{ asset('admin_assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>

<!--Custom JavaScript -->
<script src="{{ asset('admin_assets/js/custom.js') }}"></script>

<!--sparkline JavaScript -->
<script src="{{ asset('admin_assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

{{--datatable--}}
<script src="{{ asset('admin_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>

{{--magnific pop up--}}
<script src="{{ asset('admin_assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js') }}"></script>

{{--dropzone--}}
<script src="{{ asset('admin_assets/plugins/dropzone/dropzone.min.js') }}"></script>

{{--ckeditor--}}
<script src="{{ asset('admin_assets/plugins/ckeditor/ckeditor.js') }}"></script>

{{--custom--}}
<script src="{{ asset('admin_assets/js/custom/index.js')}}"></script>
<script src="{{ asset('admin_assets/js/custom/roles.js')}}"></script>
<script src="{{ asset('admin_assets/js/custom/categories.js')}}"></script>
<script src="{{ asset('admin_assets/js/custom/products.js')}}"></script>
<script src="{{ asset('admin_assets/js/custom/specs.js')}}"></script>
<script src="{{ asset('admin_assets/js/custom/product/pricing.js')}}"></script>

<script>
    $(function () {

        //delete
        $(document).on('click', '.delete, #bulk-delete', function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "@lang('site.confirm_delete')",
                type: "alert",
                killer: true,
                buttons: [
                    Noty.button("@lang('site.yes')", 'btn btn-info mr-2', function () {
                        that.closest('form').submit();

                    }),

                    Noty.button("@lang('site.no')", 'btn btn-danger mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });//end of delete

        CKEDITOR.config.language = "{{ app()->getLocale() }}";

    });//end of document ready
</script>
@stack('scripts')
</body>

</html>