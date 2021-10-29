@extends('layouts.application')



@section('title')
@endsection

@section('css')
@endsection



@section('content')


<div class="content-wrapper">
    <div class="content">


        <img src="{{URL("/img/".\App\Employee::find(1)->national_card_img)}}" />

    </div>
</div>

@endsection



@section('js')
@endsection

