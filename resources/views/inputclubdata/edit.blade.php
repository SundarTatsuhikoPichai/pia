@extends('layouts.master')

@section('page-title')
クラブデータ編集
@stop

@section('addCss')
<link rel="stylesheet" type="text/css" href="{{ asset('css/inputClubData.css') }}">
@stop

@section('addJs')
<script type="text/javascript" src="{{ asset('js/addForm.js') }}"></script>
<script type="text/javascript">
  $('.submit').click(function() {
    $(this).parents('form').attr('action', $(this).data('action'));
    $(this).parents('form').submit();
  });

  $('.submit-membership').click(function() {
    $("#memberShipId").val($(this).data('id'));
    $(this).parents('form').attr('action', $(this).data('action'));
    $(this).parents('form').submit();
  });

</script>
@stop

@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-1">
      <div class="box">
        <form role="form" method="POST" action="{{ URL::asset('/inputclubdata/update') }}">
            {{ csrf_field() }}
                <!-- select -->
              <div class="box-body">
                <div class="form-group">
                  <label for="club_name">Jリーグクラブ名</label>
                  <input type="text" class="form-control" name="club_name" value="{{ $club['club_name'] }}">
                </div>

                <div class="form-group">
                    <label for="club_code">クラブコード</label>
                    <input type="text" class="form-control" name="club_code" value="{{ $club['club_code'] }}">
                </div>

                <div class="form-group">
                    <label for="stadium_name">ホームスタジアム</label>
                    <input type="text" class="form-control" name="stadium_name" value="{{ $club['stadium_name'] }}">
                </div>

                <div class="form-group">
                    <label for="postal_code">ホームスタジアム郵便番号</label>
                    <input type="text" class="form-control" name="postal_code" value="{{ $club['postal_code'] }}">
                </div>
                <input type="hidden" name="id" value="{{ $club['id'] }}">
              </div>
              <div class="box-footer">
                <div class="col-md-6">
                  <button type="submit" data-action="/inputclubdata/update" class="btn btn-success col-md-8 pull-right submit">更新する</button>
                </div>
                <div class="col-md-6">
                  <button type="submit" data-action="/inputclubdata/delete" class="btn btn-danger col-md-8 submit">削除する</button>
                </div>
              </div>
        </form>
    </div>

    <div class="box">
      <div class="box-body">
        <form method="POST" action="{{ URL::asset('/clubmembership/create') }}">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $club['id'] }}">
          <input type="hidden" id="memberShipId" name="memberShipId" value="">

          <div id="member_a" class="form-group">
            <label class="col-md-12">SS会員</label>
            @if(isset($clubMembershipA))
              @foreach($clubMembershipA as $memberShip)
              <div class="form-group row">
                <div class="col-md-8">
                  <input type="text" name="memberShipInput[{{ $memberShip['id'] }}]" class="col-md-12" value="{{{ $memberShip['membership_name'] }}}">
                </div>
                <div class="col-md-4">
                  <input type="submit" class="btn btn-success submit-membership" value="更新"
                    data-id="{{ $memberShip['id'] }}" data-action="/clubmembership/update">

                  <input type="submit" class="btn btn-danger submit-membership" value="削除"
                    data-id="{{ $memberShip['id'] }}" data-action="/clubmembership/delete">
                </div>
              </div>
              @endforeach
            @endif

            <div class="form-group row">
              <div class="col-md-8">
                <input type="text" class="col-md-12 input-js" name="member_a[0]">
              </div>
              <div class="col-md-4">
                <input type="button" class="btn btn-primary" onclick="addInputField(member_a);" value="+">
              </div>
            </div>
          </div>

          <div id="member_b" class="form-group">
            <label class="col-md-12">有料会員</label>
            @if(isset($clubMembershipB))
              @foreach($clubMembershipB as $memberShip)
              <div class="form-group row">
                <div class="col-md-8">
                  <input type="text" name="memberShipInput[{{ $memberShip['id'] }}]" class="col-md-12" value="{{{ $memberShip['membership_name'] }}}">
                </div>
                <div class="col-md-4">
                  <input type="submit" class="btn btn-success submit-membership" value="更新"
                    data-id="{{ $memberShip['id'] }}" data-action="/clubmembership/update">

                  <input type="submit" class="btn btn-danger submit-membership" value="削除"
                    data-id="{{ $memberShip['id'] }}" data-action="/clubmembership/delete">
                </div>
              </div>
              @endforeach
            @endif

            <div class="form-group row">
              <div class="col-md-8">
                <input type="text" class="col-md-12 input-js" name="member_b[0]">
              </div>
              <div class="col-md-4">
                <input type="button" class="btn btn-primary" onclick="addInputField(member_b);" value="+">
              </div>
            </div>
          </div>

          <div id="member_c" class="form-group">
            <label class="col-md-12">無料会員</label>
            @if(isset($clubMembershipC))
              @foreach($clubMembershipC as $memberShip)
              <div class="form-group row">
                <div class="col-md-8">
                  <input type="text" name="memberShipInput[{{ $memberShip['id'] }}]" class="col-md-12" value="{{{ $memberShip['membership_name'] }}}">
                </div>
                <div class="col-md-4">
                  <input type="submit" class="btn btn-success submit-membership" value="更新"
                    data-id="{{ $memberShip['id'] }}" data-action="/clubmembership/update">

                  <input type="submit" class="btn btn-danger submit-membership" value="削除"
                    data-id="{{ $memberShip['id'] }}" data-action="/clubmembership/delete">
                </div>
              </div>
              @endforeach
            @endif

            <div class="form-group row">
              <div class="col-md-8">
                <input type="text" class="col-md-12 input-js" name="member_c[0]">
              </div>
              <div class="col-md-4">
                <input type="button" class="btn btn-primary" onclick="addInputField(member_c);" value="+">
              </div>
            </div>
          </div>

        </div>
        <div class="box-footer">
          <input type="submit" class="btn btn-primary col-md-6 col-md-offset-3" name="name" value="保存する">
        </div>
      </form>
    </div>

  </div>
</div>
@stop
