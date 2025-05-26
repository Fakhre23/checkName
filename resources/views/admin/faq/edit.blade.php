<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <h2 class="text-2xl font-bold text-white mb-4">Edit Reserved Word</h2>
        
        <form method="POST" action="{{ route('faq.update', $faqs->id) }}">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="question" class="block text-white">Question</label>
                <input type="text" name="question" id="question" value="{{ old('question', $faqs->question) }}" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="answer" class="block text-white">Answer</label>
                <input type="text" name="answer" id="answer" value="{{ old('answer', $faqs->answer) }}" class="w-full p-2 border rounded" required>
            </div>
            
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Update Reserved Word
            </button>
        </form>
    </div>
</x-app-layout>
