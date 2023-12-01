@php
    $count=0;
@endphp
<x-userSettingLayout : activeTab="playlist">
    <div class="row">
        <div class="fs-1">Playlist của bạn</div>
        <div class="d-flex">
            <input type="checkbox" name="" id="">
            <div class="btn btn-secondary ms-1">Xóa</div>
            <a href="{{route('addPlaylist')}}">
                <div class="btn btn-secondary ms-1">Thêm bài hát</div>
            </a>
            
        </div>
        
        <div class="divider"></div>
        {{-- List song --}}
        <table >
            <th>STT</th>
            <th>Tên bài hát</th>
            <th>Chức năng</th>
            <tr>
                <td>1</td>
                <td>Vì ngày xưa</td>
                <td>
                    <a href="Sửa" class="unlink ms-1">
                        <i
                        class="fa-solid fa-pen-to-square"></i> Sửa
                    </a>

                    <a href="Xóa" class="unlink ms-1">
                        <i
                        class="fa-solid fa-pen-to-square"></i> Xóa
                    </a>
                </td>
               
            </tr>
            {{-- @foreach ($songs as $song)
            @php
                $count++;
            @endphp 
             <tr>
               
                <td> {{playlist}} </td>
                <td>{{playlist  }}</td>
                <td> 
                    <a href="{{route('showInfoSong',[$song])}}" class="btn btn-secondary unlink ms-1">
                        <i
                        class="fa-solid fa-pen-to-square"></i> Sửa
                    </a> 
                    <form id="deleteSong" action="songs/{{$song->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button  class=" btn btn-secondary unlink ms-1" type="submit">
                            <i
                            class="fa-solid fa-pen-to-square"></i> Xóa
                    </button>
                    </form> 
                    
                 
                    
                 </td>
               
            </tr>
            @endforeach --}}
        </table>
    </div>
</x-userSettingLayout>
