@php
    $playlist=$songs;
    $assetPath=asset('storage/');
@endphp
<x-layout>
    <div id="playlist" playlist="<?php echo htmlspecialchars(json_encode($playlist)); ?>" class="mt-10 container" style="height: 10px;"></div>        <br>
        <div class="row">
            <div class="col-md-7">
                <h5 class=" text-xl">Trang chủ > <span id="namesong3"></span> </h5>
                <div class="player-container">
                    <audio id="song" >
                        <source id="source" type="audio/mpeg" src="">
                    </audio>
                    {{-- https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3 --}}
                    <div class="progress-container">
                        <h4 id="namesong">Despacito</h4>
                        <p id="tacgia" class="opacity-75">Muhammederdem</p>
                        <input id="progress" type="range">
                    </div>
                    <img class="player-img" src="https://alikinvv.github.io/minimal-player/build/img/album.jpg" alt="">
                    <div class="controls">
                        <div onClick="prev()"><i class="fa-solid fa-backward"></i></div>
                        <div onClick="playPause()"><i id="play-icon" class="fa-solid fa-play"></i></div>
                        <div onClick="next()"><i class="fa-solid fa-forward"></i></div>
                    </div>
                </div>
                
                
                {{-- <div class=" d-flex align-items-center mt-3 px-3 gap-5 border py-3 rounded-3" style="background-color: ">
                    <h6><i class="fa-solid fa-tag"></i> Tags:</h6>
                    <div class="d-flex flex-wrap gap-3">
                        <p class="m-0 p-1 px-2 rounded-3 text-light" style="background-color: grey">Nhacj hanf</p>
                        <p class="m-0 p-1 px-2 rounded-3 text-light" style="background-color: grey">Nhacj hanf</p>
                        <p class="m-0 p-1 px-2 rounded-3 text-light" style="background-color: grey">Nhacj hanf</p>
                    </div>
                </div> --}}
                <div class=" border rounded-3 py-3 px-4 mt-3">
                    <h4 class="">Thong tin:</h4>
                    <hr>
                   
                  
                   
                    <div class="d-flex align-items-center gap-3 mb-1">
                        <h6 class="m-0">Tên bài hát:</h6>
                        <h4 id="namesong2"></h4>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4" >
                <div class=" border rounded-3 py-3 px-4 mt-3">
                    @php
                        $count=0;
                    @endphp
                    <h4 class="">Playlist</h4>
                    <hr>
                    <div  style="height:200px;overflow-y:scroll">
                        <table class="table table-hover " >
                            @foreach($playlist as $key => $item)
                            @php
                                 $count++;
                            @endphp
                            <tr class="" style="cursor: pointer">
                                <td class="d-flex justify-content-between  text-center">
                                    <p class="m-0 text-center">{{$count}} <p onClick="changeSong({{$key}})" style="width:fit-content; color:black">{{$item->title}}</p> <a href="google.com" class="unlink" style="opacity: 50"></a></p>
                                    <i class="fa-solid fa-play text-muted "></i>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
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
            <div style="height: 200px"></div>
        </div>
        <script>
            let playlist=JSON.parse(document.getElementById("playlist").getAttribute('playlist'))
            let src=document.getElementById('source');
            var currentIndex=0;
            let namesong=document.getElementById('namesong');
            let namesong2=document.getElementById('namesong2');
            
            let namesong3=document.getElementById('namesong3');
            let currentSongTime = 0;
            src.setAttribute("src","{{$assetPath}}/" + playlist[currentIndex].song_url)
            namesong.innerText=playlist[currentIndex].title
            let progress=document.getElementById('progress');
            let song=document.getElementById('song');
            let playicon=document.getElementById('play-icon');
            let author=document.getElementById('author');
            let progressChanged=false;
            song.onloadedmetadata=function(){
                progress.max=song.duration
                progress.value=currentSongTime
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
            
            
            // if(song.ongplaying()){
            //     setInterval(()=>{
       
            //         progress.value=song.currentTime;
                  
            //     },500)
                
           
          
            // }
            // song.onplaying = function() {
            //     song.addEventListener('timeupdate', function() {
                 
            //             if(!progressChanged)
            //             {
            //                 progress.value = song.currentTime;
            //                 // song.currentTime=progress.value;

            //             }
            //                 // Chỉ cập nhật giá trị progress nếu người dùng chưa tương tác với nó
      
             
                   
                     
    
            //     });
            // };

            song.ontimeupdate = function () {
                if (song.duration) {
                    const progressPercent = Math.floor(
                    (song.currentTime / song.duration) * 100
                    );
                    progress.value = progressPercent;
                }
                };

    // Xử lý khi tua song
    // Handling when seek
                
        progress.onchange = function(e) {
            // progressChanged=true;
            const seekTime=song.duration/100*e.target.value;
            song.currentTime=seekTime;
            console.log(currentSongTime);
         

          

        //     // Kiểm tra xem người dùng đã thực hiện thay đổi giá trị progress hay chưa

        //         // Nếu có thay đổi, thì mới cập nhật giá trị currentTime
            
            

     

            playicon.classList.add('fa-pause');
            playicon.classList.remove('fa-play');
            progressChanged=false;
      
        //     progressChanged=false;

        };
       
            function next(){
                if(currentIndex+1>=playlist.length)return;
                currentIndex++;
                src.setAttribute("src","{{$assetPath}}/" + playlist[currentIndex].song_url)
                namesong.innerText=playlist[currentIndex].title
                namesong2.innerText=playlist[currentIndex].title
                namesong3.innerText=playlist[currentIndex].title
                song.load();
     
                song.currentTime = 0;
                song.play();
                console.log(playlist[currentIndex]);
     
            }
            function prev(){
                if(currentIndex-1<0)return;
                currentIndex--;
                src.setAttribute("src","{{$assetPath}}/" + playlist[currentIndex].song_url)
                namesong.innerText=playlist[currentIndex].title
                namesong2.innerText=playlist[currentIndex].title
                namesong3.innerText=playlist[currentIndex].title
                song.load();
                
                song.play();
                console.log(playlist[currentIndex]);
   
            }
            function changeSong(i){
                currentIndex=i
                src.setAttribute("src","{{$assetPath}}/" + playlist[currentIndex].song_url)
                namesong.innerText=playlist[currentIndex].title
                namesong2.innerText=playlist[currentIndex].title
                namesong3.innerText=playlist[currentIndex].title
                song.load();
                song.currentTime = 0;

                song.play();
                playicon.classList.remove('fa-play')
                playicon.classList.add('fa-pause')
             
                console.log( "{{$assetPath}}/" + playlist[currentIndex].song_url);
            }
            song.addEventListener("ended", function(){
                currentIndex++;
                src.setAttribute("src","{{$assetPath}}/" + playlist[currentIndex].song_url)
                song.load();
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