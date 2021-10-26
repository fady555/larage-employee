<header class="main-header " id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle">
        </button>

        <!-- language-->


        <div class="btn-group btn-lg mb-1">
            <button type="button" class="btn btn-primary">@lang('app.language')</button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
            </button>
            <div class="dropdown-menu w-25">


                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                @endforeach


            </div>
        </div>



        <div class="navbar-right ml-auto  ">
            <ul class="nav navbar-nav">



{{-----------------
    --------------



    User::find(1)   ==> change with auth()->user()

    -----------------
    ----------------}}




                <li class="dropdown notifications-menu" onclick="read('{{App\User::find(1)->id}}')">

                    <button class="dropdown-toggle" data-toggle="dropdown">
                        <i class=" readnotifiy mdi mdi-bell-outline @if(App\User::find(1)->unreadnotifications->count()) mdi-spin text-primary @endif ">
                        </i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-header">You have {{App\User::find(1)->notifications->count()}} notifications</li>





                        @foreach (App\User::find(1)->notifications as $noty)




                                <li >
                                    <a href="#" >
                                        <i class="mdi mdi-incognito  "></i>  {{   $noty->data['title_'.app()->getlocale()] }}  <br/>
                                        <span class=" font-size-10 d-inline-block float-right "><i class="mdi mdi-clock-outline"></i>  {{date('d-M-y h:m A',strtotime($noty->data['created_at'])) }} </span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                </li>




                        @endforeach




                        <li class="dropdown-footer">
                            <a class="text-center" href="#"> View All </a>
                        </li>
                    </ul>
                </li>
                <!-- User Account -->
                <li class="dropdown user-menu">
                    <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <img src="{{asset('/public/assets/img/user/user.png')}}" class="user-image" alt="User Image" />
                        <span class="d-none d-lg-inline-block">Abdus Salam</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <!-- User image -->
                        <li class="dropdown-header">
                            <img src="{{asset('/public/assets/img/user/user.png')}}" class="img-circle" alt="User Image" />
                            <div class="d-inline-block">
                                Abdus Salam <small class="pt-1">abdus@gmail.com</small>
                            </div>
                        </li>

                        <li>
                            <a href="profile.html">
                                <i class="mdi mdi-account"></i> My Profile
                            </a>
                        </li>
                        <li>
                            <a href="email-inbox.html">
                                <i class="mdi mdi-email"></i> Message
                            </a>
                        </li>
                        <li>
                            <a href="#"> <i class="mdi mdi-diamond-stone"></i> Projects </a>
                        </li>
                        <li>
                            <a href="#"> <i class="mdi mdi-settings"></i> Account Setting </a>
                        </li>

                        <li class="dropdown-footer">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a href="javascript:;" onclick="document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout" ></i>
                                Log Out
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>




    </nav>


</header>
