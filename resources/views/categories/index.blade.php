@extends('layouts.app')

@section('content')

    @include('layouts._banner_inner', ['title' => __('categories.categories')])

    <section id="categories" class="py-5">

        <div class="container">

            <div class="row">

                <div class="col-md-12 text-center">

                    <h2 class="categories-title">@lang('categories.categories')</h2>
                    <hr class="title-hr ">

                    <p class="categories-text">ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن </p>

                </div><!-- end of col -->

            </div><!-- end of row -->

            <div class="row py-3">

                @if ($categories->count() > 0)

                    @foreach ($categories  as $category)

                        <div class="col-md-4 my-3">

                            <div class="card">

                                <a href="{{ route('articles.index', ['category_id' => $category->id]) }}" class="category-card-image-wrapper">
                                    <img src="{{ $category->image_path }}" class="category-card-image img-fluid card-img-top" alt="">
                                </a>

                                <div class="card-body">
                                    <h4 class="mb-1">{{ $category->title }}</h4>
                                    <p>{{ $category->body }}</p>
                                    <div class="d-flex justify-content-between category-info">
                                        <span><i class="fa fa-file"></i> {{ $category->articles->count() }}  @lang('articles.articles')</span>
                                        <span><i class="fa fa-eye"></i> {{ $category->views_count }} @lang('site.views')</span>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end of col -->

                    @endforeach

                    <div class="col-md-12 mt-2">
                        {{ $categories->links() }}
                    </div>
                @else
                    <div style="width: 100%;" class="text-center">
                        <h3>@lang('site.no_data_found')</h3>
                    </div>
                @endif

            </div><!-- end of row -->

        </div><!-- end of container -->

    </section>

@endsection