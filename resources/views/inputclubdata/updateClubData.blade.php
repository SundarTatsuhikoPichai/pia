@extends('layouts.master')

@section('page-title')
クラブデータ編集
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
                  <input type="text" class="form-control" id="club_name" name="club_name" value="{{ $club['club_name'] }}">
                </div>

                <div class="form-group">
                    <label for="club_code">クラブコード</label>
                    <input type="text" class="form-control" id="club_code" name="club_code" value="{{ $club['club_code'] }}">
                </div>

                <div class="form-group">
                    <label for="stadium_name">ホームスタジアム</label>
                    <input type="text" class="form-control" id="stadium_name" name="stadium_name" value="{{ $club['stadium_name'] }}">
                </div>

                <div class="form-group">
                    <label for="postal_code">ホームスタジアム郵便番号</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $club['postal_code'] }}">
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">更新</button>
                    <button type="submit" class="btn btn-primary">削除</button>
                </div>
            </div>
        </form>


            <div class="box">
                <div id="inputRankA" class="form-group">

                  <label class="col-md-12">SS会員</label>

                  <div class="form-group row">
                    <form  role="form" method="POST" action="{{ URL::asset('/inputclubdata/update') }}">
                    {{ csrf_field() }}
                      <div id="member_a" class="col-md-8">
                          <input type="text" class="col-md-12" name="member_a">
                      </div>

                      <div class="col-md-4">
                        <input type="button" class="btn btn-primary" onclick="addrankA();" value="+">
                        <input type="submit" class="btn btn-primary" value="保存">
                        <input type="submit" class="btn btn-primary" value="更新">
                        <input type="submit" class="btn btn-primary" value="削除">
                      </div>
                    </form>
                  </div>

                </div>

                <div id="inputRankB" class="form-group">

                    <label class="col-md-12">有料会員</label>

                    <div class="form-group row">
                    <form  role="form" method="POST" action="{{ URL::asset('/inputclubdata/update') }}">
                    {{ csrf_field() }}
                      <div id="member_a" class="col-md-8">
                          <input type="text" class="col-md-12">
                      </div>

                      <div class="col-md-4">
                        <input type="button" class="btn btn-primary" onclick="addrankB();" value="+">
                        <input type="submit" class="btn btn-primary" value="保存">
                        <input type="submit" class="btn btn-primary" value="更新">
                        <input type="submit" class="btn btn-primary" value="削除">
                      </div>
                    </form>
                  </div>
                </div>

                <div id="inputRankC" class="form-group">
                    <label class="col-md-12">無料会員</label>


                    <div class="form-group row">
                      <form  role="form" method="POST" action="{{ URL::asset('/inputclubdata/update') }}">
                      {{ csrf_field() }}
                        <div id="member_a" class="col-md-8">
                          <input type="text" class="col-md-12">
                        </div>

                        <div class="col-md-2">
                          <input type="submit" class="btn btn-primary col-md-12" value="更新">
                        </div>
                      </form>


                      <form role="form" method="POST" action="{{ URL::asset('/inputclubdata/delete') }}">
                      <div class="col-md-2">
                        <input type="submit" class="btn btn-primary col-md-12" value="削除">
                      </div>
                      </form>
                    </div>







                    <div class="form-group row">
                    <form  role="form" method="POST" action="{{ URL::asset('/inputclubdata/createMemberShip') }}">
                    {{ csrf_field() }}
                      <div id="member_a" class="col-md-8">
                          <input type="text" class="col-md-12">
                      </div>

                      <div class="col-md-4">
                        <input type="button" class="btn btn-primary" onclick="addrankC();" value="+">
                        <input type="submit" class="btn btn-primary" value="保存">
                      </div>
                    </form>
                    </div>






              </div>

            </div>
    </div>
</div>
@stop
