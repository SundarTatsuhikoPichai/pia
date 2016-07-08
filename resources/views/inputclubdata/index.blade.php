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
        <form role="form" method="POST" action="{{ URL::asset('/inputclubdata/create') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box">
                <!-- select -->
                <div class="form-group">
                  <label for="clubName">Jリーグクラブ名</label>
                  <input type="text" class="form-control" id="clubName" name="club_name" placeholder="Jリーグクラブ名">
                </div>

                <div class="form-group">
                    <label for="clubCode">クラブコード</label>
                    <input type="text" class="form-control" id="clubCode" name="club_code" placeholder="クラブコード">
                </div>

                <div class="form-group">
                    <label for="homeStadium">ホームスタジアム</label>
                    <input type="text" class="form-control" id="homeStadium" name="stadium_name" placeholder="ホームスタジアム">
                </div>

                <div class="form-group">
                    <label for="homeStadiumPostalCode">ホームスタジアム郵便番号</label>
                    <input type="number" class="form-control" id="homeStadiumPostalCode" name="postal_code" placeholder="ホームスタジアム郵便番号">
                </div>

                <div class="form-group">
                    <label for="clubImage">クラブロゴ</label>
                    <input type="file" id="importImg" name="image_name">
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
