<x-app-layout>
    <x-slot name="header">
        <div class="max-w-screen-2xl mx-auto w-full px-4">
            {{-- <h3 class="text-xl font-semibold">Home</h3> --}}
        </div>
    </x-slot>
    {{-- main contents --}}
    <div class="">
        {{-- livewire banner componenet --}}
        <div class="">
            <div class="">
                @livewire('home-banner-component')
            </div>
        </div>

        {{-- livewire about-us componenet --}}
        <div class="">
            <div>
                @livewire('home-component')
            </div>
        </div>
    </div>
</x-app-layout>
