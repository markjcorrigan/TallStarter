<div class="container mx-auto pt-5">
    <div class="flex justify-center">
        <div class="w-full md:w-8/12">
            <form wire:submit="savePost">
                <div class="bg-white shadow-md rounded border border-gray-200">
                    <div class="px-4 py-3 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <h5 class="font-bold text-lg">{{ $isView ? 'View' : ($post ? 'Edit' : 'Create') }} Post</h5>
                            <a wire:navigate href="{{ route('posts') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-sm">Back to Posts</a>
                        </div>
                    </div>
                    <div class="px-4 py-3">
                        {{-- Post Title --}}
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title <span class="text-red-500">*</span></label>
                            <input type="text" {{ $isView ? 'disabled' : '' }} wire:model="title" class="block w-full p-2 pl-10 text-sm text-gray-700 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500" id="title" placeholder="Post Title" />
                            @error('title')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Post Content --}}
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700">Content <span class="text-red-500">*</span></label>
                            <textarea class="block w-full p-2 pl-10 text-sm text-gray-700 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500" {{ $isView ? 'disabled' : '' }} wire:model="content" id="content" placeholder="Post Content"></textarea>
                            @error('content')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- View Featured Image --}}
                        @if ($post)
                            <label class="block text-sm font-medium text-gray-700">Uploaded Featured Image</label>
                            <div class="my-2">
                                <img src="{{ Storage::url($post->featured_image) }}" class="w-64 h-64 object-cover" />
                            </div>
                        @endif

                        {{-- Post Featured Image --}}
                        @if (!$isView)
                            <div class="mb-4">
                                <label for="featuredImage" class="block text-sm font-medium text-gray-700">Featured Image <span class="text-red-500">*</span></label>
                                <input type="file" wire:model="featuredImage" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" id="featuredImage" />
                                {{-- Preview image --}}
                                @if ($featuredImage)
                                    <div class="my-2">
                                        <img src="{{ $featuredImage->temporaryUrl() }}" class="w-48 h-48 object-cover" />
                                    </div>
                                @endif
                                @error('featuredImage')
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        @endif
                    </div>

                    @if (!$isView)
                        <div class="px-4 py-3 bg-gray-50 border-t border-gray-200">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">{{ $post ? 'Update' : 'Save' }}</button>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
