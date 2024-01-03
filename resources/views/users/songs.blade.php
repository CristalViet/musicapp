@php
    $count=0;
@endphp
<x-userSettingLayout : activeTab="songs">
    <div class="row">
        <div class="fs-1">Bài hát của mình</div>
        <div class="d-flex">
            <input type="checkbox" name="" id="">
            <div class="btn btn-secondary ms-1">Xóa</div>
            <a href="{{route('addSong')}}">
                <div class="btn btn-secondary ms-1">Thêm bài hát</div>
            </a>
            
        </div>
        <div class="pt-2"></div>    
        <div class="divider"></div>
        {{-- List song --}}
        <table >
            <th>STT</th>
            <th>Tên bài hát</th>
            <th>Chức năng</th>
            
            @foreach ($songs as $song)
            @php
                $count++;
            @endphp
            <tr>
               
                <td> {{$count}} </td>
                <td><a href="/songs/{{$song->id}}">{{$song->title}}</td>
                <td class="d-flex">
                    <div>
                        <a href="{{route('showInfoSong',[$song])}}" class="btn btn-secondary unlink ms-1">
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