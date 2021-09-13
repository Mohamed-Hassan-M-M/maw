@extends('layouts.admin.app')

@section('content')

    <h2 class="mb-2 pt-2">@lang('articles.articles')</h2>

    <ul class="breadcrumb my-2">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.articles.index') }}">@lang('articles.articles')</a></li>
        <li class="breadcrumb-item">@lang('site.show')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">

                    <table class="table table-hover">

                        <tr>
                            <th style="width: 15%;">@lang('categories.category')</th>
                            <td>{{ $article->category->title }}</td>
                        </tr>

                        <tr>
                            <th style="width: 15%;">@lang('articles.title')</th>
                            <td>{{ $article->title }}</td>
                        </tr>

                        <tr>
                            <th style="width: 15%;">@lang('articles.body')</th>
                            <td>{!! $article->body !!}</td>
                        </tr>

                        <tr>
                            <th style="width: 15%;">@lang('articles.image')</th>
                            <td><img src="{{ $article->image_path }}" style="width: 200px;" alt=""></td>
                        </tr>

                        <tr>
                            <th style="width: 15%;">@lang('articles.file')</th>
                            <td><a href="{{ $article->file_path }}" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-download"></i> @lang('site.download')</a></td>
                        </tr>

                        <tr>
                            <th style="width: 15%;">@lang('articles.time_to_read')</th>
                            <td>{{ $article->time_to_read }}</td>
                        </tr>

                        <tr>
                            <th style="width: 15%;">@lang('articles.status')</th>
                            <td>@lang('articles.' . $article->status)</td>
                        </tr>

                    </table>

                </div><!-- end of card body -->

            </div><!-- end of card -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection