@extends('layouts.application')



@section('title')
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css
https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css"/>

@endsection



@section('content')


<div class="content-wrapper">
    <div class="content">
            {{---------
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-default">
                                <div class="card-header card-header-border-bottom">
                                    <h2>@lang('app.search leave request')</h2>
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



                                                <button onclick="event.preventDefault();search()" class="btn btn-primary btn-lg btn-block btnEdit">@lang('app.search leave request')</button>



                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                ------------}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>
                            @lang('app.leave request')
                            <i class="loaddd mdi mdi-48px mdi-spin mdi-progress-download d-none "></i>
                        </h2>
                    </div>

                    <div class="card-body slim-scroll" id="emSearch">


                        <table id="example" class="display table table-border" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>@lang('app.employees')</th>
                                    <th>@lang('app.start')</th>
                                    <th>@lang('app.end')</th>
                                    <th>@lang('app.show')</th>
                                    <th>@lang('app.Direct manager approval')</th>
                                    <th>@lang('app.Hr manager approval')</th>
                                    <th>@lang('app.reject')</th>
                                    <th>@lang('app.delete')</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($level_requests as $request)
                                <tr>
                                    <td>{{$request->employee->{'full_name_'.app()->getlocale()} }}</td>
                                    <td>{{$request->start}}</td>
                                    <td>{{$request->end}}</td>
                                    <td>
                                        <div class="dropdown d-inline-block mb-1">
                                            <button class="btn btn-primary  dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                                <i class="mdi mdi-eye"> </i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="javascript:;">{{$request->reason_description}}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$request->status_dir->{'status_'.app()->getlocale()} }}</td>
                                    <td>
                                        <label class="switch switch-icon switch-outline-alt-primary form-control-label diplay">
                                            <input type="checkbox" onchange="alert(this.value)" class="switch-input form-check-input" value="2" name="approved" @if($request->status_request_hr_id == 2) checked @endif>
                                            <span class="switch-label"></span>
                                            <span class="switch-handle"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="switch switch-icon switch-outline-alt-danger form-control-label diplay" @if($request->status_request_hr_id == 3) checked @endif>
                                            <input type="checkbox" class="switch-input form-check-input" value="3" name="reject" >
                                            <span class="switch-label"></span>
                                            <span class="switch-handle"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="javascript:;" onclick="deleteEle('{{route('delete.leave.reqest',[$request->id])}}','{{route('show.leave.reqests')}}')"><i class="mdi mdi-delete-circle-outline text-danger h3"></i></a>
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
@include('layouts.pattern_crud')


@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>


<script>


</script>



<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>

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


<script>


$(document).ready(function() {
    $('#example').DataTable( {
        "oLanguage": {
            "sSearch": "@lang('app.search leave request'):"
        },

        /*dom: 'Bfrtip',
        buttons: [
            {extend: 'pdfHtml5',download:'open'},
            {extend: 'excelHtml5'},
            {extend: 'csvHtml5'},
        ],*/

    } );
} );

</script>


@endsection
