@extends('layouts.layout')
@section('content')
<section class="relative">
    @include('components.navigation')
    <div class="relative h-[calc(100vh-72px)] bg-cover bg-center" style="background-image: url('assets/images/landing.jpg')">
        <div class="bg-black opacity-50 w-full h-full absolute left-0 top-0"></div>
        <div class="relative text-white h-full w-full flex items-center  justify-center">
            <div class="container w-[80%] mx-auto flex items-center justify-between">
                <div class="max-w-[700px]  ">
                    <h1 class="text-6xl font-semibold mb-6">
                        Ultimate Transportation Solution
                    </h1>
                    <p class="">
                        Welcome to SwiftRide, your go-to transportation service for seamless journeys wherever you need to go. With SwiftRide, getting from point A to point B
                        has never been easier. Whether you're commuting to work, heading out for a night on the town, or catching a flight, our reliable drivers are here to
                        ensure you arrive at your destination comfortably and on time.
                    </p>
                    <button class="block w-[200px] py-3 font-semibold m-auto my-5 bg-yellow-400 rounded-3xl text-black">
                        Explore Rides
                    </button>
                </div>
                <div class="bg-white rounded-sm p-2 min-w-[400px]">
                    <h4 class="text-gray-900 text-center text-lg font-semibold ">Planifier votre voyage</h4>
                    <form action="/results" method="get">

                        <div>

                            <label for="countries" class="block text-sm font-medium text-gray-900 my-1.5">Departure</label>
                            <select id="depart" name="departure" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-300
                                focus:outline-none focus:ring focus:ring-opacity-40 block w-full p-2
                                .5 ">
                                <option selected hidden value=""> Choose a Departure</option>
                            </select>

                        </div>
                        <div>

                            <label for="countries" class="block text-sm font-medium text-gray-900 my-1.5">Destination</label>
                            <select id="destination" name="destination" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-300
                                    focus:outline-none focus:ring focus:ring-opacity-40 block w-full p-2
                                    .5 ">
                                <option selected hidden value="">Choose a Destination</option>

                            </select>

                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-900 my-1.5">Date departure</label>
                            <input type="date" name="date_departure" id="datePicker" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40 block w-full p-2">
                        </div>
                        <button type="submit" class="block w-full p-2 font-medium  m-auto mt-2 bg-yellow-400 rounded-sm text-black">
                            Search
                        </button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>
@endsection