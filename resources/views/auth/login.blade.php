
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(app()->getLocale() == "ar")dir="rtl"@endif>
<head>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>@lang('app.login')</title>

        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
        <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

        <!-- PLUGINS CSS STYLE -->
        <link href="{{asset('/public/assets/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />
        <link href="{{asset('/public/assets/plugins/nprogress/nprogress.css" rel="stylesheet')}}" />
        <link href="{{asset('/public/assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet')}}"/>
        <link href="{{asset('/public/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
        <link href="{{asset('/public/assets/plugins/ladda/ladda.min.css" rel="stylesheet')}}" />
        <link href="{{asset('/public/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
        <link href="{{asset('/public/assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

        <!-- SLEEK CSS -->
        @if(app()->getLocale() == 'ar')
            <link id="sleek-css" rel="stylesheet" href="{{asset('public/assets/css/sleek.rtl.css')}}" />
        @else
            <link id="sleek-css" rel="stylesheet" href="{{asset('public/assets/css/sleek.css')}}" />
        @endif

        <!-- FAVICON -->

        <link href="{{asset('/public/assets/img/favicon.png')}}" rel="shortcut icon" />

        <!--
          HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
        -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="{{asset('/public/assets/plugins/nprogress/nprogress.js')}}"></script>
    </head>

</head>
<body class="bg-light-gray" id="body">
<div class="container d-flex flex-column justify-content-between vh-100">
    <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">

            @if (session()->has('message'))

            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-highlighted" role="alert">
                       {{session()->get('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">??</span>
                        </button>
                    </div>
                </div>
            </div>

            @endif

            <div class="card">
                <div class="card-header bg-primary">
                    <div class="app-brand">
                        <a >
                            <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33"
                                 viewBox="0 0 30 33">
                                <g fill="none" fill-rule="evenodd">
                                    <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                                </g>
                            </svg>
                            <span class="brand-name"><h4>@lang('app.human resource management system')</h4></span>
                        </a>
                    </div>

                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="btn btn-secondary btn-sm" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                    @endforeach





                </div>


                <div class="card-body p-5">

                    <h4 class="text-dark mb-5">@lang('app.sign in')</h4>


                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label for="validationServerUsername">@lang('app.email')</label>
                                <input type="email" id="email" onclick="remove_error('email')" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="@lang('app.email')" aria-describedby="inputGroupPrepend3" >
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationServerUsername">@lang('app.password')</label>
                                <input type="password" name="password" id="password" onclick="remove_error('password')" class="form-control @error('password') is-invalid @enderror"  placeholder="@lang('app.password')" aria-describedby="inputGroupPrepend3" >
                                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex my-2 justify-content-between">
                                    <div class="d-inline-block mr-3">
                                        <label class="control control-checkbox checkbox-primary">@lang('app.remember me')
                                            <input type="checkbox" name="remember"  />
                                            <div class="control-indicator"></div>
                                        </label>

                                    </div>
                                    <p>
                                        @if (Route::has('password.request'))
                                            <a class="text-blue" href="{{ route('password.request') }}">
                                                {{ __('app.forget your password') }}
                                            </a>
                                        @endif
                                    </p>
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">@lang('app.sign in')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function remove_error(id){
        var input = document.getElementById(id);
        var list = input.classList;
        if(list.contains('is-invalid')){
            input.classList.remove('is-invalid')
        }
    }

</script>
</body>
</html>
