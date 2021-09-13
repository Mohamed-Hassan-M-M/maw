@extends('layouts.admin.app')

@section('content')

    <h2 class="mb-2 pt-2">@lang('articles.articles')</h2>

    <ul class="breadcrumb my-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.articles.index') }}">@lang('articles.articles')</a></li>
        <li class="breadcrumb-item">@lang('site.create')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">

                    <form method="post" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        @include('admin.partials._errors')

                        {{--category_id--}}
                        <div class="form-group">
                            <label>@lang('categories.category') <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-control select2">
                                <option value="">@lang('site.choose') @lang('categories.category')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{--title--}}
                        <div class="form-group">
                            <label>@lang('articles.title') <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" autofocus required>
                        </div>

                        {{--body--}}
                        <div class="form-group">
                            <label>@lang('articles.body') <span class="text-danger">*</span></label>
                            <textarea name="body" class="form-control ckeditor">{{ old('body') }}</textarea>
                        </div>

                        {{--image--}}
                        <div class="form-group">
                            <label>@lang('categories.image') <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control load-image" required>
                            <img src="" class="loaded-image" alt="" style="display: none; width: 200px; margin: 10px 0;">
                        </div>

                        {{--file--}}
                        <div class="form-group">
                            <label>@lang('articles.file') <span class="text-danger">*</span></label>
                            <input type="file" name="file" class="form-control load-image">
                        </div>

                        {{--time_to_read--}}
                        <div class="form-group">
                            <label>@lang('articles.time_to_read')</label>
                            <input type="number" name="time_to_read" class="form-control" value="{{ old('time_to_read') }}">
                        </div>

                        {{--status--}}
                        <div class="form-group">
                            <label>@lang('articles.status') <span class="text-danger">*</span></label>
                            <select name="status" class="form-control select2" required>
                                <option value="">@lang('site.choose') @lang('articles.status')</option>
                                <option value="published">@lang('articles.published')</option>
                                <option value="unpublished">@lang('articles.unpublished')</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> @lang('site.create')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end  card body-->

            </div><!-- end of card -->

        </div><!-- end of row -->
@endsection