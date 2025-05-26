{{-- <x-app-layout> --}}

{{--   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage FAQs') }}
        </h2>
    </x-slot> --}}


<div>
    <h2 class="text-2xl font-bold mb-6 text-white">Manage FAQs</h2>

    <div class="mb-6">
        <a href="{{ route('faq.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">+ Add
            FAQ</a>
    </div>

    <table class="w-full bg-white shadow rounded overflow-hidden">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="p-3 text-left">Question</th>
                <th class="p-3 text-left">Answer</th>
                <th class="p-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faqs as $faq)
                <tr class="border-t">
                    <td class="p-3">{{ $faq->question }}</td>
                    <td class="p-3">{{ $faq->answer }}</td>
                    <td class="p-3 flex space-x-2">
                        <a href="{{ route('faq.edit', $faq->id) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">Edit</a>

                        <form action="{{ route('faq.destroy', $faq->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


{{-- </x-app-layout> --}}
