<x-guest-layout>
    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
        <div class="max-w-7xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12 flex flex-col items-center justify-center">

                {{-- TODO:                LOGO HERE   --}}
                {{--                <div>--}}
                {{--                    <img--}}
                {{--                        src="https://storage.googleapis.com/devitary-image-host.appspot.com/15846435184459982716-LogoMakr_7POjrN.png"--}}
                {{--                        class="w-32 mx-auto" alt="Logo"/>--}}
                {{--                </div>--}}

                <div class="mt-4 flex flex-col items-center">
                    <h1 class="text-2xl xl:text-3xl font-extrabold">
                        Inicia sesión
                    </h1>
                    <div class="w-full flex-1 mt-6">
                        <div class="flex flex-col items-center">
                            <button
                                class="w-full max-w-xs font-bold shadow-sm rounded-lg py-3 bg-indigo-100 text-gray-800 flex items-center justify-center transition-all duration-300 ease-in-out focus:outline-none hover:shadow focus:shadow-sm focus:shadow-outline">
                                <div class="bg-white p-2 rounded-full">
                                    <svg class="w-4" viewBox="0 0 533.5 544.3">
                                        <path
                                            d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z"
                                            fill="#4285f4"/>
                                        <path
                                            d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z"
                                            fill="#34a853"/>
                                        <path
                                            d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z"
                                            fill="#fbbc04"/>
                                        <path
                                            d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z"
                                            fill="#ea4335"/>
                                    </svg>
                                </div>
                                <span class="ml-4">
                                Entrar con Google
                            </span>
                            </button>
                        </div>

                        <div class="mt-4 mb-6 border-b text-center">
                            <div
                                class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                                O entra tu con <b>correo electrónico</b>
                            </div>
                        </div>

                        <x-validation-errors class="mb-4"/>

                        @session('status')
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ $value }}
                        </div>
                        @endsession

                        <form class="mx-auto max-w-xs" method="POST" action="{{ route('login') }}">
                            @csrf


                            <label>
                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    type="email"
                                    name="email"
                                    placeholder="Correo electrónico"
                                    autocomplete="email"
                                    value="{{old('email')}}"
                                    required
                                    autofocus
                                />
                            </label>
                            <label>
                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                    type="password"
                                    name="password"
                                    autocomplete="current-password"
                                    placeholder="Contraseña"
                                    required
                                />
                            </label>
                            <button
                                class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none"
                                type="submit"
                            >
                                <x-untitledui-log-in-04 class="w-6 h-6 -ml-2"/>
                                <span class="ml-3">
                                Iniciar sesión
                            </span>
                            </button>
                            <p class="mt-6 text-xs text-gray-600 text-center">
                                ¿ Aun no tienes una cuenta ?
                                <a href="{{route('register')}}" class="border-b border-gray-500 border-dotted">
                                    Crea una dando click aquí
                                </a>
                                <br><br>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                       class="border-b border-gray-500 border-dotted">
                                        ¿ Olvidaste tu contraseña ?
                                    </a>
                                @endif
                            </p>
                        </form>

                    </div>
                </div>
            </div>
            <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
                <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                     style="background-image: url('{{asset('login.svg')}}');">
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
