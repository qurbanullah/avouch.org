<div class="relative rounded-md bg-grey-200 dark:bg-gray-900 text-gray-700 dark:text-gray-200">
    <div class="max-w-screen-2xl mx-auto w-full px-4">
        @section('title', config('app.name') . ' Linux' . ' - ' . 'Packages')
        <div class="py-2 bg-gray-200 dark:bg-gray-800">
            <div class="w-full flex justify-center py-6">
                <h2 class="text-3xl font-semibold leading-tight">Welcome to the home of Avouch Linux Packages</h2>
            </div>
            <div class="w-full p-4 flex justify-center">
                @livewire('packages.packages-search-component')
            </div>
            <div class="w-full flex justify-center">
                <div class="max-w-3xl grid grid-cols-12 py-4">
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('0')">0</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 hover:bg-blue-500" wire:click="updateLetter('2')">2</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('3')">3</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('1')">1</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('4')">4</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 hover:bg-blue-500" wire:click="updateLetter('5')">5</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('6')">6</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('7')">7</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 hover:bg-blue-500" wire:click="updateLetter('8')">8</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('9')">9</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('a')">A</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 hover:bg-blue-500" wire:click="updateLetter('b')">B</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('c')">C</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('d')">D</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 hover:bg-blue-500" wire:click="updateLetter('e')">E</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('f')">F</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('g')">G</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 hover:bg-blue-500" wire:click="updateLetter('h')">H</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('i')">I</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('j')">J</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 hover:bg-blue-500" wire:click="updateLetter('k')">K</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('l')">L</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('m')">M</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 hover:bg-blue-500" wire:click="updateLetter('n')">N</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('o')">O</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('p')">P</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 hover:bg-blue-500" wire:click="updateLetter('q')">Q</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('r')">R</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('s')">S</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 hover:bg-blue-500" wire:click="updateLetter('t')">T</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 hover:bg-blue-500" wire:click="updateLetter('u')">U</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('z')">Z</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('v')">V</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('w')">W</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 hover:bg-blue-500" wire:click="updateLetter('x')">X</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 hover:bg-blue-500" wire:click="updateLetter('y')">Y</button>
                </div>
            </div>
            {{-- The data table --}}
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden border border-solid border-slate-300 dark:border-slate-600 shadow rounded-lg">
                            <table class="min-w-full divide-y divide-slate-300 dark:divide-slate-600 dark:bg-gray-800 dark:text-white">
                                <thead>
                                    <tr class="bg-gray-400 dark:bg-gray-700">
                                        <th class="sm:w-64 px-4 py-2 text-left text-xs leading-4 font-medium uppercase tracking-wider">Name</th>
                                        <th class="px-4 py-2 text-left text-xs leading-4 font-medium uppercase tracking-wider">Description</th>
                                        <th class="sm:w-48 px-4 py-2 text-left text-xs leading-4 font-medium uppercase tracking-wider">Updated On</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-300 dark:divide-slate-600">
                                    @if (!empty($packagesAlphnumerical))
                                        @if ($packagesAlphnumerical->count())
                                            @foreach ($packagesAlphnumerical as $item)
                                                <tr>
                                                    <td class="sm:w-64 px-4 py-2 text-sm ">
                                                        <a
                                                        class="text-blue-500 hover:text-blue-400 dark:text-blue-300 dark:hover:text-blue-400"
                                                            target="_blank"
                                                            href="{{ route('packages.package-info-component', $item->name) }}">
                                                            {{ $item->slug }}
                                                        </a>
                                                    </td>
                                                    <td class="px-4 py-2 text-sm ">
                                                        {{ $item->short_description }}
                                                    </td>
                                                    </td>
                                                    <td class="sm:w-48 px-4 py-2 text-sm ">
                                                        {{ $item->updated_at }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="px-4 py-2 text-sm " colspan="4">No Results Found</td>
                                            </tr>
                                        @endif
                                    @else
                                        @if(empty($packagesAlphnumerical))
                                            @if ($data->count())
                                                @foreach ($data as $item)
                                                <tr>
                                                    <td class="sm:w-64 px-4 py-2 text-sm whitespace-no-wrap">
                                                        <a
                                                        class="text-blue-600 hover:text-blue-500 dark:text-blue-300 dark:hover:text-blue-400"
                                                            target="_blank"
                                                            href="{{ route('packages.package-info-component', $item->name) }}">
                                                            {{ $item->slug }}
                                                        </a>
                                                    </td>
                                                    <td class="px-4 py-2 text-sm whitespace-no-wrap">
                                                        {{ $item->short_description }}
                                                    </td>
                                                    <td class="sm:w-48 px-4 py-2 text-sm whitespace-no-wrap">
                                                        {{ $item->updated_at }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="px-4 py-2 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pl-2 pr-2 bg-gray-300 dark:bg-gray-700">
                @if (!empty($packagesAlphnumerical))
                    {{ $packagesAlphnumerical->links() }}
                @endif
            </div>

        </div>
    </div>
</div>
