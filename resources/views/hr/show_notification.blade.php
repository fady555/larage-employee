@extends('layouts.application')


{{--------------------

    User::find(1);  === change === user()->auth();

    ---------------------}}


@section('title')
    @lang('app.notification')
@endsection

@section('css')
@endsection



@section('content')


<div class="content-wrapper">
    <div class="content">


        <div class="row">




            @foreach ($notifications as $noty)

                <div class=" col-md-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>{{$noty->data['title_'.app()->getlocale()]}}</h2>
                        </div>
                        <div class="card-body">
                            <p class="mb-5">

                                {{--------$noty->data['id']----}}

                                @if ($noty->type == 'App\Notifications\EventEffectNotification')

                                        @if (App\EventAndEffects::find($noty->data['id']))

                                            {{App\EventAndEffects::find($noty->data['id'])->{'description_'.app()->getlocale()} }}

                                        @endif


                                @elseif ($noty->type == 'App\Notifications\GeneralNotification')

                                        @if (App\General::find($noty->data['id']))

                                            {{App\General::find($noty->data['id'])->{'description_'.app()->getlocale()} }}

                                        @endif
                                @endif

                            </p>


                            <button type="button" class="btn btn-success btn-pill" data-toggle="modal" data-target="#exampleModalLong">
                                {{date('d-M-y h:m A',strtotime($noty->data['created_at'])) }}
                            </button>
                        </div>
                    </div>
                </div>

            @endforeach



        </div>


    </div>
</div>

@endsection



@section('js')
@endsection

