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
        </table>
    </div>
</x-userSettingLayout>