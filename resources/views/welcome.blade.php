@extends('layouts.public')
@section('title', 'Beranda')
@section('content')

<!-- Hero -->
<section class="bg-emerald-800 text-white">
    <div class="max-w-6xl mx-auto px-5 py-14 sm:py-20 text-center">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold leading-tight">Selamat Datang di<br>SD Tanjung Rejo</h1>
        <p class="mt-4 text-emerald-100 max-w-xl mx-auto text-sm sm:text-base">Membentuk generasi cerdas, berkarakter, dan berakhlak mulia sejak dini.</p>
        <div class="mt-8 flex flex-col sm:flex-row justify-center gap-3 px-4 sm:px-0">
            <a href="{{ route('ppdb.create') }}" class="bg-white text-emerald-800 font-semibold px-6 py-3 rounded-lg hover:bg-emerald-100">Daftar Siswa Baru</a>
            <a href="{{ route('login') }}" class="border border-white px-6 py-3 rounded-lg hover:bg-emerald-700">Login</a>
        </div>
    </div>
</section>

<!-- Profil singkat -->
<section class="max-w-6xl mx-auto px-5 py-16 grid md:grid-cols-2 gap-10 items-center">
    <div>
        <h2 class="text-2xl font-bold mb-4">Tentang Sekolah Kami</h2>
        <p class="text-gray-600 leading-relaxed">
            SD Tanjung Rejo adalah sekolah dasar swasta yang berkomitmen memberikan pendidikan berkualitas
            dengan lingkungan belajar yang nyaman, aman, dan menyenangkan. Kami memadukan kurikulum akademik
            dengan pembinaan karakter dan nilai-nilai keagamaan untuk mempersiapkan siswa menghadapi masa depan.
        </p>
    </div>
    <div class="grid grid-cols-2 gap-4">
        <div class="bg-white rounded-xl shadow-sm p-5 text-center">
            <p class="text-3xl font-bold text-emerald-700">6</p>
            <p class="text-sm text-gray-500 mt-1">Tingkat Kelas</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-5 text-center">
            <p class="text-3xl font-bold text-emerald-700">150+</p>
            <p class="text-sm text-gray-500 mt-1">Siswa Aktif</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-5 text-center">
            <p class="text-3xl font-bold text-emerald-700">15+</p>
            <p class="text-sm text-gray-500 mt-1">Tenaga Pengajar</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-5 text-center">
            <p class="text-3xl font-bold text-emerald-700">A</p>
            <p class="text-sm text-gray-500 mt-1">Akreditasi</p>
        </div>
    </div>
</section>

<!-- Visi Misi -->
<section class="bg-white border-y">
    <div class="max-w-6xl mx-auto px-5 py-16 grid md:grid-cols-2 gap-10">
        <div>
            <h3 class="text-xl font-bold text-emerald-800 mb-3">Visi</h3>
            <p class="text-gray-600 leading-relaxed">
                Mewujudkan generasi yang cerdas, mandiri, berakhlak mulia, dan berwawasan lingkungan.
            </p>
        </div>
        <div>
            <h3 class="text-xl font-bold text-emerald-800 mb-3">Misi</h3>
            <ul class="text-gray-600 leading-relaxed list-disc list-inside space-y-1">
                <li>Menyelenggarakan pembelajaran yang aktif, kreatif, dan menyenangkan</li>
                <li>Menanamkan nilai-nilai akhlak dan budi pekerti sejak dini</li>
                <li>Mengembangkan potensi siswa secara akademik maupun non-akademik</li>
                <li>Menjalin kerja sama yang erat antara sekolah dan orang tua siswa</li>
            </ul>
        </div>
    </div>
</section>

<!-- Fasilitas -->
<section class="max-w-6xl mx-auto px-5 py-16">
    <h2 class="text-2xl font-bold mb-8 text-center">Fasilitas Sekolah</h2>
    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-5">
        @foreach(['Ruang Kelas Ber-AC','Perpustakaan','Lapangan Olahraga','UKS','Kantin Sehat','Musala','Lab Komputer','Area Bermain'] as $f)
            <div class="bg-white rounded-xl shadow-sm p-5 text-center">
                <p class="text-sm font-medium">{{ $f }}</p>
            </div>
        @endforeach
    </div>
</section>

<!-- Tenaga Pengajar -->
<section class="max-w-6xl mx-auto px-5 py-16">
    <h2 class="text-2xl font-bold mb-2 text-center">Tenaga Pengajar Kami</h2>
    <p class="text-gray-500 text-center mb-8">Guru-guru berpengalaman yang siap membimbing putra-putri Anda</p>
    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-5">
        @forelse($gurus as $g)
            <div class="bg-white rounded-xl shadow-sm p-5 text-center">
                <div class="w-14 h-14 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center mx-auto font-bold text-lg">
                    {{ strtoupper(substr($g->nama, 0, 1)) }}
                </div>
                <p class="font-medium mt-3">{{ $g->nama }}</p>
                <p class="text-xs text-gray-400 mt-1">
                    @if($g->jabatan && $g->jabatan !== 'Guru')
                        {{ $g->jabatan }}
                    @elseif($g->kelasWali->count())
                        Wali Kelas {{ $g->kelasWali->pluck('nama_kelas')->join(', ') }}
                    @else
                        Guru
                    @endif
                </p>
            </div>
        @empty
            <p class="text-gray-400 text-sm col-span-full text-center">Data guru belum tersedia.</p>
        @endforelse
    </div>
</section>

<!-- Pengumuman -->
<section class="bg-white border-y">
    <div class="max-w-6xl mx-auto px-5 py-16">
        <h2 class="text-2xl font-bold mb-2 text-center">Pengumuman Terbaru</h2>
        <p class="text-gray-500 text-center mb-8">Informasi dan kabar terkini dari SD Tanjung Rejo</p>
        <div class="max-w-2xl mx-auto space-y-3">
            @forelse($pengumumans as $p)
                <div class="bg-gray-50 rounded-xl p-5">
                    <div class="flex items-center justify-between">
                        <h3 class="font-semibold">{{ $p->judul }}</h3>
                        <span class="text-xs px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full">{{ $p->kategori }}</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-1">{{ $p->created_at->translatedFormat('d M Y') }}</p>
                    <p class="text-sm text-gray-600 mt-2">{{ \Illuminate\Support\Str::limit($p->isi, 150) }}</p>
                </div>
            @empty
                <p class="text-gray-400 text-sm text-center">Belum ada pengumuman.</p>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA PPDB -->
<section class="bg-emerald-700 text-white">
    <div class="max-w-6xl mx-auto px-5 py-14 text-center">
        <h2 class="text-2xl font-bold">Penerimaan Peserta Didik Baru Sudah Dibuka!</h2>
        <p class="mt-2 text-emerald-100">Daftarkan putra-putri Anda sekarang, prosesnya mudah dan cepat.</p>
        <a href="{{ route('ppdb.create') }}" class="inline-block mt-6 bg-white text-emerald-800 font-semibold px-6 py-3 rounded-lg hover:bg-emerald-100">Daftar Sekarang</a>
    </div>
</section>

@endsection
