<div class="container mx-auto my-3">
    <div class="flex justify-between items-center border-b py-2">
        <div class="flex-1">
            <h4 class="text-center font-bold text-lg">SPA - CRUD App Using Livewire 3 + Laravel 12</h4>
        </div>
        <div class="text-right">
            <a wire:navigate href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-sm">Add Post</a>
        </div>
    </div>

    {{-- Alert component --}}
    <div class="my-2">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <button wire:click="$set('success', null)" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </button>
            </div>
        @elseif (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
                <button wire:click="$set('error', null)" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </button>
            </div>
        @endif
    </div>

    {{-- Table post listing --}}
    <div class="bg-white shadow-md rounded my-6">
        <div class="px-4 py-3">
            {{-- Search Blog Post --}}
            <div class="flex justify-end mb-4">
                <input type="text" wire:model.live.debounce.100ms="searchTerm" class="block w-full p-2 pl-10 text-sm text-gray-700 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Search Post..">
            </div>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">#</th>
                    <th scope="col" class="px-6 py-3">Featured Image
                        <span wire:click="sortBy('featured_image')" class="cursor-pointer">
                    @if ($sortColumn === 'featured_image')
                                @if ($sortOrder === 'asc')
                                    <i class="fa-solid fa-sort-up"></i>
                                @else
                                    <i class="fa-solid fa-sort-down"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort"></i>
                            @endif
                </span>
                    </th>
                    <th scope="col" class="px-6 py-3">Title
                        <span wire:click="sortBy('title')" class="cursor-pointer">
                    @if ($sortColumn === 'title')
                                @if ($sortOrder === 'asc')
                                    <i class="fa-solid fa-sort-up"></i>
                                @else
                                    <i class="fa-solid fa-sort-down"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort"></i>
                            @endif
                </span>
                    </th>
                    <th scope="col" class="px-6 py-3">Content
                        <span wire:click="sortBy('content')" class="cursor-pointer">
                    @if ($sortColumn === 'content')
                                @if ($sortOrder === 'asc')
                                    <i class="fa-solid fa-sort-up"></i>
                                @else
                                    <i class="fa-solid fa-sort-down"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort"></i>
                            @endif
                </span>
                    </th>
                    <th scope="col" class="px-6 py-3">Date
                        <span wire:click="sortBy('created_at')" class="cursor-pointer">
                    @if ($sortColumn === 'created_at')
                                @if ($sortOrder === 'asc')
                                    <i class="fa-solid fa-sort-up"></i>
                                @else
                                    <i class="fa-solid fa-sort-down"></i>
                                @endif
                            @else
                                <i class="fa-solid fa-sort"></i>
                            @endif
                </span>
                    </th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($posts as $post)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">
                            <a wire:navigate href="{{ route('posts.view', $post->id) }}">
                                <img src="{{ Storage::url($post->featured_image) }}" class="w-24 h-24 object-cover" />
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <a class="text-blue-600 hover:text-blue-900" wire:navigate href="{{ route('posts.view', $post->id) }}">{{ $post->title }}</a>
                        </td>
                        <td class="px-6 py-4">{{ $post->content }}</td>
                        <td class="px-6 py-4">
                            <p><small><strong>Posted: </strong>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small></p>
                            <p><small><strong>Updated: </strong>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</small></p>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('posts.edit', $post->id) }}" wire:navigate class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded text-sm">Edit</a>
                            <button wire:confirm="Are you sure, you want to delete?" wire:click="deletePost({{ $post->id }})" type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-sm">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center">No posts found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
{{ $posts->links() }}
