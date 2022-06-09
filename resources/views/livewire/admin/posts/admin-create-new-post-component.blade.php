<div class="max-w-7xl mx-auto py-4 sm:px-6 lg:px-8 rounded-md shadow-md dark:bg-gray-800 dark:text-white">
    <div>
        <h1 class="text-2xl font-semibold leading-tight">Create new Post</h1>
    </div>
    <div>
        <div class="mt-4">
            <x-jet-label for="title" value="{{ __('Title') }}" class="text-xl dark:text-white" />
            <x-jet-input id="title" class="block mt-1 w-full dark:bg-gray-500 dark:text-white" type="text" wire:model.debounce.800ms="title" />
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <x-jet-label for="slug" value="{{ __('Slug') }}" class="text-xl dark:text-white" />
            <div class="mt-1 flex shadow-sm">
                <span class="hidden md:inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 dark:bg-gray-500 dark:text-white text-sm">
                    {{ env('APP_URL') . '/posts/' }}
                </span>
                <x-jet-input  id="slug" wire:model="slug" class="form-input px-3 flex-1 block w-full rounded-l-md rounded-r-md md:rounded-l-none border border-r-0 border-gray-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 dark:bg-gray-500 dark:text-white" placeholder="url-slug" />
            </div>
            @error('slug') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
            <label>
                <input class="form-checkbox" type="checkbox" wire:model="isActive" />
                <span class="ml-2 text-sm text-gray-500 dark:text-white">Set as active post</span>
            </label>
        </div>
        <div class="pt-4">
            <label class="block text-base ">
                <span class="text-gray-700 dark:text-gray-50">Select Group</span>
                <select wire:model="groupId" class="w-96 form-select block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                    <option value="Select Group">Select Group</option>
                    @foreach($groups as $item)
                        <option class="text-sm" value={{ $item->id }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="pt-4">
            <label class="block text-base ">
                <span class="text-gray-700 dark:text-gray-50">Select Package</span>
                <select wire:model="packageId" class="w-96 form-select block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                    <option value="Select Package">Select Package</option>
                    @foreach($packages as $item)
                        <option class="text-sm" value={{ $item->id }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </label>
        </div>

        <div class="mt-4">
            <x-jet-label for="introduction" value="{{ __('Introduction') }}" class="text-xl dark:text-white" />
            <x-jet-input id="introduction" class="block mt-1 w-full dark:bg-gray-500 dark:text-white" type="text" wire:model.debounce.800ms="introduction" />
            @error('introduction') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-jet-label for="content" value="{{ __('Content') }}" class="text-lg dark:text-white" />
            <div class="rounded-md shadow-sm">
                <div class="mt-1 bg-white dark:bg-gray-500 dark:text-gray-50">

                    <div class="body-content" wire:ignore>
                        <trix-editor
                            name="content"
                            class="trix-editor trix-content trix-post"
                            style="height: 400px !important;  overflow-y: auto !important;"
                            x-ref="trix-editor"
                            wire:model.defer="content"
                            wire:key="trix-content-unique-key"
                            trix-attachment-add="$event.attachment"
                        ></trix-editor>
                    </div>

                    <!-- <div wire:ignore>
                        <input id="trix" name="content" type="hidden">
                        @trix(\App\Model\Post::class, 'content')
                    </div> -->

                </div>
            </div>
            @error('content') <span class="error text-red-500">{{ $message }}</span> @enderror
        </div>
        <!-- start of post banner image upload -->
        <div class="pt-4">
            <div class="pt-2 pb-2">
                <span class="pr-1 font-semibold">Upload Post banner image:</span><i>This will be displayed as a banner to the service</i>
            </div>
            <div
                x-data="{ isUploading: false, progress: 0 }"
                x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
                <!-- File Input -->
                @if(!empty($this->postBannerImage))
                    <input type="file" value="{{ $this->postBannerImage }}" wire:model="imageUploaded">
                    <img src="{{ env('APP_URL') . '/posts-images/' . $this->postBannerImage }}">

                    <!-- Progress Bar -->
                    <div class="pt-2 pb-2" x-show="isUploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                    <div class="pt-4">
                        @if ($imageUploaded)
                        <h3>Image Preview:</h3>
                            <img src="{{ $imageUploaded->temporaryUrl() }}">
                        @endif
                    </div>
                @else
                <input type="file" wire:model="imageUploaded">
                    <!-- Progress Bar -->
                    <div class="pt-2 pb-2" x-show="isUploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                    <div class="pt-4">
                        @if ($imageUploaded)
                            <h3>Image Preview:</h3>
                            <img src="{{ $imageUploaded->temporaryUrl() }}">
                        @endif
                    </div>
                @endif
            </div>
        </div>
        <!-- end post banner image upload -->

        <div class="pt-8">
            <div class="inline">
                <x-jet-button class="dark:bg-green-500 dark:text-white" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-danger-button>
            </div>
            <div class="ml-12 inline text-green-500">
                @if (session()->has('message'))
                    {{ session('message') }}
                @endif
            </div>
        </div>
    </div>
</div>

