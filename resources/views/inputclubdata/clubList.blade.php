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
    <div class="col-md-12">
        <div class="box">
            <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>ロゴ</th>
                  <th>クラブ名</th>
                  <th>ホームスタジアム</th>
                  <th>郵便番号</th>
                  <th>編集</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($clubs))
                    @foreach ($clubs as $clubdata)
                    <tr>
                      <td><img src= "{{ asset('appimg/' . $clubdata->image_name  ) }}" style="max-height: 80px;"></td>
                      <td>{{ $clubdata->club_name }}</td>
                      <td>{{ $clubdata->stadium_name }}</td>
                      <td>{{ $clubdata->postal_code }}</td>
                      <td><a href="{{ URL::asset('/inputclubdata/updateClubData?id='.$clubdata->id )}}" class="btn btn-primary">編集</a></td>
                    </tr>
                     @endforeach
                @endif
            </tbody>
          </table>
        </div>
    </div>
</div>
@stop
