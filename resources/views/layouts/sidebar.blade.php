<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
      <li><a href="{{ URL::asset('/') }}"><i class="fa fa-link"></i>ダッシュボード</a></li>
      <li><a href="{{ URL::asset('/populationpyramid') }}"><i class="fa fa-link"></i>人口ピラミッド分析</a></li>
      <li><a href="{{ URL::asset('/heatmap') }}"><i class="fa fa-link"></i>地域別属性分析</a></li>
      <li><a href="{{ URL::asset('/inputclubdata') }}"><i class="fa fa-link"></i>クラブデータ入力</a></li>
      <li><a href="{{ URL::asset('/importcsv') }}"><i class="fa fa-link"></i>CSVインポート</a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
