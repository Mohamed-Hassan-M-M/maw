@extends('layouts.admin.app')

@section('content')

    <h2 class="mb-2 pt-2">@lang('users.change_password')</h2>

    <ul class="breadcrumb my-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('users.change_password')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">

                    @include('admin.partials._errors')

                    <form method="post" action="{{ route('admin.profile.password.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        {{--name--}}
                        <div class="form-group">
                            <label>@lang('users.old_password')</label>
                            <input type="password" name="old_password" class="form-control" value="">
                        </div>

                        {{--password--}}
                        <div class="form-group">
                            <label>@lang('users.password')</label>
                            <input type="password" name="password" class="form-control" value="">
                        </div>

                        {{--password_confirmation--}}
                        <div class="form-group">
                            <label>@lang('users.password_confirmation')</label>
                            <input type="password" name="password_confirmation" class="form-control" value="">
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