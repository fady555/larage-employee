@extends('layouts.application')



@section('title')
    @if(in_array('show-companies-branch',request()->segments()))@lang('app.branch')
      @elseif (in_array('edit-company-branch',request()->segments()))@lang('app.edit branch')
    @endif
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


        @if(in_array('show-companies-branch',request()->segments()))
        {{--------ADD-------}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.add branch')</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('store.company.branch')}}">
                            @csrf
                            <div class="form-row">


                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.name_branch_en')</label>
                                    <input type="text" name="name_branch_en" value="{{old('name_branch_en')}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.name_branch_ar')</label>
                                    <input type="text" name="name_branch_ar" value="{{old('name_branch_ar')}}" class="form-control"   value="">
                                </div>

                                <div class="card-header card-header-border-buttom">
                                    <h1>@lang('app.company branch address')</h1>
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


                                <div class="col-md-10 mb-3">
                                    <input type="submit" class="btn btn-primary "  value="@lang('app.add')">
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        @elseif (in_array('edit-company-branch',request()->segments()))
        {{-------EDIT-----------}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.edit branch')</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('update.company.branch',$branch->id)}}">
                            @csrf
                            <div class="form-row">

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.name_branch_en')</label>
                                    <input type="text" name="name_branch_en" value="{{old('name_branch_en',$branch->name_branch_en)}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.name_branch_ar')</label>
                                    <input type="text" name="name_branch_ar" value="{{old('name_branch_ar',$branch->name_branch_ar)}}" class="form-control"   value="">
                                </div>

                                <div class="card-header card-header-border-bottom">
                                    <h1>@lang('app.company branch address')</h1>
                                </div>

                                <div class="form-row">

                                    <div class="col-md-5 mb-3">
                                        <label>@lang('app.country')</label>

                                        <select class="form-control" onchange="GetCities(this.value)" name="country_id" id="country_id" >

                                            @if ($errors->any())
                                                <option value="{{old('country_id')}}">{{\App\Country::find(old('country_id'))->{'name_'.app()->getLocale()}  }}</option>
                                            @endif

                                            <option value="{{$branch->address->country_id}}">{{ $branch->address->country->{'name_'.app()->getLocale()} }}</option>


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

                                        <textarea class="form-control" name="address_desc_en" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 58px;" >{{old('address_desc_en',$branch->address->address_desc_en)}}</textarea>
                                    </div>

                                    <div class="col-md-5 mb-3">
                                        <label >@lang('app.current address ar')</label>

                                        <textarea class="form-control" name="address_desc_ar" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 58px;" >{{old('address_desc_ar',$branch->address->address_desc_ar)}}</textarea>
                                    </div>

                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.telphones')</label>
                                    <textarea class="form-control" name="telphones">{{old('telphones',$branch->telphones)}}</textarea>
                                </div>

                                <div class="col-md-10 mb-3">
                                    <input type="submit" class="btn btn-primary "  value="@lang('app.edit')">
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endif





        {{---TABLE SHOW ----}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom ">
                        <h2>@lang('app.branch')</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center ">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">@lang('app.name_branch_en')</th>
                                    <th scope="col">@lang('app.name_branch_ar')</th>
                                    <th scope="col">@lang('app.address')</th>
                                    <th scope="colCompanyBranch">@lang('app.telphones')</th>
                                    <th scope="col">@lang('app.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branchs as $branch)
                                <tr>
                                    <td>{{$branch->name_branch_en}}</td>
                                    <td>{{$branch->name_branch_ar}}</td>
                                    <td>
                                        <div class="dropdown d-inline-block mb-1 ">
                                            <button class="btn btn-primary  dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static">
                                                @lang('app.address')
                                            </button>
                                            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="javascript:;">{{$branch->address->country->{'name_'.app()->getlocale()} }}</a>
                                                <a class="dropdown-item" href="javascript:;">@if(!is_null($branch->address->city )) {{$branch->address->city->{'name_'.app()->getlocale()} }}@endif</a>
                                                <a class="dropdown-item" href="javascript:;" onClick="this.setSelectionRange(0, this.value.length)">{{$branch->address->{'address_desc_'.app()->getlocale()} }}</a>
                                            </div>
                                        </div>
                                    </td>

                                    <td >{{$branch->telphones}}</td>
                                    <td>
                                        <button  class="mb-1 btn btn-sm btn-primary">
                                            <i class=" mdi mdi-square-edit-outline mr-1"></i>
                                            <a href="{{route('edit.company.branch',[$branch->id])}}" class="text-dark">@lang('app.edit')</a>
                                        </button>

                                        <button  class="mb-1 btn btn-sm btn-danger">
                                            <i class=" mdi mdi-delete mr-1"></i>
                                            <a href="javascript:;" onclick="deleteEle('{{route('delete.company.branch',[$branch->id])}}','{{route('show.companies.branchs')}}')" class="text-dark">@lang('app.delete')</a>
                                        </button>
                                     </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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

@endsection

