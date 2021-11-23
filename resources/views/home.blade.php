@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('site/bootstrap.css')}}">

<div class="container">
                <div class="row">
                    <div class="col fundo-a">
                        <a href="{{route('lista')}}">@lang('home.mylists')</a>
                    </div>
                    <div class="col">
                        <a href="">@lang('home.scheduletasks')</a>
                    </div>

                </div>

            </div>
        </div>


@endsection
