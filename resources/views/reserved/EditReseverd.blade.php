<x-app-layout>
<div class="max-w-4xl mx-auto p-6">
    <h2 class="text-2xl font-bold text-white mb-4">Edit Reserved Word</h2>
    
    <form method="POST" action="{{ route('reservedWords.update', $reservedWords->id) }}">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="word" class="block text-gray-700">Reserved Word</label>
            <input type="text" name="word" id="word" value="{{ old('word', $reservedWords->word) }}" class="w-full p-2 border rounded" required>
        </div>
        
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Update Reserved Word
        </button>
    </form>
</div>
</x-app-layout>
