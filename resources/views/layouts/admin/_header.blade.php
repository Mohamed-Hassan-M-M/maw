<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <b>
                    <h4>@lang('site.maw')</h4>
                    {{--                    <img src="{{ asset('admin_assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo"/>--}}
                    {{--                    <img src="{{ asset('admin_assets/images/logo-light-icon.png') }}" alt="homepage" class="light-logo"/>--}}
                </b>
                <span>
                    {{--                     <img src="{{ asset('admin_assets/images/logo-text.png') }}" alt="homepage" class="dark-logo"/>--}}
                    {{--                     <img src="{{ asset('admin_assets/images/logo-light-text.png') }}" class="light-logo" alt="homepage"/>--}}
                </span>
            </a>
        </div>

        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0">

                <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
                <li class="nav-item m-l-10"><a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i></a>

                    <div class="dropdown-menu mailbox slideInUp">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="#">
                                        <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span></div>
                                    </a>

                                    <a href="#">
                                        <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span></div>
                                    </a>

                                    <a href="#">
                                        <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span></div>
                                    </a>

                                    <a href="#">
                                        <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span></div>
                                    </a>
                                </div><!-- end of message center -->
                            </li>
                            <li>
                                <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-email"></i>
                    </a>
                    <div class="dropdown-menu mailbox slideInUp" aria-labelledby="2">
                        <ul>
                            <li>
                                <div class="drop-title">You have 4 new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"><img src="{{ asset('admin_assets/images/users/1.jpg') }}" alt="user" class="img-circle"> <span class="profile-status online"></span></div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span></div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"><img src="{{ asset('admin_assets/images/users/2.jpg')}}" alt="user" class="img-circle"> <span class="profile-status busy"></span></div>
                                        <div class="mail-contnet">
                                            <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span></div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"><img src="{{ asset('admin_assets/images/users/3.jpg') }}" alt="user" class="img-circle"> <span class="profile-status away"></span></div>
                                        <div class="mail-contnet">
                                            <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span></div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"><img src="{{ asset('admin_assets/images/users/4.jpg') }}" alt="user" class="img-circle"> <span class="profile-status offline"></span></div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span></div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav my-lg-0">

                {{--                <li class="nav-item dropdown">--}}
                {{--                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon {{ app()->getLocale() == 'ar' ? 'flag-icon-sa' : 'flag-icon-us' }}"></i></a>--}}
                {{--                    <div class="dropdown-menu dropdown-menu-right scale-up">--}}
                {{--                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
                {{--                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
                {{--                                <i class="flag-icon {{ $properties['name'] == 'Arabic' ? 'flag-icon-sa' : 'flag-icon-us'}}"></i>--}}
                {{--                                {{ $properties['native'] }}--}}
                {{--                            </a>--}}
                {{--                        @endforeach--}}
                {{--                    </div>--}}
                {{--                </li>--}}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ auth()->user()->image_path }}" alt="user" class="profile-pic"/></a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{ auth()->user()->image_path }}" alt="user"></div>
                                    <div class="u-text">
                                        <h4>{{ auth()->user()->name }}</h4>
                                        <p class="text-muted">{{ auth()->user()->email }}</p>
                                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-rounded btn-danger btn-sm">
                                            @lang('users.edit_profile')
                                        </a>
                                    </div>
                                </div>
                            </li>
                            {{--                            <li role="separator" class="divider"></li>--}}
                            {{--                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>--}}
                            {{--                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>--}}
                            {{--                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>--}}
                            {{--                            <li role="separator" class="divider"></li>--}}
                            {{--                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>--}}
                            {{--                            <li role="separator" class="divider"></li>--}}
                            <li>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i>
                                    @lang('site.logout')
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>