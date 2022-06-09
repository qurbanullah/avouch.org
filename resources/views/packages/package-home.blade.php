<x-app-layout>
    <x-slot name="header">
        <div class="max-w-screen-2xl mx-auto w-full px-4">
            {{-- <h1 class="text-xl font-semibold">Packages</h1> --}}
        </div>
    </x-slot>
    {{-- main contents --}}
    <div class="">
        {{-- livewire about-us componenet --}}
        <div class="">
            <div>
                @livewire('packages.package-home-component')
            </div>
        </div>
    </div>
</x-app-layout>
