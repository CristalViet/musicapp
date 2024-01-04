@extends('layouts/main')

@section('ContentWarpper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lí Playlist</h1>
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

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$countPlaylist}}<sup style="font-size: 20px"></sup></h3>

                <p>Số lượng Playlist</p>
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

        <div class="row mt-10">
          <a href="{{route("admin.addPlaylist")}}">
            <div class="btn btn-primary text-center mb-2 ml-10">Thêm</div> 
          </a>

        </div>


        <div class="row">

         <!-- Left col -->


         <table class="container  table-bordered">

          <thead class="table-primary" style="background: #007bff">
           <th>STT</th>
           <th>Chủ đề</th>
           <th>Người đăng</th>
           <th>mô tả</th>
           <th>Action</th>
          </thead>

        <tbody>
           @foreach ($playlists as $playlist)
           @php
               $nguoidang=DB::table('users')->where('id', "$playlist->user_id")->first();
           @endphp
           <tr>
               <td>{{$playlist->id}}</td>
               <td>{{$playlist->title}}</td>
               <td>{{$nguoidang->name}}</td>

               <td>{{$playlist->description}}</td>

               <td class="d-flex">
                   <a href="{{route('admin.editPlaylist', ['playlist_id' => $playlist->id])}}" class="btn btn-secondary">Sửa
                       <i class="fas fa-edit"></i>
                   </a>



                   <form action="{{route('admin.manageDeletePlaylist',['playlist'=>$playlist->id])}}" method="post">
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