@extends('layouts.master')

@section('page-title')
クラブ一覧
@stop

@section('addCss')
<link rel="stylesheet" type="text/css" href="{{ asset('css/inputClubData.css') }}">
@stop

@section('addJs')
<script type="text/javascript" src="{{ asset('js/addForm.js') }}"></script>
@stop

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box">
            <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>クラブ名</th>
                  <th>編集</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($clubs))
                    @foreach ($clubs as $clubdata)
                    <tr>
                      <td><img src="{{ $clubdata['image_name'] }}">{{ $clubdata['club_name'] }}</td>
                      <td><a href="{{ URL::asset('/inputclubdata/updateClubData?id='.$clubdata['id'] )}}" class="btn btn-primary">編集</a></td>
                    </tr>
                     @endforeach
                @endif
            </tbody>
          </table>
        </div>
    </div>
</div>
@stop
