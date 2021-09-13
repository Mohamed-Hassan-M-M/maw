@extends('layouts.app')

@section('content')

    @include('layouts._banner_inner', ['title' => $article->title])

    <section id="categories" class="py-5">

        <div class="container">

            <div class="row py-3">

                <div class="col-dm-12">

                    <h3>{{ $article->title }}</h3>
                    <hr>

                    <div class="d-flex category-info mb-3">
                        <span><i class="fab fa-readme"></i> {{ $article->time_to_read }} @lang('articles.time_to_read') </span>
                        <span class="mx-3"><i class="fa fa-eye"></i> {{ $article->views_count }} @lang('site.views')</span>
                    </div>

                    {!! $article->body !!}

                    <a href="{{ $article->file_path }}" target="_blank" class="btn btn-primary"><i class="fa fa-download"></i> @lang('articles.download_attached_files')</a>

                </div>

            </div><!-- end of row -->

        </div><!-- end of container -->

    </section>

@endsection