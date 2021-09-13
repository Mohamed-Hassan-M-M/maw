@extends('layouts.app')

@section('content')
    <div id="banner">
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">

            <div class="container">

                <a class="navbar-brand" href="#">@lang('site.maw')</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">
                        <form action="" class="d-flex justify-content-center">
                            <input type="text" name="" class="form-control bg-transparent" placeholder="ابحث عن مقالك المفضل ">
                            <button type="submit" class="btn btn-primary mx-2"><i class="fa fa-search"></i> بحث</button>
                        </form>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @auth
                            <a href="{{ route('admin.home') }}" class="nav-link">@lang('site.dashboard')</a>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                                @lang('site.logout')
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="nav-link">@lang('site.login')</a>
                        @endauth
                    </ul>

                </div><!-- end of collapse -->

            </div><!-- end of container fluid-->

        </nav><!-- end of nav -->

        <div class="container">

            <div class="row justify-content-center align-items-center h-80">

                <div class="col col-md-8 mx-auto text-white text-center">

                    <h1 class="banner-title">مرحبا في الموارد البشرية</h1>
                    <p class="banner-text">ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل</p>

                    <a href="{{ route('categories.index') }}" class="btn btn-primary"><i class="fa fa-cat"></i> @lang('categories.categories')</a>

                </div><!-- end of col -->

            </div><!-- end of row -->

        </div><!-- end of container -->

    </div><!-- end of banner -->

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

                @forelse ($categories as $category)

                    <div class="col-md-4 my-3">

                        <div class="card">

                            <a href="{{ route('articles.index', ['category_id' => $category->id]) }}" class="category-card-image-wrapper">
                                <img src="{{ $category->image_path }}" class="category-card-image img-fluid card-img-top" alt="">
                            </a>

                            <div class="card-body">
                                <h4 class="mb-1">{{ $category->title }}</h4>
                                <p>{{ $category->body }}</p>
                                <div class="d-flex justify-content-between category-info">
                                    <span><i class="fa fa-file"></i> {{ $category->articles->count() }} @lang('articles.articles')</span>
                                    <span><i class="fa fa-eye"></i> {{ $category->views_count }} @lang('site.views')</span>
                                </div>
                            </div>
                        </div>

                    </div><!-- end of col -->

                @empty

                    <div class="text-center" style="width: 100%;">
                        <h3>@lang('site.no_data_found')</h3>
                    </div>

                @endforelse


            </div><!-- end of row -->

            @if ($categories->count() > 0)
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-primary">@lang('site.show_more')</a>
                    </div>
                </div>
            @endif

        </div><!-- end of container -->

    </section>

    <div id="about" class="py-5">

        <div class="container">

            <div class="row">

                <div class="col-md-7">

                    <h2>عنا</h2>
                    <div class="title-hr mb-2"></div>

                    {!! setting('about_us_text') !!}

                </div><!-- end of col -->

                <div class="col-md-5">
                    <img src="https://images.pexels.com/photos/70292/pexels-photo-70292.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="img-fluid" alt="">
                </div>

            </div><!-- end of row -->

        </div><!-- end of container -->
    </div>

@endsection