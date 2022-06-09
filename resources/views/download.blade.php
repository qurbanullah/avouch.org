<x-app-layout>
    <x-slot name="header">
        <div class="container mx-auto">
            <h3 class="px-2 text-xl font-semibold">Home</h3>
        </div>
    </x-slot>
    {{-- main contents --}}
    <div class="container mx-auto">
        {{-- livewire about-us componenet --}}
        <div class="">
            <div>
                @livewire('downloads.download-release-component')
            </div>
        </div>
    </div>
</x-app-layout>
