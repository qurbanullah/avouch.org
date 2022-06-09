<div class="mx-auto py-4 sm:px-4 lg:px-4rounded-md dark:bg-gray-700 dark:text-white">
    <div class="container mx-auto px-4 sm:px-4">
        @section('title', config('app.name') . ' Linux' . ' - ' . 'Packages')
        <div class="py-2 ">
            <div class="w-full flex justify-center py-8">
                <h2 class="text-3xl font-semibold leading-tight">Welcome to the home of Avouch Linux Packages</h2>
            </div>
            <div>
                @livewire('packages.packages-search-component')
            </div>
            <div class="w-full flex justify-center">
                <div class="max-w-3xl grid grid-cols-12 py-4">
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('0')">0</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('1')">1</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 border" wire:click="updateLetter('2')">2</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('3')">3</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('4')">4</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 border" wire:click="updateLetter('5')">5</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('6')">6</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('7')">7</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 border" wire:click="updateLetter('8')">8</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('9')">9</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('a')">A</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 border" wire:click="updateLetter('b')">B</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('c')">C</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('d')">D</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 border" wire:click="updateLetter('e')">E</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('f')">F</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('g')">G</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 border" wire:click="updateLetter('h')">H</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('i')">I</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('j')">J</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 border" wire:click="updateLetter('k')">K</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('l')">L</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('m')">M</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 border" wire:click="updateLetter('n')">N</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('o')">O</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('p')">P</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 border" wire:click="updateLetter('q')">Q</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('r')">R</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('s')">S</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 border" wire:click="updateLetter('t')">T</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 border" wire:click="updateLetter('u')">U</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('v')">V</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('w')">W</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-l pl-2 border" wire:click="updateLetter('x')">X</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('y')">Y</button>
                    <button type="submit" class="m-1 pt-1 pr-2 pb-1 pl-2 border" wire:click="updateLetter('z')">Z</button>
                </div>
            </div>
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="sm:w-10/12 sm:flex rounded">
                    <div class="sm:flex flex-row mb-1 sm:mb-0">
                        <div class="block mt-2 sm:ml-2">
                            <select wire:model="recordsPerPage"
                            class="h-full border block w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500 rounded-2xl text-gray-800 dark:text-gray-50 bg-gray-100 dark:bg-gray-500">
                                <option disabled>Select records per page</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="40">40</option>
                                <option value="60">60</option>
                                <option value="80">80</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="block mt-2 sm:ml-2">
                            <select wire:model="distributionVersion"
                                class="h-full border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500 rounded-2xl text-gray-800 dark:text-gray-50 bg-gray-100 dark:bg-gray-500">
                                <option value="default_version">Select Avouch Version</option>
                                <option value="avh02">avh02</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex sm:w-1/2 mt-2 sm:ml-2 text-gray-600">
                        <input
                            type="text"
                            class="h-full w-full border block appearance-none bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500 rounded-2xl text-gray-800 dark:text-gray-50 bg-gray-100 dark:bg-gray-500 dark:placeholder-gray-300"
                            placeholder="Search"
                            wire:model.debounce.300ms="query"
                            wire:keydown.escape="resetVariables"
                            wire:keydown.tab="resetVariables"
                            wire:keydown.ArrowUp="decrementHighlight"
                            wire:keydown.ArrowDown="incrementHighlight"

                        />
                        <button type="submit" class="-mx-6">
                            <svg
                                class="text-gray-600 h-4 w-4 fill-current"
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                version="1.1"
                                id="Capa_1"
                                x="0px"
                                y="0px"
                                viewBox="0 0 56.966 56.966"
                                style="enable-background:new 0 0 56.966 56.966;"
                                xml:space="preserve"
                                width="512px"
                                height="512px">
                                <path
                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                            </svg>
                        </button>
                    </div>
                    <div class="sm:flex flex-row mb-1 sm:mb-0">
                        <button type="submit" class="mx-6" wire:click="resetSearch()">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true"
                                role="img"
                                width="2em"
                                height="2em"
                                preserveAspectRatio="xMidYMid meet"
                                viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-width="2" d="M20 8c-1.403-2.96-4.463-5-8-5a9 9 0 1 0 0 18h0a9 9 0 0 0 9-9m0-9v6h-6"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            {{-- The data table --}}
            <div class="flex flex-col my-4">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 shadow rounded-lg">

                            <table class="min-w-full divide-y divide-gray-200 dark:bg-gray-700 dark:text-white">
                                <thead>
                                    <tr class="dark:bg-gray-800">
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Version</th>
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Description</th>
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Maintainer</th>
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Updated On</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @if (!empty($packagesAlphnumerical))
                                        @if ($packagesAlphnumerical->count())
                                            @foreach ($packagesAlphnumerical as $item)
                                                <tr>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        <a
                                                        class="text-blue-500 hover:text-blue-400 dark:text-blue-300 dark:hover:text-blue-400"
                                                            target="_blank"
                                                            href="{{ route('packages.package-info-component', $item->name) }}">
                                                            {{ $item->slug }}
                                                        </a>
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->version . "-" . $item->release }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->description }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->maintainers }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->date_created }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                                            </tr>
                                        @endif
                                    @endif


                                    @if (!empty($query))
                                        @if ($searchedData->count())
                                            @foreach ($searchedData as $item)
                                                <tr>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        <a
                                                        class="text-blue-500 hover:text-blue-400 dark:text-blue-300 dark:hover:text-blue-400"
                                                            target="_blank"
                                                            href="{{ route('packages.package-info-component', $item->name) }}">
                                                            {{ $item->slug }}
                                                        </a>
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->version . "-" . $item->release }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->description }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->maintainers }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->date_created }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                                            </tr>
                                        @endif
                                    @else
                                        @if(empty($packagesAlphnumerical))
                                            @if ($data->count())
                                                @foreach ($data as $item)
                                                <tr>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        <a
                                                        class="text-blue-500 hover:text-blue-400 dark:text-blue-300 dark:hover:text-blue-400"
                                                            target="_blank"
                                                            href="{{ route('packages.package-info-component', $item->name) }}">
                                                            {{ $item->slug }}
                                                        </a>
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->version . "-" . $item->release }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->description }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->maintainers }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->date_created }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
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
            <br/>
            @if (!empty($query))
                {{ $searchedData->links() }}
            @endif
            @if (!empty($packagesAlphnumerical))
                {{ $packagesAlphnumerical->links() }}
            @endif
        </div>
    </div>
</div>
