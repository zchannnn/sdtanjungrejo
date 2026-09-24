@extends('layouts.public')

@section('title', 'Pendaftaran Berhasil')

@section('content')

<div class="min-h-[calc(100vh-80px)] bg-gray-50 flex items-center justify-center px-5 py-16">

    <div class="w-full max-w-xl">

        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

            <!-- Top Accent -->
            <div class="h-2 bg-emerald-600"></div>

            <div class="px-6 sm:px-10 py-10 sm:py-12 text-center">

                <!-- Success Icon -->
                <div class="w-20 h-20 mx-auto rounded-full bg-emerald-100
                            flex items-center justify-center">

                    <div class="w-14 h-14 rounded-full bg-emerald-600
                                flex items-center justify-center shadow-sm">

                        <svg
                            class="w-8 h-8 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2.5"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                    </div>

                </div>

                <!-- Title -->
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mt-7">
                    Pendaftaran Berhasil!
                </h1>

                <p class="text-sm text-gray-500 mt-2">
                    Data pendaftaran berhasil dikirim ke sistem sekolah
                </p>

                <!-- Information -->
                <div class="mt-8 bg-emerald-50 border border-emerald-100
                            rounded-2xl p-5 text-left">

                    <div class="flex items-start gap-3">

                        <div class="w-9 h-9 rounded-xl bg-white
                                    flex items-center justify-center
                                    text-emerald-600 shrink-0">

                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z"
                                />
                            </svg>

                        </div>

                        <p class="text-sm leading-6 text-gray-600">
                            Terima kasih, pendaftaran atas nama
                            <strong class="text-gray-800">
                                {{ $pendaftaran->nama_calon_siswa }}
                            </strong>
                            untuk
                            <strong class="text-gray-800">
                                Kelas {{ $pendaftaran->kelas_dituju }}
                            </strong>
                            sudah kami terima.
                        </p>

                    </div>

                </div>

                <!-- Contact Info -->
                <div class="mt-4 bg-gray-50 border border-gray-100
                            rounded-2xl p-5 text-left">

                    <div class="flex items-start gap-3">

                        <div class="w-9 h-9 rounded-xl bg-white
                                    border border-gray-100
                                    flex items-center justify-center
                                    text-emerald-600 shrink-0">

                            <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a2 2 0 011.94 1.515L11 7a2 2 0 01-.5 1.93l-1.27 1.27a16.001 16.001 0 006.57 6.57l1.27-1.27A2 2 0 0119 15l2.485.78A2 2 0 0123 17.72V21a2 2 0 01-2 2C10.507 23 1 13.493 1 3a2 2 0 012-2z"
                                />
                            </svg>

                        </div>

                        <p class="text-sm leading-6 text-gray-600">
                            Tim sekolah akan menghubungi ke nomor
                            <strong class="text-gray-800">
                                {{ $pendaftaran->no_hp_ortu }}
                            </strong>
                            setelah data diverifikasi.
                        </p>

                    </div>

                </div>

                <!-- Button -->
                <a
                    href="{{ route('home') }}"
                    class="inline-flex items-center justify-center gap-2
                           mt-8 w-full sm:w-auto
                           bg-emerald-600 hover:bg-emerald-700
                           text-white font-semibold
                           px-7 py-3.5 rounded-xl
                           shadow-sm hover:shadow-md
                           transition duration-200"
                >

                    <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4"
                        />
                    </svg>

                    Kembali ke Beranda

                </a>

            </div>

        </div>

        <!-- Footer Text -->
        <p class="text-center text-xs text-gray-400 mt-6">
            Terima kasih telah melakukan pendaftaran di
            <span class="font-medium text-emerald-600">
                SD Al-Wasliyah Tanjung Rejo
            </span>
        </p>

    </div>

</div>

@endsection