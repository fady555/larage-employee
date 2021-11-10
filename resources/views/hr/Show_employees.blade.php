@extends('layouts.application')



@section('title')
@endsection

@section('css')
@endsection



@section('content')


<div class="content-wrapper">
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.search')</h2>
                    </div>
                    <div class="card-body">
                        <form method="get" id="search" action="{{route('search.employees')}}">
                            <div class="form-row">

                                    <div class="col-md-6 mb-3">
                                        <label >@lang('app.name')<i class="text-danger">*</i></label>
                                        <input type="text" name="name"  class="form-control removeError"  placeholder="@lang('app.name')" value="{{old('name')}}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label >@lang('app.national id')<i class="text-danger">*</i></label>
                                        <input type="text" name="national_id" value="{{old('national_id')}}"  class="form-control"  data-mask="9999999999999999" placeholder="@lang('app.national id')" aria-label="" autocomplete="off" maxlength="19" ="">
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

                                    <div class="col-md-3 mb-3">
                                        <label>@lang('app.age')<i class="text-danger">*</i></label>
                                        <input type="text" name="age" value="{{old('age')}}" class="form-control"  placeholder="@lang('app.age')" maxlength="3">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>@lang('app.passport_id')</label>
                                        <input type="text" name="passport_id" value="{{old('passport_id')}}" class="form-control"  placeholder="@lang('app.passport_id')"  autocomplete="off">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>@lang('app.nationality')<i class="text-danger">*</i></label>

                                        <select class="form-control" name="nationality_id">

                                            @if ($errors->any())
                                            <option value="{{old('nationality_id')}}">{{\App\Nationality::find(old('nationality_id'))->{'country_'.app()->getLocale().'Name'}  }}</option>
                                            @endif

                                            <option></option>


                                            @foreach(\App\Nationality::get() as $ms)
                                            <option value="{{$ms->id}}">{{ $ms->{'country_'.app()->getLocale().'Name'} }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>@lang('app.military_services')<i class="text-danger">*</i></label>

                                        <select class="form-control" name="military_services_id">

                                            <option></option>

                                            @foreach(\App\MilitaryService::get() as $ms)
                                            <option value="{{$ms->id}}">{{ $ms->{'name_'.app()->getLocale()} }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>@lang('app.marital_statuses')<i class="text-danger">*</i></label>

                                        <select class="form-control" name="marital_statuses_id">

                                            @if ($errors->any())
                                            <option value="{{old('marital_statuses_id')}}">{{\App\MaritalStatus::find(old('marital_statuses_id'))->{'name_'.app()->getLocale()}  }}</option>
                                            @endif

                                            <option></option>

                                            @foreach(\App\MaritalStatus::get() as $ms)
                                            <option value="{{$ms->id}}">{{ $ms->{'name_'.app()->getLocale()} }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>@lang('app.name_of_bank')</label>
                                        <input type="text" name="name_of_bank" value="{{old('name_of_bank')}}" class="form-control">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>@lang('app.number_of_account')</label>
                                        <input type="text" name="number_of_account" value="{{old('number_of_account')}}" class="form-control" data-mask="9999-9999-9999-9999" placeholder="" aria-label="" autocomplete="off" maxlength="16">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>@lang('app.email')<i class="text-danger">*</i></label>
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control"  placeholder="@lang('app.email')">
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label>@lang('app.phone')<i class="text-danger">*</i></label>
                                        <input type="text" name="phone" value="{{old('phone')}}" class="form-control"   >
                                    </div>

                                    <div class="col-md-3 col-sm-6 col-9 mb-3">
                                        <label >@lang('app.level experience')<i class="text-danger">*</i></label>
                                        <select name="level_experience_id" class="form-control">


                                            @if ($errors->any())
                                            <option value="{{old('level_experience_id')}}">{{\App\Experience::find(old('level_experience_id'))->{'level_experience_'.app()->getLocale()}  }}</option>
                                            @endif

                                            <option></option>

                                            @foreach (App\Experience::get() as $ex)
                                                <option value="{{$ex->id}}">{{$ex->{'level_experience_'.app()->getlocale()} }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-3 col-sm-6 col-9 mb-3">
                                        <label >@lang('app.jop')<i class="text-danger">*</i></label>
                                        <select name="jop_id" class="form-control">

                                            @if ($errors->any())
                                            <option value="{{old('jop_id')}}">{{\App\Jop::find(old('jop_id'))->{'name_'.app()->getLocale()}  }}</option>
                                            @endif

                                            <option></option>


                                            @foreach (App\Jop::skip(4)->take(PHP_INT_MAX)->get() as $jop)

                                                <option value="{{$jop->id}}">{{$jop->{'name_'.app()->getlocale()} }}</option>

                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-3 col-sm-6 col-9 mb-3">
                                        <label >@lang('app.type work')<i class="text-danger">*</i></label>
                                        <select name="type_work_id" class="form-control">

                                            @if ($errors->any())
                                            <option value="{{old('type_work_id')}}">{{\App\Jop::find(old('type_work_id'))->{'work_type_'.app()->getLocale()}  }}</option>
                                            @endif

                                            <option></option>

                                            @foreach (App\TypeWork::get() as $type)

                                                <option value="{{$type->id}}">{{$type->{'work_type_'.app()->getlocale()} }}</option>

                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-3 col-sm-6 col-9 mb-3">
                                        <label >@lang('app.branch')<i class="text-danger">*</i></label>

                                        <select class="form-control" name="branch_id" >
                                            @if ($errors->any())
                                                <option value="{{old('branch_id')}}">{{\App\CompanyBranch::find(old('branch_id'))->{'name_branch_'.app()->getLocale()}  }}</option>
                                            @endif

                                            <option></option>

                                            @foreach (\App\CompanyBranch::get() as $branch)
                                                <option value="{{$branch->id}}">{{ $branch->{'name_branch_'.app()->getLocale()}  }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-3 col-sm-6 col-9 mb-3">
                                        <label>@lang('app.company departement')<i class="text-danger">*</i></label>

                                        <select class="form-control" id=''  name="comapny_departments_id"  >

                                            @if ($errors->any())
                                            <option value="{{old('comapny_departments_id')}}">{{\App\ComapnyDepartment::find(old('comapny_departments_id'))->{'depart_'.app()->getLocale()}  }}</option>
                                            @endif

                                            <option></option>

                                            @foreach(\App\ComapnyDepartment::skip(3)->take(PHP_INT_MAX)->get() as $depart)
                                            <option value="{{$depart->id}}">{{ $depart->{'depart_'.app()->getLocale()} }}</option>
                                            @endforeach

                                        </select>

                                    </div>



                                    <button onclick="event.preventDefault();search()" class="btn btn-primary btn-lg btn-block btnEdit">@lang('app.search')</button>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>
                            @lang('app.results')
                            <i class="loaddd mdi mdi-48px mdi-spin mdi-progress-download d-none "></i>
                        </h2>
                    </div>

                    <div class="card-body slim-scroll" id="emSearch">








                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection



@section('js')


<script>


function employee(id,name,avatar){

            let parentDiv = document.createElement('div');
            parentDiv.className = "media py-3 align-items-center justify-content-between";

            let divImg = document.createElement('div');
            divImg.className  = "d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary  text-white";

            var  img = document.createElement('img');
            img.className  = "user-image ml-auto bo rounded-circle";
            img.style.width = "70px";


            if(img == null){
                img.src = "{{ asset('/public/assets/img/user/tdi3NGa.png') }}";

            }else{
                img.src = "{{ URL("/img/")}}" +"/"+avatar;
            }

            divImg.appendChild(img);


            let link = document.createElement("a");
            link.className  = "mt-0 mb-1 font-size-20 text-dark";
            link.href = "{{route('edit.employee')}}"+"/"+id;
            link.textContent =name;

            let divName = document.createElement('div');
            divName.className  = "media-body pr-3";
            divName.appendChild(link);





            let span = document.createElement('span');
            span.className = "font-size-20 d-inline-block";

            link_show = document.createElement('a');
            link_show.href = "{{route('edit.employee')}}"+"/"+id;
            link_show.innerHTML = "<i class='mdi mdi-square-edit-outline'></i>";

            link_edit = document.createElement('a');
            link_edit.href = "{{route('edit.employee')}}"+"/"+id;
            link_edit.innerHTML = "<i class='mdi mdi-eye'></i>";

            link_delete = document.createElement('a');
            link_delete.onclick = function (){deleteEle("{{route('delete.employee')}}"+"/"+id,"{{route('show.employees')}}");}
            link_delete.innerHTML = "<i class='mdi mdi-delete-circle-outline text-danger'></i>";
            link_delete.href = "javascript:;";

            span.appendChild(link_show);
            span.appendChild(link_edit);
            span.appendChild(link_delete);



            parentDiv.appendChild(divImg);
            parentDiv.appendChild(divName);
            parentDiv.appendChild(span);


            document.getElementById('emSearch').appendChild(parentDiv);

            //return parentDiv;

}


function search(){

    //console.log(data);
    $('.loaddd').removeClass('d-none');

    $.ajax({

        type: 'GET',
        url: "{{route('search.employees')}}",
        data: $('#search').serialize(),
        success: function(data){
            //console.log(data['data'][0]['full_name_en']);

            $("#emSearch").empty();

           for(let i = 0 ; i < data['data'].length ; i++){
                employee(data['data'][i]['id'],data['data'][i]['full_name_'+"{{app()->getlocale()}}"],data['data'][i]['avatar']);
           }

           $('.loaddd').addClass('d-none');

        }

    });


}




</script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>



    function deleteEle(link,afterDeletelink){
        Swal.fire({
        title: "@lang('app.sure')",
        text: "@lang('app.revert')",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "@lang('app.yes')"

        }).then((result) => {
            if (result.isConfirmed) {
            $.post(link,{'_token':'{{csrf_token()}}'},(response)=>{
                if(response == true){ Swal.fire("@lang('app.deleted')","@lang('app.has been deleted')",'success').then(()=>{ location.replace(afterDeletelink); }); }
            })
            }
        })
    }

</script>



@endsection
