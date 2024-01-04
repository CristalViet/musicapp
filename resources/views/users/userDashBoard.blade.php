
<x-userSettingLayout : activeTab="home">
    <div class="">
        <div class="fs-1">Quản lý tài khoản</div>
        <br/>
        <div class="mb-2">
            <div class="border border-gray p-1 rounded" style="padding-left: 20px !important;padding-right: 10px !important">
                <div class=" d-flex justify-content-between pt-2">
                    <h4 class="float-left flex pt-1">Thông tin tài khoản</h4>
                    <div class="btn btn-primary" id=editBtn onclick="">Chỉnh sửa</div>
                </div>
                <div class="d-flex align-items-center" style="gap:30px">
                    <img id="imagePreview" style="width:140px;height:140px" class="my-2 rounded-circle" src="{{ asset('storage/' . auth()->user()->avatarLink)}}" alt="">
                    <div>
                        <h6>Họ và tên: <span style="font-weight: initial">{{auth()->user()->name}}</span></h6>
                        <h6>Email: <span  style="font-weight: initial">{{auth()->user()->email}}</span></h6>
                        <h6>Giới tính :
                            <span  style="font-weight: initial">
                                @if (auth()->user()->gender ==1)
                                    Nam
                                @else
                                   Nữ
                                @endif
                            </span>
                        </h6>
                        {{-- <p>Trạng thái</p> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex gap-2" >
            <div class=" border border-gray p-2 rounded" style="flex-basis: 50%">
                <div class="txtInfor d-flex justify-content-between">
                    <div class="float-left d-flex pt-1 fw-bold">Bài hát</div>
                </div>
                <br/>
                {{-- <div class="d-flex ">

                    <div class=" card-playlist d-flex align-items-center justify-content-center flex-column m-1 border border-gray">
                        <img src="https://avatar-ex-swe.nixcdn.com/playlist/2016/09/09/4/c/6/e/1473409265946.jpg" class="card-img-top" alt="...">
                        <p class="text-center">{{auth()->user()->songs->count()}} bài</p>
                    
                    </div>
                </div> --}}
                <div class="d-flex gap-2 ">
                    @foreach(auth()->user()->songs as $index =>$song)
                    @if($index<5)
                    <div class="">
                        <a href="{{'/songs/'.$song->id}}">
                            @if ($song->song_img)
                                <img style="width:100px; height:100px;margin-bottom:5px" class="rounded object-fit-cover" src="{{asset('storage/'.$song->song_img)}}" alt="..." />
                                @else
                                <img style="width:100px; height:100px;margin-bottom:5px" class="rounded object-fit-cover" src="https://i.scdn.co/image/ab67706f0000000215a41ffcf6a9fd1ed7f15ccc" alt="..." />
                            @endif
                        </a>
                        <div class="w-100">
                            <div class="small text-muted"></div>
                            <h4 class=" h6" style="max-width: 100px">{{$song->title}}</h4>
                        
                        </div>
                    </div>
                    @elseif($index==5)
                    <div class="rounded-circle d-flex justify-content-between align-items-center" style="padding:8px 12px;background-color: lightgrey">
                        <h6 class="mute"> +{{auth()->user()->songs->count()-$index}} </h6>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class=" border border-gray p-2 rounded"  style="flex-basis: 50%">
                <div class="txtInfor d-flex justify-content-between" >
                    <div class="float-left d-flex pt-1 fw-bold">PLaylist</div>
                </div>
                <br/>
                {{-- <div class="d-flex ">

                    <div class=" card-playlist d-flex align-items-center justify-content-center flex-column m-1 border border-gray">
                        <img src="https://avatar-ex-swe.nixcdn.com/playlist/2016/09/09/4/c/6/e/1473409265946.jpg" class="card-img-top" alt="...">
                        <p class="text-center">{{auth()->user()->playlists->count()}} playlist</p>
                     
                    </div>
                    <div class=" card-playlist d-flex align-items-center justify-content-center flex-column m-1 border border-gray">
                        <img src="https://avatar-ex-swe.nixcdn.com/playlist/2016/09/09/4/c/6/e/1473409265946.jpg" class="card-img-top" alt="...">
                        
                        <p class="text-center">playlist của tôi</p>
                    </div>
                </div> --}}
                <div class="d-flex gap-2 ">
                    @foreach(auth()->user()->playlists as $index =>$playlist)
                    @if($index<5)
                    <div class="">
                        <a href="{{'/playlists/'.$playlist->id}}">
                            @if ($playlist->playlist_img)
                                <img style="width:100px; height:100px;margin-bottom:5px" class="rounded object-fit-cover" src="{{asset('storage/'.$playlist->playlist_img)}}" alt="..." />
                                @else
                                <img style="width:100px; height:100px;margin-bottom:5px" class="rounded object-fit-cover" src="https://i.scdn.co/image/ab67706f0000000215a41ffcf6a9fd1ed7f15ccc" alt="..." />
                            @endif
                        </a>
                        <div class="w-100">
                            <div class="small text-muted"></div>
                            <h4 class=" h6" style="max-width: 100px">{{$playlist->title}}</h4>
                        
                        </div>
                    </div>
                    @else
                    <div class="rounded-circle d-flex justify-content-between align-items-center" style="padding:8px 12px;background-color: lightgrey">
                        <h6 class="mute"> +{{auth()->user()->songs->count()-$index}} </h6>
                    </div>
                    @endif
                    @endforeach
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