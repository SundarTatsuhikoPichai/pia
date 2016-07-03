@extends('layouts.master')

@section('page-title')
CSVインポート
@stop

@section('addCss')
<link rel="stylesheet" type="text/css" href="{{ asset('css/inputClubData.css') }}">
@stop

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        {!! Form::open(['url' => 'importcsv/create', 'enctype' => 'multipart/form-data']) !!}
            <div class="box">
                <div class="form-group">
                    {!! Form::label('Jリーグクラブ名') !!}
                    <select class="form-control" name="clubId">
                        @foreach($clubs as $club)
                        <option value="{{ $club['id'] }}">{{ $club['club_name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="file" id="importcsv" name="importCsv">
                    <p class="help-block">追加したいCSVファイルを選択して下さい</p>
                </div>
                <div class="form-group">
                    {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>

</div>
@stop
