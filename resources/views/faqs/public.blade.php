<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>FAQs</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="p-6 bg-gray-100">

    @foreach ($faqs as $faq)
        <div x-data="{ open: false }" class="mt-4">
            <div class="flex cursor-pointer" @click="open = !open">
                <div class="flex items-center h-16 border-l-4 border-blue-600">
                    <span class="text-4xl text-blue-600 px-4">Q.</span>
                </div>
                <div class="flex items-center h-16">
                    <span class="text-lg text-blue-600 font-bold px-4">{{ $faq->question }}</span>
                </div>
            </div>
            <div x-show="open" x-transition x-cloak class="flex mt-2 ml-12">
                <div class="flex items-start h-auto border-l-4 border-gray-400">
                    <span class="text-4xl text-gray-400 px-4">A.</span>
                </div>
                <div class="py-2">
                    <span class="text-gray-500">{{ $faq->answer }}</span>
                </div>
            </div>
        </div>
    @endforeach

</body>

</html>
