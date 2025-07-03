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
    <div class="min-h-screen bg-white dark:bg-black">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="font-bold text-xl">SISTA MI</a>
                </div>
                <div class="lg:flex lg:flex-1 lg:justify-end">
                    <flux:link href="{{ route('filament.admin.auth.login') }}" variant="ghost" class="text-base font-semibold text-gray-900 dark:text-white">Login</flux:link>
                </div>
            </nav>
        </header>

        <div class="relative isolate px-6 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="flex flex-col justify-center min-h-screen mx-auto max-w-4xl">
                <div class="text-center mt-12 flex flex-col justify-center items-center">
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-semibold tracking-tight text-balance text-gray-900 dark:text-white">Tracer Study Alumni Manajemen Informatika</h1>
                    <p class="mt-2 text-md md:text-lg max-w-3xl font-medium text-pretty text-gray-500 dark:text-gray-200">Website ini membantu alumni untuk melakukan verifikasi ijazah dan memudahkan pelacakan data alumni secara online.</p>
                    <div class="mt-6 flex items-center justify-center">
                        <flux:button variant="primary" size="sm" href="{{ route('tracerstudy.form') }}" class="font-semibold">CEK IJAZAH</flux:button>
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