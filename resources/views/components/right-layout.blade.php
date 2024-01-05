<!-- Side widgets-->
@php
    // dd($topSongs)
@endphp
<div class="col-lg-4">
                  
    <!-- Categories widget-->
    
    <!-- Side widget-->
    <div class=" mb-4">
        
    <div class=" fs-4 text-primary">Bảng Xếp Hạng</div>
        <ul class="list-unstyled">
            {{-- record bài hát --}}
        @foreach ($topSongs as $index => $song)
            @if($index==0)
            <li class="d-flex gap-2 mb-2 p-2 rank-card">
                <div class="">
                    <a href="" class="unlink thumbnail-music">
                        <div class="relative">
                            <img style="width:100px;height:100px" class=" rounded" src="{{asset('storage/'.$song->song_img)}}" alt="">
                            {{-- <span class="number d-flex align-items-center justify-center rounded special-1">
                                1
                            </span> --}}
                        </div>
                    </a>
                </div>
                <div class="">
                    <div class="fw-semibold">
                        <a href="songs/4" class="unlink">{{$song->title}}</a>
                    </div>
                    <div class="text-muted">
                        {{$song->artist_name}}                    
                    </div>
                </div>
                <hr/>
            </li>
            @else
            <li class="d-flex gap-3 mb-2  p-2 rank-card">
                    <div class="">
                        <span class="number special-{{$index+1}} fs-5">
                            {{$index+1}}
                        </span>
                    </div>
                    <div class="">
                        <div class="fw-semibold">
                            {{$song->title}}
                        </div>
                        <div class="text-muted">
                            {{$song->artist_name}} 
                        </div>
                    </div>
            </li>
            @endif
            @endforeach
            {{-- record bài hát --}}
            
           
            
       </ul>
    </div>
    {{-- <div class=" mb-4">
        <div class="card-header text-primary mb-2 fs-3">Chủ đề HOT</div>
        <div class="card-body w-100">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-2">
                        <li class="">
                            <a title="RAP VIỆT" href="#!"><img class="w-100 rounded" src="https://avatar-ex-swe.nixcdn.com/topic/thumb/2020/06/22/9/7/b/e/1592812587983_org.jpg" alt=""></a>   
                        </li>
                        <li  class="">
                            <a title="RAP VIỆT" href="#!"><img class="w-100 rounded" src="https://avatar-ex-swe.nixcdn.com/topic/thumb/2020/06/18/9/5/f/7/1592450065128_org.jpg" alt=""></a>
                        </li>
                        <li  class="">
                            <a title="RAP VIỆT" href="#!"><img class="w-100 rounded" src="https://avatar-ex-swe.nixcdn.com/topic/thumb/2022/12/29/d/7/e/a/1672295549195_org.jpg" alt=""></a>
                        </li>
                        
                    </ul>
                </div>
                
            </div>
        </div>
    </div> --}}
</div>