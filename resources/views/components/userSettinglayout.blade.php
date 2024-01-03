
<x-layout>

            <div class="w-80 mt-5 row  mb-5" >
       


                <div class="col-2">
                    <div class="list-group" id="list-tab" role="tablist">
                      
                      <a class="list-group-item list-group-item-action {{ $activeTab == 'home' ? 'active' : '' }} " id="list-home-list" data-toggle="list" href="{{route('userDashBoard')}}"  aria-controls="home">Home</a>
                      <a class="list-group-item list-group-item-action {{ $activeTab == 'playlist' ? 'active' : '' }}" id="list-profile-list" data-toggle="list" href="{{route('userPlaylists')}}" aria-controls="profile">Playlist</a>
                      <a class="list-group-item list-group-item-action {{ $activeTab == 'songs' ? 'active' : '' }}" id="list-profile-list" data-toggle="list" href="{{route('userSongs')}}" aria-controls="profile">Songs</a>
                      <a class="list-group-item list-group-item-action {{ $activeTab == 'favourite' ? 'active' : '' }}" id="list-messages-list" data-toggle="list" href="{{route('favouriteSongs')}}"  aria-controls="messages">My song Favourite</a>
                      <a class="list-group-item list-group-item-action {{ $activeTab == 'history' ? 'active' : '' }}" id="list-settings-list" data-toggle="list" href="#list-settings"  aria-controls="settings">History</a>
                    </div>
                </div>
                <div class="col-10">
                   {{$slot}}
                </div>
                
            </div>
   
           <div style="height: 450px"></div>
            <script src="{{asset('js/user.js')}}"></script>
</x-layout>
