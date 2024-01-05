
<style>
    .card-playlist{
    width: 200px;
    height: 200px;
    background-color: aqua;
    
}
</style>
<x-userSettinglayout : activeTab="home">

    <div class="" style="width:100%">
        <div class="tab-content" id="nav-tabContent" style="width:100%">
          <div class="tab-pane fade show active d-flex" style="width:100%" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            
            <form action="{{'change'}}" class="d-flex" style="width:100%" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <meta name="csrf-token" content="{{ csrf_token() }}">

              
                <div class="d-flex align-items-center" style="flex-direction: column">
                    <div id="" class="d-flex border rounded" style="flex-direction: column;align-items: center; padding:10px 20px">
                        <h5 for="avatar">Avatar</h5>
                        <img id="imagePreview" style="width:150px;height:150px" class="my-2 rounded" src="{{ asset('storage/' . auth()->user()->avatarLink)}}" alt="">
                        <button onclick="selectImg()" type="button" id="chooseAvatarButton" class="btn btn-primary" style="">Chọn Avatar</button>
                    </div>
                    @error('avatar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    <div class="flex-grow-1 ms-3">
                        <input type="file" name="avatar" id="avatarInput"  class="d-none" accept=".jpg, .jpeg, .png">
                        {{-- <button type="button" id="chooseAvatarButton" class="btn btn-primary">Chọn Avatar</button> --}}
                    </div>
                </div>
            {{-- </form>
            
           
            <form method="POST" style="width:600px" action="{{ route('changeInforUser') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT') --}}
                <div style="width:600px">
                    <h5 class="" style="margin-left:80px">Thông tin cơ bản</h5>
                    <br/>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name }}" required autocomplete="name" autofocus>
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
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    
                    <div class="row mb-3 align-items-center">
                        <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Giới tính') }}</label>
                        <div class="col-md-6">
                            @if (auth()->user()->gender==1)
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
                </div>
            </form>
        </div>



          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
            qqwewq
          </div>
          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
        </div>
    </div>
    
</x-userSettinglayout>
<script>
        const avatarInput = document.getElementById('avatarInput');
        const imagePreview = document.getElementById('imagePreview');
        const chooseAvatarButton=document.getElementById('chooseAvatarButton')
        const imgInput=document.getElementById('imgInput')


        const selectImg=()=>{
            avatarInput.click();
        }

        avatarInput.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file) {
                        const reader = new FileReader();
                        reader.addEventListener('load', (event) => {
                        imagePreview.src=event.target.result
                        });
                        reader.readAsDataURL(file);
                } else {
                        imagePreview.src = '';
                }
                
        });
    
    // $(document).ready(function(){
    //     $('#chooseAvatarButton').click(function(){
    //         $('#avatarInput').click();
    //     })

    //     $('#avatarInput').change(function(){
            
    //         var file=this.files[0];
            
    //         if(file){
          

    //             var formData=new FormData();

                
    //             formData.append('avatar',file);
    //             formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
    //             // console.log($('meta[name="csrf-token"]').attr('content'));
    //                         for (var pair of formData.entries()) {
    //             // pair[0] là tên trường, pair[1] là giá trị (trong trường hợp này là File)
                
    //             // Kiểm tra xem giá trị có phải là File không
    //             if (pair[1] instanceof File) {
    //                 // Lấy tên của File
    //                 var fileName = pair[1].name;
    //                 var fileSize = pair[1].size;
    //                 console.log('Tên file:', fileName);
    //                 console.log('Tên file:', fileSize);
    //             }
    //         }
    //             $.ajax({
    //                 url:'{{route('update-avatar')}}',
    //                 method:'POST',
    //                 data: formData,
    //                 processData:false,
    //                 contentType:false,
    //                 headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
               
    //                      },
    //                 // success:function(response){
    //                 //     // $('#avatarPreview').attr('src',response.avatarLink);
    //                 //     alert('Cap nhap avatar thanh cong.');
    //                 // },
    //                 // error: function(error){
    //                 //     console.log(error);
    //                 //     alert('Có lỗi xảy ra khi cập nhập avatar');
    //                 // }
    //             success: function(response) {
    //                 console.log(response);
    //             },
    //             error: function(error) {
    //                 console.log(error);
    //             }
    //             });
    //         }
    //     });
    //     // $('#saveButton').click(function(){

    //     // });
    // });
</script>