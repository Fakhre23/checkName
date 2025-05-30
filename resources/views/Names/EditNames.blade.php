<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Edit Saved Names</h2>
    </x-slot>
<div class="max-w-4xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Edit Saved Names</h2>
    
    <form method="POST" action="{{ route('SavedNames.update', $savedNames->id) }}">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="word" class="block text-gray-700">Reserved Word</label>
            <input type="text" name="name" id="name" value="{{ old('name', $savedNames->name) }}" class="w-full p-2 border rounded" required>
        </div>
        
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Update the Saved Name
        </button>
    </form>
</div>
</x-app-layout>
