
@extends('layouts/main')
@section('ContentWarpper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lí bài hát</h1>
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
         
          </div>
          <!-- ./col -->
      
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row mt-10">
          <a href="{{route("admin.addSongs")}}">
            <div class="btn btn-primary text-center mb-2 ml-10">Thêm</div> 
          </a>
          
        </div>
        <div class="row">
         
          <!-- Left col -->
         
       
          <table class="container  table-bordered">
         
           <thead class="table-primary" style="background: #007bff">
            <th>STT</th>
            <th>Tên bài hát</th>
            <th>Người đăng</th>
           
            <th>mô tả</th>
            <th>Action</th>
           </thead>
          
         <tbody>
            @foreach ($songs as $song)
            @php
                $nguoidang=DB::table('users')->where('id', "$song->user_id")->first();

            @endphp
            <tr>
                <td>{{$song->id}}</td>
                <td>{{$song->title}}</td>
                <td>{{$nguoidang->name}}</td>
           
                <td>{{$song->description}}</td>
              
                <td class="d-flex">
                    <button href="" class="btn btn-secondary">Sửa
                        <i class="fas fa-edit"></i>
                    </button>
                   
                        
                       
                      <form id="" action="songs/2" method="post">
                          @csrf
                          @method('delete')
                          <button class="btn btn-primary" type="submit">Xóa
                            <i class="fas fa-trash-alt"></i>
                          </button>
                      </form>
                   
                </td>
            </tr>

            
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
