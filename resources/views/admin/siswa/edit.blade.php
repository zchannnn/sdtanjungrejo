
@extends('layouts.app')

@section('title', 'Ubah Siswa')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div>
        <div class="flex items-center gap-2 text-sm text-gray-400 mb-2">
            <a href="{{ route('admin.siswa.index') }}"
               class="hover:text-emerald-600 transition">
                Data Siswa
            </a>
            <span>/</span>
            <span>Ubah Siswa</span>
        </div>

        <h1 class="text-2xl font-bold text-gray-800">Ubah Data Siswa</h1>
        <p class="text-sm text-gray-500 mt-1">
            Perbarui informasi siswa yang tersimpan di dalam sistem.
        </p>
    </div>

    {{-- Form Card --}}
    <form method="POST"
          action="{{ route('admin.siswa.update', $siswa) }}"
          class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

        @csrf
        @method('PUT')

        {{-- Card Header --}}
        <div class="px-6 py-5 border-b border-gray-100 bg-gray-50/50">
            <div class="flex items-center gap-4">

                <div class="w-12 h-12 rounded-xl bg-emerald-100
                            text-emerald-700 flex items-center justify-center
                            text-lg font-bold">
                    {{ strtoupper(substr($siswa->nama, 0, 1)) }}
                </div>

                <div>
                    <h2 class="font-semibold text-gray-800">
                        {{ $siswa->nama }}
                    </h2>
                    <p class="text-xs text-gray-400 mt-0.5">
                        Edit informasi data siswa
                    </p>
                </div>

            </div>
        </div>

        <div class="p-6 space-y-7">

            {{-- Data Dasar --}}
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-1 h-5 bg-emerald-500 rounded-full"></div>
                    <h3 class="font-semibold text-gray-800">
                        Data Dasar
                    </h3>
                </div>

                <div class="space-y-4">

                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Nama Lengkap
                        </label>

                        <input
                            name="nama"
                            value="{{ $siswa->nama }}"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   focus:outline-none focus:ring-2
                                   focus:ring-emerald-100 focus:border-emerald-500
                                   transition"
                            required
                        >
                    </div>

                    {{-- NISN + Jenis Kelamin --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                NISN
                            </label>

                            <input
                                name="nisn"
                                value="{{ $siswa->nisn }}"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                       text-sm text-gray-700
                                       focus:outline-none focus:ring-2
                                       focus:ring-emerald-100 focus:border-emerald-500
                                       transition"
                                placeholder="10 digit (opsional)"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Jenis Kelamin
                            </label>

                            <select
                                name="jenis_kelamin"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                       text-sm text-gray-700 bg-white
                                       focus:outline-none focus:ring-2
                                       focus:ring-emerald-100 focus:border-emerald-500
                                       transition"
                                required
                            >
                                <option value="L" @selected($siswa->jenis_kelamin == 'L')>
                                    Laki-laki
                                </option>

                                <option value="P" @selected($siswa->jenis_kelamin == 'P')>
                                    Perempuan
                                </option>
                            </select>
                        </div>

                    </div>

                    {{-- Kelas --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Kelas
                        </label>

                        <select
                            name="kelas_id"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700 bg-white
                                   focus:outline-none focus:ring-2
                                   focus:ring-emerald-100 focus:border-emerald-500
                                   transition"
                        >
                            <option value="">- Pilih Kelas -</option>

                            @foreach($kelasList as $k)
                                <option
                                    value="{{ $k->id }}"
                                    @selected($siswa->kelas_id == $k->id)
                                >
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

            {{-- Data Kelahiran --}}
            <div class="border-t border-gray-100 pt-7">

                <div class="flex items-center gap-2 mb-4">
                    <div class="w-1 h-5 bg-emerald-500 rounded-full"></div>
                    <h3 class="font-semibold text-gray-800">
                        Data Kelahiran
                    </h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Tempat Lahir
                        </label>

                        <input
                            name="tempat_lahir"
                            value="{{ $siswa->tempat_lahir }}"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   focus:outline-none focus:ring-2
                                   focus:ring-emerald-100 focus:border-emerald-500
                                   transition"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Tanggal Lahir
                        </label>

                        <input
                            type="date"
                            name="tanggal_lahir"
                            value="{{ $siswa->tanggal_lahir?->format('Y-m-d') }}"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   focus:outline-none focus:ring-2
                                   focus:ring-emerald-100 focus:border-emerald-500
                                   transition"
                        >
                    </div>

                </div>
            </div>

            {{-- Alamat --}}
            <div class="border-t border-gray-100 pt-7">

                <div class="flex items-center gap-2 mb-4">
                    <div class="w-1 h-5 bg-emerald-500 rounded-full"></div>
                    <h3 class="font-semibold text-gray-800">
                        Alamat
                    </h3>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Alamat Lengkap
                    </label>

                    <textarea
                        name="alamat"
                        rows="3"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                               text-sm text-gray-700 resize-none
                               focus:outline-none focus:ring-2
                               focus:ring-emerald-100 focus:border-emerald-500
                               transition"
                    >{{ $siswa->alamat }}</textarea>
                </div>

            </div>

            {{-- Data Orang Tua --}}
            <div class="border-t border-gray-100 pt-7">

                <div class="flex items-center gap-2 mb-4">
                    <div class="w-1 h-5 bg-emerald-500 rounded-full"></div>
                    <h3 class="font-semibold text-gray-800">
                        Data Orang Tua
                    </h3>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Nama Orang Tua
                        </label>

                        <input
                            name="nama_ortu"
                            value="{{ $siswa->nama_ortu }}"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   focus:outline-none focus:ring-2
                                   focus:ring-emerald-100 focus:border-emerald-500
                                   transition"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            No. HP Orang Tua
                        </label>

                        <input
                            name="no_hp_ortu"
                            value="{{ $siswa->no_hp_ortu }}"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                   text-sm text-gray-700
                                   focus:outline-none focus:ring-2
                                   focus:ring-emerald-100 focus:border-emerald-500
                                   transition"
                        >
                    </div>

                </div>

            </div>

            {{-- Status --}}
            <div class="border-t border-gray-100 pt-7">

                <div class="flex items-center gap-2 mb-4">
                    <div class="w-1 h-5 bg-emerald-500 rounded-full"></div>
                    <h3 class="font-semibold text-gray-800">
                        Status Siswa
                    </h3>
                </div>

                <select
                    name="status"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                           text-sm text-gray-700 bg-white
                           focus:outline-none focus:ring-2
                           focus:ring-emerald-100 focus:border-emerald-500
                           transition"
                >
                    @foreach(['Aktif','Pindah','Lulus'] as $st)
                        <option
                            value="{{ $st }}"
                            @selected($siswa->status == $st)
                        >
                            {{ $st }}
                        </option>
                    @endforeach
                </select>

            </div>

            {{-- Akun Orang Tua --}}
            <div class="border-t border-gray-100 pt-7">

                <div class="flex items-center gap-2 mb-4">
                    <div class="w-1 h-5 bg-emerald-500 rounded-full"></div>
                    <h3 class="font-semibold text-gray-800">
                        Akun Login Orang Tua
                    </h3>
                </div>

                @if($siswa->user_id)

                    <div class="flex flex-col sm:flex-row sm:items-center
                                justify-between gap-3 p-4 rounded-xl
                                bg-emerald-50 border border-emerald-100">

                        <div>
                            <p class="text-xs text-emerald-600 font-medium mb-1">
                                Email Login
                            </p>

                            <p class="text-sm font-semibold text-gray-800">
                                {{ $siswa->user->email }}
                            </p>
                        </div>

                        <span class="inline-flex items-center gap-1.5
                                     px-3 py-1.5 rounded-full
                                     bg-emerald-100 text-emerald-700
                                     text-xs font-medium w-fit">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Akun Aktif
                        </span>

                    </div>

                @else

                    <div class="bg-gray-50 border border-gray-100 rounded-xl p-4">

                        <p class="text-sm font-medium text-gray-700 mb-1">
                            Buat Akun Login untuk Orang Tua
                        </p>

                        <p class="text-xs text-gray-400 mb-4">
                            Bagian ini opsional. Isi jika orang tua membutuhkan akun
                            untuk masuk ke sistem.
                        </p>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                    Email Ortu
                                </label>

                                <input
                                    type="email"
                                    name="email_ortu"
                                    class="w-full border border-gray-200 rounded-xl
                                           px-4 py-2.5 text-sm
                                           focus:outline-none focus:ring-2
                                           focus:ring-emerald-100
                                           focus:border-emerald-500 transition"
                                >
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                    Password
                                </label>

                                <input
                                    type="password"
                                    name="password_ortu"
                                    class="w-full border border-gray-200 rounded-xl
                                           px-4 py-2.5 text-sm
                                           focus:outline-none focus:ring-2
                                           focus:ring-emerald-100
                                           focus:border-emerald-500 transition"
                                >
                            </div>

                        </div>

                    </div>

                @endif

            </div>

        </div>

        {{-- Footer --}}
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100
                    flex flex-col-reverse sm:flex-row sm:justify-end gap-2">

            <a
                href="{{ route('admin.siswa.index') }}"
                class="px-5 py-2.5 rounded-xl text-sm font-medium
                       bg-white border border-gray-200 text-gray-600
                       hover:bg-gray-100 transition text-center"
            >
                Batal
            </a>

            <button
                type="submit"
                class="px-5 py-2.5 rounded-xl text-sm font-medium
                       bg-emerald-600 text-white
                       hover:bg-emerald-700
                       shadow-sm transition"
            >
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

@endsection
