@extends('layouts.application')



@section('title')
    @if(in_array('show-types-works',request()->segments()))@lang('app.type work')
      @elseif (in_array('edit-type-work',request()->segments()))@lang('app.edit type of work')
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


        @if(in_array('show-types-works',request()->segments()))
        {{--------ADD-------}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.add type work')</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('store.type.work')}}">
                            @csrf
                            <div class="form-row">

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.work_type_en')</label>
                                    <input type="text" name="work_type_en" value="{{old('work_type_en')}}" class="form-control"  value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.work_type_ar')</label>
                                    <input type="text" name="work_type_ar" value="{{old('work_type_ar')}}" class="form-control"   value="">
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



        @elseif (in_array('edit-type-work',request()->segments()))
        {{-------EDIT-----------}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.edit type of work')</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('update.type.work',$type_work->id)}}">
                            @csrf
                            <div class="form-row">

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.work_type_en')</label>
                                    <input type="text" name="work_type_en" value="{{old('work_type_en',$type_work->work_type_en)}}" class="form-control"  value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.work_type_ar')</label>
                                    <input type="text" name="work_type_ar" value="{{old('work_type_ar',$type_work->work_type_ar)}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.description_en')</label>
                                    <textarea name="description_en" class="form-control">{{old('description_en',$type_work->description_en)}}</textarea>
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.description_ar')</label>
                                    <textarea name="description_ar" class="form-control">{{old('description_ar',$type_work->description_ar)}}</textarea>
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
                                    <th scope="col">@lang('app.work_type_en')</th>
                                    <th scope="col">@lang('app.work_type_ar')</th>
                                    <th scope="col">@lang('app.description_en')</th>
                                    <th scope="col">@lang('app.description_ar')</th>
                                    <th scope="col">@lang('app.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types_works as $type)
                                <tr>
                                    <td>{{$type->work_type_en}}</td>
                                    <td>{{$type->work_type_ar}}</td>
                                    <td>{{$type->description_en}}</td>
                                    <td>{{$type->description_ar}}</td>
                                    <td>
                                        <button  class="mb-1 btn btn-sm btn-primary">
                                            <i class=" mdi mdi-square-edit-outline mr-1"></i>
                                            <a href="{{route('edit.type.work',[$type->id])}}" class="text-dark">@lang('app.edit')</a>
                                        </button>

                                        <button  class="mb-1 btn btn-sm btn-danger">
                                            <i class=" mdi mdi-delete mr-1"></i>
                                            <a href="javascript:;" onclick="deleteEle('{{route('delete.type.work',[$type->id])}}','{{route('show.types.work')}}')" class="text-dark">@lang('app.delete')</a>
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

