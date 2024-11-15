<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Produk</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif

</head>

<body>

    <main class="min-h-screen w-full bg-gray-200 p-8 grid place-items-center">

        <section style="width: 35%" class="bg-white p-8 rounded mx-auto">

            <div class="text-center mb-4">
                <p class="font-semibold text-gray-700">Tambah Produk</p>
                <small class="text-gray-500">Gunakan form ini untuk menambahkan produk baru ke dalam database</small>
            </div>

            @if ($errors->any())
                <p class="text-sm text-red-500">opps terjadi kesalahan</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            {{-- form untuk tambah produk --}}
            <form action="/products" method="POST">
                @csrf

                {{-- name --}}
                <div class="mb-4">
                    <label class="text-sm text-gray-500">Nama Produk</label>
                    <input class="bg-gray-100 w-full p-4" type="text" name="name"
                        value="{{ old('name') }}" placeholder="Masukkan nama produk">
                </div>

                @error('name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror

                {{-- price --}}
                <div class="mb-4">
                    <label class="text-sm text-gray-500">Harga Produk</label>
                    <input class="bg-gray-100 w-full p-4" type="text" name="price"
                       value="{{ old('price') }}" placeholder="Masukkan harga produk">
                </div>

                @error('price')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror

                {{-- description --}}
                <div>
                    <label class="text-sm text-gray-500">Deskripsi Produk</label>
                    <textarea class="bg-gray-100 w-full p-4" name="description" placeholder="Masukkan deskripsi produk">{{ old('description') }}</textarea>
                </div>

                @error('description')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror

                <button type="submit" class="bg-blue-600 w-full p-3 text-gray-200">Simpan Produk</button>
            </form>
        </section>

    </main>

</body>

</html>
