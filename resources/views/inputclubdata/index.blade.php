@extends('layouts.master')

@section('page-title')
クラブデータ入力
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
        <form role="form" method="POST" action="{{ URL::asset('/inputclubdata/create') }}">
            {{ csrf_field() }}
            <div class="box">
                <!-- select -->
                <div class="form-group">
                  <label for="club_name">Jリーグクラブ名</label>
                  <input type="text" class="form-control" id="club_name" name="club_name" placeholder="Jリーグクラブ名">
                </div>

                <div class="form-group">
                    <label for="clubCode">クラブコード</label>
                    <input type="text" class="form-control" id="clubCode" name="clubCode" placeholder="クラブコード">
                </div>

                <div class="form-group">
                    <label for="homeStadium">ホームスタジアム</label>
                    <input type="text" class="form-control" id="homeStadium" name="homeStadium" placeholder="ホームスタジアム">
                </div>

                <div class="form-group">
                    <label for="homeStadiumPostalCode">ホームスタジアム郵便番号</label>
                    <input type="number" class="form-control" id="homeStadiumPostalCode" name="homeStadiumPostalCode" placeholder="ホームスタジアム郵便番号">
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
