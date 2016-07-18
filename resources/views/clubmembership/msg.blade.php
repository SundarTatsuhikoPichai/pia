@extends('layouts.master')

@section('page-title')
会員ランク
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
      {{ isset($msg) ? $msg : '' }}
    </div>
</div>
@stop
