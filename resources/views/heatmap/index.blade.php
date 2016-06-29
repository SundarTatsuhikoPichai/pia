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
    <div class="col-md-6 col-md-offset-1">
        <div class="box box-primary">
            <div class="box-header">SearchForm</div>
            <form action="">
                <div class="box-body">
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default pull-left">クリア</button>
                        <button type="submit" class="btn btn-primary pull-right">この条件で絞り込む</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-solid">
            <div class="box-header">Geaph</div>
            <div class="box-body text-center">
                <div class="sparkline" data-type="pie" data-offset="90" data-width="100px" data-height="100px">
                    <canvas width="100" height="100" style="display: inline-block; width: 100px; height: 100px; vertical-align: top;"></canvas>
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
var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 8
  });
}
</script>
<script src="{{ 'https://maps.googleapis.com/maps/api/js?key='. env('GOOGLE_API_KEY') .'&callback=initMap' }}" async defer></script>
@stop
