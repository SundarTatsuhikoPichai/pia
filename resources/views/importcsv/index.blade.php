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
        <form role="form">
            <div class="box">
                <div class="form-group">
                    <label>Jリーグクラブ名</label>
                    <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                    </select>

                    <label>年度</label>
                    <select class="form-control">
                        <option>aaaaa</option>
                    </select>

                    <input type="file" id="inputFile">
                    <p class="help-block">追加したいCSVファイルを選択して下さい</p>
                    <button type="submit" class="btn btn-primary">追加</button>
                </div>
            </div>
        </form>
    </div>

</div>
@stop
