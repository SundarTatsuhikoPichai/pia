@extends('layouts.master')

@section('page-title')
クラブ人口ピラミッド
@stop

@section('addJs')
<script type="text/javascript" src="{{ asset('bower_components/jquery.narrows.js/jquery.narrows.js') }}"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  var dataArray = [];
  $(function() {
    $("select#club.form-control").narrows("select#year.form-control", {
      disable_if_parent_is_null: true
    });
  });

  $(function() {
    var club, year, grade;
    $("select#club, select#year, select#member-grade").change(function() {
      club  = $("select#club").val();
      year  = $("select#year").val();
      grade = $("select#member-grade").val();
      grade_j = $("select#member-grade option:selected").text();
      if (club && year && grade) {
        executeAjax(club, year, grade, grade_j);
      }
    }).change();
  });

  function executeAjax(club, year, grade) {
    $.ajax({
      type: 'POST',
      url: '/populationpyramid',
      data: {
        "club_name": club,
        "year": year,
        "member_grade": grade,
        "_token": "{!! csrf_token() !!}"
      },
      dataType: 'json',
    })
    .done(function(data) {;
      dataArray = data;
      chart();
      $('.club-data-1').text(year + '年' + club + ' : ' + grade_j);
      $('#compare').prop("disabled", false);
    })
    .fail(function(data) {;
      console.log('error');
    });
  }

  google.load("visualization", "1", {packages:["corechart"]});
  function chart() {
    var data = google.visualization.arrayToDataTable(dataArray);
    var chart = new google.visualization.BarChart(document.getElementById('chart_div_1'));
    var options = {
      isStacked: true,
      hAxis: {
          format: ';'
      },
      vAxis: {
          direction: -1
      }
    };
    var formatter = new google.visualization.NumberFormat({
        pattern: ';'
    });
    formatter.format(data, 2);
    chart.draw(data, options);
  }
  function compare() {
    $('.club-data-2').text($('.club-data-1').text());
    var data = google.visualization.arrayToDataTable(dataArray);
    var chart = new google.visualization.BarChart(document.getElementById('chart_div_2'));
    var options = {
      isStacked: true,
      hAxis: {
          format: ';'
      },
      vAxis: {
          direction: -1
      }
    };
    var formatter = new google.visualization.NumberFormat({
        pattern: ';'
    });
    formatter.format(data, 2);
    chart.draw(data, options);
  }
</script>
@stop

@section('content')
<div clas="row">
  <div class="box box-primary">
    <div class="box-header with-border"><h3 class="box-title">条件選択</h3></div>
    <form role="form" method="post" class="horizontal">
      <div class="box-body">
        <div class="form-group col-md-6">
          <label>クラブ選択</label>
          <select name="club" class="form-control" id="club">
            <option value="">-- select --</option>
            @foreach($clubNames as $clubName)
            <option value="{{ $clubName }}">{{ $clubName }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>年度選択</label>
          <select name="year" class="form-control" id="year">
            <option value="">-- select --</option>
            @foreach($clubs as $club)
            <option value="{{ $club['year'] }}" data-club="{{ $club['club_name'] }}">{{ $club['year'] }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>会員ランク選択</label>
          <select name="member-grade" class="form-control" id="member-grade">
            <option value="">-- select --</option>
            <option value="A">シーズンパス会員</option>
            <option value="B">有料会員</option>
            <option value="C">無料会員</option>
          </select>
        </div>
      </div>
    </form>
  </div>
  <div class="box box-primary">
    <div class="box-header with-border"><h3 class="box-title">人口ピラミッド</h3></div>
    <div class="box-body">
      <div class="col-md-6">
        <h4 class="club-data-1" style="text-align: center;"></h4>
        <div id="chart_div_1" style="width: 100%; height: 400px;"></div>
      </div>
      <div class="col-md-6">
        <h4 class="club-data-2" style="text-align: center;"></h4>
        <div id="chart_div_2" style="width: 100%; height: 400px;"></div>
      </div>
    </div>
    <div class="box-footer">
    <button type="button" id="compare" class="btn btn-primary" onclick="compare()" disabled>比較する</button>
    </div>
  </div>
</div>
@stop
