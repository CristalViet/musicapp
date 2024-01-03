@php
 
@endphp

<x-layout>
    <x-pageContent>
        <x-left-layout>
           <x-result :songs=$songs></x-result>
        </x-left-layout>
        <x-right-layout >
            
        </x-right-layout>
    </x-pageContent>
    <div style="height: 200px"></div>    
</x-layout>