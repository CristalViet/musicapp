

@extends('layouts/main')
@section('ContentWarpper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý nghệ sĩ</h1>
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
                <h3>{{$artists->count()}}<sup style="font-size: 20px"></sup></h3>

                <p>Số lượng nghệ sĩ</p>
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
        <form class="d-flex w-50 mb-3">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        
        <a href="{{route('admin.addArtist')}}" class="btn btn-primary mb-3">Thêm artist</a>

        <div class="row container-fluid">
          <!-- Left col -->
          <table class=" w-100 table-bordered">
           <thead class="table-primary" style="background: #007bff">
            <th>STT</th>
            <th>avatar</th>
            <th>Tên nghệ sĩ</th>
            <th>Giới thiệu</th>
            <th>website</th>
            
            <th>Action</th>
           </thead>
        
         <tbody>
          @php
          $count=0
      @endphp
            @if ($artists==null)
          

            @else
            @foreach ($artists as $artist)
           
            @php
            $count++
        @endphp
            <tr>
                <td>{{$count}}</td>
             
                <td><img src="{{asset('storage/'.$artist->art_img)}}" alt=""></td>
                <td>{{$artist->name}}</td>
                <td>okdesu</td>
                <td><p class="overflow-hidden">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit perferendis voluptate qui,</p> </td>
       
              
                <td class="d-flex">
                    <button href="" class="btn btn-secondary">Sửa
                        <i class="fas fa-edit"></i>
                    </button>
                   
                        
                       
                      <form id="" action="" method="post">
                          @csrf
                          @method('delete')
                          <button class="btn btn-primary" type="submit">Xóa
                            <i class="fas fa-trash-alt"></i>
                          </button>
                      </form>
                   
                </td>
            </tr>

            
            @endforeach
            @endif
            
           
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
