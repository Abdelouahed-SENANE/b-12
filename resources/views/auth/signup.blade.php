@extends('layouts.layout')
@section('content')

    <section class="bg-white relative">
        <div class="absolute top-[2%] left-[20px]">
            <a href="/" class="px-2 rounded-full py-2 bg-yellow-400 block">
                <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                </svg>
            </a>
        </div>
        <div class="flex justify-center min-h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/5"
                 style="background-image: url('{{asset('assets/images/taxi.jpg')}}')">
            </div>

            <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
                <div class="w-full">
                    @if($errors->any())
                        <div class="text-rose-500 bg-red-500/10 rounded-xl text-sm p-5">
                            <p class="my-2 font-semibold text-lg">Somethings wrong!</p>
                            <ul class="ml-7">

                                @foreach($errors->all() as $error)
                                    <li class="list-disc">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                    <div>
                        <h1 class="text-2xl font-semibold tracking-wider text-gray-800 capitalize ">
                            Get your free account now.
                        </h1>

                        <p class="mt-4 text-gray-500 ">
                            Let’s get you all set up so you can verify your personal account and begin setting up your
                            profile.
                        </p>

                        <div class="mt-6">
                            <h1 class="text-gray-500 ">Select type of account</h1>

                            <div class="mt-3 md:flex md:items-center md:-mx-2">
                                <button
                                    class="flex justify-center w-full px-6 py-3  rounded-lg
                                    md:w-auto md:mx-2 focus:outline-none tab   border
                                    border-yellow-400 text-yellow-400 active_tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    </svg>


                                    <span class="mx-2">
                                passenger
                            </span>
                                </button>

                                <button
                                    class="flex justify-center w-full px-6 py-3 mt-4 text-yellow-400 border
                                    border-yellow-400 rounded-lg md:mt-0 md:w-auto md:mx-2
                                     focus:outline-none tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                         viewBox="0 0 24 24">
                                        <path
                                            d="M21.739 10.921c-1.347-.39-1.885-.538-3.552-.921 0 0-2.379-2.359-2.832-2.816-.568-.572-1.043-1.184-2.949-1.184h-7.894c-.511 0-.736.547-.07 1-.742.602-1.619 1.38-2.258 2.027-1.435 1.455-2.184 2.385-2.184 4.255 0 1.76 1.042 3.718 3.174 3.718h.01c.413 1.162 1.512 2 2.816 2 1.304 0 2.403-.838 2.816-2h6.367c.413 1.162 1.512 2 2.816 2s2.403-.838 2.816-2h.685c1.994 0 2.5-1.776 2.5-3.165 0-2.041-1.123-2.584-2.261-2.914zm-15.739 6.279c-.662 0-1.2-.538-1.2-1.2s.538-1.2 1.2-1.2 1.2.538 1.2 1.2-.538 1.2-1.2 1.2zm3.576-6.2c-1.071 0-3.5-.106-5.219-.75.578-.75.998-1.222 1.27-1.536.318-.368.873-.714 1.561-.714h2.388v3zm1-3h1.835c.882 0 1.428.493 2.022 1.105.452.466 1.732 1.895 1.732 1.895h-5.588v-3zm7.424 9.2c-.662 0-1.2-.538-1.2-1.2s.538-1.2 1.2-1.2 1.2.538 1.2 1.2-.538 1.2-1.2 1.2z"/>
                                    </svg>

                                    <span class="mx-2">
                                driver
                            </span>
                                </button>
                            </div>
                        </div>
                        {{-- ===== PAssenger =====--}}
                        <div class="flex w-[100%] gap-20 relative form active">
                            <form class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2" action="/passenger"
                                  method="POST">
                                @csrf
                                <div class="opacity-0
                                    hidden invisible absolute left-0">
                                    <input type="hidden" name="role" value="passenger">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm text-gray-600 ">
                                        Name</label>
                                    <input type="text" placeholder="John" name="name"
                                           class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white
                                        border border-gray-200 rounded-lg dark:placeholder-gray-600
                                        focus:border-yellow-400 dark:focus:border-yellow-400 focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40"/>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm text-gray-600 ">
                                        Email</label>
                                    <input type="email" name="email" placeholder="test@test.fr"
                                           class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white
                                        border border-gray-200 rounded-lg dark:placeholder-gray-600
                                        focus:border-yellow-400 dark:focus:border-yellow-400 focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40"/>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm text-gray-600 ">Password
                                    </label>
                                    <input type="password" placeholder="********" name="password"
                                           class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white
                                        border border-gray-200 rounded-lg dark:placeholder-gray-600
                                        focus:border-yellow-400 dark:focus:border-yellow-400 focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40"/>
                                </div>


                                <button
                                    class="flex items-center justify-center w-full px-6 py-3 text-sm tracking-wide
                                text-balck capitalize transition-colors duration-300 transform bg-yellow-400 rounded-lg
                                 hover:bg-yellow-300 focus:outline-none focus:ring focus:ring-yellow-300 col-span-2
                                 focus:ring-opacity-50">
                                    <span>Sign Up</span>

                                </button>
                            </form>

                        </div>
                        {{--==== Driver ========--}}
                        <div class="flex w-[100%] gap-20 relative form ">
                            <form class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2" action="/driver"
                                  method="POST">
                                @csrf
                                <div class="opacity-0
                                    hidden invisible absolute left-0">
                                    <input type="hidden" name="role" value="driver">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm text-gray-600 ">
                                        Name</label>
                                    <input type="text" placeholder="John" name="name"
                                           class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white
                                        border border-gray-200 rounded-lg dark:placeholder-gray-600
                                        focus:border-yellow-400 dark:focus:border-yellow-400 focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40"/>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm text-gray-600 ">
                                        Email</label>
                                    <input type="email" name="email" placeholder="test@test.fr"
                                           class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white
                                        border border-gray-200 rounded-lg dark:placeholder-gray-600
                                        focus:border-yellow-400 dark:focus:border-yellow-400 focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40"/>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm text-gray-600 ">Password
                                    </label>
                                    <input type="password" placeholder="********" name="password"
                                           class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white
                                        border border-gray-200 rounded-lg dark:placeholder-gray-600
                                        focus:border-yellow-400 dark:focus:border-yellow-400 focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40"/>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm text-gray-600 ">
                                        Description</label>
                                    <input type="text" name="description" placeholder="Description..."
                                           class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white
                                        border border-gray-200 rounded-lg dark:placeholder-gray-600
                                        focus:border-yellow-400 dark:focus:border-yellow-400 focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40"/>
                                </div> <div>
                                    <label class="block mb-2 text-sm text-gray-600 ">
                                        Immatriculation</label>
                                    <input type="text" name="registration" placeholder="Immatriculation..."
                                           class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white
                                        border border-gray-200 rounded-lg dark:placeholder-gray-600
                                        focus:border-yellow-400 dark:focus:border-yellow-400 focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40"/>
                                </div><div>
                                    <label class="block mb-2 text-sm text-gray-600 ">
                                        Type de vehicule</label>
                                    <input type="text" name="type_car" placeholder="Type..."
                                           class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white
                                        border border-gray-200 rounded-lg dark:placeholder-gray-600
                                        focus:border-yellow-400 dark:focus:border-yellow-400 focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40"/>
                                </div>



                                <button
                                    class="flex items-center justify-center w-full px-6 py-3 text-sm tracking-wide
                                text-balck capitalize transition-colors duration-300 transform bg-yellow-400 rounded-lg
                                 hover:bg-yellow-300 focus:outline-none focus:ring focus:ring-yellow-300 col-span-2
                                 focus:ring-opacity-50">
                                    <span>Sign Up</span>

                                </button>
                            </form>

                        </div>
                        {{--  Form Passenger   --}}

                    </div>


                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
