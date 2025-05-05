<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-4">Reserved Words</h2>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Reserved Words</h2>
            <a href="{{ route('reservedWords.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                + Add Reserved Word
            </a>
        </div>
    <table class="min-w-full">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Word</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservedWords as $word)
            <tr class="border-b">
                <td class="py-2 px-4">{{ $word->id }}</td>
                <td class="py-2 px-4">{{ $word->word }}</td>
                <td class="py-2 px-4 flex space-x-2">
                    <a href="{{ route('reservedWords.edit', $word->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
                    <form method="POST" action="{{ route('ReservedWord.delete', $word->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
   
    
</div>
