<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">

            <!-- User profile image -->
            <div class="profile-img">
                <img src="{{ auth()->user()->image_path }}" style="width: 60px; height: 60px;" alt="user"/>
            </div>

            <!-- User profile text-->
            <div class="profile-text">
                <h5>{{ auth()->user()->name }}</h5>
            </div>
        </div>

        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                {{--home--}}
                <li>
                    <a href="{{ route('admin.home') }}"><i class="fa fa-home"></i>
                        <span class="hide-menu">@lang('site.home')
                        </span>
                    </a>
                </li>

                {{--roles--}}
                @if (auth()->user()->hasPermission('read_roles'))
                    <li>
                        <a href="{{ route('admin.roles.index') }}"><i class="fa fa-lock"></i>
                            <span class="hide-menu">@lang('roles.roles')</span>
                        </a>
                    </li>
                @endif

                {{--admins--}}
                @if (auth()->user()->hasPermission('read_admins'))
                    <li>
                        <a href="{{ route('admin.admins.index') }}"><i class="fa fa-user-circle"></i>
                            <span class="hide-menu">@lang('admins.admins')</span>
                        </a>
                    </li>
                @endif

                {{--categories--}}
                @if (auth()->user()->hasPermission('read_categories'))
                    <li>
                        <a href="{{ route('admin.categories.index') }}"><i class="fa fa-camera"></i>
                            <span class="hide-menu">@lang('categories.categories')</span>
                        </a>
                    </li>
                @endif

                {{--articles--}}
                @if (auth()->user()->hasPermission('read_articles'))
                    <li>
                        <a href="{{ route('admin.articles.index') }}"><i class="fa fa-file"></i>
                            <span class="hide-menu">@lang('articles.articles')</span>
                        </a>
                    </li>
                @endif

                {{--contact_us_requests--}}
                @if (auth()->user()->hasPermission('read_contact_us_requests'))
                    <li>
                        <a href="{{ route('admin.contact_us_requests.index') }}"><i class="fa fa-phone"></i>
                            <span class="hide-menu">@lang('contact_us_requests.contact_us_requests')</span>
                        </a>
                    </li>
                @endif

                {{--settings--}}
                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-cogs"></i><span class="hide-menu">@lang('settings.settings')</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.settings.general') }}">@lang('settings.general')</a></li>

                        @if (auth()->user()->hasPermission('read_languages'))
                            <li><a href="{{ route('admin.languages.index') }}">@lang('languages.languages')</a></li>
                        @endif

                        @if (auth()->user()->hasPermission('read_measuring_units'))
                            <li><a href="{{ route('admin.measuring_units.index') }}">@lang('measuring_units.measuring_units')</a></li>
                        @endif

                        @if (auth()->user()->hasPermission('read_states'))
                            <li><a href="{{ route('admin.states.index') }}">@lang('states.states')</a></li>
                        @endif
                    </ul>
                </li>

                {{--profile--}}
                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user-circle"></i><span class="hide-menu">@lang('users.profile')</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.profile.edit') }}">@lang('users.edit_profile')</a></li>
                        <li><a href="{{ route('admin.profile.password.edit') }}">@lang('users.change_password')</a></li>
                    </ul>
                </li>


                {{--                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file-chart"></i><span class="hide-menu">Charts</span></a>--}}
                {{--                    <ul aria-expanded="false" class="collapse">--}}
                {{--                        <li><a href="chart-morris.html">Morris Chart</a></li>--}}
                {{--                        <li><a href="chart-chartist.html">Chartis Chart</a></li>--}}
                {{--                        <li><a href="chart-sparkline.html">Sparkline Chart</a></li>--}}
                {{--                        <li><a href="chart-extra-chart.html">Extra chart</a></li>--}}
                {{--                        <li><a href="chart-peity.html">Peity Charts</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}

            </ul>

        </nav><!-- end of side nav -->

    </div><!-- end of scroll side bar -->

</aside>