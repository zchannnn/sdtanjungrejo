@extends('layouts.app')
@section('title', 'Dashboard Orang Tua')
@section('content')

<div class="space-y-6">

    <!-- Header -->
    <div>
        <h2 class="text-xl font-bold text-gray-800">Dashboard Orang Tua</h2>
        <p class="text-sm text-gray-500 mt-1">
            Pantau informasi akademik dan perkembangan anak Anda.
        </p>
    </div>

    @if($anak)

        <!-- Data Anak -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

            <div class="h-2 bg-emerald-600"></div>

            <div class="p-5 sm:p-6">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">

                    <div class="flex items-center gap-4">

                        <!-- Avatar -->
                        <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-xl font-bold flex-shrink-0">
                            {{ strtoupper(substr($anak->nama, 0, 1)) }}
                        </div>

                        <div>
                            <p class="text-xs text-emerald-600 font-medium mb-1">
                                Data Siswa
                            </p>

                            <h3 class="font-bold text-lg text-gray-800">
                                {{ $anak->nama }}
                            </h3>

                            <div class="flex flex-wrap items-center gap-x-2 gap-y-1 mt-1 text-sm text-gray-500">
                                <span>NISN: {{ $anak->nisn ?? '-' }}</span>
                                <span class="text-gray-300">&bull;</span>
                                <span>Kelas: {{ $anak->kelas?->nama_kelas ?? '-' }}</span>
                            </div>
                        </div>

                    </div>

                    <!-- Download Rapor -->
                    <a
                        href="{{ route('rapor.cetak', $anak) }}"
                        class="inline-flex items-center justify-center gap-2 bg-emerald-600 text-white text-sm font-medium px-4 py-2.5 rounded-xl hover:bg-emerald-700 transition shadow-sm"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-4 h-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 10v6m0 0l-3-3m3 3l3-3m2 6H7a2 2 0 01-2-2V5a2 2 0 012-2h6l4 4v10a2 2 0 01-2 2z" />
                        </svg>

                        Unduh Rapor (PDF)
                    </a>

                </div>

            </div>
        </div>

        <!-- Menu Utama -->
        <div>
            <div class="flex items-center justify-between mb-3">
                <div>
                    <h3 class="font-semibold text-gray-800">Informasi Anak</h3>
                    <p class="text-xs text-gray-400 mt-1">
                        Akses informasi akademik anak dengan mudah.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                <!-- Absensi -->
                <a
                    href="{{ route('ortu.absensi.index') }}"
                    class="group bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md hover:border-emerald-100 transition"
                >
                    <div class="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mb-4">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 12l2 2 4-4m5-1a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                    </div>

                    <h4 class="font-semibold text-gray-800">
                        Absensi
                    </h4>

                    <p class="text-sm text-gray-500 mt-1">
                        Lihat riwayat kehadiran anak.
                    </p>

                    <div class="flex items-center gap-1 text-sm text-emerald-600 font-medium mt-4 group-hover:gap-2 transition-all">
                        Lihat Kehadiran
                        <span>&rarr;</span>
                    </div>
                </a>

                <!-- Nilai -->
                <a
                    href="{{ route('ortu.nilai.index') }}"
                    class="group bg-white rounded-2xl border border-gray-100 shadow-sm p-5 hover:shadow-md hover:border-emerald-100 transition"
                >
                    <div class="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mb-4">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>

                    </div>

                    <h4 class="font-semibold text-gray-800">
                        Nilai
                    </h4>

                    <p class="text-sm text-gray-500 mt-1">
                        Lihat nilai akademik semester ini.
                    </p>

                    <div class="flex items-center gap-1 text-sm text-emerald-600 font-medium mt-4 group-hover:gap-2 transition-all">
                        Lihat Nilai
                        <span>&rarr;</span>
                    </div>
                </a>

                <!-- SPP -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">

                    <div class="w-11 h-11 rounded-xl {{ $tunggakan > 0 ? 'bg-red-100 text-red-600' : 'bg-emerald-100 text-emerald-700' }} flex items-center justify-center mb-4">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1c-1.11 0-2.08.402-2.599 1M12 16v1m0-1c1.11 0 2.08-.402 2.599-1M12 16c-1.11 0-2.08-.402-2.599-1M19 12a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>

                    </div>

                    <h4 class="font-semibold text-gray-800">
                        Tunggakan SPP
                    </h4>

                    <p class="text-2xl font-bold {{ $tunggakan > 0 ? 'text-red-600' : 'text-emerald-700' }} mt-2">
                        {{ $tunggakan }} bulan
                    </p>

                    <p class="text-xs text-gray-400 mt-1">
                        {{ $tunggakan > 0 ? 'Segera lakukan pembayaran.' : 'Tidak ada tunggakan pembayaran.' }}
                    </p>

                </div>

            </div>
        </div>

    @else

        <!-- Belum Terhubung -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 sm:p-10 text-center">

            <div class="w-16 h-16 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center mx-auto mb-4">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-8 h-8"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 9v2m0 4h.01M10.29 3.86l-7.1 12.28A2 2 0 004.92 19h14.16a2 2 0 001.73-2.86l-7.1-12.28a2 2 0 00-3.42 0z" />
                </svg>

            </div>

            <h3 class="font-semibold text-gray-800">
                Data Siswa Belum Terhubung
            </h3>

            <p class="text-sm text-gray-500 mt-2 max-w-md mx-auto">
                Akun Anda belum terhubung dengan data siswa.
                Silakan hubungi pihak sekolah untuk menghubungkan akun Anda.
            </p>

        </div>

    @endif

</div>

@endsection