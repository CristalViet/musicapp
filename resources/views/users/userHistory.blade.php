<x-userSettingLayout : activeTab="history">
    <h3>Listen history</h3>
    <div class="d-flex flex-wrap gap-2">
        @foreach($songs as $index =>$song)
        <div class="w-fit py-3 px-3 mb-4 me-1 rounded category-card">
            <a href="{{'/songs/'.$song->id}}">
                @if ($song->song_img)
                    <img style="width:150px; height:150px;margin-bottom:5px" class="rounded object-fit-cover" src="{{asset('storage/'.$song->song_img)}}" alt="..." />
                    @else
                    <img style="width:150px; height:150px;margin-bottom:5px" class="rounded object-fit-cover" src="https://i.scdn.co/image/ab67706f0000000215a41ffcf6a9fd1ed7f15ccc" alt="..." />
                @endif
            </a>
            <div class="w-100">
                <div class="small text-muted"></div>
                <h4 class=" h6" style="max-width: 150px">{{$song->title}}</h4>
                <p style="width:150px" class="category-card-description text-muted">{{$song->description}}</p>
            </div>
        </div>
        @endforeach
    </div>
</x-userSettingLayout>