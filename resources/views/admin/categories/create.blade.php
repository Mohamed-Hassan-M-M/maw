@extends('layouts.admin.app')

@section('content')

    <h2 class="mb-2 pt-2">@lang('categories.categories')</h2>

    <ul class="breadcrumb my-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">@lang('categories.categories')</a></li>
        <li class="breadcrumb-item">@lang('site.create')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">

                    <form method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        @include('admin.partials._errors')

                        {{--title--}}
                        <div class="form-group">
                            <label>@lang('categories.title') <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" autofocus required>
                        </div>

                        {{--body--}}
                        <div class="form-group">
                            <label>@lang('categories.body') <span class="text-danger">*</span></label>
                            <textarea name="body" class="form-control" required>{{ old('body') }}</textarea>
                        </div>

                        {{--image--}}
                        <div class="form-group">
                            <label>@lang('categories.image') <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control load-image" required>
                            <img src="" class="loaded-image" alt="" style="display: none; width: 200px; margin: 10px 0;">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> @lang('site.create')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end  card body-->

            </div><!-- end of card -->

        </div><!-- end of row -->
@endsection