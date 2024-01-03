

@extends('layouts/main')
@section('ContentWarpper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lí người dùng</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
                <h3>{{$numberAccounts}}</h3>

                <p>Số lượng tài khoản hiện có</p>
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
                <h3>{{$numberSongs}}<sup style="font-size: 20px"></sup></h3>

                <p>Số lượng bài hát</p>
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
                <h3>Số lượng thể loại</h3>

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
          <table class="container  table-bordered">
           <thead class="table-primary" style="background: #007bff">
            <th>STT</th>
            <th>Name</th>
            <th>email</th>
            <th>Gender</th>
            <th>Role</th>
            <th>Action</th>
           </thead>
        
         <tbody>
            @foreach ($listUser as $user)
        
            @if ($user->id!=auth()->user()->id)
            <tr>
                <td>1</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->gender}}</td>
                <td>
                    @if ($user->role==1)
                           {{ 'người dùng' }}
                    @else
                        {{ 'admin' }}
                    @endif
                </td>
                <td class="d-flex">
                  <a href="{{route('editUser',['user'=>$user->id])}}">
                    <button href="" class="btn btn-secondary">Sửa
                      <i class="fas fa-edit"></i>
                  </button>
                  </a>
                   
                   
                        
                       
                      <form id="formDeleteUser{{$user->id}}" action="{{route('destroyUser',['user'=>$user->id])}}" method="post">
                          @csrf
                          @method('delete')
                          <button class="btn btn-primary" type="submit">Xóa
                            <i class="fas fa-trash-alt"></i>
                          </button>
                      </form>
                   
                </td>
            </tr>
            @endif
            
            @endforeach
           
         </tbody>
            

          </table>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
