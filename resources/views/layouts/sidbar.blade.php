<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="/index.html">
                <svg
                    class="brand-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="xMidYMid"
                    width="30"
                    height="33"
                    viewBox="0 0 30 33"
                >
                    <g fill="none" fill-rule="evenodd">
                        <path
                            class="logo-fill-blue"
                            fill="#7DBCFF"
                            d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                        />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>
                <span class="brand-name"><h4>@lang('app.human resource management system')</h4></span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">

                <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="dashboard"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">



                            <li >
                                <a class="sidenav-item-link" href="index.html">
                                    <span class="nav-text">Ecommerce</span>

                                </a>
                            </li>






                            <li >
                                <a class="sidenav-item-link" href="analytics.html">
                                    <span class="nav-text">Analytics</span>

                                    <span class="badge badge-success">new</span>

                                </a>
                            </li>











                        </div>
                    </ul>
                </li>




                <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#employees"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-account"></i>
                        <span class="nav-text">@lang('app.employees')</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="employees"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">



                            <li >
                                <a class="sidenav-item-link" href="index.html">
                                    <span class="nav-text">@lang('app.employees')</span>
                                </a>
                            </li>
                            <li >
                                <a class="sidenav-item-link" href="index.html">
                                    <span class="nav-text">@lang('app.add employee')</span>
                                </a>
                            </li>



                        </div>
                    </ul>
                </li>


                <li>
                    <a class="sidenav-item-link" href="{{route('show.jops')}}">
                        <i class="mdi mdi-30px  mdi-cogs"></i>
                        <span class="nav-text">@lang('app.jops')</span>
                    </a>
                </li>
                <li>
                    <a class="sidenav-item-link" href="{{route('show.types.work')}}">
                        <i class="mdi mdi-30px  mdi-worker"></i>
                        <span class="nav-text">@lang('app.type work')</span>
                    </a>
                </li>
                <li>
                    <a class="sidenav-item-link" href="{{route('show.educations')}}">
                        <i class="mdi mdi-30px mdi-teach"></i>
                        <span class="nav-text">@lang('app.education')</span>
                    </a>
                </li>
                <li>
                    <a class="sidenav-item-link" href="{{route('show.degrees')}}">
                        <i class="mdi mdi-30px mdi-school"></i>
                        <span class="nav-text">@lang('app.degrees')</span>
                    </a>
                </li>

                <li>
                    <a class="sidenav-item-link" href="{{route('show.levels.experiences')}}">
                        <i class="mdi mdi-30px mdi-sort-variant "></i>
                        <span class="nav-text">@lang('app.level experience')</span>
                    </a>
                </li>

                <li>
                    <a class="sidenav-item-link" href="{{route('show.company')}}">
                        <i class="mdi mdi-30px mdi-bank"></i>
                        <span class="nav-text">@lang('app.companies')</span>
                    </a>
                </li>
                <li>
                    <a class="sidenav-item-link" href="{{route('show.companies.departments')}}">
                        <i class="mdi mdi-30px mdi-atom"></i>
                        <span class="nav-text">@lang('app.company departement')</span>
                    </a>
                </li>
                <li>
                    <a class="sidenav-item-link" href="{{route('show.companies.branchs')}}">
                        <i class="mdi mdi-30px mdi-bank-transfer-in"></i>
                        <span class="nav-text">@lang('app.company branch')</span>
                    </a>
                </li>

                <li>
                    <a class="sidenav-item-link" href="#">
                        <i class="mdi mdi-30px mdi-notification-clear-all "></i>
                        <span class="nav-text">@lang('app.requests')</span>
                    </a>
                </li>


                <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#requests"
                       aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-account"></i>
                        <span class="nav-text">@lang('app.requests')</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="requests"
                         data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li >
                                <a class="sidenav-item-link" href="index.html">
                                    <span class="nav-text">@lang('app.add request')</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>

                <li>
                    <a class="sidenav-item-link" href="#">
                        <i class="mdi mdi-deskphone"></i>
                        <span class="nav-text">@lang('app.phones')</span>
                    </a>
                </li>



            </ul>
        </div>
        <hr class="separator" />
    </div>
</aside>
