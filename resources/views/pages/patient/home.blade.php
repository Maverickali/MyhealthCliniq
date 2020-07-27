@extends('layouts.app')

@section('template_title')
    {{ Auth::user()->name }}'s' Homepage
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

               <H1> WELCOME PATIENT </H1>

                @if($user->isOnline())
                    user is online!!
                @endif

            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection