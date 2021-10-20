@extends('layouts.application')



@section('title')
    @if(in_array('show-educations',request()->segments()))@lang('app.education')
      @elseif (in_array('edit-education',request()->segments()))@lang('app.edit app.education')
    @endif
@endsection





@section('content')


<div class="content-wrapper">
    <div class="content">

        @if (session()->has('message'))

        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success alert-highlighted" role="alert">
                   {{session()->get('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        </div>

        @endif


        @if(in_array('show-educations',request()->segments()))
        {{--------ADD-------}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.education add')</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('store.education')}}">
                            @csrf
                            <div class="form-row">

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.education_status_en')</label>
                                    <input type="text" name="education_status_en" value="{{old('education_status_en')}}" class="form-control"  value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.education_status_ar')</label>
                                    <input type="text" name="education_status_ar" value="{{old('education_status_ar')}}" class="form-control"   value="">
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



        @elseif (in_array('edit-education',request()->segments()))
        {{-------EDIT-----------}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.edit education')</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('update.education',$education->id)}}">
                            @csrf
                            <div class="form-row">

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.education_status_en')</label>
                                    <input type="text" name="education_status_en" value="{{old('education_status_en',$education->education_status_en)}}" class="form-control"  value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.education_status_ar')</label>
                                    <input type="text" name="education_status_ar" value="{{old('education_status_ar',$education->education_status_ar)}}" class="form-control"   value="">
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
                        <h2>@lang('app.education')</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center ">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">@lang('app.education_status_en')</th>
                                    <th scope="col">@lang('app.education_status_ar')</th>
                                    <th scope="col">@lang('app.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($educations as $education)
                                <tr>
                                    <td>{{$education->education_status_en}}</td>
                                    <td>{{$education->education_status_ar}}</td>
                                    <td>
                                        <button  class="mb-1 btn btn-sm btn-primary">
                                            <i class=" mdi mdi-square-edit-outline mr-1"></i>
                                            <a href="{{route('edit.education',[$education->id])}}" class="text-dark">@lang('app.edit')</a>
                                        </button>

                                        <button  class="mb-1 btn btn-sm btn-danger">
                                            <i class=" mdi mdi-delete mr-1"></i>
                                            <a href="javascript:;" onclick="deleteEle('{{route('delete.education',[$education->id])}}','{{route('show.educations')}}')" class="text-dark">@lang('app.delete')</a>
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

@endsection

