<x-app-layout>
    <div class="flex h-screen">

        {{--******** Sidebar ********  --}}
        <div class="w-64 bg-gray-800 text-white p-6">
            <h2 class="text-2xl font-bold mb-8">Admin Panel</h2>
            <ul class="space-y-4">
                <li>
                    <a href="#" id="showSavedNames" class="block bg-gray-700 hover:bg-gray-600 rounded p-2">Saved Names</a>
                </li>
                <li>
                    <a href="#" id="showReservedWords" class="block bg-gray-700 hover:bg-gray-600 rounded p-2">Reserved Words</a>
                </li>
            </ul>
            <h2 class="text-2xl font-bold mb-8">Features</h2>
            <ul class="space-y-4">
                <li>
                    <a href="{{ route('searchName');  }}" id="NameCheker" class="block bg-gray-700 hover:bg-gray-600 rounded p-2">NameCheker</a>
                </li>
                <li>
                    <a href="{{ route('faqPage');  }}" id="faq" class="block bg-gray-700 hover:bg-gray-600 rounded p-2">faq</a>
                </li>
            </ul>
        </div>
        

        {{-- ********  Main Content ********  --}}
        
        <div class="flex-1 p-10 overflow-auto">
            <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

            {{-- ********   Area where content will be injected ********   --}}
            <div id="contentArea">
                <p class="text-gray-600">Please select an option from the sidebar.</p>
            </div>
        </div>
        

    </div>




    {{-- ********  AJAX and Interactivity //// (ChatGPT do that not me) ********  --}}  
    <script>
        document.getElementById('showSavedNames').addEventListener('click', function() {
            fetch('/dashboard/names')
                .then(response => response.text())
                .then(html => {
                    document.getElementById('contentArea').innerHTML = html;
                });
        });

        document.getElementById('showReservedWords').addEventListener('click', function() {
            fetch('/dashboard/reserved')
                .then(response => response.text())
                .then(html => {
                    document.getElementById('contentArea').innerHTML = html;
                });
        });



    </script>
</x-app-layout>
