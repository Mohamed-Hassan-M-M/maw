@extends('layouts.app')

@section('content')

    @include('layouts._banner_inner', ['title' => __('articles.articles')])

    <section id="categories" class="py-5">

        <div class="container">

            <div class="row py-3">

                <div class="col-md-9">

                    @if ($articles->count() > 0)

                        @foreach ($articles as $article)

                            <div class="row article">

                                <div class="col-md-3">
                                    <a href="{{ route('articles.show', $article->id) }}">
                                        <img src="{{ $article->image_path }}" class="img-fluid card-img-top" alt="">
                                    </a>
                                </div>

                                <div class="col-md-8">
                                    <h4 class="article-title">{{ $article->title }}</h4>
                                    <p class="article-text">{!! $article->body !!}</p>
                                    <div class="d-flex justify-content-between category-info">
                                        <span><i class="fab fa-readme"></i> {{ $article->time_to_read }} @lang('articles.time_to_read') </span>
                                        <span><i class="fa fa-eye"></i> {{ $article->views_count }}  @lang('site.views')</span>
                                    </div>
                                </div>

                            </div><!-- end of row -->

                        @endforeach

                    @else
                        <h3>@lang('site.no_data_found')</h3>
                    @endif

                </div><!-- end of col -->

                <div class="col-md-3">
                    <h3>@lang('categories.other_categories')</h3>

                    @foreach ($categories as $category)

                        <div class="row mb-3">

                            <div class="col-md-12">

                                <div class="card">

                                    <a href="{{ route('articles.index', ['category_id' => $category->id]) }}" class="category-card-image-wrapper">
                                        <img src="{{ $category->image_path }}" class="category-card-image img-fluid card-img-top" alt="">
                                    </a>

                                    <div class="card-body">
                                        <h5 class="mb-1">{{ $category->title }}</h5>
                                        <p style="font-size: 14px;">{!! $category->text !!}</p>
                                        <div class="d-flex justify-content-between category-info">
                                            <span style="font-size: 14px;"><i class="fa fa-file"></i> {{ $category->articles->count() }} @lang('articles.articles')</span>
                                            <span style="font-size: 14px;"><i class="fa fa-eye"></i> {{ $category->views_count }} @lang('site.views')</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

            </div><!-- end of row -->

        </div><!-- end of container -->

    </section>

@endsection