<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Products</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-100 font-montserrat">

    <div class="container mx-auto mt-10 mb-10 px-4">
        <div class="relative">
            <a href="{{ route('products.index') }}" class="absolute top-4 right-4 px-4 py-2 font-thin text-sm text-gray-700 bg-white rounded-lg shadow-lg hover:bg-gray-200">
                ← Back to home
            </a>
        </div>
        <div class="flex flex-col md:flex-row gap-8 mt-10">
            <!-- Product Image -->
            <div class="w-full md:w-1/3">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('/storage/products/' . $product->image) }}" class="w-full h-96 object-cover">
                </div>
            </div>
            <!-- Product Details -->
            <div class="w-full md:w-2/3">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-3xl font-bold text-slate-800 mb-2">{{ $product->title }}</h3>
                    <p class="text-2xl font-semibold text-green-600 mb-4">
                        {{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</p>
                    <hr class="my-4 border-slate-300">
                    <p class="text-lg text-blue-600 mb-4">{!! $product->desc !!}</p>
                    <hr class="my-4 border-slate-300">
                    <p class="text-base text-red-600">Stock : {{ $product->stock }}</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
