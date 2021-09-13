@extends('layouts.admin.app')

@section('content')

    <h2 class="mb-2 pt-2">@lang('users.profile')</h2>

    <ul class="breadcrumb my-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('users.profile')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">

                    @include('admin.partials._errors')

                    <form method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        {{--name--}}
                        <div class="form-group">
                            <label>@lang('users.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}">
                        </div>

                        {{--email--}}
                        <div class="form-group">
                            <label>@lang('users.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}">
                        </div>

                        {{--image--}}
                        <div class="form-group">
                            <label>@lang('users.image')</label>
                            <input type="file" name="image" class="form-control load-image">
                            <img src="" class="loaded-image" alt="" style="display: none; width: 200px; margin: 10px 0;">
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