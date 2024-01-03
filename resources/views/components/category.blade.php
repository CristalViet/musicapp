<!-- Nested row for non-featured blog posts-->
@php
<<<<<<< HEAD
    $categoryName="PLAYLISTS >"    
@endphp
<h4 style="cursor: pointer;" class="mb-4 cursor-pointer">{{$categoryName}}</h4>

<div class="d-flex gap-3 flex-wrap justify-content-between ">
                           
        <!-- Blog post-->
        <div class="w-fit py-3 px-3 mb-4 me-1 rounded category-card">
            <a href="#!"><img style="width:150px; height:150px" class="rounded object-fit-cover" src="https://i.scdn.co/image/ab67706f0000000215a41ffcf6a9fd1ed7f15ccc" alt="..." /></a>
            <div class="w-100">
                <div class="small text-muted">January 1, 2023</div>
                <h2 class=" h5">Post Title</h2>
                <p style="width:150px" class="category-card-description text-muted">lorem asda sd asdasd sadasd a saf asdadf</p>
            
            </div>
        </div>
        <div class="w-fit py-3 px-3 mb-4 me-1 rounded category-card">
            <a href="#!"><img style="width:150px; height:150px" class="rounded object-fit-cover" src="https://i.scdn.co/image/ab67706f0000000215a41ffcf6a9fd1ed7f15ccc" alt="..." /></a>
            <div class="w-100">
                <div class="small text-muted">January 1, 2023</div>
                <h2 class=" h5">Post Title</h2>
                <p style="width:150px" class="category-card-description text-muted">lorem asda sd asdasd sadasd a saf</p>
            
            </div>
        </div>
        <div class="w-fit py-3 px-3 mb-4 me-1 rounded category-card">
            <a href="#!"><img style="width:150px; height:150px" class="rounded object-fit-cover" src="https://i.scdn.co/image/ab67706f0000000215a41ffcf6a9fd1ed7f15ccc" alt="..." /></a>
            <div class="w-100">
                <div class="small text-muted">January 1, 2023</div>
                <h2 class=" h5">Post Title</h2>
                <p style="width:150px" class="category-card-description text-muted">lorem asda sd asdasd sadasd a saf</p>
            
            </div>
        </div>
        <div class="w-fit py-3 px-3 mb-4 me-1 rounded category-card">
            <a href="#!"><img style="width:150px; height:150px" class="rounded object-fit-cover" src="https://i.scdn.co/image/ab67706f0000000215a41ffcf6a9fd1ed7f15ccc" alt="..." /></a>
            <div class="w-100">
                <div class="small text-muted">January 1, 2023</div>
                <h2 class=" h5">Post Title</h2>
                <p style="width:150px" class="category-card-description text-muted">lorem asda sd asdasd sadasd a saf</p>
            
            </div>
        </div>                   
=======
    $category=$categoryName;    
    
    if($category=='Bài hát'){
        $kieu='/songs';
    }
    else $kieu='playlists';
@endphp
<h4 style="cursor: pointer;" class="mb-4 cursor-pointer">{{$category}} </h4>

<div class="d-flex gap-3 flex-wrap  ">
                           
        <!-- Blog post-->
        @foreach ($tongs as $tong)
        <div class="w-fit py-3 px-3 mb-4 me-1 rounded category-card">
            <a href="{{$kieu.'/'.$tong->id}}"><img style="width:150px; height:150px" class="rounded object-fit-cover" src="https://i.scdn.co/image/ab67706f0000000215a41ffcf6a9fd1ed7f15ccc" alt="..." /></a>
            <div class="w-100">
                <div class="small text-muted"></div>
                <h2 class=" h5">{{$tong->title}}</h2>
                <p style="width:150px" class="category-card-description text-muted">{{$tong->description}}</p>
            
            </div>
        </div>
        @endforeach
        
                      
>>>>>>> 18b4434af623be9ccb0513cf1de3b5171332a5c6
</div>
