@extends('layouts.layout')
@section('content')
<section class="relative bg-gray-100 min-h-[100vh]">
    @include('components.navigation')
    <div class="w-[80%] mx-auto container my-10">
        <div class="py-2 bg-white px-10 mb-5 rounded-full shadow-[0px_0px_20px_1px_#eee]">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-lg "> Welcome to your dashboard <span class="text-blue-600">{{ auth()->user()->name }}</span></h3>

            </div>
        </div>
        <div>
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
        </div>
        <h1 class="text-3xl font-semibold my-8">Passenger Panel</h1>
        <div class=" bg-white w-fit">
            <ul class="flex items-center rounded-tl-md shadow-md rounded-tr-lg overflow-hidden shadow-[0px_0px_20px_1px_#eee]" id="">
                <li class="bg-black px-4 relative cursor-pointer border-l border-white py-2 text-yellow-400 active  linktab">
                    My histories
                </li>
                <li class="bg-black px-4 relative cursor-pointer border-l border-white py-2 text-yellow-400 linktab">
                    My reservations
                </li>
                <li class="bg-black px-4 relative cursor-pointer border-l border-white py-2  text-yellow-400 linktab">
                    My Services
                </li>
            </ul>
        </div>
        <div class="w-full bg-white p-3" id="content">
            <div class="content active">
                <!-- ========= Hisorique ============ -->
                <div>
                    <h1 class="text-2xl relative py-4 font-medium w-fit">My Histories <span class="absolute bg-yellow-300 w-[50px] h-[3px] bottom-0 left-[50%] translate-x-[-50%]"></span></h1>
                    <div class="my-5">
                        <div>
                            <div class="overflow-hidden border border-yellow-200  md:rounded-lg">
                                <table class="min-w-full divide-y divide-yellow-500">
                                    <thead class="bg-yellow-400 ">
                                        <tr>

                                            <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                                Date Trips
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                                Departure
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                                Destination
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                                Reservated at
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-orange-200 " id="users-container">
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap"></td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap"></td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap"></td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap"></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========= Section Route ============ -->

            <div class="content">
                <!-- ========= Hisorique ============ -->
                <div>
                    <h1 class="text-2xl relative py-4 font-medium w-fit">My Reservation <span class="absolute bg-yellow-300 w-[50px] h-[3px] bottom-0 left-[50%] translate-x-[-50%]"></span></h1>
                    <div class="my-5">
                        <div>
                            <div class="overflow-hidden border border-yellow-200  md:rounded-lg">
                                <table class="min-w-full divide-y divide-yellow-500">
                                    <thead class="bg-yellow-400 ">
                                        <tr>

                                            <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                                Date Trips
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                                Departure
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                                Destination
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                                Status
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                                Reservated at
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-orange-200 " id="users-container">
                                        @if(count($passengers_data) > 0)
                                            @foreach ($passengers_data as $passenger_data)
                                            <tr>
                                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                    @if(isset($passenger_data['time_depart']))
                                                    {{ $passenger_data['time_depart']->format('j F, Y') }}

                                                    @endif
                                                </td>
                                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                    @if(isset($passenger_data['Departure']))
                                                    {{ $passenger_data['Departure'] }}
                                                    @endif
                                                </td>
                                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                    {{ $passenger_data['Destination'] }}
                                                </td>
                                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap"></td>
                                            </tr>
                                            @endforeach
                                        @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =========== NEW SECTION  ================ -->
        <div class="content">
            <h1>My Services</h1>

            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, provident.
        </div>
    </div>
    </div>

</section>
@endsection

<script defer src="{{ asset('assets/js/driver.js') }}"></script>