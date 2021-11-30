@extends('layouts.application')



@section('title')
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css"/>

@endsection



@section('content')


<div class="content-wrapper">
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between align-items-center card-header-border-bottom">
                        <h2>
                            @lang('app.leave request')
                            <i class="loaddd mdi mdi-48px mdi-spin mdi-progress-download d-none "></i>
                        </h2>
                        <select onchange="location = this.value;" >
                            <option>@lang('app.choose branch')</option>
                            <option value="{{route('show.leave.reqests')}}">@lang('app.all')</option>
                            @foreach (App\CompanyBranch::get() as $branch )
                            <option value="{{route('show.leave.reqests',[$branch->id])}}">{{$branch->{'name_branch_'.app()->getlocale()} }}</option>
                            @endforeach
                        </select>
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
                                    <th>@lang('app.assign')</th>
                                    <th>@lang('app.delete')</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($level_requests as $request)
                                <tr>
                                    <td>
                                        <a class="font-size-20 text-dark btn btn-sm" href="http://localhost/hr/ar/edit-employee/4">{{$request->employee->{'full_name_'.app()->getlocale()} }}</a>
                                    </td>
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
                                    <td id="tdRQ{{$request->id }}">
                                        {{App\StatusRequest::find($request->status_request_hr_id)->{'status_'.app()->getlocale()} }}
                                    </td>

                                    <td id="tdRQAssign{{$request->id}}">
                                        @if (!in_array($request->status_request_hr_id,[2,3]))
                                            <a href="javascript:;" onclick="assign('{{$request->id}}')"><i class="mdi mdi-account-edit  text-info h3"></i></a>
                                        @endif
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


<script>
    function assign(request_id){


        Swal.fire({
            title: "@lang('app.not cant modify')",
            showDenyButton: true,
            showCancelButton: true,
            cancelButtonText: "@lang('app.cancle')",
            confirmButtonText: "@lang('app.approve_yes')",
            confirmButtonColor:'#3085d6',
            denyButtonText: "@lang('app.approve_no')",
        }).then(function (result){
            /*
                dismiss: "cancel"
                isConfirmed: false
                isDenied: false
                isDismissed: true
            */

            if(result.isConfirmed){

                $.post("{{route('assign.leave.reqests')}}/"+ request_id +"/2",{_token:"{{csrf_token()}}"})
                 .done(function (data){
                        $('#tdRQ'+request_id).css('text-decoration','line-through')
                        $('#tdRQAssign'+request_id).html("")
                })

            }else if(result.isDenied){

                $.post("{{route('assign.leave.reqests')}}/"+ request_id +"/3",{_token:"{{csrf_token()}}"})
                 .done(function (data){
                        $('#tdRQ'+request_id).css('text-decoration','line-through')
                        $('#tdRQAssign'+request_id).html("")
                })

            }else if(result.isDismissed){}




            //console.log(result.isConfirmed);

        })
    }


</script>


@endsection
