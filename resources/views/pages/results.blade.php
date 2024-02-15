@extends('layouts.layout')
@section('content')
    <section class="relative bg-gray-100 min-h-[100vh]">
        @include('components.navigation')
        <div class="w-[80%] mx-auto container">
            <div class="w-full p-5 bg-white mt-20 rounded-m shadow-sm">
                <form action="">
                    <div class="flex items-end  gap-3">
                        <div class="w-full">
                            <label for="countries" class="block text-sm font-medium text-gray-900 my-1.5">Departure</label>
                            <select id="countries" name="departure"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40 block w-full p-2
                                        .5 ">
                                <option selected>Choose a Departure</option>
                                @foreach($routes as $route)
                                    <option value="{{ $route->id }}">{{ $route->Departure }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="countries" class="block text-sm font-medium text-gray-900 my-1.5">Destination</label>
                            <select id="countries" name="destination"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40 block w-full p-2
                                        .5 ">
                                <option selected>Choose a Destination</option>
                                @foreach($routes as $route)
                                    <option value="{{ $route->id }}" class="text-black">{{ $route->Destination }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full">
                            <label class="block text-sm font-medium text-gray-900 my-1.5">Date departure</label>
                            <input type="date" name="date_departure" id="datePicker" min="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                            focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40 block w-full p-2">
                        </div>
                        <div class="w-[600px]">
                            <button type="submit" class="block w-full  p-2 font-medium  m-auto mt-2 bg-yellow-400 rounded-sm text-black">
                                Search
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="mt-6  text-gray-600-300 font-medium mb-2 text-2xl  w-full "> Outbound Wednesday, 21 February 2024
            </div>

            <div class="w-full p-5 bg-white   rounded-m shadow-sm">
                <div class="m-5">

                    <div class="flex p-6 rounded-md items-center overflow-hidden shadow-[0px_0px_20px_1px_#eee]">
                        <div class="flex items-center flex-grow gap-8">
                            <div>
                                <img src="{{ asset('/assets/images/driver.png') }}" class="h-[120px] ">
                            </div>
                            <div class="flex items-center justify-self-end justify-center">
                                <div class="mr-12 text-center">
                                    <div class="text-gray-900 font-semibold p-1 text-sm">
                                        Departure
                                    </div>
                                    <div class="flex items-center justify-center text-blue-800  gap-2">
                                        <i class="fa-solid fa-train"></i>
                                        <span class="font-medium  uppercase">SAFI</span>
                                    </div>
                                </div>

                                <div>
                                    <div class="relative">

                                        <div class="bg-gray-300 w-[200px] relative h-[1px]">
                                            <span class="absolute left-6 top-[50%] translate-y-[-50%] w-2 h-2 rounded-full bg-blue-500"></span>
                                            <span class="absolute right-6 top-[50%] translate-y-[-50%] w-2 h-2 rounded-full bg-green-500"></span>
                                        </div>
                                        <div class="absolute left-[50%] top-2 text-gray-600 translate-x-[-50%]">
                                            <i class="fa-solid fa-car-side text-[30px] text-yellow-400"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-12 text-center">
                                    <div class="text-gray-900 font-semibold p-1 text-sm">
                                        Arrival
                                    </div>
                                    <div class="flex items-center justify-center text-green-500  gap-2">
                                        <i class="fa-solid fa-train"></i>
                                        <span class=" font-medium uppercase">casablanca</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div>
                            <form action="">
                                <div class="w-[200px] mx-6">
                                    <button type="submit" class="block w-full  p-2 font-medium  m-auto mt-2 bg-yellow-400 rounded-sm text-black">
                                        Reservation
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
