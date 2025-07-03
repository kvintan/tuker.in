<div class="max-w-2xl mx-auto mt-10 bg-white shadow-md rounded-xl p-6 border border-gray-200">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create a Post</h2>

    @if (session()->has('success'))
        <div class="mb-4 p-3 rounded-md bg-green-100 text-green-800 text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="space-y-5">
        {{-- Caption --}}
        <div>
            <label for="caption" class="block text-sm font-medium text-gray-700 mb-1">Caption</label>
            <textarea wire:model.defer="caption" rows="4"
                      class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 text-sm resize-none"></textarea>
            @error('caption') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Image --}}
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Upload Image</label>
            <input type="file" wire:model="image"
                   class="w-full border border-gray-300 rounded-md p-2 text-sm file:border-0 file:bg-green-100 file:text-green-700 file:font-medium file:rounded file:px-4 file:py-2 file:mr-4">
            @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        @if ($image)
    <div class="mt-4">
        <img src="{{ $image->temporaryUrl() }}" class="max-h-64 rounded-md shadow">
    </div>
@endif

        {{-- Submit --}}
        <div class="flex justify-end space-x-3">
            <a href="{{ route('community') }}"
               class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-2 rounded-md shadow-sm text-sm">
                Cancel
            </a>
            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-md shadow-sm text-sm font-medium">
                Submit Post
            </button>
        </div>
    </form>
</div>
