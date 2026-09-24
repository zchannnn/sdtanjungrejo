@extends('layouts.public')

@section('title', 'Beranda')

@section('content')

<!-- ================= HERO ================= -->
<section class="relative min-h-[620px] flex items-center overflow-hidden">

    <!-- Background Foto -->
    <div class="absolute inset-0">
        <img
            src="{{ asset('images/sekolah.jpg') }}"
            alt="SD Tanjung Rejo"
            class="w-full h-full object-cover"
        >

        <!-- Overlay -->
        <div class="absolute inset-0 bg-emerald-950/75"></div>

        <!-- Gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-emerald-950 via-emerald-900/80 to-emerald-900/30"></div>
    </div>

    <div class="relative max-w-6xl mx-auto px-5 py-20 w-full">
        <div class="max-w-3xl text-white">

            <!-- Badge -->
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2 mb-6">
                <span class="w-2 h-2 bg-emerald-300 rounded-full"></span>
                <span class="text-sm text-emerald-100">
                    Selamat Datang di SD Tanjung Rejo
                </span>
            </div>

            <!-- Heading -->
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight">
                Membangun Generasi
                <span class="text-emerald-300">Cerdas & Berkarakter</span>
            </h1>

            <p class="mt-6 text-emerald-100 text-base sm:text-lg leading-relaxed max-w-2xl">
                SD Tanjung Rejo hadir untuk memberikan pendidikan yang berkualitas
                dalam lingkungan belajar yang nyaman, aman, dan menyenangkan.
            </p>

            <!-- Button -->
            <div class="mt-8 flex flex-col sm:flex-row gap-3">

                <a href="{{ route('ppdb.create') }}"
                   class="inline-flex items-center justify-center gap-2 bg-white text-emerald-800 font-bold px-6 py-3.5 rounded-xl hover:bg-emerald-50 transition shadow-lg">

                    Daftar Siswa Baru

                    <svg class="w-5 h-5"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>

                </a>

                <a href="{{ route('login') }}"
                   class="inline-flex items-center justify-center border border-white/40 bg-white/10 backdrop-blur-sm px-6 py-3.5 rounded-xl font-semibold hover:bg-white/20 transition">

                    Login Sistem

                </a>

            </div>

        </div>
    </div>

    <!-- Bottom Wave -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120"
             class="w-full h-auto"
             preserveAspectRatio="none">

            <path
                fill="white"
                d="M0,96L60,90C120,84,240,72,360,69C480,66,600,72,720,75C840,78,960,78,1080,72C1200,66,1320,54,1380,48L1440,42L1440,120L0,120Z">
            </path>

        </svg>
    </div>

</section>


<!-- ================= STATISTIK ================= -->
<section class="relative -mt-2">
    <div class="max-w-6xl mx-auto px-5">

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            <div class="bg-white rounded-2xl shadow-lg p-6 text-center border border-gray-100">
                <div class="w-12 h-12 mx-auto rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mb-3">
                    <span class="text-xl font-bold">6</span>
                </div>
                <p class="text-2xl font-extrabold text-gray-800">6</p>
                <p class="text-sm text-gray-500 mt-1">Tingkat Kelas</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 text-center border border-gray-100">
                <div class="w-12 h-12 mx-auto rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mb-3">
                    <span class="text-xl">👨‍🎓</span>
                </div>
                <p class="text-2xl font-extrabold text-gray-800">150+</p>
                <p class="text-sm text-gray-500 mt-1">Siswa Aktif</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 text-center border border-gray-100">
                <div class="w-12 h-12 mx-auto rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mb-3">
                    <span class="text-xl">👩‍🏫</span>
                </div>
                <p class="text-2xl font-extrabold text-gray-800">15+</p>
                <p class="text-sm text-gray-500 mt-1">Tenaga Pengajar</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 text-center border border-gray-100">
                <div class="w-12 h-12 mx-auto rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mb-3">
                    <span class="text-xl">★</span>
                </div>
                <p class="text-2xl font-extrabold text-gray-800">A</p>
                <p class="text-sm text-gray-500 mt-1">Akreditasi</p>
            </div>

        </div>

    </div>
</section>


<!-- ================= TENTANG SEKOLAH ================= -->
<section class="max-w-6xl mx-auto px-5 py-20">

    <div class="grid lg:grid-cols-2 gap-12 items-center">

        <!-- Foto -->
        <div class="relative">

            <div class="absolute -left-4 -bottom-4 w-full h-full bg-emerald-100 rounded-3xl"></div>

            <img
                src="{{ asset('images/sekolah.jpg') }}"
                alt="Gedung SD Tanjung Rejo"
                class="relative w-full h-[380px] object-cover rounded-3xl shadow-xl"
            >

            <!-- Label -->
            <div class="absolute bottom-5 left-5 bg-white rounded-2xl shadow-lg px-5 py-4">
                <p class="text-xs text-gray-500">Sekolah Kami</p>
                <p class="font-bold text-emerald-800">
                    SD Tanjung Rejo
                </p>
            </div>

        </div>

        <!-- Text -->
        <div>

            <span class="text-emerald-700 font-semibold text-sm uppercase tracking-wider">
                Tentang Kami
            </span>

            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-800 mt-2">
                Tempat Tumbuh dan
                <span class="text-emerald-700">Belajar Bersama</span>
            </h2>

            <p class="text-gray-600 leading-relaxed mt-5">
                SD Tanjung Rejo adalah sekolah dasar swasta yang berkomitmen
                memberikan pendidikan berkualitas dengan lingkungan belajar
                yang nyaman, aman, dan menyenangkan.
            </p>

            <p class="text-gray-600 leading-relaxed mt-4">
                Kami memadukan pembelajaran akademik dengan pembinaan karakter
                serta nilai-nilai keagamaan untuk membantu mempersiapkan siswa
                menghadapi masa depan.
            </p>

            <div class="mt-7 flex flex-wrap gap-3">

                <span class="px-4 py-2 bg-emerald-50 text-emerald-700 rounded-full text-sm font-medium">
                    ✓ Pendidikan Berkualitas
                </span>

                <span class="px-4 py-2 bg-emerald-50 text-emerald-700 rounded-full text-sm font-medium">
                    ✓ Lingkungan Nyaman
                </span>

                <span class="px-4 py-2 bg-emerald-50 text-emerald-700 rounded-full text-sm font-medium">
                    ✓ Pendidikan Karakter
                </span>

            </div>

        </div>

    </div>

</section>


<!-- ================= VISI MISI ================= -->
<section class="bg-emerald-50">

    <div class="max-w-6xl mx-auto px-5 py-20">

        <div class="text-center mb-12">

            <span class="text-emerald-700 font-semibold text-sm uppercase tracking-wider">
                Arah Pendidikan
            </span>

            <h2 class="text-3xl font-extrabold text-gray-800 mt-2">
                Visi & Misi Sekolah
            </h2>

            <p class="text-gray-500 mt-3 max-w-2xl mx-auto">
                Menjadi bagian dari perjalanan pendidikan dan perkembangan
                setiap peserta didik.
            </p>

        </div>


        <div class="grid md:grid-cols-2 gap-6">

            <!-- Visi -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-emerald-100">

                <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl mb-5">
                    👁
                </div>

                <h3 class="text-2xl font-bold text-gray-800 mb-4">
                    Visi
                </h3>

                <p class="text-gray-600 leading-relaxed">
                    Mewujudkan generasi yang cerdas, mandiri, berakhlak mulia,
                    dan berwawasan lingkungan.
                </p>

            </div>


            <!-- Misi -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-emerald-100">

                <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl mb-5">
                    🎯
                </div>

                <h3 class="text-2xl font-bold text-gray-800 mb-4">
                    Misi
                </h3>

                <ul class="space-y-3 text-gray-600">

                    <li class="flex gap-3">
                        <span class="text-emerald-600 font-bold">✓</span>
                        <span>Menyelenggarakan pembelajaran yang aktif, kreatif, dan menyenangkan.</span>
                    </li>

                    <li class="flex gap-3">
                        <span class="text-emerald-600 font-bold">✓</span>
                        <span>Menanamkan nilai-nilai akhlak dan budi pekerti sejak dini.</span>
                    </li>

                    <li class="flex gap-3">
                        <span class="text-emerald-600 font-bold">✓</span>
                        <span>Mengembangkan potensi siswa secara akademik maupun non-akademik.</span>
                    </li>

                    <li class="flex gap-3">
                        <span class="text-emerald-600 font-bold">✓</span>
                        <span>Menjalin kerja sama yang erat antara sekolah dan orang tua siswa.</span>
                    </li>

                </ul>

            </div>

        </div>

    </div>

</section>


<!-- ================= FASILITAS ================= -->
<section class="max-w-6xl mx-auto px-5 py-20">

    <div class="text-center mb-12">

        <span class="text-emerald-700 font-semibold text-sm uppercase tracking-wider">
            Fasilitas
        </span>

        <h2 class="text-3xl font-extrabold text-gray-800 mt-2">
            Fasilitas Sekolah
        </h2>

        <p class="text-gray-500 mt-3">
            Fasilitas yang mendukung kenyamanan dan kegiatan belajar siswa.
        </p>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

        @foreach([
            ['icon' => '🍽️', 'name' => 'Kantin'],
            ['icon' => '🏫', 'name' => 'Ruang Kelas yang Nyaman'],
            ['icon' => '📚', 'name' => 'Perpustakaan'],
            ['icon' => '⚽', 'name' => 'Lapangan']
        ] as $f)

            <div class="group bg-white border border-gray-100 rounded-2xl p-6 text-center shadow-sm hover:shadow-lg hover:-translate-y-1 transition">

                <div class="w-16 h-16 mx-auto rounded-2xl bg-emerald-50 flex items-center justify-center text-3xl group-hover:bg-emerald-100 transition">
                    {{ $f['icon'] }}
                </div>

                <p class="font-semibold text-gray-700 mt-4">
                    {{ $f['name'] }}
                </p>

            </div>

        @endforeach

    </div>

</section>


<!-- ================= GURU ================= -->
<section class="bg-gray-50">

    <div class="max-w-6xl mx-auto px-5 py-20">

        <div class="text-center mb-12">

            <span class="text-emerald-700 font-semibold text-sm uppercase tracking-wider">
                Tim Kami
            </span>

            <h2 class="text-3xl font-extrabold text-gray-800 mt-2">
                Tenaga Pengajar Kami
            </h2>

            <p class="text-gray-500 mt-3">
                Guru-guru yang siap membimbing dan mendampingi peserta didik.
            </p>

        </div>


        <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-5">

            @forelse($gurus as $g)

                <div class="bg-white rounded-2xl p-6 text-center border border-gray-100 shadow-sm hover:shadow-lg transition">

                    <div class="w-20 h-20 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center mx-auto font-bold text-2xl border-4 border-white shadow">

                        {{ strtoupper(substr($g->nama, 0, 1)) }}

                    </div>

                    <p class="font-bold text-gray-800 mt-4">
                        {{ $g->nama }}
                    </p>

                    <p class="text-sm text-emerald-600 mt-1">

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

                <p class="text-gray-400 text-sm col-span-full text-center">
                    Data guru belum tersedia.
                </p>

            @endforelse

        </div>

    </div>

</section>


<!-- ================= PENGUMUMAN ================= -->
<section class="max-w-6xl mx-auto px-5 py-20">

    <div class="text-center mb-12">

        <span class="text-emerald-700 font-semibold text-sm uppercase tracking-wider">
            Informasi
        </span>

        <h2 class="text-3xl font-extrabold text-gray-800 mt-2">
            Pengumuman Terbaru
        </h2>

        <p class="text-gray-500 mt-3">
            Informasi dan kabar terbaru dari SD Tanjung Rejo.
        </p>

    </div>


    <div class="max-w-3xl mx-auto space-y-4">

        @forelse($pengumumans as $p)

            <div class="group bg-white border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-md transition">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

                    <h3 class="font-bold text-gray-800 group-hover:text-emerald-700 transition">
                        {{ $p->judul }}
                    </h3>

                    <span class="w-fit text-xs px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full font-medium">
                        {{ $p->kategori }}
                    </span>

                </div>

                <p class="text-xs text-gray-400 mt-2">
                    {{ $p->created_at->translatedFormat('d M Y') }}
                </p>

                <p class="text-sm text-gray-600 leading-relaxed mt-3">
                    {{ \Illuminate\Support\Str::limit($p->isi, 180) }}
                </p>

            </div>

        @empty

            <div class="text-center py-10">
                <p class="text-gray-400 text-sm">
                    Belum ada pengumuman.
                </p>
            </div>

        @endforelse

    </div>

</section>


<!-- ================= CTA ================= -->
<section class="relative overflow-hidden bg-emerald-800">

    <div class="absolute inset-0 opacity-10">
        <div class="absolute -top-20 -right-20 w-80 h-80 rounded-full bg-white"></div>
        <div class="absolute -bottom-32 -left-20 w-96 h-96 rounded-full bg-white"></div>
    </div>

    <div class="relative max-w-6xl mx-auto px-5 py-20 text-center text-white">

        <span class="inline-block px-4 py-2 rounded-full bg-white/10 text-emerald-100 text-sm mb-5">
            Penerimaan Peserta Didik Baru
        </span>

        <h2 class="text-3xl sm:text-4xl font-extrabold">
            Mari Bergabung Bersama
            <br class="hidden sm:block">
            SD Tanjung Rejo
        </h2>

        <p class="mt-4 text-emerald-100 max-w-xl mx-auto">
            Daftarkan putra-putri Anda dan menjadi bagian dari lingkungan
            pendidikan yang nyaman, positif, dan menyenangkan.
        </p>

        <a href="{{ route('ppdb.create') }}"
           class="inline-flex items-center gap-2 mt-8 bg-white text-emerald-800 font-bold px-7 py-3.5 rounded-xl hover:bg-emerald-50 transition shadow-lg">

            Daftar Sekarang

            <svg class="w-5 h-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>

        </a>

    </div>

</section>

@endsection