  @extends('layouts.master')

  @section('page-title')
  CSVインポート
  @stop

  @section('addCss')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/inputClubData.css') }}">
  @stop

  @section('content')
  <div class="row">

    <div class="col-md-12">
      {!! Form::open(['url' => 'importcsv/create', 'enctype' => 'multipart/form-data']) !!}
      <div class="box">
        <div class="cont">
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
      </div>
      {!! Form::close() !!}
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">CSVインポート履歴</h3>
        </div>
        <div class="box-body">
          <table class="table table-striped">
            <tbody>
              <tr>
                <th>#</th>
                <th>ファイルネーム</th>
                <th>登録日時</th>
              </tr>
              @foreach($csvFiles as $key=>$csvFile)
              <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $csvFile['file_name'] }}</td>
                <td>{{ $csvFile['created_at'] }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @stop
