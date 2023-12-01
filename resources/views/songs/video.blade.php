
<x-layout>
    <div class="mt-10 container" style="height: 1000px;">
        <br>
        <div class="row">
            <div class="col-md-7">
                <h5 class=" text-xl">Trang chủ > Depacito</h5>
                <div class="player-container">
                    <audio id="song" >
                    
                        <source type="audio/mpeg" src="{{asset('storage/' . $song->song_url)}}">
                    </audio>
                    {{-- https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/2.mp3 --}}
                    <div class="progress-container">
                        <h4> {{$song->title}}</h4>
                        <p class="opacity-75">Muhammederdem</p>
                        <input id="progress" type="range" value=0>
                    </div>
                    <img class="player-img" src="https://alikinvv.github.io/minimal-player/build/img/album.jpg" alt="">
                    <div class="controls">
                        <div><i class="fa-solid fa-backward"></i></div>
                        <div onClick="playPause()"><i id="play-icon" class="fa-solid fa-play"></i></div>
                        <div><i class="fa-solid fa-forward"></i></div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center  mt-3 px-3">
                    <div class="d-flex align-items-center gap-2">
                        <img class="rounded-circle" style="height: 60px;width:60px;object-fit:cover" alt="" src="https://avatar-nct.nixcdn.com/avatar/2020/06/04/d/9/e/e/1591240258899.jpg">
                        <div class="w-fit d-flex flex-column justify-content-center align-items-center">
                            <h6 class="m-0">Tạo bởi</h6>
                            <p class="m-0">user123</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <p class="m-0"><i class="fa-solid fa-plus border p-1 rounded-circle"></i> Thêm vào playlist</p>
                        <p class="m-0"><i class="fa-solid fa-download"></i> Tải xuống</p>
                    </div>
                </div>
                <div class=" d-flex align-items-center mt-3 px-3 gap-5 border py-3 rounded-3" style="background-color: ">
                    <h6><i class="fa-solid fa-tag"></i> Tags:</h6>
                    <div class="d-flex flex-wrap gap-3">
                        <p class="m-0 p-1 px-2 rounded-3 text-light" style="background-color: grey">Nhacj hanf</p>
                        <p class="m-0 p-1 px-2 rounded-3 text-light" style="background-color: grey">Nhacj hanf</p>
                        <p class="m-0 p-1 px-2 rounded-3 text-light" style="background-color: grey">Nhacj hanf</p>
                    </div>
                </div>
                <div class=" border rounded-3 py-3 px-4 mt-3">
                    <h4 class="">Thong tin:</h4>
                    <hr>
                    <div class="d-flex align-items-center gap-3 mb-1">
                        <h6 class="m-0">Tên bài hát:</h6>
                        <p class="m-0">Depacito</p>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-1">
                        <h6 class="m-0">Tên bài hát:</h6>
                        <p class="m-0">Depacito</p>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-1">
                        <h6 class="m-0">Tên bài hát:</h6>
                        <p class="m-0">Depacito</p>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-1">
                        <h6 class="m-0">Tên bài hát:</h6>
                        <p class="m-0">Depacito</p>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-1">
                        <h6 class="m-0">Tên bài hát:</h6>
                        <p class="m-0">Depacito</p>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4" >
                <div class=" border rounded-3 py-3 px-4 mt-3">
                    <h4 class="">Playlist</h4>
                    <hr>
                    <div  style="height:200px;overflow-y:scroll">
                        <table class="table table-hover " >
                            <tr class="" style="cursor: pointer">
                                <td class="d-flex justify-content-between align-items-center">
                                    <p class="m-0">1. <a href="google.com" style="text-decoration: none; color:black">Song 1</a> - <a href="google.com" class="d" style="opacity: 50">mamuhaara</a></p>
                                    <i class="fa-solid fa-play text-muted "></i>
                                </td>
                            </tr>
                            <tr class="" style="cursor: pointer">
                                <td class="d-flex justify-content-between align-items-center">
                                    <p class="m-0">2. <a href="google.com" style="text-decoration: none; color:black">Song 1</a> - <a href="google.com" class="d" style="opacity: 50">mamuhaara</a></p>
                                    <i class="fa-solid fa-play text-muted "></i>
                                </td>
                            </tr>
                            <tr class="" style="cursor: pointer">
                                <td class="d-flex justify-content-between align-items-center">
                                    <p class="m-0">3. <a href="google.com" style="text-decoration: none; color:black">Song 1</a> - <a href="google.com" class="d" style="opacity: 50">mamuhaara</a></p>
                                    <i class="fa-solid fa-play text-muted "></i>
                                </td>
                            </tr>
                            <tr class="" style="cursor: pointer">
                                <td class="d-flex justify-content-between align-items-center">
                                    <p class="m-0">4. <a href="google.com" style="text-decoration: none; color:black">Song 1</a> - <a href="google.com" class="d" style="opacity: 50">mamuhaara</a></p>
                                    <i class="fa-solid fa-play text-muted "></i>
                                </td>
                            </tr>
                            <tr class="" style="cursor: pointer">
                                <td class="d-flex justify-content-between align-items-center">
                                    <p class="m-0">5. <a href="google.com" style="text-decoration: none; color:black">Song 1</a> - <a href="google.com" class="d" style="opacity: 50">mamuhaara</a></p>
                                    <i class="fa-solid fa-play text-muted "></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="p-3">
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
                    
                </div>
            </div> 
        </div>
        <script>
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
                playicon.classList.add('fa-pause')
                playicon.classList.remove('fa-play')
            }
        </script>
</x-layout>