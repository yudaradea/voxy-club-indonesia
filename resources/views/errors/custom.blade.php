<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $error['title'] }} - {{ $code }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-slate-50 to-sky-100">

    <!-- Error Card -->
    <div class="w-full max-w-md mx-4">
        <div class="overflow-hidden bg-white shadow-2xl rounded-3xl">
            <!-- Animated Header -->
            <div class="relative h-48 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-sky-500 to-cyan-500 opacity-90"></div>

                <!-- Animated Icon -->
                <div class="absolute inset-0 flex items-center justify-center">
                    @switch($code)
                        @case(403)
                            <svg class="w-20 h-20 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        @break

                        @case(404)
                            <svg class="w-20 h-20 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        @break

                        @case(500)
                            <svg class="w-20 h-20 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        @break

                        @default
                            <svg class="w-20 h-20 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                    @endswitch
                </div>
            </div>

            <!-- Content -->
            <div class="p-8 text-center">
                <!-- Error Code -->
                <div class="mb-2 text-6xl font-bold text-gray-800">{{ $code }}</div>

                <!-- Title -->
                <h2 class="mb-2 text-2xl font-bold text-gray-800">{{ $error['title'] }}</h2>

                <!-- Message -->
                <p class="mb-8 text-gray-600">{{ $error['message'] }}</p>

                <!-- Action Buttons -->
                <div class="flex flex-col space-y-4">
                    <a href="{{ route('home') }}"
                        class="w-full px-6 py-3 font-semibold text-white transition transform rounded-full bg-gradient-to-r from-sky-500 to-cyan-500 hover:shadow-lg hover:scale-105">
                        Go Home
                    </a>

                    <button onclick="history.back()"
                        class="w-full px-6 py-3 font-semibold text-gray-600 transition border-2 border-gray-300 rounded-full hover:bg-gray-50">
                        Go Back
                    </button>
                </div>
            </div>
        </div>

        <!-- Background Animation -->
        <div class="fixed inset-0 -z-10">
            <div
                class="absolute top-0 rounded-full -left-4 w-72 h-72 bg-sky-300 mix-blend-multiply filter blur-xl opacity-70 animate-blob">
            </div>
            <div
                class="absolute top-0 rounded-full -right-4 w-72 h-72 bg-cyan-300 mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute rounded-full -bottom-8 left-20 w-72 h-72 bg-sky-400 mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000">
            </div>
        </div>
    </div>

    <!-- Custom CSS for blob animation -->
    <style>
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</body>

</html>
