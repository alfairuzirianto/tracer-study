<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SISTA MI</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600" rel="stylesheet" />

    {{-- Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @fluxAppearance
</head>
<body>
    <div class="min-h-screen bg-white">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <span class="sr-only">SISTA MI</span>
                    <a href="https://www.polsri.ac.id" target="_blank">
                        <img class="h-10 w-auto me-4" src="{{ asset('assets/logo-polsri.png') }}" alt="Logo Politeknik Negeri Sriwijaya">
                    </a>
                    <a href="https://www.manajemeninformatika.polsri.ac.id/id" target="_blank">
                        <img class="h-10 w-auto" src="{{ asset('assets/logo-mi.png') }}" alt="Logo Manajamen Informatika">
                    </a>
                </div>
                <div class="lg:flex lg:flex-1 lg:justify-end">
                    <a href="{{ route('filament.admin.auth.login') }}" class="text-base font-semibold text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
                </div>
            </nav>
        </header>

        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="flex flex-col justify-center min-h-screen mx-auto max-w-4xl">
                <div class="text-center">
                    <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 sm:text-7xl">Tracer Study Alumni Manajemen Informatika</h1>
                    <p class="mt-8 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8">Website ini membantu alumni untuk melakukan verifikasi ijazah dan memudahkan pelacakan data alumni secara online.</p>
                    <div class="mt-4 flex items-center justify-center">
                        <flux:button href="{{ route('form.verify') }}" class="cursor-pointer">Cek Ijazah</flux:button>
                    </div>
                </div>
            </div>
        
            {{-- Scripts --}}
            @livewireScripts
            @fluxScripts
        </div>
    </div>
</body>
</html>