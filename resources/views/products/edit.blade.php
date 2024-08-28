<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Products</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap">
</head>

<body class="bg-slate-100 font-montserrat">

    <div class="container max-w-4xl mx-auto bg-white mt-10 mb-10 rounded shadow-md">
        <div class="p-4 relative">
            <h2 class="mb-3 text-2xl font-bold text-slate-700">Form Edit Product</h2>

            <!-- Tombol Back -->
            <a href="{{ route('products.index') }}"
                class="absolute top-1 right-4 font-bold text-3xl text-red-500 hover:text-red-600">
                x
            </a>
            <hr class="mb-3">

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-2">
                    <label for="image" class="font-medium">Image :</label>
                    <input type="file" id="image" name="image"
                        class="block w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 @error('image') border-red-500 @enderror">

                    <!-- error message untuk image -->
                    @error('image')
                        <div class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="title" class="font-medium">Title :</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $product->title) }}"
                        placeholder="Masukkan Judul Product"
                        class="block w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500 @error('title') border-red-500 @enderror">

                    <!-- error message untuk title -->
                    @error('title')
                        <div class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="desc" class="font-medium">Description :</label>
                    <textarea id="desc" name="desc" rows="5" placeholder="Masukkan Description Product"
                        class="block w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-500 @error('desc') border-red-500 @enderror">{{ old('desc', $product->desc) }}</textarea>

                    <!-- error message untuk desc -->
                    @error('desc')
                        <div class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-2 mb-4 grid grid-cols-2 gap-4">
                    <div>
                        <label for="price" class="font-medium">Price :</label>
                        <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}"
                            placeholder="Masukkan Harga Product"
                            class="block w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-yellow-500 @error('price') border-red-500 @enderror">

                        <!-- error message untuk price -->
                        @error('price')
                            <div class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="stock" class="font-medium">Stock :</label>
                        <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}"
                            placeholder="Masukkan Stock Product"
                            class="block w-full mt-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 @error('stock') border-red-500 @enderror">

                        <!-- error message untuk stock -->
                        @error('stock')
                            <div class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <button type="submit"
                    class="mr-1 bg-blue-800 text-white px-4 py-1 rounded-lg border-2 border-blue-800 hover:bg-blue-600 hover:border-blue-600">UPDATE</button>
                <button type="reset"
                    class="rounded-lg border-2 px-4 py-1 border-blue-800 hover:border-blue-600">RESET</button>

            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('desc');
    </script>
</body>

</html>
