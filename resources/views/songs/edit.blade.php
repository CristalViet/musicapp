<x-userSettingLayout : activeTab="songs">
    <h2>Chỉnh sửa thông tin bài hát của bạn trên FunTune</h2>
        <form id="uploadForm" action="{{route('updateSong',[$song])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                        <label for="">Tên bài hát</label>
                        <input type="text" name="title" class="form-control" value="{{$song->title}}">
                </div>
                
                <div class="form-group">
                        <label for="">Mô tả</label>
                        <input type="text" name="description" class="form-control" value="{{$song->description}}">
                </div>
                <div class="mt-3"></div>
                <input type="file" name="music_file" id="inputFile" class="d-none" accept=".mp3">
                <div class="btn btn-secondary" onclick="clickFile()">Thêm tệp</div>
                <div class="btn btn-secondary" onclick="addFile()">Xác nhân tải lên</div>
                @error('music_file')
                    <p>{{$message}} </p>
                @enderror
                <div id="fileInfo"></div>
                <div id="fileInfo2"></div>
        </form>

       

</x-userSettingLayout>
<script>
      
      var selectedFile;
        var fileInput=document.getElementById('inputFile');
        var fileInfoDiv=document.getElementById('fileInfo'); 
        var fileInfoDiv2=document.getElementById('fileInfo2'); 
        function clickFile(){
                fileInput.click();
                fileInput.addEventListener('change',function(){
                selectedFile=fileInput.files[0];
                
                alert('Đã chọn tệp' + selectedFile.name);
                fileInfoHTML='<p> tên tệp:'+selectedFile.name +'</p>'
                              +'<p> kích thước:'+selectedFile.size/1024+'kb' +'</p>';

                fileInfoDiv.innerHTML=fileInfoHTML;
                });
        }
        function addFile(){
            document.getElementById('uploadForm').submit();
               

        }
</script>