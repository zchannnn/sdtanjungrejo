<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi OTP - SD Tanjung Rejo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body{font-family:'Inter',sans-serif}</style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">
    <div class="bg-white rounded-2xl shadow-sm p-8 max-w-md w-full text-center">
        <div class="w-16 h-16 bg-emerald-100 text-emerald-700 rounded-full flex items-center justify-center mx-auto text-3xl">&#128274;</div>
        <h1 class="text-xl font-bold mt-5">Masukkan Kode Verifikasi</h1>
        <p class="text-gray-500 text-sm mt-3 leading-relaxed">
            Admin sekolah sudah membuatkan kode OTP untuk akun Anda ({{ auth()->user()->email }}).
            Masukkan 6 digit kode yang sudah disampaikan admin (lewat WhatsApp/telepon).
        </p>

        @if($errors->any())
            <div class="mt-4 px-4 py-3 bg-red-100 text-red-800 rounded-lg text-sm text-left">
                @foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('akun.verifikasi-otp.submit') }}" class="mt-6 space-y-4">
            @csrf
            <input type="text" name="kode" inputmode="numeric" pattern="[0-9]*" maxlength="6" placeholder="123456"
                   class="w-full text-center text-2xl tracking-[0.5em] font-semibold border rounded-lg px-3 py-3" autofocus required>
            <button class="w-full bg-emerald-700 text-white py-3 rounded-lg font-semibold hover:bg-emerald-800">Verifikasi</button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button class="text-sm text-red-600 hover:underline">Keluar</button>
        </form>
    </div>
</body>
</html>
