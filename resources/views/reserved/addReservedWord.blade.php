<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Reserved Word') }}
        </h2>
    </x-slot> --}}

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form method="POST" action="{{ route('reservedWords.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Reserved Word</label>
                        <input type="text" name="word" class="w-full mt-1 p-2 border rounded" required>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
