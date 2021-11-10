@extends('layouts.application')



@section('title')
    @if(in_array('show-events-effects',request()->segments()))@lang('app.events and effects')
      @elseif (in_array('edit-event-effect',request()->segments()))@lang('app.edit event and effect')
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


        @if(in_array('show-events-effects',request()->segments()))
        {{--------ADD-------}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.add events and effects')</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('store.event.effect')}}">
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

                                    <ul class="list-unstyled list-inline">
                                        <li class="d-inline-block mr-3">
                                            <label class="control control-radio">@lang('app.for hr')
                                                <input type="radio" name="forWhomCheeck" value="FOR_HR" onchange="$('[name=for_whom]').val(this.value); $('[name=for_whom]').click()" @if($errors->any()) @if(old('for_whom') == 'FOR_HR') checked @endif  @endif >
                                                <div class="control-indicator"></div>
                                            </label>
                                        </li>

                                        <li class="d-inline-block ">
                                            <label class="control control-radio">@lang('app.for company')
                                                <input type="radio" name="forWhomCheeck" value="FOR_COMPANY" onchange="$('[name=for_whom]').val(this.value); $('[name=for_whom]').click()" @if($errors->any()) @if(old('for_whom') == 'FOR_COMPANY') checked @endif  @endif >
                                                <div class="control-indicator"></div>
                                            </label>
                                        </li>
                                    </ul>
                                    <input type="hidden" class="form-control" name="for_whom" value="@if($errors->any()) @if(old('for_whom') == 'FOR_HR') FOR_HR @elseif (old('for_whom') == 'FOR_COMPANY') FOR_COMPANY @endif  @endif"/>
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



        @elseif (in_array('edit-event-effect',request()->segments()))
        {{-------EDIT-----------}}


        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>@lang('app.edit event and effect')</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('update.event.effect',[$event_effect->id])}}">
                            @csrf
                            <div class="form-row">



                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.title event en')</label>
                                    <input type="text" name="title_en" value="{{old('title_en',$event_effect->title_en)}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.title event ar')</label>
                                    <input type="text" name="title_ar" value="{{old('title_ar',$event_effect->title_ar)}}" class="form-control"   value="">
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.description_en')</label>
                                    <textarea name="description_en" class="form-control">{{old('description_en',$event_effect->description_en)}}</textarea>
                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>@lang('app.description_ar')</label>
                                    <textarea name="description_ar" class="form-control">{{old('description_ar',$event_effect->description_ar)}}</textarea>
                                </div>


                                <div class="col-md-12">
                                    <label>@lang('app.for_whom')<i class="text-danger">*</i></label>

                                    <ul class="list-unstyled list-inline">
                                        <li class="d-inline-block mr-3">
                                            <label class="control control-radio">@lang('app.for hr')
                                                <input type="radio" name="fromWhomCheeck" value="FOR_HR" onchange="$('[name=for_whom]').val(this.value); $('[name=for_whom]').click()" @if($errors->any()) @if(old('for_whom') == 'FOR_HR') checked @endif  @endif   @if($event_effect->for_whom == 'FOR_HR') checked @endif >
                                                <div class="control-indicator"></div>
                                            </label>
                                        </li>

                                        <li class="d-inline-block ">
                                            <label class="control control-radio">@lang('app.for company')
                                                <input type="radio" name="fromWhomCheeck" value="FOR_COMPANY" onchange="$('[name=for_whom]').val(this.value); $('[name=for_whom]').click()" @if($errors->any()) @if(old('for_whom') == 'FOR_COMPANY') checked @endif  @endif  @if($event_effect->for_whom == 'FOR_COMPANY') checked @endif >
                                                <div class="control-indicator"></div>
                                            </label>
                                        </li>
                                    </ul>
                                    <input type="hidden" class="form-control" name="for_whom" value="@if($errors->any()) @if(old('for_whom') == 'FOR_HR') FOR_HR @elseif (old('for_whom') == 'FOR_COMPANY') FOR_COMPANY @endif  @endif   @if($event_effect->for_whom == 'FOR_HR') FOR_HR @elseif ($event_effect->for_whom == 'FOR_COMPANY') FOR_COMPANY @endif"  />
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





        {{---TABLE SHOW----}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default" data-scroll-height="500">


                    <div class="card-header justify-content-between align-items-center card-header-border-bottom">
                        <h2>@lang('app.latest events and effects')</h2>
                    </div>

                    <div class="card-header card-header-border-bottom">
                       <div class="container">
                        <div class="row">

                            <div class="col-lg-3">
                                <label class="control control-radio radio-warning">@lang('app.all')
                                    <input type="radio" name="event_effect" onclick="location.replace('{{route('show.events.effects')}}')"  checked="checked">
                                    <div class="control-indicator"></div>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="control control-radio radio-danger">@lang('app.for hr')
                                    <input type="radio" name="event_effect" onclick="location.replace('{{route('show.events.effects',['forWhom'=>'hr'])}}')" @if(in_array('hr',request()->segments())) checked="checked" @endif >
                                    <div class="control-indicator"></div>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="control control-radio radio-primary">@lang('app.for company')
                                    <input type="radio" name="event_effect" onclick="location.replace('{{route('show.events.effects',['forWhom'=>'company'])}}')" @if(in_array('company',request()->segments())) checked="checked" @endif >
                                    <div class="control-indicator"></div>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label class="control control-radio radio-primary">@lang('app.delete all')
                                    <input type="radio" onclick="deleteEle('{{route('delete.event.effect',['*'])}}','{{route('show.events.effects')}}')" >
                                    <div class="control-indicator"></div>
                                </label>
                            </div>



                        </div>
                       </div>
                    </div>


                    <div class="card-body slim-scroll">

                        @foreach ($event_effects as $event_effect)

                        <div class="media py-3 align-items-center justify-content-between">
                            <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary @if($event_effect->for_whom == 'FOR_HR') bg-danger @endif text-white">
                                <i class="mdi mdi-incognito font-size-20"></i>
                            </div>
                            <div class="media-body pr-3 ">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">{{$event_effect->{'title_'.app()->getlocale()} }}</a>
                                <p >{{$event_effect->{'description_'.app()->getlocale()} }}</p>
                            </div>
                            <span class=" font-size-15 d-inline-block">

                                <a href="{{route('edit.event.effect',['id'=>$event_effect->id])}}"><i class="mdi mdi-square-edit-outline"></i></a>
                                <a href="javascript:;" onclick="deleteEle('{{route('delete.event.effect',[$event_effect->id])}}','{{route('show.events.effects')}}')"><i class="mdi mdi-delete-circle-outline text-danger"></i></a>
                                <a><i class="mdi mdi-clock-outline"></i></a>

                                {{date('d-M-Y h:m A',strtotime($event_effect->created_at)) }}
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

@endsection

