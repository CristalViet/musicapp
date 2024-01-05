
<x-userSettingLayout : activeTab="PLaylist">
    <h2>Sửa playlist {{$playlist->title}}  </h2>
        
            <form action="/user/editPlaylist/{{$playlist->id}}" method="POST" id="formPlaylist" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <meta name="csrf-token" content="{{ csrf_token() }}" />

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="">Tên playlist</label>
                            <input type="text" name="title" class="form-control" value="{{$playlist->title}}">
                    </div>
                    @error('title')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                   
                <div class="form-group">
                            <label for="">Mô tả</label>
                            <input type="text" name="description" class="form-control" value="{{$playlist->description}}">
                    </div>
                    @error('description')
                    <p class="text-danger">{{$message}}</p>
                    
                    @enderror
                    
                    <input type="file" name="playlist_img" id="inputFile" class="d-none" accept="image/*">
                <div class="btn btn-secondary mt-2" onclick="clickFile()">Thêm tệp</div>
                <div id="divtoShow"></div>

                </div>
                @error('playlist_img')
                <p class="text-danger">{{$message}}</p>
                    
                @enderror
              
                <label for="">Bài hát thật</label>
                      
                            <input id="search-input" type="search" name="songs" class="w-40 form-control" id="" >
                            <input type="hidden" name="danhsachcu" id="danhsachcu" value="{{$danhsachcu}}">
                 {{-- Chọn bài hát cho playlist --}}
                <div class="row mt-5 mb-5">
                    <h2>Danh sách bài hát</h2>
                    <div class="list-group col-md-5 col-12" >
                        {{-- <div class="input-group">
                            <div class="form-outline" data-mdb-input-init>
                              <input type="search" id="form1" class="form-control" />
                              <label class="form-label" for="form1">Search</label>
                            </div>
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init>
                              <i class="fas fa-search"></i>
                            </button>
                          </div> --}}
                        
                     
                        <div id="listsongs" class="overflow-auto" style="height: 200px" >
                            
                            {{-- @for ($i = 0; $i < $count; $i++)
                            <div  class="list-group-item list-group-item-action d-flex justify-content-between " data-id="{{$i}}">
                                <p class="text-truncate">{{$i}} <a href="">bài hát {{$i}} </a></p>
                                <div  class="btn btn-primary" >chọn</div>
                            </div>
                            @endfor --}}
                            
                            
                       
                        </div>
                        
                    </div>
                    <div class="list-group col-md-7 col-12  ">
                        <div id="Playlist" style="height: 200px" class="overflow-auto border " >
                            
                       
                        </div>
                    </div>
                 
                    <input type="hidden"  id="playlist_send" name="playlist_send"  >
                
                </div>
                
                
            </div>
                
            
            </form>
      
                <div class="btn btn-secondary "  onclick="sendFormPlaylist()">Lưu</div>
                        

                        
            <div class="btn btn-secondary" onclick="">Trở lại</div>

      
   

        <script>
            
        </script>

</x-userSettingLayout>
<script src="{{asset('js/user3.js')}}"></script>