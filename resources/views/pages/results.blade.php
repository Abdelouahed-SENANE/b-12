@extends('layouts.layout')
@section('content')
<section class="relative bg-gray-100 min-h-[100vh]">
    @include('components.navigation')

    <div class="w-[80%] mx-auto container">
        <div class="w-full p-5 bg-white mt-20 rounded-m shadow-sm">
            <form action="/results">
                <div class="flex items-end  gap-3">
                    <div class="w-full">

                        <label for="countries" class="block text-sm font-medium text-gray-900 my-1.5">Departure</label>
                        <select id="depart" name="departure" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-300
                            focus:outline-none focus:ring focus:ring-opacity-40 block w-full p-2
                            .5 ">
                            <option selected hidden value=""> Choose a Departure</option>
                        </select>

                    </div>
                    <div class=w-full>

                        <label for="countries" class="block text-sm font-medium text-gray-900 my-1.5">Destination</label>
                        <select id="destination" name="destination" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-300
                                focus:outline-none focus:ring focus:ring-opacity-40 block w-full p-2
                                .5 ">
                            <option selected hidden value="">Choose a Destination</option>

                        </select>

                    </div>
                    <!-- <div class="w-full">
                        <label for="countries" class="block text-sm font-medium text-gray-900 my-1.5">Departure</label>
                        <select id="countries" name="departure" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40 block w-full p-2
                                        .5 ">
                            <option selected>Choose a Departure</option>
                            @foreach($selects as $select)
                            @if($select->Departure === request()->departure )
                            <option selected value="{{ $select->Departure }}" class="text-black">{{ $select->Departure }}</option>
                            @else
                            <option value="{{ $select->Departure }}" class="text-black">{{ $select->Departure }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="countries" class="block text-sm font-medium text-gray-900 my-1.5">Destination</label>
                        <select id="countries" name="destination" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40 block w-full p-2
                                        .5 ">
                            <option selected>Choose a Destination</option>
                            @foreach($selects as $select)
                            @if($select->Destination === request()->destination )
                            <option selected value="{{ $select->Destination }}" class="text-black">{{ $select->Destination }}</option>
                            @else
                            <option value="{{ $select->Destination }}" class="text-black">{{ $select->Destination }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div> -->
                    <div class="w-full">
                        <label class="block text-sm font-medium text-gray-900 my-1.5">Date departure</label>
                        <input type="date" name="date_departure" id="datePicker" min="" value="{{ request()->date_departure}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                            focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40 block w-full p-2">
                    </div>
                    <div class="w-[600px]">
                        <button type="submit" class="block w-full  p-2 font-medium  m-auto mt-2 bg-yellow-400 rounded-sm text-black">
                            update filter
                        </button>
                    </div>
                </div>

            </form>
        </div>
        <div class="mt-6  text-gray-600-300 font-medium mb-2 text-2xl  w-full "> Outbound , {{ request()->date_departure}}
        </div>
        @if(count($routes) > 0)
        @foreach($routes as $route)

        <div class="w-full p-5 bg-white   rounded-m shadow-sm">
            <div class="m-5">

                <div class="flex p-6 rounded-md items-center overflow-hidden shadow-[0px_0px_20px_1px_#eee]">

                    <div class="flex items-center relative flex-grow gap-8">
                        <div>
                            <img src="{{ asset('/assets/images/driver.png') }}" class="h-[120px] ">
                        </div>
                        <div class="flex items-center  justify-self-end justify-center">
                            <div class="absolute top-[-15px] left-[200px] w-[80%] py-1.5 px-3 rounded-2xl bg-yellow-50">
                                <div class="text-gray-900 font-light text-sm">
                                    {{ $route->name }}
                                </div>
                            </div>

                            <div class="mr-12 text-center">
                                <div>{{ $route->time_depart->format('H') }} H {{ $route->time_depart->format('i') }} min </div>
                                <div class="text-gray-900 font-semibold p-1 text-sm">
                                    Departure
                                </div>
                                <div class="flex items-center justify-center text-blue-800  gap-2">
                                    <i class="fa-solid fa-train"></i>
                                    <span class="font-medium  uppercase">{{ $route->Departure }}</span>
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
                                <div>{{ $route->time_arrival->format('H') }} H {{ $route->time_arrival->format('i') }} min </div>

                                <div class="text-gray-900 font-semibold p-1 text-sm">
                                    Arrival
                                </div>
                                <div class="flex items-center justify-center text-green-500  gap-2">
                                    <i class="fa-solid fa-train"></i>
                                    <span class=" font-medium uppercase">{{ $route->Destination }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div>
                        <form action="/reservation" method="post">
                            @csrf
                            @if(isset($passenger))
                            <div class="w-[200px] mx-6">
                                <input type="hidden" name="route_id" value="{{ $route->route_id }}">
                                <input type="hidden" name="driver_id" value="{{ $route->driver_id }}">
                                <input type="hidden" name="passenger_id" value="{{ $passenger->id }}">
                                <button type="submit" class="block w-full  p-2 font-medium  m-auto mt-2 bg-yellow-400 rounded-sm text-black">
                                    Reservation
                                </button>
                            </div>
                            @else
                            <div class="w-[200px] mx-6">
                                <a href="/signin" class="block w-full text-center  p-2 font-medium  m-auto mt-2 bg-yellow-400 rounded-sm text-black">
                                    Reservation
                                </a>
                            </div>

                            @endif

                        </form>
                    </div>
                </div>


            </div>
        </div>
        @endforeach
        @else
        <div class="min-h-[400px] flex items-center flex-col justify-center">
            <img src="{{ asset('assets/images/failedsearch.png') }}" alt="failed search" class="w-[140px] ">
            <h3 class="text-[30px]">
                No travel found
            </h3>

            <p>

                No departures available from {{ request()->departure }} to {{ request()->destination }}
            </p>
            <div class="w-[200px] bg-orange-500 h-[3px] my-5"></div>
        </div>
        @endif

    </div>
    </div>
</section>
@endsection