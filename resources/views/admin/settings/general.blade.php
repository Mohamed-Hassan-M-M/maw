@extends('layouts.admin.app')

@section('content')

    <h2 class="mb-2 pt-2">@lang('roles.roles')</h2>

    <ul class="breadcrumb my-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('settings.settings')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">

                    <form method="post" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        @include('admin.partials._errors')

                        {{--logo--}}
                        <div class="form-group">
                            <label>@lang('settings.logo')</label>
                            <input type="file" name="logo" class="form-control load-image">
                            <img src="{{ Storage::url('uploads/' . setting('logo')) }}" class="loaded-image" alt="" style="display: {{ setting('logo') ? 'block' : 'none' }}; width: 100px; margin: 10px 0;">
                        </div>

                        {{--fav_icon--}}
                        <div class="form-group">
                            <label>@lang('settings.fav_icon')</label>
                            <input type="file" name="fav_icon" class="form-control load-image">
                            <img src="{{ Storage::url('uploads/' . setting('fav_icon')) }}" class="loaded-image" alt="" style="display: {{ setting('fav_icon') ? 'block' : 'none' }}; width: 100px; margin: 10px 0;">
                        </div>

                        {{--title--}}
                        <div class="form-group">
                            <label>@lang('settings.title')</label>
                            <input type="text" name="title" class="form-control" value="{{ setting('title') }}">
                        </div>

                        {{--description--}}
                        <div class="form-group">
                            <label>@lang('settings.description')</label>
                            <textarea name="description" class="form-control">{{ setting('description') }}</textarea>
                        </div>

                        {{--keywords--}}
                        <div class="form-group">
                            <label>@lang('settings.keywords')</label>
                            <input type="text" name="keywords" class="form-control" value="{{ setting('keywords') }}">
                        </div>

                        {{--address--}}
                        <div class="form-group">
                            <label>@lang('settings.address')</label>
                            <input type="text" name="address" class="form-control" value="{{ setting('address') }}">
                        </div>

                        {{--about_us--}}
                        <div class="form-group">
                            <label>@lang('site.about_us_text')</label>
                            <textarea name="about_us_text" id="" class="form-control ckeditor">{{ setting('about_us_text') }}</textarea>
                        </div>

                        {{--about_us--}}
                        <div class="form-group">
                            <label>@lang('site.contact_us_text')</label>
                            <textarea name="contact_us_text" id="" class="form-control ckeditor">{{ setting('contact_us_text') }}</textarea>
                        </div>

                        {{--email--}}
                        <div class="form-group">
                            <label>@lang('settings.email')</label>
                            <input type="text" name="email" class="form-control" value="{{ setting('email') }}">
                        </div>

                        {{--phone--}}
                        <div class="form-group">
                            <label>@lang('settings.phone')</label>
                            <input type="tel" name="phone" class="form-control" value="{{ setting('phone') }}">
                        </div>

                        {{--submit--}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of card body -->

            </div><!-- end of card -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection