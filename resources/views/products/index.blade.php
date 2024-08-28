<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Products</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap">
</head>

<body class="bg-slate-100 font-montserrat">
    @extends('layouts.app')
    @section('title', 'Products')
    @section('content')
        <div class="container mx-auto p-5">
            <h2 class="text-start font-bold text-xl mt-8">Products Management</h2>
            <p class="text-start mb-6 max-w-3xl text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua!
            </p>
            <div class="flex justify-between items-center mb-4">
                <!-- Add Product Button -->
                <a href="{{ route('products.create') }}"
                    class="px-3 py-1 bg-blue-800 text-white text-xs font-medium rounded hover:bg-blue-700">Add
                    Product</a>

                <!-- Search and Sort -->
                <div class="flex space-x-2">
                    <!-- Search Form -->
                    <input type="text" id="search" placeholder="Search by name"
                        class="form-input border-gray-200 rounded-lg px-3 py-1 text-xs border-2 hover:border-black"
                        value="{{ request('search') }}">

                    <!-- Sort Dropdown -->
                    <select id="sort" name="sort" class="form-select border-gray-200 rounded-lg px-3 py-1 text-xs">
                        <option value="">Sort by</option>
                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name
                            Ascending</option>
                        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name
                            Descending</option>
                        <option value="id_asc" {{ request('sort') == 'id_asc' ? 'selected' : '' }}>ID
                            Ascending</option>
                        <option value="id_desc" {{ request('sort') == 'id_desc' ? 'selected' : '' }}>ID
                            Descending</option>
                    </select>
                </div>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-3 mb-20">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white text-xs">
                        <thead>
                            <tr>
                                <th scope="col" class="px-1 py-2 border-b" style="width: 5%;">ID</th>
                                <th scope="col" class="px-2 py-2 border-b">Image</th>
                                <th scope="col" class="px-2 py-2 border-b">Title</th>
                                <th scope="col" class="px-2 py-2 border-b">Price</th>
                                <th scope="col" class="px-2 py-2 border-b">Stock</th>
                                <th scope="col" class="px-2 py-2 border-b" style="width: 20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="product-table">
                            @forelse ($products as $product)
                                <tr class="text-center">
                                    <td class="border-b px-2 py-2">{{ $product->id }}</td>
                                    <td class="border-b px-2 py-2">
                                        <img src="{{ asset('/storage/products/' . $product->image) }}"
                                            class="rounded w-24 mx-auto">
                                    </td>
                                    <td class="border-b px-2 py-2">{{ $product->title }}</td>
                                    <td class="border-b px-2 py-2">
                                        {{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</td>
                                    <td class="border-b px-2 py-2">{{ $product->stock }}</td>
                                    <td class="border-b px-2 py-2">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            <a href="{{ route('products.show', $product->id) }}"
                                                class="inline-block mb-1 px-2 py-1 bg-gray-800 text-white text-xs font-medium rounded hover:bg-gray-900">SHOW</a>
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="inline-block mb-1 px-2 py-1 bg-blue-500 text-white text-xs font-medium rounded hover:bg-blue-600">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-block mb-1 px-2 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-3">
                                        <div class="text-red-500 font-serif text-xs">Data products belum tersedia</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $products->appends(request()->query())->links() }}
            </div>
        </div>
    @endsection

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Live Search Function
        document.getElementById('search').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') { // Cek jika tombol yang ditekan adalah Enter
                const query = this.value;
                const sort = document.getElementById('sort').value;
                window.location.href = `?search=${query}&sort=${sort}`;
            }
        });

        // Sort Function
        document.getElementById('sort').addEventListener('change', function() {
            const sort = this.value;
            const query = document.getElementById('search').value;
            window.location.href = `?search=${query}&sort=${sort}`;
        });

        // Display success/error messages with SweetAlert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>

</html>
