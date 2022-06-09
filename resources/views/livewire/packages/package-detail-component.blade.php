<x-slot name="header">
    <div class="max-w-screen-2xl mx-auto w-full px-4 bg-grey-200 dark:bg-gray-900 text-gray-700 dark:text-gray-200">
        <h2 class="text-base font-semibold">Package Detail</h2>
    </div>
</x-slot>
<div class="mt-2 bg-grey-200 dark:bg-gray-900 text-gray-700 dark:text-gray-200">
    <div class="max-w-screen-2xl mx-auto w-full px-4">
        <div class="w-full sm:flex flex-nowrap shadow-xl sm:rounded-lg">
            <div class="w-full">
                <div class="bg-grey-200 dark:bg-gray-800">
                    @if(!empty($this->name))
                        {{-- page title --}}
                        @section('title', config('app.name') . ' Linux package - ' . $this->name . '-' . $this->version . '-' . $this->release . '-' . $this->release . '-' . $this->distribution . '-' . $this->architecture)
                        <div class="w-full">
                            {{-- Package info --}}
                            <div class="w-full sm:flex">
                                <div class="w-full">
                                    <div class="w-full sm:grid sm:grid-cols-3 pb-1 border-b bg-gray-300 dark:bg-gray-700">
                                        <div>
                                            <h2 class="pl-2 text-xl font-semibold">
                                                <a
                                                    href="{{ route('packages.packages-group-detail-component', $this->groups) }}"
                                                    class="hover:underline"
                                                >
                                                    {{ $this->groups }}
                                                </a>
                                                <span>/</span>
                                            </h2>

                                            <h1 class="pl-2 text-2xl font-semibold">
                                                <span>{{ $this->name }}</span>
                                                <span>{{ $this->version }}</span>
                                                <span>-</span>
                                                <span>{{ $this->release }}</span>
                                            </h1>
                                        </div>
                                        <div>
                                            <div class="p-2">{{ $this->description }}</div>
                                            <div class="pl-2">
                                                <a
                                                    href="{{ $this->sourceUrl }}"
                                                    class="text-blue-500 dark:text-blue-300 hover:underline"
                                                >
                                                    {{ $this->sourceUrl }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full sm:grid grid-cols-2 gap-4 text-sm">
                                        <div class="">
                                            <div class="w-full flex pt-2 pl-2">
                                                <div class="flex-1 w-32">Architecture:</div>
                                                <div class="flex-1 w-48">

                                                    @if(isset($this->architecture))
                                                        @if(is_array($this->architecture))
                                                            {{-- more than one elements in the array --}}
                                                            @foreach ($this->architecture as $architecture)
                                                                <span class="pr-2">
                                                                    {{ $architecture }}
                                                                </span>
                                                            @endforeach
                                                        @else
                                                            {{-- only one element in the array --}}
                                                            {{ $this->architecture }}
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="w-full flex pt-2 pl-2">
                                                <div class="flex-1 w-32">Groups:</div>
                                                <div class="flex-1 w-48">{{ $this->groups }}</div>
                                            </div>
                                            <div class="w-full flex pt-2 pl-2">
                                                <div class="flex-1 w-32">Disribution:</div>
                                                <div class="flex-1 w-48">{{ $this->distribution }}</div>
                                            </div>
                                            <div class="w-full flex pt-2 pl-2">
                                                <div class="flex-1 w-32">License:</div>
                                                <div class="flex-1 w-48">
                                                    @if(isset($this->license))
                                                        @if(is_array($this->license))
                                                            {{-- more than one elements in the array --}}
                                                            @foreach ($this->license as $license)
                                                                <span class="pr-2">
                                                                    {{ $license }}
                                                                </span>
                                                            @endforeach
                                                        @else
                                                            {{-- only one element in the array --}}
                                                            {{ $this->license }}
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="w-full flex pt-2 pl-2">
                                                <div class="flex-1 w-32">Provides:</div>
                                                <div class="flex-1 w-48">
                                                    @if(isset($this->provides))
                                                        @if(is_array($this->provides))
                                                            {{-- more than one elements in the array --}}
                                                            @foreach ($this->provides as $provide)
                                                                <span class="pr-2">
                                                                    {{ $provide }}
                                                                </span>
                                                            @endforeach
                                                        @else
                                                            {{-- only one element in the array --}}
                                                            {{ $this->provides }}
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="w-full flex pt-2 pl-2">
                                                <div class="flex-1 w-32">Conflicts:</div>
                                                <div class="flex-1 w-48">
                                                    @if(isset($this->conflicts))
                                                        @if(is_array($this->conflicts))
                                                            {{-- more than one elements in the array --}}
                                                            @foreach ($this->conflicts as $conflict)
                                                                <span class="pr-2">
                                                                    {{ $conflict }}
                                                                </span>
                                                            @endforeach
                                                        @else
                                                            {{-- only one element in the array --}}
                                                            {{ $this->conflicts }}
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="w-full flex pt-2 pl-2">
                                                <div class="flex-1 w-32">Maintainers:</div>
                                                <div class="flex-1 w-48">
                                                    @if(isset($this->maintainers))
                                                        @if(is_array($this->maintainers))
                                                            {{-- more than one elements in the array --}}
                                                            @foreach ($this->maintainers as $maintainer)
                                                                <span class="">
                                                                    {{ $maintainer }}
                                                                </span>
                                                            @endforeach
                                                        @else
                                                            {{-- only one element in the array --}}
                                                            {{ $this->maintainers }}
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="w-full flex pt-2 pl-2">
                                                <div class="flex-1 w-32">Contributors:</div>
                                                <div class="flex-1 w-48">
                                                    @if(isset($this->contributors))
                                                        @if(is_array($this->contributors))
                                                            {{-- more than one elements in the array --}}
                                                            @foreach ($this->contributors as $contributor)
                                                                <span class="">
                                                                    {{ $contributor }}
                                                                </span>
                                                            @endforeach
                                                        @else
                                                            {{-- only one element in the array --}}
                                                            {{ $this->contributors }}
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="w-full flex pt-2 pl-2">
                                                <div class="flex-1 w-32">Installed Size:</div>
                                                @if($this->installedSize)
                                                    <div class="flex-1 w-48">{{ $this->installedSize }}</div>
                                                @endif
                                            </div>
                                            <div class="w-full flex pt-2 pl-2">
                                                <div class="flex-1 w-32">Date reated:</div>
                                                @if($this->dateCreated)
                                                    <div class="flex-1 w-48">{{ $this->dateCreated }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="pt-2 sm:flex sm:justify-end">
                                            <div class="max-w-md sm:p-8 bg-white rounded-lg border shadow-md dark:bg-gray-800 dark:border-gray-700">
                                                <div class="flex justify-between items-center mb-4">
                                                    <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">External Resources</h3>
                                                </div>
                                                <div class="flow-root">
                                                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                                        <li class="flex space-x-3 py-2 sm:py-2">
                                                            <!-- Icon -->
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                aria-hidden="true"
                                                                role="img"
                                                                width="1em"
                                                                height="1em"
                                                                preserveAspectRatio="xMidYMid meet"
                                                                viewBox="0 0 16 16">
                                                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                                                    <circle cx="4.5" cy="3.5" r="1.75"/>
                                                                    <circle cx="11.5" cy="3.5" r="1.75"/>
                                                                    <circle cx="4.5" cy="12.5" r="1.75"/>
                                                                    <path d="M5.25 8.25c3 0 6 .5 6-2.5m-6.5 4.5v-4.5"/>
                                                                </g>
                                                            </svg>
                                                            <a
                                                                class="pl-2 text-sm font-normal leading-tight text-blue-600 hover:underline dark:text-blue-400"
                                                                target="_blank"
                                                                href="https://github.com/avouchlinux/pkgbuild/tree/main/{{ $this->groups }}/{{ $this->name }}">
                                                                Source Files
                                                            </a>
                                                        </li>

                                                        <li class="flex space-x-3 py-2 sm:py-2">
                                                            <!-- Icon -->
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                aria-hidden="true"
                                                                role="img"
                                                                width="1em"
                                                                height="1em"
                                                                preserveAspectRatio="xMidYMid meet"
                                                                viewBox="0 0 16 16">
                                                                <g fill="currentColor">
                                                                    <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318C0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                                                                </g>
                                                            </svg>
                                                            <button
                                                                wire:click="download"
                                                                class="pl-2 text-sm font-normal leading-tight text-blue-600 hover:underline dark:text-blue-400"
                                                            >
                                                                Download
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- End Package info --}}

                            {{-- Sependancies segment --}}
                            <div class="py-4 w-full sm:grid sm:grid-cols-4 sm:gap-4">
                                {{-- Dependancies --}}
                                <div>
                                    <div class="bg-gray-300 dark:bg-gray-900">
                                        <h2 class="p-2 text-base font-semibold">
                                            <span>Dependancies</span>
                                            @if(isset($this->dependancies))
                                                {{-- One or more than one element in the array --}}
                                                @if(is_array($this->dependancies))
                                                    <span>({{ count ($this->dependancies) }})</span>
                                                @else
                                                    <span>(1)</span>
                                                @endif
                                            @else
                                                {{-- No element in the array --}}
                                                <span>(0)</span>
                                            @endif

                                        </h2>
                                    </div>
                                    <div class="w-full flex pt-2 text-sm">
                                        @if(isset($this->dependancies))
                                            @if(is_array($this->dependancies))
                                                {{-- more than one element in the array --}}
                                                <ul class="pl-2">
                                                    @foreach ($this->dependancies as $dependancy)
                                                        <li>
                                                            <a
                                                                href="{{ route('packages.package-info-component', $dependancy) }}"
                                                                class="text-blue-500 dark:text-blue-300 hover:underline"
                                                                >
                                                                {{ $dependancy }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                {{-- only one element in the array --}}
                                                <ul class="pl-2">
                                                    <li>
                                                        <a
                                                            href="{{ route('packages.package-info-component', $this->dependancies) }}"
                                                            class="text-blue-500 dark:text-blue-300 hover:underline"
                                                            >
                                                            {{ $this->dependancies }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                {{-- End Dependancies --}}

                                {{-- Optional Dependancies --}}
                                <div>
                                    <div class="bg-gray-300 dark:bg-gray-900">
                                        <h2 class="p-2 text-base font-semibold">
                                            <span>Optional Dependancies</span>
                                            @if(isset($this->optionalDependancies))
                                                {{-- One or more than one element in the array --}}
                                                @if(is_array($this->optionalDependancies))
                                                    <span>({{ count ($this->optionalDependancies) }})</span>
                                                @else
                                                    <span>(1)</span>
                                                @endif
                                            @else
                                                {{-- No element in the array --}}
                                                <span>(0)</span>
                                            @endif

                                        </h2>
                                    </div>
                                    <div class="w-full flex pt-2 text-sm">
                                        @if(isset($this->optionalDependancies))
                                            @if(is_array($this->optionalDependancies))
                                                {{-- more than one element in the array --}}
                                                <ul class="pl-2">
                                                    @foreach ($this->optionalDependancies as $odependancy)
                                                        <li>
                                                            <a
                                                                href="{{ route('packages.package-info-component', $odependancy) }}"
                                                                class="text-blue-500 dark:text-blue-300 hover:underline"
                                                                >
                                                                {{ $odependancy }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                {{-- only one element in the array --}}
                                                <ul class="pl-2">
                                                    <li>
                                                        <a
                                                            href="{{ route('packages.package-info-component', $this->optionalDependancies) }}"
                                                            class="text-blue-500 dark:text-blue-300 hover:underline"
                                                            >
                                                            {{ $this->optionalDependancies }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                {{-- End Optional Dependancies --}}

                                {{-- Make Dependancies --}}
                                <div>
                                    <div class="bg-gray-300 dark:bg-gray-900">
                                        <h2 class="p-2 text-base font-semibold">
                                            <span>Make Dependancies</span>
                                            @if(isset($this->makeDependancies))
                                                {{-- One or more than one element in the array --}}
                                                @if(is_array($this->makeDependancies))
                                                    <span>({{ count ($this->makeDependancies) }})</span>
                                                @else
                                                    <span>(1)</span>
                                                @endif
                                            @else
                                                {{-- No element in the array --}}
                                                <span>(0)</span>
                                            @endif

                                        </h2>
                                    </div>
                                    <div class="w-full flex pt-2 text-sm">
                                        @if(isset($this->makeDependancies))
                                            @if(is_array($this->makeDependancies))
                                                {{-- more than one element in the array --}}
                                                <ul class="pl-2">
                                                    @foreach ($this->makeDependancies as $mdependancy)
                                                        <li>
                                                            <a
                                                                href="{{ route('packages.package-info-component', $mdependancy) }}"
                                                                class="text-blue-500 dark:text-blue-300 hover:underline"
                                                                >
                                                                {{ $mdependancy }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                {{-- only one element in the array --}}
                                                <ul class="pl-2">
                                                    <li>
                                                        <a
                                                            href="{{ route('packages.package-info-component', $this->makeDependancies) }}"
                                                            class="text-blue-500 dark:text-blue-300 hover:underline"
                                                            >
                                                            {{ $this->makeDependancies }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                {{-- End Make Dependancies --}}

                                {{-- Check Dependancies --}}
                                <div>
                                    <div class="bg-gray-300 dark:bg-gray-900">
                                        <h2 class="p-2 text-base font-semibold">
                                            <span>Check Dependancies</span>
                                            @if(isset($this->checkDependancies))
                                                {{-- One or more than one element in the array --}}
                                                @if(is_array($this->checkDependancies))
                                                    <span>({{ count ($this->checkDependancies) }})</span>
                                                @else
                                                    <span>(1)</span>
                                                @endif
                                            @else
                                                {{-- No element in the array --}}
                                                <span>(0)</span>
                                            @endif

                                        </h2>
                                    </div>
                                    <div class="w-full flex pt-2">
                                        @if(isset($this->checkDependancies))
                                            @if(is_array($this->checkDependancies))
                                                {{-- more than one element in the array --}}
                                                <ul class="pl-2">
                                                    @foreach ($this->checkDependancies as $cdependancy)
                                                        <li>
                                                            <a
                                                                href="{{ route('packages.package-info-component', $cdependancy) }}"
                                                                class="text-blue-500 dark:text-blue-300 hover:underline"
                                                                >
                                                                {{ $cdependancy }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                {{-- only one element in the array --}}
                                                <ul class="pl-2">
                                                    <li>
                                                        <a
                                                            href="{{ route('packages.package-info-component', $this->checkDependancies) }}"
                                                            class="text-blue-500 dark:text-blue-300 hover:underline"
                                                            >
                                                            {{ $this->checkDependancies }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                {{-- End Make Dependancies --}}

                            </div>
                            {{-- End of dependancies segment --}}

                            {{-- Required by segment --}}
                            <div class="py-4 w-full sm:grid sm:grid-cols-4 sm:gap-4">
                                {{-- Required By --}}
                                <div>
                                    <div class="bg-gray-300 dark:bg-gray-900">
                                        <h2 class="p-2 text-base font-semibold">
                                            <span>Required By</span>
                                            @if(isset($this->requiredBy))
                                                {{-- One or more than one element in the array --}}
                                                @if(is_array($this->requiredBy))
                                                    <span>({{ count ($this->requiredBy) }})</span>
                                                @else
                                                    <span>(1)</span>
                                                @endif
                                            @else
                                                {{-- No element in the array --}}
                                                <span>(0)</span>
                                            @endif

                                        </h2>
                                    </div>
                                    <div class="w-full flex pt-2 text-sm">
                                        @if(isset($this->requiredBy))
                                            @if(is_array($this->requiredBy))
                                                {{-- more than one element in the array --}}
                                                <ul class="pl-2">
                                                    @foreach ($this->requiredBy as $requiredby)
                                                        <li>
                                                            <a
                                                                href="{{ route('packages.package-info-component', $requiredby) }}"
                                                                class="text-blue-500 dark:text-blue-300 hover:underline"
                                                                >
                                                                {{ $requiredby }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                {{-- only one element in the array --}}
                                                <ul class="pl-2">
                                                    <li>
                                                        <a
                                                            href="{{ route('packages.package-info-component', $this->requiredBy) }}"
                                                            class="text-blue-500 dark:text-blue-300 hover:underline"
                                                            >
                                                            {{ $this->requiredBy }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                {{-- End Required By --}}

                                {{-- Optional Required By --}}
                                <div>
                                    <div class="bg-gray-300 dark:bg-gray-900">
                                        <h2 class="p-2 text-base font-semibold">
                                            <span>Optional Required By</span>
                                            @if(isset($this->optionalRequiredBy))
                                                {{-- One or more than one element in the array --}}
                                                @if(is_array($this->optionalRequiredBy))
                                                    <span>({{ count ($this->optionalRequiredBy) }})</span>
                                                @else
                                                    <span>(1)</span>
                                                @endif
                                            @else
                                                {{-- No element in the array --}}
                                                <span>(0)</span>
                                            @endif

                                        </h2>
                                    </div>
                                    <div class="w-full flex pt-2 text-sm">
                                        @if(isset($this->optionalRequiredBy))
                                            @if(is_array($this->optionalRequiredBy))
                                                {{-- more than one element in the array --}}
                                                <ul class="pl-2">
                                                    @foreach ($this->optionalRequiredBy as $orequiredby)
                                                        <li>
                                                            <a
                                                                href="{{ route('packages.package-info-component', $orequiredby) }}"
                                                                class="text-blue-500 dark:text-blue-300 hover:underline"
                                                                >
                                                                {{ $orequiredby }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                {{-- only one element in the array --}}
                                                <ul class="pl-2 text-sm">
                                                    <li>
                                                        <a
                                                            href="{{ route('packages.package-info-component', $this->optionalRequiredBy) }}"
                                                            class="text-blue-500 dark:text-blue-300 hover:underline"
                                                            >
                                                            {{ $this->optionalRequiredBy }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                {{-- End Optional Required By --}}

                                {{-- Make Required By --}}
                                <div>
                                    <div class="bg-gray-300 dark:bg-gray-900">
                                        <h2 class="p-2 text-base font-semibold">
                                            <span>Make Required By</span>
                                            @if(isset($this->makeRequiredBy))
                                                {{-- One or more than one element in the array --}}
                                                @if(is_array($this->makeRequiredBy))
                                                    <span>({{ count ($this->makeRequiredBy) }})</span>
                                                @else
                                                    <span>(1)</span>
                                                @endif
                                            @else
                                                {{-- No element in the array --}}
                                                <span>(0)</span>
                                            @endif

                                        </h2>
                                    </div>
                                    <div class="w-full flex pt-2 text-sm">
                                        @if(isset($this->makeRequiredBy))
                                            @if(is_array($this->makeRequiredBy))
                                                {{-- more than one element in the array --}}
                                                <ul class="pl-2">
                                                    @foreach ($this->makeRequiredBy as $mrequiredby)
                                                        <li>
                                                            <a
                                                                href="{{ route('packages.package-info-component', $mrequiredby) }}"
                                                                class="text-blue-500 dark:text-blue-300 hover:underline"
                                                                >
                                                                {{ $mrequiredby }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                {{-- only one element in the array --}}
                                                <ul class="pl-2">
                                                    <li>
                                                        <a
                                                            href="{{ route('packages.package-info-component', $this->makeRequiredBy) }}"
                                                            class="text-blue-500 dark:text-blue-300 hover:underline"
                                                            >
                                                            {{ $this->makeRequiredBy }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                {{-- End Make Required By  --}}

                                {{-- Check Required By --}}
                                <div>
                                    <div class="bg-gray-300 dark:bg-gray-900">
                                        <h2 class="p-2 text-base font-semibold">
                                            <span>Check Required By</span>
                                            @if(isset($this->checkRequiredBy))
                                                {{-- One or more than one element in the array --}}
                                                @if(is_array($this->checkRequiredBy))
                                                    <span>({{ count ($this->checkRequiredBy) }})</span>
                                                @else
                                                    <span>(1)</span>
                                                @endif
                                            @else
                                                {{-- No element in the array --}}
                                                <span>(0)</span>
                                            @endif

                                        </h2>
                                    </div>
                                    <div class="w-full flex pt-2 text-sm">
                                        @if(isset($this->checkRequiredBy))
                                            @if(is_array($this->checkRequiredBy))
                                                {{-- more than one element in the array --}}
                                                <ul class="pl-2">
                                                    @foreach ($this->checkRequiredBy as $crequiredby)
                                                        <li>
                                                            <a
                                                                href="{{ route('packages.package-info-component', $crequiredby) }}"
                                                                class="text-blue-500 dark:text-blue-300 hover:underline"
                                                                >
                                                                {{ $crequiredby }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                {{-- only one element in the array --}}
                                                <ul class="pl-2">
                                                    <li>
                                                        <a
                                                            href="{{ route('packages.package-info-component', $this->checkRequiredBy) }}"
                                                            class="text-blue-500 dark:text-blue-300 hover:underline"
                                                            >
                                                            {{ $this->checkRequiredBy }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                {{-- End Make Dependancies --}}

                            </div>
                            {{-- End of Required by segment --}}

                        </div>

                        {{-- Start of package files --}}
                        <div class="p-4 sm:grid sm:grid-cols-2 sm:gap-4">
                            <div>
                                <div class="bg-gray-300 dark:bg-gray-900">
                                    <h2 class="p-2 text-base font-semibold">
                                        <span>Files</span>
                                        @if(is_array($this->files))
                                            <span>({{ count($this->files) }})</span>
                                        @endif

                                    </h2>
                                </div>
                                <div class="w-full flex pt-2 text-sm">
                                    <div x-data="{ show: false }">
                                        <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }" class="text-blue-500 dark:text-blue-300">
                                            View the file list for {{ $this->name }}
                                        </button>
                                        <div x-show="show">
                                            <ul class="pl-2">
                                                @if(is_array($this->files))
                                                    @foreach( $this->files as $file)
                                                        <li>
                                                            {{ $file }}
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div>
                            <p>No such package exists.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
