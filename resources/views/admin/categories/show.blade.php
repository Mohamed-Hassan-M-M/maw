@extends('layouts.admin.app')

@section('content')

    <h2 class="mb-2 pt-2">@lang('categories.categories')</h2>

    <ul class="breadcrumb my-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">@lang('categories.categories')</a></li>
        <li class="breadcrumb-item">@lang('site.show')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">

                    <table class="table table-hover">
                        <tr>
                            <th style="width: 15%;">@lang('categories.title')</th>
                            <td>{{ $category->title }}</td>
                        </tr>

                        <tr>
                            <th style="width: 15%;">@lang('categories.body')</th>
                            <td>{!! $category->body !!}</td>
                        </tr>

                        <tr>
                            <th style="width: 15%;">@lang('categories.image')</th>
                            <td><img src="{{ $category->image_path }}" style="width: 200px;" alt=""></td>
                        </tr>

                    </table>

                </div><!-- end of card body -->

            </div><!-- end of card -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection