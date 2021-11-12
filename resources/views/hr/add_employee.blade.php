@extends('layouts.application')



@section('title')
   @lang('app.add employee')
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


        {{--------ADD-------}}
        <form class="form-row" method="POST"  action="{{route('store.employee')}}" runat="server" enctype="multipart/form-data">
            @csrf

            {{------------personal information----------------}}
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom bg-primary">
                        <h2>@lang('app.personal information')</h2>
                        <input  type="file"  accept="image/*" id="avatar"  name="avatar" class="btn btn-md ml-auto btn-warning d-none form-control" placeholder="dd" />

                        <label  for='avatar' class="ml-auto">

                            <img src="{{ asset('/public/assets/img/user/tdi3NGa.png') }}" width="70px" id='imgShow' class="user-image ml-auto" alt="User Image">

                            <div class="text-warning">@lang('app.choose avatar')</div>
                        </label>

                    </div>
                    <div class="card-body">
                            <div class="form-row">

                                <div class="col-md-6 mb-3">
                                    <label >@lang('app.full name by english')<i class="text-danger">*</i></label>
                                    <input type="text" name="full_name_en"  class="form-control removeError"  placeholder="@lang('app.full name by english')" value="{{old('full_name_en')}}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label >@lang('app.full name by arabic')<i class="text-danger">*</i></label>
                                    <input type="text" name="full_name_ar"  class="form-control"  placeholder="@lang('app.full name by arabic')" value="{{old('full_name_ar')}}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label >@lang('app.national id')<i class="text-danger">*</i></label>
                                    <input type="text" name="national_id" value="{{old('national_id')}}"  class="form-control"  data-mask="9999999999999999" placeholder="@lang('app.national id')" aria-label="" autocomplete="off" maxlength="19" ="">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label>@lang('app.national_card_Release_date')<i class="text-danger">*</i></label>
                                    <input type="text" name="national_card_Release_date" value="{{old('national_card_Release_date')}}" class="form-control" data-mask="0000-00-00" placeholder="" aria-label="" autocomplete="off" maxlength="10">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <input type="file"  accept="image/*" id='card' name="national_card_img" value="{{old('national_card_img')}}"  class="form-control-file d-none"  placeholder="@lang('app.national card img')" >

                                    <label for="card" class="ml-auto">
                                        <img src="{{ asset('/public/assets/img/user/tdi3NGa.png') }}" width="70px" id='cardShow' class="user-image ml-auto" alt="User Image">
                                        <div>@lang('app.national card img')</div>
                                    </label>

                                </div>



                                <div class="col-md-6 mb-3">
                                    <label>@lang('app.passport_id')</label>
                                    <input type="text" name="passport_id" value="{{old('passport_id')}}" class="form-control"  placeholder="@lang('app.passport_id')"  autocomplete="off">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label>@lang('app.passport_release_date')</label>
                                    <input type="text" name="passport_release_date" value="{{old('passport_release_date')}}" class="form-control" data-mask="0000-00-00" placeholder="" aria-label="" autocomplete="off" maxlength="10">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>@lang('app.passport_expire_date')</label>
                                    <input type="text" name="passport_expire_date" value="{{old('passport_expire_date')}}" class="form-control" data-mask="0000-00-00" placeholder="" aria-label="" autocomplete="off" maxlength="10">
                                </div>

                                <div class="col-md-5 mb-3">
                                    <label>@lang('app.nationality')<i class="text-danger">*</i></label>

                                    <select class="form-control" name="nationality_id">

                                        @if ($errors->any())
                                        <option value="{{old('nationality_id')}}">{{\App\Nationality::find(old('nationality_id'))->{'country_'.app()->getLocale().'Name'}  }}</option>
                                        @endif

                                        @foreach(\App\Nationality::get() as $ms)
                                        <option value="{{$ms->id}}">{{ $ms->{'country_'.app()->getLocale().'Name'} }}</option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-md-12">
                                    <label>@lang('app.gender')<i class="text-danger">*</i></label>

                                    <ul class="list-unstyled list-inline">

                                        <li class="d-inline-block mr-3">
                                            <label class="control control-radio">@lang('app.male')
                                                <input type="radio" name="genderCheeck" value="M" onchange="$('[name=gender]').val(this.value); $('[name=gender]').click()"  @if(old('gender') == 'M') checked @endif    >
                                                <div class="control-indicator"></div>
                                            </label>
                                        </li>

                                        <li class="d-inline-block ">
                                            <label class="control control-radio">@lang('app.female')
                                                <input type="radio" name="genderCheeck" value="F" onchange="$('[name=gender]').val(this.value); $('[name=gender]').click()"  @if(old('gender') == 'F') checked @endif  >
                                                <div class="control-indicator"></div>
                                            </label>
                                        </li>

                                    </ul>
                                    <input type="hidden" class="form-control" name="gender" value="@if($errors->any()) @if(old('gender') == 'M') M @elseif (old('gender') == 'F') F  @endif @endif"  />
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label>@lang('app.age')<i class="text-danger">*</i></label>
                                    <input type="text" name="age" value="{{old('age')}}" class="form-control"  placeholder="@lang('app.age')" maxlength="3">
                                </div>


                                <div class="col-md-5 mb-3">
                                    <label>@lang('app.military_services')<i class="text-danger">*</i></label>

                                    <select class="form-control" name="military_services_id" disabled>

                                        @if ($errors->any() and !is_null(old('military_services_id')))
                                        <option value="{{old('military_services_id')}}">{{\App\MilitaryService::find(old('military_services_id'))->{'name_'.app()->getLocale()}  }}</option>
                                        @endif

                                        @foreach(\App\MilitaryService::get() as $ms)
                                        <option value="{{$ms->id}}">{{ $ms->{'name_'.app()->getLocale()} }}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="col-md-5 mb-3">
                                    <label>@lang('app.marital_statuses')<i class="text-danger">*</i></label>

                                    <select class="form-control" name="marital_statuses_id">

                                        @if ($errors->any())
                                        <option value="{{old('marital_statuses_id')}}">{{\App\MaritalStatus::find(old('marital_statuses_id'))->{'name_'.app()->getLocale()}  }}</option>
                                        @endif

                                        @foreach(\App\MaritalStatus::get() as $ms)
                                        <option value="{{$ms->id}}">{{ $ms->{'name_'.app()->getLocale()} }}</option>
                                        @endforeach

                                    </select>

                                </div>


                                <div class="col-md-6 mb-3">
                                    <label>@lang('app.number_of_wif_husband')</label>
                                    <input type="text" name="number_of_wif_husband" value="{{old('number_of_wif_husband')}}" class="form-control" data-mask="99" placeholder="" aria-label="" autocomplete="off" maxlength="2">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>@lang('app.number_of_wif_children')</label>
                                    <input type="text" name="number_of_wif_children" value="{{old('number_of_wif_children')}}" class="form-control" data-mask="99" placeholder="" aria-label="" autocomplete="off" maxlength="2">
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label>@lang('app.name_of_bank')</label>
                                    <input type="text" name="name_of_bank" value="{{old('name_of_bank')}}" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>@lang('app.number_of_account')</label>
                                    <input type="text" name="number_of_account" value="{{old('number_of_account')}}" class="form-control" data-mask="9999-9999-9999-9999" placeholder="" aria-label="" autocomplete="off" maxlength="16">
                                </div>



                                <div class="col-md-9 mb-3">
                                    <label>@lang('app.email')<i class="text-danger">*</i></label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control"  placeholder="@lang('app.email')">
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="validationServer04">@lang('app.country code')</label>

                                    <select class="form-control" id="codes">


                                    <option></option>
                                        @foreach (\App\Country_code_phone::get() as $code)
                                            <option value="{{$code->phonecode}}">{{ $code->name }} ({{$code->phonecode}})</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>@lang('app.phone')<i class="text-danger">*</i></label>
                                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control"   >
                                </div>


                            </div>



                    </div>
                </div>
            </div>

            {{-------address-----------}}
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom bg-primary">
                        <h2>@lang('app.address inofrmations')</h2>
                    </div>
                    <div class="card-body">

                        <div class="form-row">

                            <div class="col-md-6 mb-3">
                                <label>@lang('app.country')<i class="text-danger">*</i></label>

                                <select class="form-control" onchange="GetCities(this.value)" name="country_id" id="country_id" >

                                    @if ($errors->any())
                                        <option value="{{old('country_id')}}">{{\App\Country::find(old('country_id'))->{'name_'.app()->getLocale()}  }}</option>
                                    @endif

                                    @foreach(\App\Country::get() as $country)
                                    <option value="{{$country->id}}">{{ $country->{'name_'.app()->getLocale()} }}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationServer04">@lang('app.city')</label>

                                <select class="form-control" name="city_id" id="city_id">

                                    @if ($errors->any() and !is_null(old('city_id')))
                                    <option value="{{old('city_id')}}">{{\App\City::find(old('city_id'))->{'name_'.app()->getLocale()}  }}</option>
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >@lang('app.current address en')<i class="text-danger">*</i></label>

                                <textarea class="form-control" name="address_desc_en" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 58px;" >{{old('address_desc_en')}}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >@lang('app.current address ar')<i class="text-danger">*</i></label>

                                <textarea class="form-control" name="address_desc_ar" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 58px;" >{{old('address_desc_ar')}}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >@lang('app.national_card_address_description')</label>

                                <textarea class="form-control" name="national_card_address_description" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 58px;">{{old('national_card_address_description')}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label >@lang('app.passport_address_description')</label>

                                <textarea class="form-control" name="passport_address_description" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 58px;">{{old('passport_address_description')}}</textarea>
                            </div>

                        </div>
                            <div class="form-row">


                            </div>
                    </div>
                </div>
            </div>

            {{-------Previous experience and certifications-----------}}
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom bg-primary">
                        <h2>@lang('app.previous experience and certifications')</h2>
                    </div>
                    <div class="card-body">
                            <div class="form-row">

                                <div class="col-md-6 col-sm-6 col-9 mb-3">
                                    <label >@lang('app.education')<i class="text-danger">*</i></label>
                                    <select name="education_status_id" class="form-control">

                                        @if ($errors->any())
                                        <option value="{{old('education_status_id')}}">{{\App\Education::find(old('education_status_id'))->{'education_status_'.app()->getLocale()}  }}</option>
                                        @endif


                                        @foreach (App\Education::get() as $education)

                                            <option value="{{$education->id}}">{{$education->{'education_status_'.app()->getlocale()} }}</option>

                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-6 col-sm-6 col-3 mb-3">
                                    <label >@lang('app.education add')</label>
                                    <a class="btn btn-primary form-control"  href="{{route('show.educations')}}" target='_blanck'> @lang('app.add') </a>
                                </div>


                            </div>

                            <div class="form-row">

                                <div class="col-md-6 col-sm-6 col-9 mb-3">
                                    <label >@lang('app.degree')<i class="text-danger">*</i></label>
                                    <select name="degree_id" class="form-control">


                                        @if ($errors->any())
                                            <option value="{{old('degree_id')}}">{{\App\Degree::find(old('degree_id'))->{'degree_'.app()->getLocale()}  }}</option>
                                        @endif

                                        @foreach (App\Degree::get() as $degree)

                                            <option value="{{$degree->id}}">{{$degree->{'degree_'.app()->getlocale()} }}</option>

                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-6 col-sm-6 col-3 mb-3">
                                    <label >@lang('app.degree add')</label>
                                    <a class="btn btn-primary form-control" href="{{route('show.degrees')}}" target='_blanck'> @lang('app.add') </a>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="col-md-6 col-sm-6 col-9 mb-3">
                                    <label >@lang('app.level experience')<i class="text-danger">*</i></label>
                                    <select name="level_experience_id" class="form-control">


                                        @if ($errors->any())
                                        <option value="{{old('level_experience_id')}}">{{\App\Experience::find(old('level_experience_id'))->{'level_experience_'.app()->getLocale()}  }}</option>
                                        @endif


                                        @foreach (App\Experience::get() as $ex)
                                            <option value="{{$ex->id}}">{{$ex->{'level_experience_'.app()->getlocale()} }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-6 col-sm-6 col-3 mb-3">
                                    <label >@lang('app.level experience add')</label>
                                    <a class="btn btn-primary form-control" href="{{route('show.levels.experiences')}}" target='_blanck'> @lang('app.add') </a>
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label >@lang('app.experience_description')<i class="text-danger">*</i></label>
                                    <textarea class="form-control" name="experience_description" rows="3">{{old('experience_description')}}</textarea>
                                </div>
                            </div>



                    </div>
                </div>
            </div>

            {{-------the data of the job you are applying for-----------}}
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom bg-primary">
                        <h2>@lang('app.the data of the job you are applying for')</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-row">


                                <div class="col-md-6 col-sm-6 col-9 mb-3">
                                    <label >@lang('app.jop')<i class="text-danger">*</i></label>
                                    <select name="jop_id" class="form-control">

                                        @if ($errors->any())
                                        <option value="{{old('jop_id')}}">{{\App\Jop::find(old('jop_id'))->{'name_'.app()->getLocale()}  }}</option>
                                        @endif

                                        @foreach (App\Jop::skip(4)->take(PHP_INT_MAX)->get() as $jop)

                                            <option value="{{$jop->id}}">{{$jop->{'name_'.app()->getlocale()} }}</option>

                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-6 col-sm-6 col-3 mb-3">
                                    <label >@lang('app.jop add')</label>
                                    <a class="btn btn-primary form-control" href="{{route('show.jops')}}"> @lang('app.add') </a>
                                </div>





                        </div>

                        <div class="form-row">


                            <div class="col-md-6 col-sm-6 col-9 mb-3">
                                <label >@lang('app.type work')<i class="text-danger">*</i></label>
                                <select name="type_work_id" class="form-control">

                                    @if ($errors->any())
                                    <option value="{{old('type_work_id')}}">{{\App\Jop::find(old('type_work_id'))->{'work_type_'.app()->getLocale()}  }}</option>
                                    @endif

                                    @foreach (App\TypeWork::get() as $type)

                                        <option value="{{$type->id}}">{{$type->{'work_type_'.app()->getlocale()} }}</option>

                                    @endforeach

                                </select>
                            </div>

                            <div class="col-md-6 col-sm-6 col-3 mb-3">
                                <label >@lang('app.add type work')</label>
                                <a class="btn btn-primary form-control" href="{{route('show.types.work')}}"> @lang('app.add') </a>
                            </div>





                        </div>


                        <div class="form-row">

                            <div class="col-md-6 mb-3">
                                <label >@lang('app.time_of_attendees')<i class="text-danger">*</i></label>
                                <input type="text" name="time_of_attendees" value="{{old('time_of_attendees')}}"  class="form-control time">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label >@lang('app.time_of_go')<i class="text-danger">*</i></label>
                                <input type="text"   name="time_of_go" value="{{old('time_of_go')}}" class="form-control time" >
                            </div>



                            <div class="col-md-6 mb-3">
                                <label >@lang('app.Fixed salary')@lang('app.sar')<i class="text-danger">*</i></label>
                                <input type="number" name="fixed_salary" value="{{old('fixed_salary')}}" class="form-control" min="0000000" max="1000000">
                            </div>
                        </div>


                        <div class="form-row">


                            <div class="col-md-6 col-sm-6 col-9 mb-3">
                                <label >@lang('app.branch')<i class="text-danger">*</i></label>

                                <select class="form-control" name="branch_id" >
                                    @if ($errors->any())
                                        <option value="{{old('branch_id')}}">{{\App\CompanyBranch::find(old('branch_id'))->{'name_branch_'.app()->getLocale()}  }}</option>
                                    @endif

                                    @foreach (\App\CompanyBranch::get() as $branch)
                                        <option value="{{$branch->id}}">{{ $branch->{'name_branch_'.app()->getLocale()}  }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-md-6 col-sm-6 col-3 mb-3">
                                <label >@lang('app.add branch')</label>
                                <a class="btn btn-primary form-control" href="{{route('show.companies.branchs')}}"> @lang('app.add') </a>
                            </div>


                            <div class="col-md-6 col-sm-6 col-9 mb-3">
                                <label>@lang('app.company departement')<i class="text-danger">*</i></label>

                                <select class="form-control" id=''  name="comapny_departments_id"  >

                                    @if ($errors->any())
                                    <option value="{{old('comapny_departments_id')}}">{{\App\ComapnyDepartment::find(old('comapny_departments_id'))->{'depart_'.app()->getLocale()}  }}</option>
                                    @endif

                                    @foreach(\App\ComapnyDepartment::skip(3)->take(PHP_INT_MAX)->get() as $depart)
                                    <option value="{{$depart->id}}">{{ $depart->{'depart_'.app()->getLocale()} }}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="col-md-6 col-sm-6 col-3 mb-3">
                                <label >@lang('app.add depart')</label>
                                <a class="btn btn-primary form-control" href="{{route('show.companies.departments')}}" target="_blanck"> @lang('app.add') </a>
                            </div>

                        </div>

                        <div class="form-row justify-content-md-center">
                            <div class="col-md-4 col-md-offset-1-and-half">
                                <label>@lang('app.jop level')<i class="text-danger">*</i></label>

                                {{----  loded------}}
                                <i class="loaddd mdi mdi-48px mdi-spin mdi-progress-download d-none"></i>
                                {{----  loded------}}


                                <select class="form-control"   name="jop_level_id"  id="jop_level_id">

                                    @if ($errors->any())
                                    <option  value="{{old('jop_level_id')}}">{{\App\JopLevel::find(old('jop_level_id'))->{'level_'.app()->getLocale()}  }}</option>
                                    @endif

                                    @foreach(\App\JopLevel::get() as $jopLevel)

                                        @if ($jopLevel->id > 2 )
                                            <option value="{{$jopLevel->id}}">{{ $jopLevel->{'level_'.app()->getLocale()} }}  ({{$jopLevel->number}}) </option>
                                        @elseif ($jopLevel->id <= 2)
                                            <option disabled value="{{$jopLevel->id}}">{{ $jopLevel->{'level_'.app()->getLocale()} }}  ({{$jopLevel->number}}) </option>
                                        @endif

                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="form-row">

                            <div class="col-md-4 mb-3">
                                <label >@lang('app.responsible from')<i class="text-danger">*</i></label>

                                <select class="form-control" name="select_From_employee" id="select_From_employee">

                                    @if ($errors->any())
                                    <option value=""></option>
                                    @endif

                                </select>

                            </div>

                            <div class="col-md-4 mb-3">
                                <label >.</label>
                                <input type="text" id="em" class="form-control" value="" disabled>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label >@lang('app.responsible for')<i class="text-danger">*</i></label>

                                <select class="form-control" name="select_For_employee[]" id="select_For_employee">

                                    @if ($errors->any())
                                    <option value=""></option>
                                    @endif

                                </select>
                            </div>


                        </div>


                    </div>
                </div>
            </div>

            {{-------attachments---------------------------------------}}
            <div class="col-lg-12">
                <div class="card card-default">

                    <div class="card-header card-header-border-bottom bg-primary">
                        <h2 class="mr-3">@lang('app.file name and number')</h2>
                        <div class="form-row">
                        <input  type="text" name="number_file" value="{{old('number_file')}}" class=" ml-auto  form-control"  />
                        </div>
                    </div>

                </div>

            </div>



            <button type="submit" class="btn btn-primary btn-lg btn-block ">@lang('app.add')</button>

        </form>



    </div>

</div>

@endsection



@section('js')



@include('layouts.js_of_employee_page')


@if($errors->any())
    @foreach($errors->getMessages() as $key => $error)
        <script> makeError('{{$key}}','{{$error[0]}}','{{old($key)}}') </script>
    @endforeach
@endif

<script>

    @if (in_array('edit-hr-helper',request()->segments()))
        $("input,textarea,select").attr('disabled',true);
    @endif

    function edit(){
      $("input,textarea,select").attr('disabled',false);
      $(".btnEdit").addClass('d-none');
      $(".btnSave").removeClass('d-none');
      $(".btnSave").addClass('btn-danger');

    }

    $(".btnEdit").on('click',()=>{
        edit();
    })


</script>




<script>

function checkdirect(branchDir,departmentDir){
    let url = "{{route('cheeck.direct.exist')}}/"+branchDir +"/"+ departmentDir ;

    $.get(url,function (result){
       if(result == 1){

        console.log('exsist direct for that department on that baranch');

        $('#jop_level_id option[value=3]').prop('disabled',true);
        $('#jop_level_id option[value=4]').attr('selected','selected');


       }else{

        console.log('not exsist direct for that department on that baranch');

        $('#jop_level_id option[value=3]').prop('disabled',false);
        //$('#jop_level_id option[value=4]').prop('selected','selected');

        }

    });

}


function getEmployeeFromFor(branch,department,level){
        document.getElementById('select_From_employee').querySelectorAll('*').forEach( n => n.remove() );
        document.getElementById('select_For_employee').querySelectorAll('*').forEach( n => n.remove() );


        let url = "{{route('form.for')}}/"+branch +"/"+ department +"/"+level;

        $.get(url,(array)=>{

            console.log(JSON.parse(array));
            //console.log(JSON.parse(array).for);
            //console.log(JSON.parse(array).from);

            //$('.select_From_employee')
              var from = JSON.parse(array).from;

              for(let i = 0; i < from.length; i++){
                    let option = document.createElement('option');
                    option.value = from[i]['id']
                    option.text = from[i]['full_name_'+'{{app()->getlocale()}}']
                    document.getElementById('select_From_employee').appendChild(option);
                }

            //$('.select_For_employee')
              var forEmployee = JSON.parse(array).for;

              for(let i = 0; i < forEmployee.length; i++){
                    let option = document.createElement('option');
                    option.value = forEmployee[i]['id']
                    option.text = forEmployee[i]['full_name_'+'{{app()->getlocale()}}']
                    document.getElementById('select_For_employee').appendChild(option);
                }

        });


    }





</script>






<script>

    $('#jop_level_id').change(function(){
        getEmployeeFromFor($("select[name=branch_id]").val(),$("select[name=comapny_departments_id]").val(),this.value)
    });

   $('select[name=comapny_departments_id],select[name=branch_id]').change(function (){
        checkdirect($("select[name=branch_id]").val(),$("select[name=comapny_departments_id]").val());

        $('.loaddd').removeClass('d-none');

        setTimeout(() => {
            getEmployeeFromFor($("select[name=branch_id]").val(),$("select[name=comapny_departments_id]").val(),$('#jop_level_id').val());
            $('.loaddd').addClass('d-none');

        }, 300);

   });




   /*$('#jop_level_id').on('change','select',function(){
        getEmployeeFromFor($("select[name=branch_id]").val(),$("select[name=comapny_departments_id]").val(),this.value)
    });*/


   //getEmployeeFromFor($("select[name=branch_id]").val(),$("select[name=comapny_departments_id]").val(),$("select[name=jop_level_id]").val());

   //checkdirect($("select[name=branch_id]").val(),$("select[name=comapny_departments_id]").val());
   //getEmployeeFromFor($("select[name=branch_id]").val(),$("select[name=comapny_departments_id]").val(),$("select[name=jop_level_id]").val());


</script>


@endsection

