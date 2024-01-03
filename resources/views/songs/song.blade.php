@php
    $playlist=[];
@endphp
<x-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div id="playlist" playlist="<?php echo htmlspecialchars(json_encode($playlist)); ?>" class="container" ></div>        <br>
        <div class="row">
            <div class="col-md-7">
                <h5 class=" text-xl">Trang chủ > {{$song->title}}</h5>
                <div class="player-container">
                    <audio id="song" >
                        <source id="source" type="audio/mpeg" src="{{asset('storage/' . $song->song_url )}}">
                    </audio>
                    <div class="progress-container">
                        <h4> {{$song->title}}</h4>
                        <p class="opacity-75">Muhammederdem</p>
                        <input id="progress" type="range" value=0>
                    </div>
                    <img class="player-img" src="https://alikinvv.github.io/minimal-player/build/img/album.jpg" alt="">
                    <div class="controls">
                        <div onClick="prev()"><i class="fa-solid fa-backward"></i></div>
                        <div onClick="playPause()"><i id="play-icon" class="fa-solid fa-play"></i></div>
                        <div onClick="next()"><i class="fa-solid fa-forward"></i></div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between align-items-center  mt-3 px-3">
                    <div class="d-flex align-items-center gap-2">
                        <img class="rounded-circle" style="height: 60px;width:60px;object-fit:cover" alt="" src="https://avatar-nct.nixcdn.com/avatar/2020/06/04/d/9/e/e/1591240258899.jpg">
                        <div class="w-fit d-flex flex-column justify-content-center align-items-center">
                            <h6 class="m-0">Tạo bởi</h6>
                            <p class="m-0">{{$author}}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                    
                       
                            
                                @if (auth()->user())
                                @php
                                
                                    $existingLike=DB::table('likes')->where('user_id',auth()->user()->id)->where('song_id',$song->id)->get();

                    
                                @endphp
                                    
                                    <a href="" id="yeuthich-btn" class="unlink" data-song-id="{{$song->id}}">
                                @if (count($existingLike)==0)
                                
                                <p class="m-0"><i class="fa-solid fa-plus border p-1 rounded-circle"></i> <span>Yêu thích</span> </p>     
                                @else
                                <p class="m-0"><i class="fa-solid fa-check border p-1 rounded-circle"></i> <span>Hủy yêu thích</span></p>  
                                 
                                @endif
                        
                                    
                                @endif
                            </a>  
                                
                    
                  
                        
                        
                        <a href="{{asset('storage/' . $song->song_url)}}" download="" class="unlink"><p class="m-0"><i class="fa-solid fa-download"></i> Tải xuống</p></a>

                    </div>
                </div>
               
                <div class=" border rounded-3 py-3 px-4 mt-3">
                    <h4 class="">Thong tin:</h4>
                    <hr>
                   
                    <div class="d-flex align-items-center gap-3 mb-1">
                        <h6 class="m-0">Tên bài hát:</h6>
                        <p class="m-0">{{$song->title}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4" >
                {{-- <div class=" border rounded-3 py-3 px-4 mt-3">
                    <h4 class="">Playlist</h4>
                    <hr>
                    <div  style="height:200px;overflow-y:scroll">
                        <table class="table table-hover " >
                            @foreach($playlist as $key => $item)
                            <tr class="" style="cursor: pointer">
                                <td class="d-flex justify-content-between align-items-center">
                                    <p class="m-0">1. <p onClick="changeSong({{$key}})" style="width:fit-content; color:black"><?php echo $item ?></p> - <a href="google.com" class="d" style="opacity: 50">mamuhaara</a></p>
                                    <i class="fa-solid fa-play text-muted "></i>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div> --}}
                {{-- <div class="p-3">
                    <h4 class="">Similar songs</h4>
                    <br>
                    <div class="d-flex gap-3 align-items-center mb-4">
                        <img class="rounded-circle" style="height:110px;width:110px;object-fit:cover" src="https://alikinvv.github.io/minimal-player/build/img/album.jpg">
                        <div class="">
                            <h5 class="">Depacito</h5>
                            <p class="">muhamara</p>
                            <p class="m-0"><i class="fa-solid fa-headphones"></i> 324 Lượt nghe</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 align-items-center mb-4">
                        <img class="rounded-circle" style="height:110px;width:110px;object-fit:cover" src="https://alikinvv.github.io/minimal-player/build/img/album.jpg">
                        <div class="">
                            <h5 class="">Depacito</h5>
                            <p class="">muhamara</p>
                            <p class="m-0"><i class="fa-solid fa-headphones"></i> 324 Lượt nghe</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 align-items-center mb-4">
                        <img class="rounded-circle" style="height:110px;width:110px;object-fit:cover" src="https://alikinvv.github.io/minimal-player/build/img/album.jpg">
                        <div class="">
                            <h5 class="">Depacito</h5>
                            <p class="">muhamara</p>
                            <p class="m-0"><i class="fa-solid fa-headphones"></i> 324 Lượt nghe</p>
                        </div>
                    </div>
                    
                </div> --}}
            </div> 
        </div>
        <div style="height: 400px"></div>
        <script>
            // let playlist=JSON.parse(document.getElementById("playlist").getAttribute('playlist'))
            let src=document.getElementById('source');
            // let currentIndex=0;
            // console.log(playlist[currentIndex])
            // src.setAttribute("src",playlist[currentIndex])
            let progress=document.getElementById('progress');
            let song=document.getElementById('song');
            let playicon=document.getElementById('play-icon');
         
            song.onloadedmetadata=function(){
                progress.max=song.duration
                progress.value=song.currentTime
            }
            function playPause(){
                if(playicon.classList.contains("fa-pause")){
                    song.pause()
                    playicon.classList.remove('fa-pause')
                    playicon.classList.add('fa-play')
                }else{
                    song.play()
                    playicon.classList.add('fa-pause')
                    playicon.classList.remove('fa-play')
                }
            }

            if(song.play()){
                setInterval(()=>{
                    progress.value=song.currentTime;
                },500)
            }
            progress.oninput=function(){
                song.play()
                song.currentTime=progress.value;
                playicon.classList.add('fa-play')
                playicon.classList.remove('fa-pause')
            }
            // function next(){
            //     if(currentIndex+1>=playlist.length)return;
            //     currentIndex++;
            //     src.setAttribute("src",playlist[currentIndex])
            //     song.currentTime = 0;
            //     song.play();
            //     console.log(playlist[currentIndex]);
            // }
            // function prev(){
            //     if(currentIndex-1<0)return;
            //     currentIndex--;
            //     src.setAttribute("src",playlist[currentIndex])
            //     song.currentTime = 0;
            //     song.play();
            //     console.log(playlist[currentIndex]);
            // }
            // function changeSong(i){
            //     currentIndex=i
            //     src.setAttribute("src",playlist[currentIndex])
            //     song.currentTime = 0;
            //     song.play();
            //     playicon.classList.remove('fa-play')
            //     playicon.classList.add('fa-pause')
            //     console.log(playlist[currentIndex]);
            // }
            song.addEventListener("ended", function(){
                currentIndex++;
                src.setAttribute("src",playlist[currentIndex])
                song.currentTime = 0;
                song.play();
                console.log(playlist[currentIndex]);
                if(!playlist[currentIndex]){
                    song.pause()
                    playicon.classList.add('fa-pause')
                    playicon.classList.remove('fa-play')
                }
            });
    </script>

        
</x-layout>

<script>




    $(document).ready(function () {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        // Bắt sự kiện khi form được submit
        $('#yeuthich-btn').click(function (event) {
            // Ngăn chặn hành vi mặc định của form
            event.preventDefault();
            console.log("Click toi day");
            // Lấy dữ liệu từ form
            var formData = $(this).serialize();
            var songId=$(this).data('song-id');
            var yeuthichURL='/yeuthich/'+ songId;
            console.log("Da click"+yeuthichURL);
            var self = $(this);
            // Gửi request AJAX
       

            $.ajax({
                type: 'POST', // hoặc 'GET' tùy thuộc vào yêu cầu của bạn
                url: yeuthichURL, // Đặt đường dẫn của máy chủ của bạn ở đây
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    console.log(response.message);
                    
                    if(response.message  == 'Yêu thích'){
                        console.log('ko desu');
                        self.find('span').text('Yêu thích');
                        self.find('i').removeClass('fa-check').addClass('fa-plus');
              
                    }
                    else {
                        console.log('Ok desu');
                        self.find('span').text('Hủy yêu thích');
                        self.find('i').removeClass('fa-plus').addClass('fa-check');
              
                    }  
                },  
                error: function (error) {
                    console.error(error);
                }
            });
        });
    });
</script>