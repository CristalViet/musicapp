
<x-userSettingLayout : activeTab="Songs">
        <h2>Tải nhạc của bạn lên FunTune</h2>
        <form id="uploadForm" action="{{route('storeSong')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                        <label for="">Tên bài hát</label>
                        <input type="text" name="nameSong" class="form-control">
                </div>
                
                <div class="form-group">
                        <label for="">Mô tả</label>
                        <input type="text" name="description" class="form-control">
                </div>
                <div class="mt-3">
                        <label for="">Ca sĩ</label>
                        <input type="search" name="" class="form-control " id="">
                </div>
                <label for=""></label>
                <div>
                        <label for="">Thể loại</label>
                        <select name="genre" id="" class="form-select mt-3">
                                <option value="">Nhạc trữ tình</option>
                                <option value="">Nhạc cách mạng</option>
                                <option value="">Nhạc hoài cổ</option>
                        </select>
                </div>
                <div class="mb-3"></div>
                <input type="file" name="music_file" id="inputFile" class="d-none">
                <div class="btn btn-secondary" onclick="clickFile()">Thêm tệp</div>
                <div class="btn btn-secondary" onclick="addFile()">Xác nhân tải lên</div>
                @error('music_file')
                    
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
            if(selectedFile==null){
                alert('Hãy chọn tệp');

            }
            else{
                // alert('Tải lên tệp thành công ' + selectedFile.name);
                
                document.getElementById('uploadForm').submit();
            }
               

        }
</script>