
<x-userSettingLayout : activeTab="home">
    <div class="row">
        <div class="fs-1">Quản lý tài khoản</div>
        <div class="col-md-5 ">
            <div class="border border-gray p-1">
                <div class="txtInfor d-flex justify-content-between pt-2">
                    <div class="float-left flex pt-1">Giới thiệu</div>
                    <div class="btn btn-primary" id=editBtn onclick="">Chỉnh sửa</div>
                    
    
                </div>
                <p>Họ và tên {{auth()->user()->name}}</p>
                <p>Email {{auth()->user()->email}}</p>
                <p>Giới tính :
                    @if (auth()->user()->gender ==1)
                        nam
                    @else
                       nữ
                    @endif
                </p>
                <p>Trạng thái</p>
            </div>
            
            
            

        </div>
   
 
      
      
            

  
        <div class="col-md-7">
            <div class=" border border-gray p-2 ">
                <div class="txtInfor d-flex justify-content-between">
                    <div class="float-left d-flex pt-1 fw-bold">PLaylist</div>
                </div>
                <div class="d-flex ">

                    <div class=" card-playlist d-flex align-items-center justify-content-center flex-column m-1 border border-gray">
                        {{-- <img src="https://avatar-ex-swe.nixcdn.com/playlist/2016/09/09/4/c/6/e/1473409265946.jpg" class="card-img-top" alt="..."> --}}
                        <p class="text-center">{{auth()->user()->playlists->count()}} playlist</p>
                     
                    </div>
                    <div class=" card-playlist d-flex align-items-center justify-content-center flex-column m-1 border border-gray">
                        {{-- <img src="https://avatar-ex-swe.nixcdn.com/playlist/2016/09/09/4/c/6/e/1473409265946.jpg" class="card-img-top" alt="..."> --}}
                       
                        <p class="text-center">playlist của tôi</p>
                    </div>
                </div>
                
                
          
                
    
            </div>

            <div class=" border border-gray p-2 ">
                <div class="txtInfor d-flex justify-content-between">
                    <div class="float-left d-flex pt-1 fw-bold">Bài hát</div>
                </div>
                <div class="d-flex ">

                    <div class=" card-playlist d-flex align-items-center justify-content-center flex-column m-1 border border-gray">
                        {{-- <img src="https://avatar-ex-swe.nixcdn.com/playlist/2016/09/09/4/c/6/e/1473409265946.jpg" class="card-img-top" alt="..."> --}}
                        <p class="text-center">{{auth()->user()->songs->count()}} bài</p>
                    
                    </div>
                  
                </div>
                
                
          
                
    
            </div>
        </div>
    </div>
</x-userSettingLayout>
<script>
    $(document).ready(function(){
        $('#editBtn').click(function(){
            window.location.href='{{route('userSetting')}}';
        });
    })
</script>