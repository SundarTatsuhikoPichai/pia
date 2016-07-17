@extends('layouts.master')

@section('page-title')
ヒートマップ
@stop

@section('addCss')
<style media="screen">
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}
#map {
    height: 500px;
}
</style>
@stop


@section('content')
<div class="row">
    <div class="col-md-7 col-md-offset-1">
        <div class="box box-primary">
            <div class="box-header">SearchForm</div>
              {!! Form::open(['url' => 'heatmap']) !!}
                <div class="box-body">
                  <div class="form-group col-md-6">
                    {!! Form::label('年度') !!}
                    <select class="form-control" name="year">
                      @foreach($years as $year)
                      <option value="{{ $year }}" {{ Session::has('year') && session('year') == $year ? 'selected' : ''}}>{{ $year }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    {!! Form::label('チーム名') !!}
                    <select class="form-control" name="club_id">
                      @foreach($clubs as $id => $club_name)
                      <option value="{{ $id }}" {{ Session::has('club_id') && session('club_id') == $id ? 'selected' : ''}}>{{{ $club_name }}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <a href="#" class="btn btn-default pull-left">クリア</a>
                        {!! Form::submit('この条件で絞り込む', ['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                </div>
              {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="box box-solid">
            <div class="box-header">Geaph</div>
            <div class="box-body text-center">
                <div class="col-md-12">
                  <i class="glyphicon glyphicon-stop pull-left" style="color: #6add31; background: #6add31;"></i><span>~ 3</span>
                </div>
                <div class="col-md-12">
                  <i class="glyphicon glyphicon-stop pull-left" style="color: #f5f502; background: #f5f502;"></i><span>~ 9</span>
                </div>
                <div class="col-md-12">
                  <i class="glyphicon glyphicon-stop pull-left" style="color: #ee0101; background: #ee0101;"></i><span>10 ~</span>
                </div>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-success">
            <div class="box-header">HeatMap</div>
            <div class="box-body">
                <div class="col-lg-12" id="map"></div>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>
@stop


@section('addJs')
<script type="text/javascript">
function callback() {
    /* Data points defined as a mixture of WeightedLocation and LatLng objects */
    var heatMapData = [
      @if(isset($mapedLatlngs))
        @foreach($mapedLatlngs as $latlng)
          {location: new google.maps.LatLng(
            {{ $latlng['lng'] }}, {{ $latlng['lat'] }}), weight: {{ $latlng['count'] < 5 ? 1 : $latlng['count'] < 10 ? 2 : 3 }} },
        @endforeach
      @endif
    ];

    @if(isset($homeStadiumLatlng))
    var homeStadium =  new google.maps.LatLng(
      {{ $homeStadiumLatlng['lng'] }}, {{ $homeStadiumLatlng['lat'] }});
    @else
    var homeStadium =  new google.maps.LatLng(35.692951, 139.698414);
    @endif

    map = new google.maps.Map(document.getElementById('map'), {
      center: homeStadium,
      zoom: 13,
    });

    var heatmap = new google.maps.visualization.HeatmapLayer({
      data: heatMapData
    });
    heatmap.set('radius', 15);
    heatmap.setMap(map);
}
</script>
<script src="{{ 'https://maps.googleapis.com/maps/api/js?key='. env('GOOGLE_API_KEY') .'&libraries=visualization&sensor=true_or_false&callback=callback' }}" async defer></script>
@stop
