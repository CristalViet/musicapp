@php
    $count=0;
@endphp
<x-userSettingLayout : activeTab="favourite">
    <div class="row" >
        <div class="fs-1">Playlist của bạn</div>
        <div class="d-flex">
            <input type="checkbox" name="" id="">
            <div class="btn btn-secondary ms-1">Xóa</div>
            {{-- <a href="{{route('addPlaylist')}}">
                <div class="btn btn-secondary ms-1">Tạo playlist mới</div>
            </a> --}}
            
        </div>
        <div class="pt-2"></div>
        <div class="divider"></div>
        {{-- List song --}}
        <table >
            <th>STT</th>
            <th>Tên playlist</th>
            <th>Chức năng</th>
            <tr>
                <td>1</td>
                <td>Vì ngày xưa</td>
                <td>
                    <a href="{{route('editPLaylistView')}}">
                        <button  class="unlink ms-1">
                            <i
                            class="fa-solid fa-pen-to-square"></i> Sửa
                        </button>
                    </a>
                   

                    
                    {{-- <form id="deleteSong" action="" method="post">
                        @csrf
                        @method('delete') --}}
                        <a href="Xóa" class="unlink ms-1 " type="submit">
                            <i
                            class="fa-solid fa-pen-to-square "></i> Xóa
                        </a>
                    {{-- </form> --}}
                </td>
       

           </tr>
          
                @php
                $count=0;
                @endphp
                @foreach ($playlists as $playlist)
                @php
                $count++
                @endphp
                <tr> 
                <td> {{$count}}</td>
                <td><a href="{{ route('detailPlaylist', ['playlist'=>$playlist->id]) }}">{{$playlist->title}}</a> </td>
                <td >
                    <div class=" d-flex flex-row">
                     
                     
                        <div >
                            <button href="{{route('editPLaylistView')}}" class=" ms-1 btn btn-primary ">
                                <i class="fa-solid fa-pen-to-square"></i> Sửa
                            </button>
                        </div>
                        <div >
                            <form id="deleteSong" action="playlists/{{$playlist->id}}" method="post">
                                @csrf
                                @method('delete')
                                
                                <button href="Xóa" class=" ms-1 btn btn-secondary" type="submit">
                                    <i
                                    class="fa-solid fa-pen-to-square "></i> Xóa
                                </button>
                            </form>
                        </div>
                
             
                        

                    </div>
                    
                </td>
            </tr>
                @endforeach
               
            
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
