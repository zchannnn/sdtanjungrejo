<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistem Administrasi') - SD Tanjung Rejo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body{font-family:'Inter',sans-serif}</style>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="flex min-h-screen relative">
    <!-- Overlay saat sidebar dibuka di HP -->
    <div id="sidebar-overlay" onclick="toggleSidebar()" class="hidden fixed inset-0 bg-black/40 z-20 md:hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-emerald-800 text-white flex-shrink-0 fixed md:static inset-y-0 left-0 z-30 -translate-x-full md:translate-x-0 transition-transform duration-200 overflow-y-auto">
        <div class="p-5 border-b border-emerald-700 flex items-center justify-between">
            <div>
                <h1 class="font-bold text-lg leading-tight">SD Tanjung Rejo</h1>
                <p class="text-emerald-200 text-xs mt-1">Sistem Administrasi Sekolah</p>
            </div>
            <button onclick="toggleSidebar()" class="md:hidden text-emerald-200 hover:text-white text-xl leading-none">&times;</button>
        </div>
        <nav class="p-3 space-y-1 text-sm">
            @auth
                @if(auth()->user()->hasRole('admin'))
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-700' : '' }}">Dashboard</a>
                    <a href="{{ route('admin.siswa.index') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('admin.siswa.*') ? 'bg-emerald-700' : '' }}">Data Siswa</a>
                    <a href="{{ route('admin.guru.index') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('admin.guru.*') ? 'bg-emerald-700' : '' }}">Data Guru</a>
                    <a href="{{ route('admin.kelas.index') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('admin.kelas.*') ? 'bg-emerald-700' : '' }}">Data Kelas</a>
                    <a href="{{ route('admin.mapel.index') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('admin.mapel.*') ? 'bg-emerald-700' : '' }}">Mata Pelajaran</a>
                    <a href="{{ route('admin.jadwal.index') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('admin.jadwal.*') ? 'bg-emerald-700' : '' }}">Jadwal Pelajaran</a>
                    <a href="{{ route('admin.tahunajaran.index') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('admin.tahunajaran.*') ? 'bg-emerald-700' : '' }}">Tahun Ajaran</a>
                    <a href="{{ route('admin.spp.index') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('admin.spp.*') ? 'bg-emerald-700' : '' }}">Pembayaran SPP</a>
                    <a href="{{ route('admin.pengumuman.index') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('admin.pengumuman.*') ? 'bg-emerald-700' : '' }}">Pengumuman</a>
                    <a href="{{ route('admin.ppdb.index') }}" class="flex items-center justify-between px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('admin.ppdb.*') ? 'bg-emerald-700' : '' }}">
                        <span>PPDB Online</span>
                        @php($jumlahMenunggu = \App\Models\PendaftaranPpdb::where('status','Menunggu')->count())
                        @if($jumlahMenunggu > 0)
                            <span class="text-xs bg-red-500 text-white rounded-full px-2 py-0.5">{{ $jumlahMenunggu }}</span>
                        @endif
                    </a>
                    <a href="{{ route('admin.verifikasi.index') }}" class="flex items-center justify-between px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('admin.verifikasi.*') ? 'bg-emerald-700' : '' }}">
                        <span>Verifikasi Akun</span>
                        @php($jumlahBelumVerifikasi = \App\Models\User::where('is_verified', false)->count())
                        @if($jumlahBelumVerifikasi > 0)
                            <span class="text-xs bg-red-500 text-white rounded-full px-2 py-0.5">{{ $jumlahBelumVerifikasi }}</span>
                        @endif
                    </a>
                @elseif(auth()->user()->hasRole('guru'))
                    <a href="{{ route('guru.dashboard') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('guru.dashboard') ? 'bg-emerald-700' : '' }}">Dashboard</a>
                    <a href="{{ route('guru.jadwal.index') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('guru.jadwal.*') ? 'bg-emerald-700' : '' }}">Jadwal Mengajar</a>
                    <a href="{{ route('guru.pengumuman.index') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('guru.pengumuman.*') ? 'bg-emerald-700' : '' }}">Pengumuman</a>
                    <p class="px-3 pt-3 text-emerald-300 text-xs uppercase">Kelas Wali</p>
                    @foreach(auth()->user()->guru?->kelasWali ?? [] as $k)
                        <a href="{{ route('guru.absensi.form', $k) }}" class="block px-3 py-2 rounded hover:bg-emerald-700">Absensi {{ $k->nama_kelas }}</a>
                        <a href="{{ route('guru.nilai.form', $k) }}" class="block px-3 py-2 rounded hover:bg-emerald-700">Nilai {{ $k->nama_kelas }}</a>
                    @endforeach
                @elseif(auth()->user()->hasRole('ortu'))
                    <a href="{{ route('ortu.dashboard') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('ortu.dashboard') ? 'bg-emerald-700' : '' }}">Dashboard</a>
                    <a href="{{ route('ortu.absensi.index') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('ortu.absensi.*') ? 'bg-emerald-700' : '' }}">Absensi Anak</a>
                    <a href="{{ route('ortu.nilai.index') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('ortu.nilai.*') ? 'bg-emerald-700' : '' }}">Nilai & Rapor</a>
                    <a href="{{ route('ortu.jadwal.index') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('ortu.jadwal.*') ? 'bg-emerald-700' : '' }}">Jadwal Pelajaran</a>
                    <a href="{{ route('ortu.spp.index') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('ortu.spp.*') ? 'bg-emerald-700' : '' }}">Pembayaran SPP</a>
                    <a href="{{ route('ortu.pengumuman.index') }}" class="block px-3 py-2 rounded hover:bg-emerald-700 {{ request()->routeIs('ortu.pengumuman.*') ? 'bg-emerald-700' : '' }}">Pengumuman</a>
                @endif
            @endauth
        </nav>
    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col min-w-0">
        <header class="bg-white border-b px-4 md:px-6 py-3 flex items-center justify-between gap-3">
            <div class="flex items-center gap-3 min-w-0">
                <button onclick="toggleSidebar()" class="md:hidden text-gray-600 hover:text-gray-900 flex-shrink-0" aria-label="Buka menu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h2 class="font-semibold text-lg truncate">@yield('title', 'Dashboard')</h2>
            </div>
            @auth
            <div class="flex items-center gap-2 md:gap-3 flex-shrink-0">
                <span class="text-sm text-gray-500 hidden sm:inline">{{ auth()->user()->name }}</span>
                <span class="text-xs px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full">{{ ucfirst(auth()->user()->getRoleNames()->first()) }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm text-red-600 hover:underline">Keluar</button>
                </form>
            </div>
            @endauth
        </header>

        <main class="p-4 md:p-6 flex-1">
            @if(session('success'))
                <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg text-sm">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="mb-4 px-4 py-3 bg-red-100 text-red-800 rounded-lg text-sm">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('-translate-x-full');
    document.getElementById('sidebar-overlay').classList.toggle('hidden');
}
</script>
</body>
</html>
