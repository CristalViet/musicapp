

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
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
   
          <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                
                <form action="{{route('update-avatar')}}" enctype="multipart/form-data" method="POST">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
    
                    @method('PUT')
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                          
                            {{-- @dd(auth()->user()->avatarLink) --}}
                          <img width="200px" height="200px" id="avatarPreview" class="mb-3" src="{{ asset('storage/' . $user->avatarLink)}}" alt="ok">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <label for="avatar">Avatar</label>
                            <input type="file" name="avatar" id="avatarInput" value="Đổi avatar" class="d-none" accept=".jpg, .jpeg, .png">
                            <button type="button" id="chooseAvatarButton" class="btn btn-primary">Chọn Avatar</button>
                        </div>
                    </div>
                </form>
                
               
                <form method="POST" action="{{ route('updateUser',['user'=>$user]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name }}" required autocomplete="name" autofocus>
    
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email }}" required autocomplete="email">
    
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                      <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mật khẩu') }}</label>
  
                      <div class="col-md-6">
                          <input id="password" type="password" class="form-control " name="password" value="">
  
                          @error('password')
                            
                                  <p>{{ $message }}</p>
              
                          @enderror
                      </div>
                  </div>
    
                    
                    
    
                    <div class="row mb-3 align-items-center">
                        <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Giới tính') }}</label>
    
                        <div class="col-md-6">
                            @if ($user->gender==1)
                            <input type="radio" name="gender" id="" value="1" checked> Nam
                            <input type="radio" name="gender" id="" value="0" > Nữ
                            @else
                            <input type="radio" name="gender" id="" value="1" > Nam
                            <input type="radio" name="gender" id="" value="0" checked> Nữ
                            
                            @endif
                            
                           
                        </div>
                    </div>
                    {{-- <div class="row mb-3 align-items-center">
                        <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Ảnh') }}</label>
    
                        <div class="col-md-6">
                            <input class="mb-3" type="file" name="avatar" id="avatarInput" onchange="displayImage()" accept=".jpg, .jpeg, .png">
                            <div>
                                <img src="" alt="" id="avatarPreview" style="max-width: 100%; max-height: 200px;">
                            </div>
                        </div>
                    </div> --}}
                    
    
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" id="saveButton" class="btn btn-primary">
                                {{ __('Lưu') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
    
    
    
             
            </div>
        </div>
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
