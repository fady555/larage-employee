@extends('layouts.application')



@section('title')
        @lang('app.company data')
@endsection

@section('css')
@endsection



@section('content')


<div class="content-wrapper">
    <div class="content">

        @if (session()->has('message'))

        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success alert-highlighted" role="alert">
                   {!! session()->get('message') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        </div>

        @endif


        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h1>@lang('app.company data')</h1>
                    </div>


                    @if ($company)
                    <div class="card-body">
                        <div class="card-body">
                            <form method="POST" action="{{route('update.company',[$company->id])}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">

                                    <div class="col-md-10 mb-3">
                                        <label>@lang('app.name_company_en')</label>
                                        <input type="text" name="name_company_en" value="{{old('name_company_en',$company->name_company_en)}}" class="form-control"   value="">
                                    </div>

                                    <div class="col-md-10 mb-3">
                                        <label>@lang('app.name_company_ar')</label>
                                        <input type="text" name="name_company_ar" value="{{old('name_company_ar',$company->name_company_ar)}}" class="form-control"   value="">
                                    </div>

                                    <div class="col-md-10 mb-3 ">
                                        <label>@lang('app.logo')</label>
                                        <input type="file" name="logo" id="logo"  value="{{old('logo')}}" class="d-none form-control"   value="">
                                    </div>


                                    <div class="col-md-10 mb-3">
                                        <div class="card">
                                            <img style="height:150px" id='imgShow' src="{{ asset($company->logo) }}" alt="Card image cap">
                                        </div>
                                    </div>

                                    <div class="col-md-10 mb-3">
                                        <label>@lang('app.description_en')</label>
                                        <textarea class="form-control" name="description_en">{{old('description_en',$company->description_en)}}</textarea>
                                    </div>

                                    <div class="col-md-10 mb-3">
                                        <label>@lang('app.description_ar')</label>
                                        <textarea class="form-control" name="description_ar">{{old('description_ar',$company->description_ar)}}</textarea>
                                    </div>
                                    {{-------------company addrees ---------------------}}
                                    <div class="card-header card-header-border-bottom">
                                        <h1>@lang('app.company address head office')</h1>
                                    </div>

                                    <div class="form-row">

                                        <div class="col-md-5 mb-3">
                                            <label>@lang('app.country')</label>

                                            <select class="form-control" onchange="GetCities(this.value)" name="country_id" id="country_id" >

                                                @if ($errors->any())
                                                    <option value="{{old('country_id')}}">{{\App\Country::find(old('country_id'))->{'name_'.app()->getLocale()}  }}</option>
                                                @endif

                                                <option value="{{$company->address->country_id}}">{{ $company->address->country->{'name_'.app()->getLocale()} }}</option>

                                                @foreach(\App\Country::get() as $country)
                                                <option value="{{$country->id}}">{{ $country->{'name_'.app()->getLocale()} }}</option>
                                                @endforeach

                                            </select>

                                        </div>

                                        <div class="col-md-5 mb-3">
                                            <label>
                                                @lang('app.The chosen city')
                                                ({{\App\City::find($company->address->city_id)->{'name_'.app()->getLocale()}  }})
                                            </label>

                                            <select class="form-control" name="city_id" id="city_id">

                                                @if ($errors->any())
                                                    <option value="{{old('city_id')}}">{{\App\City::find(old('city_id'))->{'name_'.app()->getLocale()}  }}</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-5 mb-3">
                                            <label >@lang('app.current address en')</label>

                                            <textarea class="form-control" name="address_desc_en" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 58px;" >{{old('address_desc_en',$company->address->address_desc_en)}}</textarea>
                                        </div>

                                        <div class="col-md-5 mb-3">
                                            <label >@lang('app.current address ar')</label>

                                            <textarea class="form-control" name="address_desc_ar" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 58px;" >{{old('address_desc_ar',$company->address->address_desc_ar)}}</textarea>
                                        </div>

                                    </div>

                                    <div class="col-md-10 mb-3">
                                        <label>@lang('app.telphones')</label>
                                        <textarea class="form-control" name="telphones">{{old('telphones',$company->telphones)}}</textarea>
                                    </div>



                                    <div class="col-md-6 mb-3 ">
                                        <button type="button" class="btn btn-primary btnEdit " onclick="edit()"  >@lang('app.edit')</button>
                                    </div>

                                    <div class="col-md-4 mb-3 ">
                                        <input type="submit" class="btn btn-primary float-right  btnSave d-none"   value="@lang('app.save')">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>


                    @else
                    {{-------------add new company-------------------}}

                    <div class="card-body">
                        <form method="POST" action="{{route('store.company')}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.name_company_en')</label>
                                    <input type="text" name="name_company_en" value="{{old('name_company_en')}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.name_company_ar')</label>
                                    <input type="text" name="name_company_ar" value="{{old('name_company_ar')}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3 ">
                                    <label>@lang('app.logo')</label>
                                    <input type="file" name="logo"  value="{{old('logo')}}" class="form-control"   value="">
                                </div>

                                {{----------
                                <div class="col-md-10 mb-3">
                                    <div class="card">
                                        <img style="height:150px" src="{{ asset($company->logo) }}" alt="Card image cap">
                                    </div>
                                </div>
                                -------------}}

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.description_en')</label>
                                    <textarea class="form-control" name="description_en">{{old('description_en')}}</textarea>
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.description_ar')</label>
                                    <textarea class="form-control" name="description_ar">{{old('description_ar')}}</textarea>
                                </div>
                                {{-------------company addrees ---------------------}}
                                <div class="card-header card-header-border-bottom">
                                    <h2>@lang('app.company address head office')</h2>
                                </div>

                                <div class="form-row">

                                    <div class="col-md-5 mb-3">
                                        <label>@lang('app.country')</label>

                                        <select class="form-control" onchange="GetCities(this.value)" name="country_id" id="country_id" >

                                            @if ($errors->any())
                                                <option value="{{old('country_id')}}">{{\App\Country::find(old('country_id'))->{'name_'.app()->getLocale()}  }}</option>
                                            @endif

                                            @foreach(\App\Country::get() as $country)
                                            <option value="{{$country->id}}">{{ $country->{'name_'.app()->getLocale()} }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="col-md-5 mb-3">
                                        <label for="validationServer04">@lang('app.city')</label>

                                        <select class="form-control" name="city_id" id="city_id">

                                            @if ($errors->any())
                                                <option value="{{old('city_id')}}">{{\App\City::find(old('city_id'))->{'name_'.app()->getLocale()}  }}</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-md-5 mb-3">
                                        <label >@lang('app.current address en')</label>

                                        <textarea class="form-control" name="address_desc_en" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 58px;" >{{old('address_desc_en')}}</textarea>
                                    </div>

                                    <div class="col-md-5 mb-3">
                                        <label >@lang('app.current address ar')</label>

                                        <textarea class="form-control" name="address_desc_ar" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 58px;" >{{old('address_desc_ar')}}</textarea>
                                    </div>

                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.telphones')</label>
                                    <textarea class="form-control" name="telphones">{{old('telphones')}}</textarea>
                                </div>



                                <div class="col-md-10 mb-3 ">
                                    <input type="submit" class="btn btn-primary float-right"   value="@lang('app.save')">
                                </div>

                            </div>
                        </form>
                    </div>
                    @endif


                </div>
            </div>
        </div>

    </div>
</div>

@endsection



@section('js')

@include('layouts.pattern_crud')

<script>

    function GetCities(country_id){
            document.getElementById('city_id').textContent = '';



            $.get("{{url('cities')}}" + "/" + country_id,function (one,two){
                //console.log(JSON.parse(one.trim()));
                var cities = JSON.parse(one.trim());
                var select = document.getElementById('city_id');



                for(var i = 0 ; i< cities.length ; i++){
                    var option   =document.createElement('option');
                    option.value =cities[i]['id'];
                    option.text  =cities[i]['name_'+"{{app()->getLocale()}}"];
                    select.appendChild(option);
                }
            });
        }

        GetCities($("select[name='country_id']").val())

        function GetBranch(company_id){
            document.getElementById('branch_id').textContent = '';



            $.get("{{url('branchs')}}" + "/" + company_id,function (one,two){
                //console.log(JSON.parse(one.trim()));
                var branchs = JSON.parse(one.trim());
                var select = document.getElementById('branch_id');



                for(var i = 0 ; i< branchs.length ; i++){
                    var option   =document.createElement('option');
                    option.value =branchs[i]['id'];
                    option.text  =branchs[i]['name_branch_'+"{{app()->getLocale()}}"];
                    select.appendChild(option);
                }
            });
        }





</script>

<script>


@if($company)
  $("input,textarea,select").attr('disabled',true);

  function edit(){
    $("input,textarea,select").attr('disabled',false);
    $(".btnSave").removeClass('d-none');
    $(".btnEdit").addClass('d-none');
    $("input[name=logo]").removeClass('d-none');
}
@endif




</script>

<script>
logo.onchange = evt => {
  const [file] = logo.files
  if (file) {
    imgShow.src = URL.createObjectURL(file)
  }
}
</script>

@endsection
