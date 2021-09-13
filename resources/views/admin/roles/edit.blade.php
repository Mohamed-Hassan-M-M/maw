@extends('layouts.admin.app')

@section('content')

    <h2 class="mb-2 pt-2">@lang('roles.roles')</h2>

    <ul class="breadcrumb my-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">@lang('roles.roles')</a></li>
        <li class="breadcrumb-item">@lang('site.edit')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">

                    <form method="post" action="{{ route('admin.roles.update', $role->id) }}">
                        @csrf
                        @method('put')

                        @include('admin.partials._errors')

                        {{--name--}}
                        <div class="form-group">
                            <label>@lang('roles.name')<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ $role->name }}" autofocus required>
                        </div>

                        <h5>@lang('roles.permissions')</h5>

                        @php
                            $models = ['roles', 'admins', 'users'];
                        @endphp

                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('roles.model')</th>
                                <th>@lang('roles.permissions') <span class="text-danger">*</span></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($models as $model)
                                <tr>
                                    <td>@lang($model . '.' . $model)</td>
                                    <td>

                                        @php
                                            $permissionMaps = ['create', 'read', 'update', 'delete'];
                                        @endphp

                                        @foreach ($permissionMaps as $permissionMap)

                                            <div class="mx-2" style="display:inline-block;">
                                                <input type="checkbox" value="{{ $permissionMap . '_' . $model }}" id="{{ $permissionMap . '_' . $model }}" name="permissions[]" {{ $role->hasPermission( $permissionMap . '_' . $model) ? 'checked' : '' }} class="role"/>
                                                <label for="{{ $permissionMap . '_' . $model }}">@lang('site.' . $permissionMap)</label>
                                            </div>

                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table><!-- end of table -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> @lang('site.update')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of card body -->

            </div><!-- end of card -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection