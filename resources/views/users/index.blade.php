@php
 
@endphp

<x-layout>
    <x-pageContent>
<<<<<<< HEAD
         <x-left-layout>
            <x-category/>
            <x-category/>
            <x-category/>
            <x-songlist/>
            <x-category/>
         </x-left-layout>
=======
        <x-left-layout>
            <x-category  : categoryName="Bài hát" :tongs="$baihatmois">

            </x-category>
            <x-category : categoryName="Playlist" :tongs="$playlistmois">

            </x-category>
            <x-category : categoryName="Bài hát" :tongs="$baihatmois">

            </x-category>
        </x-left-layout>
>>>>>>> 18b4434af623be9ccb0513cf1de3b5171332a5c6
        <x-right-layout >
            
        </x-right-layout>
    </x-pageContent>

</x-layout>