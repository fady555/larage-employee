
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(app()->getLocale() == "ar")dir="rtl"@endif>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title','no title chooesen')</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{asset('/public/assets/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/assets/plugins/flag-icons/css/flag-icon.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('/public/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
    <link href="{{asset('/public/assets/plugins/ladda/ladda.min.css')}}" rel="stylesheet" />
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
    <!------[add csss]-->
    @yield('css')

</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
<script>
    NProgress.configure({ showSpinner: false });
    NProgress.start();
</script>

<div class="mobile-sticky-body-overlay"></div>

<div class="wrapper">
    @include('layouts.sidbar')
    <div class="page-wrapper">
        <!-- Header -->
        @include('layouts.header')
        <!-- content -->
        @yield('content')
        <!-- footer -->
        @include('layouts.footer')
    </div>
</div>

{{-----------------
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
------------------}}
<script src="{{asset('/public/assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/public/assets/plugins/toaster/toastr.min.js')}}"></script>
<script src="{{asset('/public/assets/plugins/slimscrollbar/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('/public/assets/plugins/charts/Chart.min.js')}}"></script>
<script src="{{asset('/public/assets/plugins/ladda/spin.min.js')}}"></script>
<script src="{{asset('/public/assets/plugins/ladda/ladda.min.js')}}"></script>
<script src="{{asset('/public/assets/plugins/jquery-mask-input/jquery.mask.min.js')}}"></script>
<script src="{{asset('/public/assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('/public/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
<script src="{{asset('/public/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
<script src="{{asset('/public/assets/plugins/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('/public/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('/public/assets/plugins/jekyll-search.min.js')}}"></script>
<script src="{{asset('/public/assets/js/sleek.js')}}"></script>
<script src="{{asset('/public/assets/js/chart.js')}}"></script>
<script src="{{asset('/public/assets/js/date-range.js')}}"></script>
{{----------
<script src="{{asset('/public/assets/js/map.js')}}"></script>
-----------}}

<script src="{{asset('/public/assets/js/custom.js')}}"></script>
<script>
    //is-invalid
    jQuery(document).on("click", ".removeError", function(e) {
      e.stopPropagation();
      if(jQuery(this).hasClass('is-invalid')){
              jQuery(this).removeClass('is-invalid');
        }
        else{
             //jQuery(this).addClass('current-hoverv2');
        }
    });

</script>


<!------[add js]-->
@yield('js')


</body>
</html>
