<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->name }}</title>

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
                <p class="font-semibold text-gray-700">Detail Produk</p>
                <small class="text-gray-500">Gunakan form ini untuk mengubah produk anda ke dalam database</small>
            </div>
            @if ($errors->any())
                <p class="text-sm text-red-500">opps terjadi kesalahan</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            {{-- form untuk ubah produk --}}
            <form action="/products/{{ $product->id }}" method="POST">
                @csrf
                @method('PUT')

                {{-- name --}}
                <div class="mb-4">
                    <label class="text-sm text-gray-500">Nama Produk</label>
                    <input value="{{ $product->name }}" class="bg-gray-100 w-full p-4" type="text" name="name"
                        placeholder="Masukkan nama produk">
                </div>
                @error('name')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
                {{-- price --}}
                <div class="mb-4">
                    <label class="text-sm text-gray-500">Harga Produk</label>
                    <input value="{{ $product->price }}" class="bg-gray-100 w-full p-4" type="text" name="price"
                        placeholder="Masukkan harga produk">
                </div>

                @error('price')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror

                {{-- description --}}
                <div class="mb-3">
                    <label class="text-sm text-gray-500">Deskripsi Produk</label>
                    <textarea class="bg-gray-100 w-full p-4 text-left" name="description" placeholder="Masukkan deskripsi produk">{{ $product->description }}</textarea>
                </div>
                @error('description')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror

                <div class="flex justify-between gap-3">
                    {{-- save  --}}
                    <button type="submit" class="bg-blue-600 w-9/12 p-3 text-gray-200">
                        Perbarui Produk
                    </button>

                    {{-- delete button --}}
                    <button id="button-delete" type="button" class="bg-red-600 p-3 w-3/12 text-gray-200">
                        Hapus
                    </button>
                </div>
            </form>

            {{-- form untuk delete produk --}}
            <form id="form-delete-product" action="/products/{{ $product->id }}" method="POST">
                @csrf
                @method('DELETE')

                {{-- product id --}}
                <input type="hidden" name="id" value="{{ $product->id }}">
            </form>
        </section>
    </main>

    <script>
        // javascript is here
        window.addEventListener("DOMContentLoaded", () => {

            // mengambil button delete
            const buttonDelete = document.getElementById("button-delete")

            // mengambil form delete product
            const formDeleteProduct = document.getElementById("form-delete-product")

            // ketika user nge klik button delete
            buttonDelete.addEventListener("click", () => {

                // minta konfirmasi ke user melalui prompt
                const isDelete = confirm("Apakah anda yakin ingin menghapus produk ini?")

                // ketika user mengkonfirmasi
                if (isDelete) {

                    // submit form delete product
                    formDeleteProduct.submit()
                }
            })
        })
    </script>

</body>

</html>
