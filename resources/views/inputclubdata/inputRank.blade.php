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
                  <label for="clubName">Jリーグクラブ名</label>
                  <input type="text" class="form-control" id="clubName" name="clubName" placeholder="Jリーグクラブ名">
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
            </div>
        </form>

        <form  role="form" method="POST" action="{{ URL::asset('/inputclubdata/create') }}">

                <div class="form-group">
                    <label for="memberRankA">SS会員</label>
                    <div id="member_a">
                        <input type="text" class="form-control">
                    </div>
                    <input type="button" onclick="addrankA();" value="+">
                </div>

                <div class="form-group">
                    <label for="memberRankB">有料会員</label>
                    <div id ="member_b">
                        <input type="text" class="form-control">
                    </div>
                    <input type="button" onclick="addrankB();" value="+">
                </div>

                <div class="form-group">
                    <label for="memberRankC">無料会員</label>
                    <div id="member_c">
                        <input type="text" class="form-control">
                    </div>
                    <input type="button" onclick="addrankC();" value="+">
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">更新</button>
                    <button type="submit" class="btn btn-primary">削除</button>
                </div>

            </div>
        </form>
</div>
@stop
