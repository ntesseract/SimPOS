<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimPOS - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- Navbar -->
        <nav class="bg-bluesky-dark text-white shadow-md">
            <div class="container mx-auto px-4 py-3">
                <div class="flex justify-between items-center">
                    <a href="/" class="text-xl font-bold">SimPOS</a>
                    <div class="space-x-4">
                        <a href="{{ route('kasir.index') }}" class="hover:bg-bluesky px-3 py-2 rounded">Kasir</a>
                        <a href="{{ route('barang.index') }}" class="hover:bg-bluesky px-3 py-2 rounded">Barang</a>
                        <a href="{{ route('transaksi.index') }}" class="hover:bg-bluesky px-3 py-2 rounded">Transaksi</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="container mx-auto px-4 py-6">
            @yield('content')
        </main>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow-lg">
            {{ session('success') }}
        </div>
    @endif
</body>
</html>