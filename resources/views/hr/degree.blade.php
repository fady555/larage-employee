@extends('layouts.application')



@section('title')
    @if(in_array('show-degrees',request()->segments()))@lang('app.degrees')
      @elseif (in_array('edit-degree',request()->segments()))@lang('app.edit degree')
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


        @if(in_array('show-degrees',request()->segments()))
        {{--------ADD-------}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.degree add')</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('store.degree')}}">
                            @csrf
                            <div class="form-row">

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.degree_en')</label>
                                    <input type="text" name="degree_en" value="{{old('degree_en')}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.degree_ar')</label>
                                    <input type="text" name="degree_ar" value="{{old('degree_ar')}}" class="form-control"   value="">
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



        @elseif (in_array('edit-degree',request()->segments()))
        {{-------EDIT-----------}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.edit degree')</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('update.degree',$degree->id)}}">
                            @csrf
                            <div class="form-row">

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.degree_en')</label>
                                    <input type="text" name="degree_en" value="{{old('degree_en',$degree->degree_en)}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.degree_ar')</label>
                                    <input type="text" name="degree_ar" value="{{old('degree_ar',$degree->degree_ar)}}" class="form-control"   value="">
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
                        <h2>@lang('app.degrees')</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center ">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">@lang('app.degree_en')</th>
                                    <th scope="col">@lang('app.degree_ar')</th>
                                    <th scope="col">@lang('app.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($degrees as $degree)
                                <tr>
                                    <td>{{$degree->degree_en}}</td>
                                    <td>{{$degree->degree_ar}}</td>
                                    <td>
                                        <button  class="mb-1 btn btn-sm btn-primary">
                                            <i class=" mdi mdi-square-edit-outline mr-1"></i>
                                            <a href="{{route('edit.degree',[$degree->id])}}" class="text-dark">@lang('app.edit')</a>
                                        </button>

                                        <button  class="mb-1 btn btn-sm btn-danger">
                                            <i class=" mdi mdi-delete mr-1"></i>
                                            <a href="javascript:;" onclick="deleteEle('{{route('delete.degree',[$degree->id])}}','{{route('show.degrees')}}')" class="text-dark">@lang('app.delete')</a>
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

