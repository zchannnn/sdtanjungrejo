<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - SD Tanjung Rejo</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f4f6;
        }

        /* ================================
           LOGIN WRAPPER
        ================================= */

        .login-page {
            min-height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: #f3f4f6;
        }

        /* ================================
           LOGIN CARD
        ================================= */

        .login-card {
            width: 100%;
            max-width: 1000px;
            min-height: 590px;
            display: flex;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.10);
        }

        /* ================================
           LEFT SIDE
        ================================= */

        .login-left {
            width: 43%;
            background: #006b54;
            color: white;
            padding: 55px 50px;

            display: flex;
            align-items: center;
            justify-content: center;

            position: relative;
            overflow: hidden;
        }

        /* Lingkaran dekorasi */

        .login-left::before {
            content: "";
            position: absolute;

            width: 350px;
            height: 350px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.04);

            top: -170px;
            right: -120px;
        }

        .login-left::after {
            content: "";
            position: absolute;

            width: 300px;
            height: 300px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.04);

            bottom: -170px;
            left: -130px;
        }

        .left-content {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        /* Icon sekolah */

        .school-icon {
            width: 80px;
            height: 80px;

            border-radius: 20px;

            background: rgba(255, 255, 255, 0.12);

            border: 1px solid rgba(255, 255, 255, 0.20);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 38px;

            margin-bottom: 30px;
        }

        .school-title {
            font-size: 36px;
            line-height: 1.2;
            font-weight: 700;

            margin: 0 0 20px 0;
        }

        .title-line {
            width: 60px;
            height: 4px;

            background: #10a879;

            border-radius: 20px;

            margin-bottom: 25px;
        }

        .school-subtitle {
            font-size: 18px;
            line-height: 1.6;

            color: rgba(255, 255, 255, 0.92);

            margin-bottom: 25px;
        }

        .school-description {
            font-size: 14px;
            line-height: 1.8;

            color: rgba(255, 255, 255, 0.72);

            max-width: 330px;
        }

        /* ================================
           RIGHT SIDE
        ================================= */

        .login-right {
            width: 57%;

            padding: 60px 70px;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-header {
            margin-bottom: 35px;
        }

        .login-header h1 {
            margin: 0 0 10px 0;

            color: #172033;

            font-size: 30px;
            font-weight: 700;
        }

        .login-header p {
            margin: 0;

            color: #6b7280;

            font-size: 14px;
            line-height: 1.6;
        }

        /* ================================
           INPUT
        ================================= */

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;

            margin-bottom: 8px;

            color: #374151;

            font-size: 14px;
            font-weight: 600;
        }

        .form-input {
            display: block;

            width: 100%;
            height: 50px;

            padding: 0 16px;

            border: 1px solid #d6dce1;

            border-radius: 9px;

            background: #ffffff;

            color: #1f2937;

            font-size: 14px;

            outline: none;

            transition: all 0.2s ease;
        }

        .form-input:focus {
            border-color: #008f6b;

            box-shadow:
                0 0 0 3px rgba(0, 143, 107, 0.10);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        /* ================================
           ERROR
        ================================= */

        .error-message {
            margin-top: 7px;

            color: #dc2626;

            font-size: 13px;
        }

        /* ================================
           REMEMBER
        ================================= */

        .login-options {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin: 5px 0 25px 0;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;

            color: #6b7280;

            font-size: 13px;

            cursor: pointer;
        }

        .remember input {
            width: 16px;
            height: 16px;

            accent-color: #008f6b;

            cursor: pointer;
        }

        .forgot-password {
            color: #008f6b;

            font-size: 13px;
            font-weight: 500;

            text-decoration: none;
        }

        .forgot-password:hover {
            color: #006b54;

            text-decoration: underline;
        }

        /* ================================
           BUTTON
        ================================= */

        .login-button {
            width: 100%;
            height: 50px;

            border: none;
            border-radius: 9px;

            background: #008f6b;

            color: white;

            font-size: 15px;
            font-weight: 600;

            cursor: pointer;

            transition: all 0.2s ease;
        }

        .login-button:hover {
            background: #007b5d;

            transform: translateY(-1px);

            box-shadow:
                0 7px 18px rgba(0, 143, 107, 0.20);
        }

        .login-button:active {
            transform: translateY(0);
        }

        /* ================================
           SESSION
        ================================= */

        .session-message {
            margin-bottom: 20px;

            padding: 12px 15px;

            border-radius: 8px;

            background: #dcfce7;

            color: #166534;

            font-size: 13px;
        }

        /* ================================
           FOOTER
        ================================= */

        .login-footer {
            margin-top: 28px;

            text-align: center;

            color: #9ca3af;

            font-size: 12px;
        }

        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 800px) {

            .login-page {
                padding: 20px;
            }

            .login-card {
                max-width: 500px;

                flex-direction: column;
            }

            .login-left {
                width: 100%;

                padding: 40px 35px;

                min-height: 300px;
            }

            .school-title {
                font-size: 30px;
            }

            .school-description {
                display: none;
            }

            .login-right {
                width: 100%;

                padding: 45px 35px;
            }
        }

        @media (max-width: 500px) {

            .login-page {
                padding: 10px;
            }

            .login-left {
                padding: 30px 25px;
            }

            .login-right {
                padding: 35px 25px;
            }

            .login-header h1 {
                font-size: 25px;
            }

            .school-title {
                font-size: 27px;
            }

            .login-options {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
        }
    </style>
</head>

<body>

<div class="login-page">

    <div class="login-card">

        {{-- ========================================
             BAGIAN KIRI
        ========================================= --}}

        <div class="login-left">

            <div class="left-content">

                <div class="school-icon">
                    🏫
                </div>

                <h2 class="school-title">
                    SD Tanjung Rejo
                </h2>

                <div class="title-line"></div>

                <div class="school-subtitle">
                    Sistem Administrasi Sekolah
                </div>

                <div class="school-description">
                    Selamat datang di Sistem Administrasi
                    SD Tanjung Rejo. Kelola informasi sekolah
                    dengan mudah, cepat, dan terorganisir.
                </div>

            </div>

        </div>


        {{-- ========================================
             BAGIAN KANAN
        ========================================= --}}

        <div class="login-right">

            <div class="login-header">

                <h1>
                    Selamat Datang 👋
                </h1>

                <p>
                    Silakan masuk untuk melanjutkan ke sistem.
                </p>

            </div>


            {{-- SESSION STATUS --}}

            @if (session('status'))

                <div class="session-message">
                    {{ session('status') }}
                </div>

            @endif


            {{-- FORM LOGIN --}}

            <form method="POST" action="{{ route('login') }}">

                @csrf


                {{-- EMAIL --}}

                <div class="form-group">

                    <label
                        for="email"
                        class="form-label"
                    >
                        Email
                    </label>

                    <input
                        id="email"
                        class="form-input"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        required
                        autofocus
                        autocomplete="username"
                    >

                    @if ($errors->get('email'))

                        <div class="error-message">
                            {{ $errors->first('email') }}
                        </div>

                    @endif

                </div>


                {{-- PASSWORD --}}

                <div class="form-group">

                    <label
                        for="password"
                        class="form-label"
                    >
                        Password
                    </label>

                    <input
                        id="password"
                        class="form-input"
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                        autocomplete="current-password"
                    >

                    @if ($errors->get('password'))

                        <div class="error-message">
                            {{ $errors->first('password') }}
                        </div>

                    @endif

                </div>


                {{-- REMEMBER + FORGOT PASSWORD --}}

                <div class="login-options">

                    <label
                        for="remember_me"
                        class="remember"
                    >

                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                        >

                        <span>
                            Ingat saya
                        </span>

                    </label>


                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="forgot-password"
                        >
                            Lupa password?
                        </a>

                    @endif

                </div>


                {{-- LOGIN BUTTON --}}

                <button
                    type="submit"
                    class="login-button"
                >
                    Masuk
                </button>

            </form>


            <div class="login-footer">
                © {{ date('Y') }} SD Tanjung Rejo
            </div>

        </div>

    </div>

</div>

</body>
</html>