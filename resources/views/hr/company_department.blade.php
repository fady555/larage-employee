@extends('layouts.application')



@section('title')
    @if(in_array('show-companies-departments',request()->segments()))@lang('app.company departement')
      @elseif (in_array('edit-company-department',request()->segments()))@lang('app.edit depart')
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


        @if(in_array('show-companies-departments',request()->segments()))
        {{--------ADD-------}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.add depart')</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('store.company.department')}}">
                            @csrf
                            <div class="form-row">

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.depart_en')</label>
                                    <input type="text" name="depart_en" value="{{old('depart_en')}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.depart_ar')</label>
                                    <input type="text" name="depart_ar" value="{{old('depart_ar')}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.description_en')</label>
                                    <textarea name="description_en" class="form-control">{{old('description_en')}}</textarea>
                                </div>
                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.description_ar')</label>
                                    <textarea name="description_ar" class="form-control">{{old('description_ar')}}</textarea>
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



        @elseif (in_array('edit-company-department',request()->segments()))
        {{-------EDIT-----------}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.edit depart')</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('update.company.department',$department->id)}}">
                            @csrf
                            <div class="form-row">

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.depart_en')</label>
                                    <input type="text" name="depart_en" value="{{old('depart_en',$department->depart_en)}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.depart_ar')</label>
                                    <input type="text" name="depart_ar" value="{{old('depart_ar',$department->depart_ar)}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.description_en')</label>
                                    <textarea name="description_en" class="form-control">{{old('description_en',$department->description_en)}}</textarea>
                                </div>
                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.description_ar')</label>
                                    <textarea name="description_ar" class="form-control">{{old('description_ar',$department->description_ar)}}</textarea>
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
                        <h2>@lang('app.company departement')</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center ">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">@lang('app.depart_en')</th>
                                    <th scope="col">@lang('app.depart_ar')</th>
                                    <th scope="col">@lang('app.description_en')</th>
                                    <th scope="col">@lang('app.description_ar')</th>
                                    <th scope="col">@lang('app.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $depart)
                                <tr>
                                    <td>{{$depart->depart_en}}</td>
                                    <td>{{$depart->depart_ar}}</td>
                                    <td>{{$depart->description_en}}</td>
                                    <td>{{$depart->description_ar}}</td>
                                    <td>
                                        <button  class="mb-1 btn btn-sm btn-primary">
                                            <i class=" mdi mdi-square-edit-outline mr-1"></i>
                                            <a href="{{route('edit.company.department',[$depart->id])}}" class="text-dark">@lang('app.edit')</a>
                                        </button>

                                        <button  class="mb-1 btn btn-sm btn-danger">
                                            <i class=" mdi mdi-delete mr-1"></i>
                                            <a href="javascript:;" onclick="deleteEle('{{route('delete.company.department',[$depart->id])}}','{{route('show.companies.departments')}}')" class="text-dark">@lang('app.delete')</a>
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

