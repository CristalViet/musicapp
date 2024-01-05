<x-userSettingLayout : activeTab="songs">
    <h2>Tải nhạc của bạn lên FunTune</h2>
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <form id="uploadForm" action="{{ route('storeSong') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex gap-3 justify-content-between" style="width:600px">
                <div style="width:400px">
                        <div class="form-group">
                            <label for="">Tên bài hát</label>
                            <input type="text" name="nameSong" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                </div>
                <label class="">Ảnh bài hát
                        <br/>
                        <input type="file" class="d-none" name="song_img" id="song_img" accept="image/png, image/gif, image/jpeg" />
                        <div class="d-flex" style="flex-direction: column;align-items: center">
                                <div id="imagePreview"></div>
                                <button onclick="selectImg()" type="button" id="selectImgBtn" class="btn btn-secondary" style="">Thêm ảnh bài hát</button>
                        </div>
                        @error('song_img')
                        @enderror
                </label>
        </div>
        <div class="mt-3 search-container d-flex gap-5 " >
            <div>
                <label for="">Ca sĩ</label>
                <input id="search-input" style="width:400px" type="search" name="artist" class="form-control">
                <div id="search-results" class="border"></div>
            </div>
            <div>
                <h4>Danh sách nghệ sĩ</h4>
                <div id="listAritst" ></div>
                <input type="hidden" name="artist_ids" id="artistIdsInput">
                @error('artist_ids')
                @enderror
            </div>
        </div>
        <label for=""></label>
        <div>
            <label for="">Thể loại</label>
            <select name="genre" id="" class="form-select mt-3">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}"">{{ $genre->title }}</option>
                @endforeach
            </select>
            @error('genre')
            @enderror
        </div>
        <div class="mb-3"></div>
        <input type="file" name="music_file" id="inputFile" class="d-none">
        <div class="btn btn-secondary" onclick="clickFile()">Thêm tệp</div>
        <div class="btn btn-dark" onclick="addFile()">Xác nhận tải lên</div>
        @error('music_file')
        @enderror
        <div id="fileInfo"></div>
        <div id="fileInfo2"></div>
    </form>
</x-userSettingLayout>

<script>
        const imageFileInput = document.getElementById('song_img');
        const imagePreview = document.getElementById('imagePreview');
        const selectImgBtn=document.getElementById('selectImgBtn')

        const selectImg=()=>{
                imageFileInput.click();
        }

        imageFileInput.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file) {
                        const reader = new FileReader();
                        reader.addEventListener('load', (event) => {
                        imagePreview.innerHTML = `<img style="width:150px;height:150px" class="my-2 rounded" src="${event.target.result}" alt="Preview">`;
                        });
                        reader.readAsDataURL(file);
                } else {
                        imagePreview.innerHTML = '';
                }
        });

    var selectedFile;
    var fileInput = document.getElementById('inputFile');
    var fileInfoDiv = document.getElementById('fileInfo');
    var fileInfoDiv2 = document.getElementById('fileInfo2');
    var listArtists = [];

    function clickFile() {
        fileInput.click();
        fileInput.addEventListener('change', function () {
            selectedFile = fileInput.files[0];
            alert('Đã chọn tệp ' + selectedFile.name);
            fileInfoHTML = '<p>tên tệp: ' + selectedFile.name + '</p>' +
                '<p>kích thước: ' + selectedFile.size / 1024 + 'kb</p>';
            fileInfoDiv.innerHTML = fileInfoHTML;
        });
    }

    function addFile() {
        if (selectedFile == null) {
            alert('Hãy chọn tệp');
        } else {
            document.getElementById('uploadForm').submit();
        }
    }

    $(document).ready(function () {
    $("#search-input").on("input", function () {
        var query = $(this).val();
        if (query !== "") {
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'searchArtist',
                data: { query: query },
                success: function (response) {
                    $("#search-results").html(renderResults(response.artists));
                    bindAddArtistListeners(response.artists);
                }
            });
        } else {
            $("#search-results").html("");
            console.log('đã thực hiện');
        }
    });
});

function bindAddArtistListeners(artists) {
    artists.forEach(artist => {
        if (checkExistArtist(artist)){
                document.getElementById("art" + artist.id).classList.add('disabled')
        }
        var addButton = document.getElementById("art" + artist.id);
        addButton.addEventListener("click", function (event) {
            if (!event.target.classList.contains("disabled")) {
                if (!checkExistArtist(artist)) {
                    addButton.classList.add('disabled');
                    listArtists.push(artist);
                    $("#listAritst").html(renderList(listArtists));
                    bindRemoveArtistListeners();
                    updateArtistIdsInput();
                }
            }
        });
    });
}

function bindRemoveArtistListeners() {
    listArtists.forEach(artist => {
        var removeButton = document.getElementById("artt" + artist.id);
        removeButton.addEventListener("click", function (event) {
            var artistToRemove = listArtists.find(art => art.id === artist.id);
            if (artistToRemove) {
                var addButton = document.getElementById("art" + artist.id);
                if(addButton)
                document.getElementById("art" + artist.id).classList.remove('disabled')
                listArtists = listArtists.filter(art => art.id !== artistToRemove.id);
                $("#listAritst").html(renderList(listArtists));
                bindRemoveArtistListeners();
                updateArtistIdsInput();
            }
        });
    });
}
        function updateArtistIdsInput() {
                var artistIds = listArtists.map(artist => artist.id);
                document.getElementById('artistIdsInput').value = artistIds.join(',');
        }
        function checkExistArtist(artist) {
                return listArtists.some(art => art.id === artist.id);
        }
        function renderResults(artists) {
        var html = '<ul class="list-unstyled list-group">';
        for (var i = 0; i < artists.length; i++) {
                if(!listArtists.includes(artists[i])){
                        html += '<li class="px-1 mb-1 mt-1 list-group-item d-flex justify-content-between align-items-center" style="width:100%"><p>' + artists[i].name + '</p><div id="art'+ artists[i].id +'"  class="btn btn-warning ml-8">Thêm</div></li>'
                }
                else html += '<li class="px-1 mb-1 mt-1 list-group-item d-flex justify-content-between align-items-center" style="width:100%">' + artists[i].name + '<div id="art'+ artists[i].id +'"  class="btn btn-warning disabled">Thêm</div></li>'
         
        }
        html += '</ul>';
        return html;
        }
        function shiftArtist(artist){
                listArtists.forEach(art => {
                        if(art.id==artist.id){
                                listArtists.shift();
                        }
                });
        }
        function renderList(artists) {
        
            var html = '<ul class="list-unstyled">';
            for (var i = 0; i < artists.length; i++) {
            
                    html += '<li class="px-1 mb-1 mt-1 list-group-item d-flex justify-content-between align-items-center" style="width:100%">' + artists[i].name + '<div id="artt'+ artists[i].id +'"  class="btn btn-secondary ml-2">Bỏ</div></li>'
            }
            html += '</ul>';
            return html;

        }
     
</script>