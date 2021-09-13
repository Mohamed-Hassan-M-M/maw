@extends('layouts.app')

@section('content')

    @include('layouts._banner_inner', ['title' => __('site.login')])

    <section id="categories" class="py-5">

        <div class="container">

            <div class="row py-3">

                <div class="col-md-8 mx-auto">

                    <div class="card">

                        <div class="card-body">

                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                @method('post')

                                <h3>@lang('site.login')</h3>
                                <hr>

                                @include('admin.partials._errors')

                                {{--email--}}
                                <div class="form-group">
                                    <label for="">@lang('users.email')</label>
                                    <input type="text" name="email" class="form-control">
                                </div>

                                {{--password--}}
                                <div class="form-group">
                                    <label for="">@lang('users.password')</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <!--submit-->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">@lang('site.login')</button>
                                </div>

                            </form><!-- end of form -->

                        </div> <!-- end of card body -->

                    </div><!-- end of card -->

                </div><!-- end of col -->

            </div><!-- end of row -->

        </div><!-- end of container -->

    </section>

@endsection
