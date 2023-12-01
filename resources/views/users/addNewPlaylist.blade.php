
<x-userSettingLayout : activeTab="PLaylist">
    <h2>Tạo Playlist của bạn lên FunTune</h2>
        
      
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <label for="">Tên playlist</label>
                        <input type="text" name="nameSong" class="form-control">
                </div>
                
                <div class="form-group">
                        <label for="">Mô tả</label>
                        <input type="text" name="description" class="form-control">
                </div>
                <input type="file" name="avatar" id="">
                </div>
                </div>
                <input type="file" name="avatar_file" id="inputFile" class="d-none">
            <div class="btn btn-secondary" onclick="clickFile()">Thêm tệp</div>
       
            @error('music_file')
                
            @enderror
            <div id="fileInfo"></div>
            <div id="fileInfo2"></div>
            
             {{-- Chọn bài hát cho playlist --}}
            <div class="row mt-5 mb-5">
                <h2>Danh sách bài hát</h2>
                <div class="list-group col-5" >
                    {{-- <div class="input-group">
                        <div class="form-outline" data-mdb-input-init>
                          <input type="search" id="form1" class="form-control" />
                          <label class="form-label" for="form1">Search</label>
                        </div>
                        <button type="button" class="btn btn-primary" data-mdb-ripple-init>
                          <i class="fas fa-search"></i>
                        </button>
                      </div> --}}
                    
                    <div id="listsongs" class="overflow-auto" style="height: 200px" data-listsong={{$listsong}}>
                        
                        {{-- @for ($i = 0; $i < $count; $i++)
                        <div  class="list-group-item list-group-item-action d-flex justify-content-between " data-id="{{$i}}">
                            <p class="text-truncate">{{$i}} <a href="">bài hát {{$i}} </a></p>
                            <div  class="btn btn-primary" >chọn</div>
                        </div>
                        @endfor --}}
                        
                        
                   
                    </div>
                    
                </div>
                <div class="list-group col-7  ">
                    <div id="Playlist" style="height: 200px" class="overflow-auto border " >
                        
                   
                    </div>
                </div>
            </div>
            
            <div class="btn btn-secondary" onclick="addFile()">Tạo</div>
                        
            <div class="btn btn-secondary" onclick="addFile()">Xóa</div>
                        
            <div class="btn btn-secondary" onclick="addFile()">Trở lại</div>
            


   

</x-userSettingLayout>
