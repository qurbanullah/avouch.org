<div class="container mx-auto max-w-3xl">
    <div class="w-full">
        <div class="relative w-full">
            <div class="flex justify-center">                
                <input
                    type="text"
                    class="w-96 form-input rounded text-gray-800 dark:text-gray-100 bg:gray-100 dark:bg-gray-700 dark:placeholder-gray-400 border border-solid border-gray-300 dark:border-slate-600"
                    placeholder="Search packages..."
                    wire:model.debounce.800ms="query"
                    wire:keydown.escape="resetVariables"
                    wire:keydown.tab="resetVariables"
                    wire:keydown.arrow-up="decreamentHighlight"
                    wire:keydown.arrow-down="increamentHighlight"
                    wire:keydown.enter="selectPackage"
                />
                <span class="input-group-text flex items-center px-3 py-1.5 text-base font-normal text-gray-500 dark:text-gray-400 text-center whitespace-nowrap rounded -ml-12" id="basic-addon2">
                    <svg
                        xmlns="http://www.w3.org/2000/svg" 
                        aria-hidden="true" 
                        focusable="false" 
                        data-prefix="fas" 
                        data-icon="search" 
                        role="img"
                        width="1.4em" 
                        height="1.4em"
                        viewBox="0 0 512 512">
                        <path fill="currentColor" 
                            d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                        </path>
                    </svg>
                </span>
            </div>
            <div class="text-sm flex justify-center">
                @if (!empty($this->query))
                    <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="resetVariables"></div>

                    <div class="absolute w-96 divide-y divide-slate-400 dark:divide-slate-600 list-group shadow-lg bg-gray-100 dark:bg-gray-700">
                        @if (!empty($packages))
                            @foreach ($packages as $i => $item)
                                <a
                                    href="{{ route('packages.package-info-component', $item['name']) }}"
                                    class="w-min-full p-1 list-item list-none hover:bg-blue-500 {{ $this->highlightIndex === $i ? 'bg-blue-500' : '' }}"
                                >
                                {{ $item ['name'] }}
                                </a>
                            @endforeach
                        @else
                            <div class="list-group">No result!</div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

