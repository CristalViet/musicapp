

@extends('layouts/main')
@section('ContentWarpper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm genre mới</h1>
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
                
             
                
               
                <form method="POST" action="">
                    @csrf
                    @method('POST')
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Tên thể loại') }}</label>
    
                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="" required autocomplete="name" autofocus>
    
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                                {{ __('Thêm') }}
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
