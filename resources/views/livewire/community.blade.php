<div class="w-full px-4 md:px-6 lg:px-8 space-y-6 max-w-6xl mx-auto">
    @foreach($posts as $post)
    <div class="bg-white rounded-lg shadow p-4 border border-gray-200 transition hover:shadow-md w-full h-[80vh] flex flex-col justify-between">
        {{-- Header --}}
        <div class="flex items-center space-x-3 mb-3">
            @if(isset($post->user->avatar_url) && $post->user->avatar_url)
            <img src="{{ $post->user->avatar_url }}" alt="{{ $post->user->name }}'s avatar"
                class="h-8 w-8 rounded-full object-cover border border-gray-300">
            @else
            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-semibold text-sm">
                {{ substr($post->user->name, 0, 1) }}
            </div>
            @endif
            <span class="font-semibold text-gray-800">{{ $post->user->name }}</span>
        </div>

        {{-- Image --}}
        <div class="mb-3 overflow-hidden rounded-md flex-1 flex items-center justify-center">
            <img src="{{ $post->image }}" class="w-full h-full object-contain rounded-md" alt="Post Image">
        </div>


        {{-- Like --}}
        <div class="flex items-center text-gray-600 text-sm">
            <button wire:click="toggleLike({{ $post->id }})"
                class="focus:outline-none p-1 rounded-full hover:bg-gray-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 transition
                    {{ in_array($post->id, $likedPosts) ? 'text-red-500 fill-current' : 'text-gray-400 hover:text-red-400' }}"
                    viewBox="0 0 24 24"
                    fill="{{ in_array($post->id, $likedPosts) ? 'red' : 'none' }}"
                    stroke="{{ in_array($post->id, $likedPosts) ? 'red' : 'currentColor' }}"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682
                             a4.5 4.5 0 00-6.364-6.364L12 7.636
                             l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </button>
            <span class="ml-2">{{ $post->likes }} Likes</span>
        </div>
    </div>
    @endforeach
</div>