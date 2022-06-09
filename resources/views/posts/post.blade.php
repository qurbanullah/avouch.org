<x-app-layout>
    <x-slot name="header">
    </x-slot>
    {{-- main contents --}}
    <div class="">
        {{-- livewire about-us componenet --}}
        <div class="">
            <div>
                @livewire('posts.post')
            </div>
        </div>
    </div>
</x-app-layout>
