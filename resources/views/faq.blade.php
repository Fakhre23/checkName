<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FAQ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
<div class="p-8">
    <div class="bg-white p-4 rounded-lg shadow-xl py-8 mt-12">
        <h4 class="text-4xl font-bold text-gray-800 tracking-widest uppercase text-center">FAQ</h4>
        <p class="text-center text-gray-600 text-sm mt-2">Here are some of the frequently asked questions</p>
        <div class="space-y-12 px-2 xl:px-16 mt-12">
            @foreach($faqs as $faq)
            <div x-data="{ open: false }" class="mt-4">
                <div class="flex cursor-pointer" @click="open = !open">
                    <div class="flex items-center h-16 border-l-4 border-blue-600">
                        <span class="text-4xl text-blue-600 px-4">Q.</span>
                    </div>
                    <div class="flex items-center h-16">
                        <span class="text-lg text-blue-600 font-bold px-4">{{ $faq->question }}</span>
                    </div>
                </div>
                <div x-show="open" x-transition class="flex mt-2 ml-12">
                    <div class="flex items-start h-auto border-l-4 border-gray-400">
                        <span class="text-4xl text-gray-400 px-4">A.</span>
                    </div>
                    <div class="py-2">
                        <span class="text-gray-500">{{ $faq->answer }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>

