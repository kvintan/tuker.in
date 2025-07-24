<div class="w-full px-4 md:px-6 lg:px-8 space-y-6 max-w-6xl mx-auto">
    @foreach ($posts as $post)
        <div
            class="bg-white rounded-lg shadow p-4 border border-gray-200 transition hover:shadow-md w-full h-[80vh] flex flex-col justify-between">
            {{-- Header --}}
            <div class="flex items-center space-x-3 mb-3">
                @if (isset($post->user->avatar_url) && $post->user->avatar_url)
                    <img src="{{ $post->user->avatar_url }}" alt="{{ $post->user->name }}'s avatar"
                        class="h-8 w-8 rounded-full object-cover border border-gray-300">
                @else
                    <div
                        class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-semibold text-sm">
                        {{ substr($post->user->name, 0, 1) }}
                    </div>
                @endif
                <span class="font-semibold text-gray-800">{{ $post->user->name }}</span>
                @if (auth()->id() === $post->user_id)
                    <button wire:click="deletePost({{ $post->id }})"
                        onclick="return confirm('Yakin ingin menghapus postingan ini?')"
                        class="ml-auto text-[#37654E] hover:text-red-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a1 1 0 00-1-1h-6a1 1 0 00-1 1m3-4v4" />
                        </svg>
                    </button>
                @endif
            </div>

            {{-- Image --}}
            <div class="mb-3 overflow-hidden rounded-md flex-1 flex items-center justify-center">
                @php
                    $imagePath = $post->image ?? '';
                    $imageUrl = $imagePath
                        ? (Str::startsWith($imagePath, 'posts/') || Str::startsWith($imagePath, 'uploads/')
                            ? asset('storage/' . $imagePath)
                            : asset('images/' . $imagePath))
                        : asset('images/default.png');
                @endphp

                <img src="{{ $imageUrl }}" class="w-full h-full object-contain rounded-md" alt="Post Image">
            </div>

            {{-- Caption --}}
            <div class="mb-3 text-gray-700 text-sm">
                {{ $post->caption }}
            </div>

            {{-- Like --}}
            <div class="flex items-center text-gray-600 text-sm">
                <button wire:click="toggleLike({{ $post->id }})"
                    class="focus:outline-none p-1 rounded-full hover:bg-gray-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 transition
                    {{ in_array($post->id, $likedPosts) ? 'text-red-500 fill-current' : 'text-gray-400 hover:text-red-400' }}"
                        viewBox="0 0 24 24" fill="{{ in_array($post->id, $likedPosts) ? 'red' : 'none' }}"
                        stroke="{{ in_array($post->id, $likedPosts) ? 'red' : 'currentColor' }}" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682
                             a4.5 4.5 0 00-6.364-6.364L12 7.636
                             l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
                <span class="ml-2">{{ $post->likes }} Likes</span>
            </div>
        </div>
    @endforeach
    {{-- Floating Action Button --}}
    <a href="{{ route('post.create') }}"
        class="fixed bottom-6 right-6 bg-[#37654E] text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg transition z-50"
        title="Create Post">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
    </a>

</div>
