@extends('layouts.application')



@section('title')

Create Employee
@endsection

@section('css')
@endsection



@section('content')


<div class="content-wrapper">
    <div class="content">

            <form class="form-row" method="POST"  action="{{route('store.employee')}}"  enctype="multipart/form-data">

                @csrf

                {{------------personal information----------------}}
                <div class="col-lg-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom bg-primary">
                            <h2>@lang('app.personal information')</h2>
                            <input  type="file" id="avatar"  name="avatar" class="btn btn-md ml-auto btn-warning d-none form-control" placeholder="dd" />
                            <label  for='avatar' class="ml-auto">
                                <img   src="http://localhost/hr/public/assets/img/user/user.png" class="user-image ml-auto" alt="User Image">
                            </label>

                        </div>
                        <div class="card-body">
                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
                                        <label >@lang('app.full name by english')<i class="text-danger">*</i></label>
                                        <input type="text" name="full_name_en"  class="form-control removeError"  placeholder="@lang('app.full name by english')" value="{{old('full_name_en')}}" ="">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label >@lang('app.full name by arabic')<i class="text-danger">*</i></label>
                                        <input type="text" name="full_name_ar"  class="form-control"  placeholder="@lang('app.full name by arabic')" value="{{old('full_name_ar')}}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label >@lang('app.national id')<i class="text-danger">*</i></label>
                                        <input type="text" name="national_id" value="{{old('national_id')}}"  class="form-control"  data-mask="9999 9999 9999 9999" placeholder="@lang('app.national id')" aria-label="" autocomplete="off" maxlength="19" ="">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>@lang('app.national_card_Release_date')<i class="text-danger">*</i></label>
                                        <input type="text" name="national_card_Release_date" value="{{old('national_card_Release_date')}}" class="form-control" data-mask="00-00-0000" placeholder="" aria-label="" autocomplete="off" maxlength="10">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label >@lang('app.national card img')<i class="text-danger">*</i></label>
                                        <input type="file" name="national_card_img" value="{{old('national_card_img')}}"  class="form-control-file"  placeholder="@lang('app.national card img')" >
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>@lang('app.passport_id')</label>
                                        <input type="text" name="passport_id" value="{{old('passport_id')}}" class="form-control" data-mask="9999 9999 9999 9999" placeholder="@lang('app.passport_id')" aria-label="" autocomplete="off" maxlength="19">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>@lang('app.passport_release_date')</label>
                                        <input type="text" name="passport_release_date" value="{{old('passport_release_date')}}" class="form-control" data-mask="00-00-0000" placeholder="" aria-label="" autocomplete="off" maxlength="10">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label>@lang('app.passport_expire_date')</label>
                                        <input type="text" name="passport_expire_date" value="{{old('passport_expire_date')}}" class="form-control" data-mask="00-00-0000" placeholder="" aria-label="" autocomplete="off" maxlength="10">
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
                                                    <input type="radio" name="genderCheeck" value="M" onchange="$('[name=gender]').val(this.value); $('[name=gender]').click()" @if($errors->any()) @if(old('gender') == 'M') checked @endif  @endif >
                                                    <div class="control-indicator"></div>
                                                </label>
                                            </li>
                                            <li class="d-inline-block ">
                                                <label class="control control-radio">@lang('app.female')
                                                    <input type="radio" name="genderCheeck" value="F" onchange="$('[name=gender]').val(this.value); $('[name=gender]').click()" @if($errors->any()) @if(old('gender') == 'F') checked @endif  @endif >
                                                    <div class="control-indicator"></div>
                                                </label>
                                            </li>
                                        </ul>
                                        <input type="hidden" class="form-control" name="gender" value="@if($errors->any()) @if(old('gender') == 'M') M @elseif (old('gender') == 'F') F @endif  @endif"/>
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label>@lang('app.age')<i class="text-danger">*</i></label>
                                        <input type="text" name="age" value="{{old('age')}}" class="form-control"  placeholder="@lang('app.age')" maxlength="3">
                                    </div>


                                    <div class="col-md-5 mb-3">
                                        <label>@lang('app.military_services')<i class="text-danger">*</i></label>

                                        <select class="form-control" name="military_services_id">

                                            @foreach(\App\MilitaryService::get() as $ms)
                                            <option value="{{$ms->id}}">{{ $ms->{'name_'.app()->getLocale()} }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label>@lang('app.marital_statuses')<i class="text-danger">*</i></label>

                                        <select class="form-control" name="marital_statuses_id">

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



                                    <div class="col-md-6 mb-3">
                                        <label>@lang('app.email')<i class="text-danger">*</i></label>
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control"  placeholder="@lang('app.email')">
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label>@lang('app.phones')<i class="text-danger">*</i></label>
                                        <i id="phBtn" class="btn btn-block btn-primary"> @lang('app.add phone') <i class="mdi mdi-plus"></i>  </i>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>@lang('app.phones')<i class="text-danger">*</i></label>
                                        <input type="text" id="phInp"  class="form-control" data-mask="(999) 999-99999" placeholder="" aria-label="" autocomplete="off" maxlength="14">
                                    </div>
                                </div>

                                <div class="form-row" id="phones">

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

                                        @if ($errors->any())
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

                                    <div class="col-md-6 mb-3">
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

                                    <div class="col-md-6 mb-3">
                                        <label >@lang('app.education add')</label>
                                        <a class="btn btn-primary form-control" href="#"> @lang('app.add') </a>
                                    </div>


                                </div>

                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
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

                                    <div class="col-md-6 mb-3">
                                        <label >@lang('app.degree add')</label>
                                        <a class="btn btn-primary form-control" href="#"> @lang('app.add') </a>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="col-md-6 mb-3">
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

                                    <div class="col-md-6 mb-3">
                                        <label >@lang('app.level experience add')</label>
                                        <a class="btn btn-primary form-control" href="#"> @lang('app.add') </a>
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


                                    <div class="col-md-6 mb-3">
                                        <label >@lang('app.jop')<i class="text-danger">*</i></label>
                                        <select name="jop_id" class="form-control">

                                            @if ($errors->any())
                                            <option value="{{old('jop_id')}}">{{\App\Jop::find(old('jop_id'))->{'name_'.app()->getLocale()}  }}</option>
                                            @endif

                                            @foreach (App\Jop::get() as $jop)

                                                <option value="{{$jop->id}}">{{$jop->{'name_'.app()->getlocale()} }}</option>

                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label >@lang('app.jop add')</label>
                                        <a class="btn btn-primary form-control" href="#"> @lang('app.add') </a>
                                    </div>





                            </div>

                            <div class="form-row">


                                <div class="col-md-6 mb-3">
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

                                <div class="col-md-6 mb-3">
                                    <label >@lang('app.add type work')</label>
                                    <a class="btn btn-primary form-control" href="#"> @lang('app.add') </a>
                                </div>





                        </div>



                            <div class="form-row">

                                <div class="col-md-4 mb-3">
                                    <label>@lang('app.company')<i class="text-danger">*</i></label>

                                    <select class="form-control" onchange="GetBranch(this.value)" name="company_id" id="copmany_id" >

                                        @if ($errors->any())
                                        <option value="{{old('company_id')}}">{{\App\Company::find(old('company_id'))->{'name_company_'.app()->getLocale()}  }}</option>
                                        @endif

                                        @foreach(\App\Company::get() as $company)
                                        <option value="{{$company->id}}">{{ $company->{'name_company_'.app()->getLocale()} }}</option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-md-4 mb-3">
                                    <label >@lang('app.branch')<i class="text-danger">*</i></label>



                                    <select class="form-control" name="branch_id" id="branch_id">
                                        @if ($errors->any())
                                        <option value="{{old('branch_id')}}">{{\App\CompanyBranch::find(old('branch_id'))->{'name_branch_'.app()->getLocale()}  }}</option>
                                        @endif


                                    </select>
                                </div>


                                <div class="col-md-4 mb-3">
                                    <label>@lang('app.company departement')<i class="text-danger">*</i></label>

                                    <select class="form-control"  name="comapny_departments_id"  >

                                        @if ($errors->any())
                                        <option value="{{old('comapny_departments_id')}}">{{\App\ComapnyDepartment::find(old('comapny_departments_id'))->{'depart_'.app()->getLocale()}  }}</option>
                                        @endif

                                        @foreach(\App\ComapnyDepartment::get() as $depart)
                                        <option value="{{$depart->id}}">{{ $depart->{'depart_'.app()->getLocale()} }}</option>
                                        @endforeach

                                    </select>

                                </div>





                            </div>


                            <div class="form-row justify-content-md-center">
                                <div class="col-md-4 col-md-offset-1-and-half">
                                    <label>@lang('app.jop level')<i class="text-danger">*</i></label>

                                    <select class="form-control" onchange=""  name="jop_level_id" id="jop_level_id"  >

                                        @if ($errors->any())
                                        <option value="{{old('jop_level_id')}}">{{\App\JopLevel::find(old('jop_level_id'))->{'level_'.app()->getLocale()}  }}</option>
                                        @endif

                                        @foreach(\App\JopLevel::get() as $jopLevel)
                                        <option value="{{$jopLevel->id}}">{{ $jopLevel->{'level_'.app()->getLocale()} }}  ({{$jopLevel->number}}) </option>
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
                                    <label >Employee</label>
                                    <input type="text" id="em" class="form-control" disabled>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label >@lang('app.responsible for')<i class="text-danger">*</i></label>

                                    <select class="form-control" name="select_For_employee" id="select_For_employee">

                                        @if ($errors->any())
                                        <option value=""></option>
                                        @endif

                                    </select>
                                </div>


                            </div>








                        </div>
                    </div>
                </div>

                {{----------number of file----------------}}

                <div class="col-lg-12">
                    <div class="card card-default">

                        <div class="card-header card-header-border-bottom bg-primary">
                            <h2>@lang('app.file name and number')</h2>
                            <input  type="text" class="btn btn-md ml-auto form-control" name="number_file" />
                        </div>

                    </div>

                </div>



                <button class="btn btn-primary btn-lg btn-block" type="submit">@lang('app.submit')</button>

            </form>

    </div>
</div>

@endsection



@section('js')

{{------------

<div class="col-md-2 mb-3">
    <div class="btn-group-sm mb-1">
        <input type="hidden" class="border-0" name="phones[]" value="(012) 879-17557"  />
        <button type="button" class="btn btn-outline-info">(012) 879-17557</button>
        <button type="button" onclick="this.parentNode.remove()" class="btn btn-outline-danger">X</button>
    </div>
</div>
    -----------}}

<script>

    $('input[value=F]').on('change',function(){
        $('select[name=military_services_id]').attr('disabled',true)
    })

    $('input[value=M]').on('change',function(){
        $('select[name=military_services_id]').attr('disabled',false)
    })

</script>



<script>


function createPhone(appendClassId,value){

let parent1 = document.createElement('div')
parent1.classList = 'col-md-2 mb-3'

let parent2 = document.createElement('div')
parent2.classList = 'btn-group-sm mb-1'

let input = document.createElement('input')
input.classList = 'border-0'
input.type = 'hidden'
input.name = 'phones[]'
input.value = value


let button1 = document.createElement('button')
button1.classList = 'btn btn-outline-info'
button1.type = 'button'
button1.innerHTML = value

let button2 = document.createElement('button')
button2.classList = 'btn btn-outline-danger'
button2.type = 'button'
button2.innerHTML = "X"
button2.onclick = function(){
    //alert('dfsfdf')
    this.parentNode.remove()
}

parent2.appendChild(input)
parent2.appendChild(button1)
parent2.appendChild(button2)

parent1.appendChild(parent2)

document.getElementById(appendClassId).appendChild(parent1)
//console.log(parent1);
}

//createPhone('phones','55959595595');
</script>


<script>
    let submit = document.getElementById('phBtn')
    let inputPhone = document.getElementById('phInp')

    submit.onclick = ()=>{
        if(inputPhone.value != '' ){createPhone('phones',inputPhone.value)}
    }
</script>


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


    GetBranch($("select[name='company_id']").val())



</script>



<script>

//levelJopId(1)



    function levelJopId(department_id,LevelId){




        $.get("{{url('levelJopId')}}" + "/" + department_id + "/" + LevelId ,function (one,two){
            //console.log(JSON.parse(one.trim())[0]);

            var Responsible_From_employee = JSON.parse(one.trim())[0];
            var Responsible_for_employee = JSON.parse(one.trim())[1];


            var select_From_employee = document.getElementById('select_From_employee');
            var select_for_employee = document.getElementById('select_for_employee');


           select_From_employee.textContent = '';
           for(var i = 0 ; i< Responsible_From_employee.length ; i++){
                var option   =document.createElement('option');
                option.value =Responsible_From_employee[i]['id'];
                option.text  =Responsible_From_employee[i]['full_name_'+"{{app()->getLocale()}}"];
                select_From_employee.appendChild(option);
            }







        });
    }



levelJopId($("select[name='comapny_departments_id']").val(),$("select[name='jop_level_id']").val())



$('#jop_level_id').change(()=>{
    levelJopId($("select[name='comapny_departments_id']").val(),$("select[name='jop_level_id']").val())
})

</script>



{{-----------
<div class="invalid-feedback">
Please choose a username.
</div>

    --------}}

<script>

function makeError(nameInput,errorInput,oldValue){
    let div = document.createElement('div');
    div.classList = 'invalid-feedback'
    div.textContent = errorInput

     $('[name='+nameInput+']').addClass("removeError is-invalid")
     $('[name='+nameInput+']').val(oldValue)

     $('[name='+nameInput+']').after(div)

}






</script>

@if($errors->any())
    @foreach($errors->getMessages() as $key => $error)
        <script> makeError('{{$key}}','{{$error[0]}}','{{old($key)}}') </script>
    @endforeach
@endif


@endsection

