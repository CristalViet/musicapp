

@extends('layouts/main')
@section('ContentWarpper')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm nghệ sĩ mới</h1>
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
                
             
                
               
                <form method="POST" action="{{ route('admin.storeArtist') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Mô tả') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control  " name="description" value=""  >

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="website" class="col-md-4 col-form-label text-md-end">{{ __('website') }}</label>

                        <div class="col-md-6">
                            <input id="website" type="text" class="form-control" name="website" >

                            @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    

                   
                    <div class="row mb-3 align-items-center">
                        <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Giới tính') }}</label>

                        <div class="col-md-6">
                            <input type="radio" name="gender" id="" value="1" > Nam
                            <input type="radio" name="gender" id="" value="0"> Nữ
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label for="artist_img" class="col-md-4 col-form-label text-md-end">{{ __('Ảnh') }}</label>

                        <div class="col-md-6">
                            <input class="mb-3" type="file" name="artist_img" id="avatarInput" onchange="displayImage()" accept=".jpg, .jpeg, .png">
                            <div>
                                <img src="" alt="" id="avatarPreview" style="max-width: 100%; max-height: 200px;">
                            </div>
                        </div>
                    </div>
                    

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
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
<script>
    function displayImage() {
        var input = document.getElementById('avatarInput');
        var preview = document.getElementById('avatarPreview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>