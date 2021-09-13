@extends('layouts.admin.app')

@section('content')


    <h2 class="mb-2 pt-2">@lang('roles.roles')</h2>

    <ul class="breadcrumb my-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('roles.roles')</li>
    </ul>

    <div class="row mt-2">

        {{--roles--}}
        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">@lang('roles.roles')</h4>

                    <div class="d-flex justify-content-between">
                        <h4 class="font-medium m-b-0"> {{ $rolesCount }}</h4>
                        <span class="fa fa-lock text-info" style="font-size: 30px;"></span>
                    </div>
                </div>
            </div>

        </div><!-- end of col -->

        {{--categories--}}
        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">@lang('categories.categories')</h4>

                    <div class="d-flex justify-content-between">
                        <h4 class="font-medium m-b-0"> {{ $categoriesCount }}</h4>
                        <span class="fa fa-camera text-info" style="font-size: 30px;"></span>
                    </div>
                </div>
            </div>

        </div><!-- end of col -->

        {{--articles--}}
        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">@lang('articles.articles')</h4>

                    <div class="d-flex justify-content-between">
                        <h4 class="font-medium m-b-0">{{ $articlesCount }}</h4>
                        <span class="fa fa-file text-info" style="font-size: 30px;"></span>
                    </div>
                </div>
            </div>

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection