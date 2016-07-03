@extends('layouts.master')

@section('page-title')
CSVインポート
@stop

@section('addCss')
<link rel="stylesheet" type="text/css" href="{{ asset('css/inputClubData.css') }}">
@stop

@section('content')
<div class="row">
    <div class="col-md-10">
        <h4>{{ $msg }}</h4>
    </div>
</div>
@stop
