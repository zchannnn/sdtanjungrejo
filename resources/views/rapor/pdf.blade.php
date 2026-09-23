<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: sans-serif; font-size: 12px; color: #222; }
        h2, h3 { margin: 0 0 4px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 6px 8px; text-align: left; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #047857; padding-bottom: 10px; }
        .info-table td { border: none; padding: 2px 8px 2px 0; }
    </style>
</head>
<body>
    <div class="header">
        <h2>RAPOR SISWA</h2>
        <p>SD Tanjung Rejo &mdash; Tahun Ajaran {{ $tahunAjaran?->nama }} ({{ $tahunAjaran?->semester }})</p>
    </div>

    <table class="info-table">
        <tr><td width="120"><strong>Nama Siswa</strong></td><td>: {{ $siswa->nama }}</td></tr>
        <tr><td width="120"><strong>NISN</strong></td><td>: {{ $siswa->nisn ?? '-' }}</td></tr>
        <tr><td><strong>Kelas</strong></td><td>: {{ $siswa->kelas?->nama_kelas ?? '-' }}</td></tr>
    </table>

    <h3 style="margin-top:20px">Nilai Akademik</h3>
    <table>
        <thead>
            <tr><th>Mata Pelajaran</th><th>Tugas</th><th>UTS</th><th>UAS</th><th>Rata-rata</th></tr>
        </thead>
        <tbody>
        @forelse($nilais as $mapel => $items)
            @php
                $tugas = $items->where('jenis','Tugas')->first()?->nilai;
                $uts = $items->where('jenis','UTS')->first()?->nilai;
                $uas = $items->where('jenis','UAS')->first()?->nilai;
                $rata = collect([$tugas,$uts,$uas])->filter(fn($v)=>!is_null($v))->avg();
            @endphp
            <tr>
                <td>{{ $mapel }}</td>
                <td>{{ $tugas ?? '-' }}</td>
                <td>{{ $uts ?? '-' }}</td>
                <td>{{ $uas ?? '-' }}</td>
                <td>{{ $rata ? number_format($rata,2) : '-' }}</td>
            </tr>
        @empty
            <tr><td colspan="5">Belum ada nilai tercatat.</td></tr>
        @endforelse
        </tbody>
    </table>

    <h3 style="margin-top:20px">Rekap Kehadiran</h3>
    <table>
        <thead><tr><th>Hadir</th><th>Izin</th><th>Sakit</th><th>Alpa</th></tr></thead>
        <tbody>
            <tr>
                <td>{{ $rekapAbsensi['Hadir'] }}</td>
                <td>{{ $rekapAbsensi['Izin'] }}</td>
                <td>{{ $rekapAbsensi['Sakit'] }}</td>
                <td>{{ $rekapAbsensi['Alpa'] }}</td>
            </tr>
        </tbody>
    </table>

    <p style="margin-top:40px">Medan, {{ now()->translatedFormat('d F Y') }}</p>
    <p style="margin-top:50px">Wali Kelas</p>
    <p style="margin-top:40px">( {{ $siswa->kelas?->waliKelas?->nama ?? '..........................' }} )</p>
</body>
</html>
