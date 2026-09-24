@extends('layouts.app')

@section('title', 'Tambah Kelas')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Tambah Kelas</h1>
        <p class="text-sm text-gray-500 mt-1">
            Tambahkan data kelas baru ke dalam sistem.
        </p>
    </div>

    {{-- Form --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-3xl">

        {{-- Card Header --}}
        <div class="px-6 py-5 border-b border-gray-100 flex items-center gap-4">
            <div class="w-11 h-11 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-700">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 10.5L12 4l9 6.5M5 10v9a1 1 0 001 1h10a1 1 0 001-1v-9M9 20v-6h6v6"/>
                </svg>
            </div>

            <div>
                <h2 class="text-base font-semibold text-gray-800">
                    Informasi Kelas
                </h2>
                <p class="text-sm text-gray-500">
                    Lengkapi informasi kelas yang ingin ditambahkan.
                </p>
            </div>
        </div>

        <form method="POST"
              action="{{ route('admin.kelas.store') }}"
              class="p-6 space-y-6">

            @csrf

            {{-- Nama Kelas --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Kelas
                </label>

                <input
                    type="text"
                    name="nama_kelas"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-700
                           focus:outline-none focus:ring-2 focus:ring-emerald-100
                           focus:border-emerald-500 transition"
                    placeholder="Contoh: 1A"
                    required
                >

                <p class="text-xs text-gray-400 mt-1.5">
                    Masukkan nama kelas, misalnya 1A, 2B, atau 6A.
                </p>
            </div>

            {{-- Tingkat --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Tingkat
                </label>

                <select
                    name="tingkat"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-700
                           bg-white focus:outline-none focus:ring-2 focus:ring-emerald-100
                           focus:border-emerald-500 transition"
                    required
                >
                    @for($i=1;$i<=6;$i++)
                        <option value="{{ $i }}">
                            Kelas {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>

            {{-- Wali Kelas --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Wali Kelas
                </label>

                <select
                    name="wali_kelas_id"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-700
                           bg-white focus:outline-none focus:ring-2 focus:ring-emerald-100
                           focus:border-emerald-500 transition"
                >
                    <option value="">- Pilih Guru -</option>

                    @foreach($gurus as $g)
                        <option value="{{ $g->id }}">
                            {{ $g->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tahun Ajaran --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Tahun Ajaran
                </label>

                <select
                    name="tahun_ajaran_id"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-700
                           bg-white focus:outline-none focus:ring-2 focus:ring-emerald-100
                           focus:border-emerald-500 transition"
                >
                    <option value="">- Pilih Tahun Ajaran -</option>

                    @foreach($tahunAjarans as $t)
                        <option value="{{ $t->id }}">
                            {{ $t->nama }} ({{ $t->semester }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Button --}}
            <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-100">

                <button
                    type="submit"
                    class="inline-flex items-center justify-center gap-2
                           bg-emerald-600 text-white px-5 py-2.5 rounded-xl
                           text-sm font-medium hover:bg-emerald-700
                           shadow-sm transition"
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-4 h-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 4v16m8-8H4"/>
                    </svg>

                    Simpan
                </button>

                <a
                    href="{{ route('admin.kelas.index') }}"
                    class="inline-flex items-center justify-center gap-2
                           px-5 py-2.5 rounded-xl text-sm font-medium
                           bg-gray-100 text-gray-600 hover:bg-gray-200
                           transition"
                >
                    Batal
                </a>

            </div>

        </form>
    </div>

</div>
@endsection