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
      <li><a href="{{ URL::asset('/') }}"><i class="fa fa-dashboard"></i><span>ダッシュボード</span></a></li>
      <li><a href="{{ URL::asset('/populationpyramid') }}"><i class="fa fa-align-left"></i><span>人口ピラミッド分析</span></a></li>
      <li><a href="{{ URL::asset('/heatmap') }}"><i class="fa fa-map-o"></i><span>地域別属性分析</span></a></li>
      <li class="treeview">
        <a href="#">
            <i class="fa fa-pencil-square-o"></i><span>クラブデータ</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ URL::asset('/inputclubdata') }}"><i class="fa fa-circle-o"></i>新規クラブデータ入力</a></li>
            <li><a href="{{ URL::asset('/inputclubdata/clubList') }}"><i class="fa fa-circle-o"></i>クラブデータ編集</a></li>
        </ul>
    　</li>
      <li><a href="{{ URL::asset('/importcsv') }}"><i class="fa fa-cloud-upload"></i><span>CSVインポート</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
