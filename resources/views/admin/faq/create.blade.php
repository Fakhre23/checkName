<x-app-layout>


    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <label class="block bold text-gray-700">New FAQ</label>
                <form method="POST" action="{{ route('faq.store') }}" class="p-6">
                    @csrf
                    <input type="text" name="question" placeholder="Question" class="w-full mb-4" required>
                    <textarea name="answer" placeholder="Answer" class="w-full mb-4" required></textarea>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
