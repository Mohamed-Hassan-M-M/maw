<div id="banner-inner">

    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">

        <div class="container">

            <a class="navbar-brand" href="{{ route('welcome') }}">@lang('site.maw')</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <form action="{{ route('articles.index') }}" class="d-flex justify-content-center">
                        <input type="text" name="search" class="form-control bg-transparent" placeholder="ابحث عن مقالك المفضل ">
                        <button type="submit" class="btn btn-primary mx-2"><i class="fa fa-search"></i> @lang('site.search')</button>
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

        <div class="row justify-content-center align-items-center h-40">

            <div class="col col-md-8 mx-auto text-white text-center">

                <h2 class="banner-title">{{ $title }}</h2>

            </div><!-- end of col -->

        </div><!-- end of row -->

    </div><!-- end of container -->

</div><!-- end of banner-inner -->