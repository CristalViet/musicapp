@php
 
@endphp

<x-layout>
    <x-pageContent>
        <x-left-layout>
            <x-category  : categoryName="Bài hát" :tongs="$baihatmois">

            </x-category>
            <x-category : categoryName="Playlist" :tongs="$playlistmois">

            </x-category>
            <x-category : categoryName="Bài hát" :tongs="$baihatmois">

            </x-category>
        </x-left-layout>
        <x-right-layout :topSongs="$topSongs"/>
    </x-pageContent>

</x-layout>