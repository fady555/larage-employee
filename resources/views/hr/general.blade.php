@extends('layouts.application')



@section('title')
    @if(in_array('show-generals',request()->segments()))@lang('app.generals')
      @elseif (in_array('edit-general',request()->segments()))@lang('app.edit generals')
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


        @if(in_array('show-generals',request()->segments()))
        {{--------ADD-------}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.add generals')</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('store.general')}}">
                            @csrf
                            <div class="form-row">





                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.title event en')</label>
                                    <input type="text" name="title_en" value="{{old('title_en')}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.title event ar')</label>
                                    <input type="text" name="title_ar" value="{{old('title_ar')}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.description_en')</label>
                                    <textarea name="description_en" class="form-control">{{old('description_en')}}</textarea>
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.description_ar')</label>
                                    <textarea name="description_ar" class="form-control">{{old('description_ar')}}</textarea>
                                </div>


                                <div class="col-md-12">
                                    <label>@lang('app.for_whom')<i class="text-danger">*</i></label>

                                    <div class="row">




                                        <div class="col-md-6 mb-3">
                                            <label>@lang('app.company branch')</label>
                                            <select class="js-example-basic-multiple form-control" name="branches[]" multiple="multiple">
                                                @foreach (App\CompanyBranch::get() as $branch)

                                                <option value="{{$branch->id}}">{{$branch->{'name_branch_'.app()->getlocale()} }}</option>

                                                @endforeach
                                            </select>
                                        </div>








                                        <div class="col-md-6 mb-3">
                                            <label>@lang('app.company departement')</label>
                                            <select class="js-example-basic-multiple  form-control" name="departments[]" multiple="multiple">
                                                @foreach (App\ComapnyDepartment::get() as $depart)

                                                <option value="{{$depart->id}}">{{$depart->{'depart_'.app()->getlocale()} }}</option>

                                                @endforeach
                                            </select>
                                        </div>


                                    </div>

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



        @elseif (in_array('edit-general',request()->segments()))


        {{------------------edit ----}}
        @endif





        {{---TABLE SHOW----}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default" data-scroll-height="500">


                    <div class="card-header justify-content-between align-items-center card-header-border-bottom">
                        <h2>@lang('app.generals')</h2>
                    </div>

                    <div class="card-header card-header-border-bottom">
                       <div class="container">
                        <div class="row">

                            <div class="col-lg-3">
                                <label class="control control-radio radio-primary">@lang('app.delete all')
                                    <input type="radio" onclick="deleteEle('{{route('delete.general',['*'])}}','{{route('show.generals')}}')" >
                                    <div class="control-indicator"></div>
                                </label>
                            </div>

                        </div>
                       </div>
                    </div>


                    <div class="card-body slim-scroll">

                        @foreach ($generals as $general)

                        <div class="media py-3 align-items-center justify-content-between">
                            <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary @if($general->for_whom == 'FOR_HR') bg-danger @endif text-white">
                                <i class="mdi mdi-incognito font-size-20"></i>
                            </div>
                            <div class="media-body pr-3 ">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">{{$general->{'title_'.app()->getlocale()} }}</a>
                                <p >{{$general->{'description_'.app()->getlocale()} }}</p>
                            </div>
                            <span class=" font-size-15 d-inline-block">

                                <a href="javascript:;" onclick="deleteEle('{{route('delete.general',[$general->id])}}','{{route('show.generals')}}')"><i class="mdi mdi-delete-circle-outline text-danger"></i></a>
                                <a><i class="mdi mdi-clock-outline"></i></a>

                                {{date('d-M-Y h:m A',strtotime($general->created_at)) }}
                            </span>
                        </div>

                        @endforeach



                    </div>
                    <div class="mt-3"></div>
                </div>
            </div>
        </div>



    </div>
</div>

@endsection



@section('js')

@include('layouts.pattern_crud')

<script> $(".js-example-basic-multiple").select2();</script>

@endsection

