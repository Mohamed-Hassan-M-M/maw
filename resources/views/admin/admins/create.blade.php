@extends('layouts.admin.app')

@section('content')

    <h2 class="mb-2 pt-2">@lang('admins.admins')</h2>

    <ul class="breadcrumb my-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.admins.index') }}">@lang('admins.admins')</a></li>
        <li class="breadcrumb-item">@lang('site.create')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">

                    <form method="post" action="{{ route('admin.admins.store') }}">
                        @csrf
                        @method('post')

                        @include('admin.partials._errors')

                        {{--name--}}
                        <div class="form-group">
                            <label>@lang('users.name') <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" autofocus value="{{ old('name') }}" required>
                        </div>

                        {{--email--}}
                        <div class="form-group">
                            <label>@lang('users.email') <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" value="" required>
                        </div>

                        {{--password--}}
                        <div class="form-group">
                            <label>@lang('users.password') <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" value="" required>
                        </div>

                        {{--password_confirmation--}}
                        <div class="form-group">
                            <label>@lang('users.password_confirmation') <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" value="" required>
                        </div>

                        {{--role_id--}}
                        <div class="form-group">
                            <label>@lang('roles.role') <span class="text-danger">*</span></label>
                            <select name="role_id" class="form-control select2" required>
                                <option value="">@lang('site.choose') @lang('roles.role')</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> @lang('site.create')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of card body -->

            </div><!-- end of card -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection


      