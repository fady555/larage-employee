@extends('layouts.application')



@section('title')
    @if(in_array('show-jops',request()->segments()))@lang('app.jops')
      @elseif (in_array('edit-jop',request()->segments()))@lang('app.edit jop')
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


        @if(in_array('show-jops',request()->segments()))
        {{--------ADD-------}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.jop add')</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('store.jop')}}">
                            @csrf
                            <div class="form-row">

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.acronym')</label>
                                    <input type="text" name="nik_name" value="{{old('nik_name')}}" class="form-control"  value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.The job is in English')</label>
                                    <input type="text" name="name_en" value="{{old('name_en')}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.The job is in Arabic')</label>
                                    <input type="text" name="name_ar" value="{{old('name_ar')}}" class="form-control"   value="">
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



        @elseif (in_array('edit-jop',request()->segments()))
        {{-------EDIT-----------}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.edit jop')</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('update.jop',$jop->id)}}">
                            @csrf
                            <div class="form-row">

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.acronym')</label>
                                    <input type="text" name="nik_name" value="{{old('nik_name',$jop->nik_name)}}" class="form-control"  placeholder="@lang('app.acronym')" value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.The job is in English')</label>
                                    <input type="text" name="name_en" value="{{old('name_en',$jop->name_en)}}" class="form-control"  placeholder="@lang('app.The job is in English')" value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.The job is in Arabic')</label>
                                    <input type="text" name="name_ar" value="{{old('name_ar',$jop->name_ar)}}" class="form-control"  placeholder="@lang('app.The job is in Arabic')" value="">
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
                        <h2>@lang('app.jops')</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center ">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">@lang('app.acronym')</th>
                                    <th scope="col">@lang('app.The job is in English')</th>
                                    <th scope="col">@lang('app.The job is in Arabic')</th>
                                    <th scope="col">@lang('app.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jops as $jop)
                                <tr>
                                    <td>{{$jop->nik_name}}</td>
                                    <td>{{$jop->name_en}}</td>
                                    <td>{{$jop->name_ar}}</td>
                                    <td>
                                        <button  class="mb-1 btn btn-sm btn-primary">
                                            <i class=" mdi mdi-square-edit-outline mr-1"></i>
                                            <a href="{{route('edit.jop',[$jop->id])}}" class="text-dark">@lang('app.edit')</a>
                                        </button>

                                        <button  class="mb-1 btn btn-sm btn-danger">
                                            <i class=" mdi mdi-delete mr-1"></i>
                                            <a href="javascript:;" onclick="deleteEle('{{route('delete.jop',[$jop->id])}}','{{route('show.jops')}}')" class="text-dark">@lang('app.delete')</a>
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

