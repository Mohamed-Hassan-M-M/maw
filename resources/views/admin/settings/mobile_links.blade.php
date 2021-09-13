@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('settings.social_links')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('settings.mobile_links')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    @php
                        $mobileLinks = ['android', 'ios'];
                    @endphp

                    @foreach ($mobileLinks as $link)
                        <div class="form-group">
                            <label>@lang('settings.' . $link)</label>
                            <input type="url" name="{{ $link }}_link" class="form-control" value="{{ setting($link . '_link') }}">
                        </div>
                    @endforeach

                    {{--submit--}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection