@extends('layouts.layout')

@section('content')
    <section class="bg-gray-100 flex  overflow-hidden">
        @include('components.sidebar')
        <main class="flex-grow min-h-screen w-full  ml-[260px]">
            <div class="bg-slate-200 rounded-tl-3xl rounded-br-3xl p-6 mt-20 mx-20 ">
                @if($curr_time >= 5 && $curr_time < 12)
                    <h1 class="text-4xl font-semibold text-blue-950 mb-3">Good Morning !</h1>
                @elseif($curr_time >= 12 && $curr_time < 18)
                    <h1 class="text-4xl font-semibold text-blue-950 mb-3">Good Afternoon !</h1>
                @elseif($curr_time >= 18 && $curr_time < 24)
                    <h1 class="text-4xl font-semibold text-blue-950 mb-3">Good Evening !</h1>
                @endif
                <p>
                    Here is What's happening with your projects today
                </p>
            </div>
            <div class="grid grid-cols-5 gap-2 my-20 mx-20">
                <div class="bg-blue-500 text-white p-6 rounded-md">
                    <div class="flex items-center justify-between ">
                        <span>
                            <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                  d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.3-2a6 6 0 0 0 0-6A4 4 0 0 1 20 8a4 4 0 0 1-6.7 3Zm2.2 9a4 4 0 0 0 .5-2v-1a6 6 0 0 0-1.5-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.5Z"
                                  clip-rule="evenodd"/>
                          </svg>

                        </span>
                        <h4 class="text-bold text-2xl">Users</h4>
                    </div>
                    <div class="mt-5">
                        <span class="text-4xl">
                            {{ $num_users }}
                        </span>
                    </div>
                </div>
                <div class="bg-green-500 text-white p-6 rounded-md">
                    <div class="flex items-center justify-between ">
                        <span>
                            <i class="fa-solid fa-car text-[40px]"></i>

                        </span>
                        <h4 class="text-bold text-2xl">Drivers</h4>
                    </div>
                    <div class="mt-5">
                        <span class="text-4xl">
                            {{ $num_drivers }}
                        </span>
                    </div>
                </div>
                <div class="bg-orange-400 text-white p-6 rounded-md">
                    <div class="flex items-center justify-between ">
                        <span>
                            <i class="fa-solid fa-person-walking text-[40px]"></i>

                        </span>
                        <h4 class="text-bold text-2xl">Passengers</h4>
                    </div>
                    <div class="mt-5">
                        <span class="text-4xl">
                            {{ $num_passenger }}
                        </span>
                    </div>
                </div>
                <div class="bg-rose-500 text-white p-6 rounded-md">
                    <div class="flex items-center justify-between ">
                        <span>
                        <i class="fa-solid fa-hand text-[40px]"></i>

                        </span>
                        <h4 class="text-bold text-2xl">Reservation</h4>
                    </div>
                    <div class="mt-5">
                        <span class="text-4xl">
                            {{ $num_reservation }}
                        </span>
                    </div>
                </div>
                <div class="bg-teal-600 text-white p-6 rounded-md">
                    <div class="flex items-center justify-between ">
                        <span>
                            <i class="fa-solid fa-route text-[40px]"></i>

                        </span>
                        <h4 class="text-bold text-2xl">Routes</h4>
                    </div>
                    <div class="mt-5">
                        <span class="text-4xl">
                            {{ $num_route }}
                        </span>
                    </div>
                </div>

            </div>
        </main>
    </section>

@endsection
<script defer src="{{ asset('assets/js/admin.js') }}"></script>
