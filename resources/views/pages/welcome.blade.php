
@extends('layouts.layout')
@section('content')
    <section class="relative">
        @include('components.navigation')
        <div class="relative h-[calc(100vh-72px)] bg-cover bg-center" style="background-image: url('assets/images/landing.jpg')">
            <div class="bg-black opacity-50 w-full h-full absolute left-0 top-0"></div>
            <div class="relative text-white h-full w-full flex items-center  justify-center">
                <div class="max-w-[700px] text-center">
                    <h1 class="text-6xl font-semibold mb-6">
                         Ultimate Transportation Solution
                    </h1>
                    <p>
                        Welcome to SwiftRide, your go-to transportation service for seamless journeys wherever you need to go. With SwiftRide, getting from point A to point B has never been easier. Whether you're commuting to work, heading out for a night on the town, or catching a flight, our reliable drivers are here to ensure you arrive at your destination comfortably and on time.
                    </p>
                    <button class="block w-[200px] py-3 font-semibold m-auto my-5 bg-yellow-400 rounded-3xl text-black">
                        Explore Rides
                    </button>
                </div>


            </div>
        </div>
    </section>
@endsection
