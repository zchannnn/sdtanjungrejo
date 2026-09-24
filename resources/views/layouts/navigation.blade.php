<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left Side -->
            <div class="flex items-center">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-xl bg-emerald-600 flex items-center justify-center shadow-sm group-hover:bg-emerald-700 transition">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M5 10v5c0 1 3.134 3 7 3s7-2 7-3v-5" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M21 9v6" />
                            </svg>
                        </div>

                        <div class="hidden sm:block">
                            <p class="text-sm font-bold text-gray-800 leading-tight">
                                Sistem Informasi
                            </p>
                            <p class="text-xs text-emerald-600 font-medium">
                                SD Al-Wasliyah Tanjung Rejo
                            </p>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium"
                    >
                        <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4" />
                        </svg>

                        {{ __('Dashboard') }}
                    </x-nav-link>

                </div>
            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button
                            class="inline-flex items-center gap-3 px-3 py-2 rounded-xl border border-transparent
                            text-sm font-medium text-gray-600 bg-white
                            hover:bg-gray-50 hover:text-gray-800
                            focus:outline-none transition duration-150"
                        >

                            <!-- Avatar -->
                            <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-700
                                        flex items-center justify-center font-bold text-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>

                            <!-- User Name -->
                            <div class="hidden md:block text-left">
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ Auth::user()->name }}
                                </p>
                                <p class="text-xs text-gray-400">
                                    Akun Pengguna
                                </p>
                            </div>

                            <!-- Chevron -->
                            <svg
                                class="fill-current h-4 w-4 text-gray-400"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <!-- Profile -->
                        <div class="px-4 py-3 border-b border-gray-100">
                            <p class="text-sm font-semibold text-gray-800">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1 truncate">
                                {{ Auth::user()->email }}
                            </p>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')">
                            <div class="flex items-center gap-3">

                                <svg class="w-4 h-4 text-gray-500" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>

                                {{ __('Profile') }}

                            </div>
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                <div class="flex items-center gap-3 text-red-600">

                                    <svg class="w-4 h-4" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>

                                    {{ __('Log Out') }}

                                </div>
                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-xl
                           text-gray-500 hover:text-emerald-600 hover:bg-emerald-50
                           focus:outline-none transition duration-150"
                >

                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">

                        <path
                            :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                        <path
                            :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div
        :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden border-t border-gray-100 bg-gray-50"
    >

        <!-- Navigation -->
        <div class="pt-3 pb-3 px-4 space-y-1">

            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')"
                class="rounded-xl"
            >
                <div class="flex items-center gap-3">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4" />
                    </svg>

                    {{ __('Dashboard') }}

                </div>
            </x-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-3 border-t border-gray-200">

            <div class="px-5 flex items-center gap-3">

                <!-- Avatar -->
                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-700
                            flex items-center justify-center font-bold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <div class="min-w-0">
                    <div class="font-semibold text-sm text-gray-800 truncate">
                        {{ Auth::user()->name }}
                    </div>

                    <div class="font-medium text-xs text-gray-500 truncate">
                        {{ Auth::user()->email }}
                    </div>
                </div>

            </div>

            <div class="mt-3 px-4 space-y-1">

                <!-- Profile -->
                <x-responsive-nav-link
                    :href="route('profile.edit')"
                    class="rounded-xl"
                >
                    <div class="flex items-center gap-3">

                        <svg class="w-5 h-5" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>

                        {{ __('Profile') }}

                    </div>
                </x-responsive-nav-link>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="rounded-xl"
                    >
                        <div class="flex items-center gap-3 text-red-600">

                            <svg class="w-5 h-5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>

                            {{ __('Log Out') }}

                        </div>
                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>
</nav>