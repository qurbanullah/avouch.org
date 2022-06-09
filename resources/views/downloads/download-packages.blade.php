<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto">
            {{-- <h1 class="text-xl font-semibold">Download</h1> --}}
        </div>
    </x-slot>
    {{-- main contents --}}
    <div class="">
        {{-- livewire about-us componenet --}}
        <div class="">
            <div>
                @livewire('download-package-component')
            </div>
        </div>
    </div>
</x-app-layout>
