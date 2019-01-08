@extends('layouts.app')
@section('title', '首页')

@section('content')
    <h1>这里是首页</h1>
    @if (\Illuminate\Support\Facades\Session::has('success_mail'))
         <div class="alert alert-success">           
            <button
                type="button"
                class="close"
                data-dismiss="alert"
                aria-hidden="true">&times;</button>                               
            {{\Illuminate\Support\Facades\Session::get('success_mail')}}                                  
        </div> 
    @endif
@stop
