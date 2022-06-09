<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto">
            <h3 class="text-xl font-semibold">Open Source</h3>
        </div>
    </x-slot>
    {{-- main contents --}}
    <div class="">

        {{-- livewire about-us componenet --}}
        <div class="">
            <div>
                @livewire('open-source-component')
            </div>
        </div>
    </div>
</x-app-layout>
