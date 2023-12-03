@php
    $count=0;
@endphp
<x-userSettingLayout : activeTab="songs">
    <div class="row">
        <div class="fs-1">Danh sách bài hát của playlist {{$playlist->title}}</div>
        <div class="d-flex">
            <input type="checkbox" name="" id="">
            <div class="btn btn-secondary ms-1">Xóa</div>
            <a href="">
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
            @foreach ($songs as $song)
            
            @php
                $count++;
            @endphp
            <tr>
               
                <td> {{$count}} </td>
                <td> <a href="/songs/{{$song->id}}">{{$song->title}}</a> </td>
                <td class="d-flex">
                    <div>
                        <a href="{{route('showInfoSong',[$song->id])}}" class="btn btn-secondary unlink ms-1">
                            <i
                            class="fa-solid fa-pen-to-square"></i> Sửa
                        </a>
                    </div>
                    <div>
                        <form id="deleteSong" action="songs/{{$song->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button  class=" btn btn-secondary unlink ms-1" type="submit">
                                <i
                                class="fa-solid fa-pen-to-square"></i> Xóa
                        </button>
                        </form>
                    </div>
                    
                    
                 
                    
                </td>
               
            </tr>
            @endforeach
        </table>
    </div>
</x-userSettingLayout>
<script>
   
</script>