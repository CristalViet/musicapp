<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FunTune | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('/')}}https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/')}}plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('/')}}https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('/')}}plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('/')}}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('/')}}plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/')}}dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('/')}}plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('/')}}plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="https://medialabs.asia/wp-content/uploads/2020/05/4453222_cover.jpg" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('layouts/nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">
      <img src="data:image/jpeg;base64,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" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">FunTune</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{auth()->user()->avatarLink ? asset('storage/'.auth()->user()->avatarLink)  : 'https://inkythuatso.com/uploads/thumbnails/800/2023/03/6-anh-dai-dien-trang-inkythuatso-03-15-26-36.jpg'}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @include('layouts.menu')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('ContentWarpper')
  {{-- <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
                  <span title="3 New Messages" class="badge badge-primary">3</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">Alexander Pierce</span>
                      <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      Is this template really for free? That's unbelievable!
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Sarah Bullock</span>
                      <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      You better believe it!
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">Alexander Pierce</span>
                      <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      Working with AdminLTE on a great new app! Wanna join?
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Sarah Bullock</span>
                      <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      I would love to.
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts">
                  <ul class="contacts-list">
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                          <span class="contacts-list-msg">How have you been? I was...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user7-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-right">2/23/2015</small>
                          </span>
                          <span class="contacts-list-msg">I will be waiting for...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user3-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nadia Jolie
                            <small class="contacts-list-date float-right">2/20/2015</small>
                          </span>
                          <span class="contacts-list-msg">I'll call you back at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user5-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nora S. Vans
                            <small class="contacts-list-date float-right">2/10/2015</small>
                          </span>
                          <span class="contacts-list-msg">Where is your new...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user6-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            John K.
                            <small class="contacts-list-date float-right">1/27/2015</small>
                          </span>
                          <span class="contacts-list-msg">Can I take a look at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="dist/img/user8-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Kenneth M.
                            <small class="contacts-list-date float-right">1/4/2015</small>
                          </span>
                          <span class="contacts-list-msg">Never mind I found...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contacts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->

            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  To Do List
                </h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm">
                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo1" id="todoCheck1">
                      <label for="todoCheck1"></label>
                    </div>
                    <!-- todo text -->
                    <span class="text">Design a nice theme</span>
                    <!-- Emphasis label -->
                    <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                      <label for="todoCheck2"></label>
                    </div>
                    <span class="text">Make the theme responsive</span>
                    <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo3" id="todoCheck3">
                      <label for="todoCheck3"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo4" id="todoCheck4">
                      <label for="todoCheck4"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo5" id="todoCheck5">
                      <label for="todoCheck5"></label>
                    </div>
                    <span class="text">Check your messages and notifications</span>
                    <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo6" id="todoCheck6">
                      <label for="todoCheck6"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
            <div class="card bg-gradient-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Sales Graph
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Mail-Orders</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">In-Store</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div> --}}
  <!-- /.content-wrapper -->
    @include('layouts/footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('/')}}plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/')}}plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('/')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('/')}}plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('/')}}plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('/')}}plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('/')}}plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/')}}plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('/')}}plugins/moment/moment.min.js"></script>
<script src="{{asset('/')}}plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('/')}}plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('/')}}plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/')}}plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/')}}dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/')}}dist/js/pages/dashboard.js"></script>
</body>
</html>
