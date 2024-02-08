@extends('layouts.layout')

@section('content')

    <section class="bg-gray-100">
        @include('components.navigation')
        <div class="h-[calc(100vh-80px)] flex items-center justify-center">
            <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md ">
                <div class="px-6 py-4">
                    <div class="flex justify-center mx-auto">
                        <img class="w-auto h-7 sm:h-8" src="{{ asset('assets/images/logo.png') }}" alt="">
                    </div>

                    <h3 class="mt-3 text-xl font-medium text-center text-gray-600 ">Welcome Back</h3>

                    <p class="mt-1 text-center text-gray-500 ">Login or create account</p>
                    <form method="post" action="/signin">
                        @csrf
                        <div class="w-full mt-4">
                            <input
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border
                                 rounded-lg focus:border-yellow-400  focus:ring-opacity-40 focus:outline-none
                                 focus:ring focus:ring-yellow-300 placeholder:text-sm
"
                                type="email" placeholder="Email Address" aria-label="Email Address" name="email"/>
                        </div>

                        <div class="w-full mt-4">
                            <input
                                class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500
                                placeholder:text-sm
                                bg-white border
                                 rounded-lg  focus:border-blue-400 dark:focus:border-yellow-300 focus:ring-opacity-40
                                 focus:outline-none focus:ring focus:ring-yellow-300"
                                type="password" placeholder="Password" aria-label="Password" name="password"/>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <a href="#" class="text-sm text-gray-600 hover:text-gray-500">Forget
                                Password?</a>

                            <button
                                class="px-6 py-2 text-sm font-medium tracking-wide text-black capitalize
                                transition-colors duration-300 transform bg-yellow-400 rounded-lg hover:bg-yellow-300-400
                                focus:outline-none focus:ring focus:ring-yellow-200 focus:ring-opacity-50">
                                Sign In
                            </button>
                        </div>
                    </form>

                    @if($errors->any())
                        <div class="text-rose-500 bg-red-500/10 rounded-xl my-3 text-sm p-5">
                            <ul class="ml-7">

                                @foreach($errors->all() as $error)
                                    <li class="list-disc">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                </div>

                <div class="flex items-center justify-center py-4 text-center bg-gray-50 ">
                    <span class="text-sm text-gray-600 ">Don't have an account? </span>

                    <a href="/signup"
                       class="mx-2 text-sm font-bold text-yellow-400 hover:underline">Register</a>
                </div>
            </div>
        </div>

    </section>

@endsection
