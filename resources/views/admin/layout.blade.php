```blade
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Admin Garden Dreams')</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <aside class="admin-sidebar">

        <a class="admin-brand" href="/admin">
            🌷 Garden Dreams
        </a>

        <nav>
            <a href="/admin">Dashboard</a>
            <a href="/admin/produk">Produk</a>
            <a href="/admin/kategori">Kategori</a>
            <a href="/admin/stok">Stok</a>
            <a href="/admin/pesanan">Pesanan</a>
            <a href="/admin/pembayaran">Pembayaran</a>
            <a href="/admin/pengiriman">Pengiriman</a>
            <a href="/admin/pengembalian">Pengembalian</a>
            <a href="/admin/pelanggan">Pelanggan</a>
            <a href="/admin/pengguna">Pengguna & Hak Akses</a>
            <a href="/admin/promo">Promo</a>
            <a href="/admin/blog">Blog</a>
            <a href="/admin/testimoni">Testimoni</a>
            <a href="/admin/laporan">Laporan Keuangan</a>
            <a href="/admin/crm">CRM</a>
            <a href="/admin/analitik">Analitik</a>
            <a href="/admin/pengaturan">Pengaturan Website</a>
        </nav>

        <a class="back-site" href="/">
            ← Lihat Website
        </a>

    </aside>


    <main class="admin-main">

        <header class="admin-top">

            <div>
                <span class="eyebrow">
                    ADMIN PANEL
                </span>

                <h1>
                    @yield('heading', 'Garden Dreams')
                </h1>
            </div>

            <div>
                {{ auth()->user()->nama }}
            </div>

        </header>


        {{-- Pesan berhasil --}}
        @if(session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif


        {{-- Pesan error --}}
        @if(session('error'))
            <div class="alert error">
                {{ session('error') }}
            </div>
        @endif


        {{-- Error validasi --}}
        @if($errors->any())
            <div class="alert error">
                @foreach($errors->all() as $e)
                    <div>
                        {{ $e }}
                    </div>
                @endforeach
            </div>
        @endif


        @yield('content')

    </main>

</body>

</html>
```
