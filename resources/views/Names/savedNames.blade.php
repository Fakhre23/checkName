<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold mb-4">Saved Names</h2>
    <table class="min-w-full">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($savedNames as $name)
            <tr class="border-b">
                <td class="py-2 px-4">{{ $name->id }}</td>
                <td class="py-2 px-4">{{ $name->name }}</td>
                <td class="py-2 px-4 flex space-x-2">
                    <a href="{{ route('SavedNames.edit', $name->id)}}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
                    <form method="POST" action="{{ route('savedNames.delete', $name->id) }}">
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
