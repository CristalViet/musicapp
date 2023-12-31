<!-- Nested row for non-featured blog posts-->
@php
    $category=$categoryName;    
@endphp
<h4 style="cursor: pointer;" class="mb-4 cursor-pointer">{{$category}} </h4>

<div class="d-flex gap-3 flex-wrap  ">
                           
        <!-- Blog post-->
        @foreach ($baihatmois as $baihatmoi)
        <div class="w-fit py-3 px-3 mb-4 me-1 rounded category-card">
            <a href="/songs/{{{$baihatmoi->id}}}"><img style="width:150px; height:150px" class="rounded object-fit-cover" src="https://i.scdn.co/image/ab67706f0000000215a41ffcf6a9fd1ed7f15ccc" alt="..." /></a>
            <div class="w-100">
                <div class="small text-muted">$baihatmoi-></div>
                <h2 class=" h5">{{$baihatmoi->title}}</h2>
                <p style="width:150px" class="category-card-description text-muted">{{$baihatmoi->description}}</p>
            
            </div>
        </div>
        @endforeach
        
                      
</div>
