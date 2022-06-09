<x-app-layout>
    <x-slot name="header">

        <div class="mx-auto">
            <h1 class="text-xl font-semibold">Packages</h1>
            {{-- @livewire('categories-dropdown-menus') --}}
        </div>
    </x-slot>
    {{-- main contents --}}
    <div class="">

        {{-- livewire banner componenet --}}
        {{-- <div class="">
            <div class="mx-auto">
                @livewire('banner-main')
            </div>
        </div> --}}

        {{-- livewire about-us componenet --}}
        <div class="">
            <div>
                @livewire('packages')
            </div>
        </div>
    </div>

    {{-- livewire footer componenet --}}
    <div class="">
        <div>
            @livewire('footer')
        </div>
    </div>
</x-app-layout>
