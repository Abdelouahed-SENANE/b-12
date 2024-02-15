@extends('layouts.layout')
@section('content')
<section class="relative bg-gray-100 min-h-[100vh]">
    @include('components.navigation')
    <div class="w-[80%] mx-auto container my-10">
        <div class="py-2 bg-white px-10 mb-5 rounded-full shadow-[0px_0px_20px_1px_#eee]">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-lg "> Welcome to your dashboard <span class="text-blue-600">{{ auth()->user()->name }}</span></h3>
                <div class="flex items-center  gap-5">
                    <form action="" class="flex items-start min-w-[400px] my-0 flex-row-reverse">
                        <div class="flex flex-col items-center">
                            <label class="relative inline-flex gap-2 items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" id="checkStatus" {{ $available == 1 ? 'checked' : '' }}>
                                <span class="ms-3 text-sm font-medium text-gray-900 ">Availability</span>

                                <div class="w-14 relative  h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-yellow-400
                            peer-checked:after:translate-x-[30px] peer-checked:after:border-white after:content-[''] after:absolute
                            after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                            dark:border-gray-600 peer-checked:bg-yellow-300"></div>
                            </label>
                        </div>
                    </form>
                    <div class="relative ">
                        <img src="{{ asset('assets/uploads/' . auth()->user()->picture) }}" alt="profile" class="w-10  h-10 rounded-full">
                        <span class="absolute w-[8px] h-[8px] top-[-4px] right-0 rounded-full {{ $available == 1 ? 'bg-green-500' : 'bg-red-500' }}" id="status"></span>

                    </div>
                </div>
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
        <h1 class="text-3xl font-semibold my-8">Driver Panel</h1>
        <div class=" bg-white w-fit">
            <ul class="flex items-center rounded-tl-md shadow-md rounded-tr-lg overflow-hidden shadow-[0px_0px_20px_1px_#eee]" id="">
                <li class="bg-black px-4 relative cursor-pointer border-l border-white py-2 text-yellow-400 active  linktab">
                    My Trips histories
                </li>
                <li class="bg-black px-4 relative cursor-pointer border-l border-white py-2 text-yellow-400 linktab">
                    My Route
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
                    <h1 class="text-2xl relative py-4 font-medium w-fit">My Histories <span class="absolute bg-yellow-300 w-[100px] h-[3px] bottom-0 left-[50%] translate-x-[-50%]"></span></h1>
                    <div class="my-5">
                        <div>
                            <div class="overflow-hidden border border-yellow-200  md:rounded-lg">
                                <table class="min-w-full divide-y divide-yellow-500">
                                    <thead class="bg-yellow-400 ">
                                        <tr>
                                            <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-black">
                                                <span>ID_user</span>
                                            </th>

                                            <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                                Picture
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                                Name
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                                Email
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black">Role
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                                Joined at
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left
                                        rtl:text-right text-black">Updated at
                                            </th>

                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-orange-200 " id="users-container">
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap"></td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap"></td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap"></td>

                                            <td class="px-4 py-4 text-sm whitespace-nowrap"></td>
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
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl relative py-4 font-medium w-fit">My Routes <span class="absolute bg-yellow-300 w-[100px] h-[3px] bottom-0 left-[50%] translate-x-[-50%]"></span></h1>
                    </div>
                    <div class="w-[150px]">
                        <button class="block w-full  p-2 font-medium  m-auto mt-2 bg-yellow-400 rounded-sm text-black" id="btn_route">
                            Add route
                        </button>
                    </div>
                </div>
                <div class="overflow-hidden border border-yellow-200 my-5  md:rounded-lg">
                    <table class="min-w-full divide-y divide-yellow-500">
                        <thead class="bg-yellow-400 ">
                            <tr>
                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                    Departure
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                    Destination
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                    Date departure
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                    Time trip
                                </th>
                                <!-- <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black">
                                                Joined at
                                            </th>
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left
                                        rtl:text-right text-black">Updated at
                                            </th>

                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr> -->
                        </thead>
                        <tbody class="bg-white divide-y divide-orange-200 " id="users-container">
                            @if($routes->count() > 0)

                            @foreach ($routes as $route)
                            <tr>
                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">{{ $route->Departure }}</td>
                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">{{ $route->Destination }}</td>
                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">{{ $route->time_depart->format('Y-m-d') }}</td>
                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                    <span>{{ $route->time_depart->format('H:i') }}</span>
                                    <i class="fa-solid fa-arrow-right mx-3"></i>
                                    <span>{{ $route->time_arrival->format('H:i')  }}</span>
                                </td>

                            </tr>
                            @endforeach

                            @else

                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- =========== NEW SECTION  ================ -->
            <div class="content">
                <h1>My Services</h1>

                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, provident.
            </div>
        </div>
    </div>
    <!-- ========== Form Add Route ===============    -->
    <div class="w-full h-screen  fixed left-0  top-0 z-[1000]" id="container_form">
        <div class="bg-black opacity-30 fixed left-0 z-40 top-0 w-full h-screen" onclick="closeForm()"></div>
        <div class="relative w-full h-full flex items-center justify-center">
            <form action="/route/create" method="post" class="bg-white w-[500px] p-3 rounded-lg translate-y-[-50px] z-50" id="form_route">
                @csrf
                <div class="text-right">
                    <i class="fa-solid fa-xmark text-[22px] text-gray-300 hover:text-gray-700 cursor-pointer" onclick="closeForm()"></i>
                </div>
                <div class="flex items-center gap-3 justify-center">
                    <div class="text-center text-xl font-semibold text-yellow-400">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" class="w-12 h-12">
                    </div>
                    <div class="text-center text-xl font-semibold text-yellow-400">
                        <span>Hi-Taxi</span>
                    </div>

                </div>
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
                    <input type="datetime-local" name="date_departure" class="datePicker" class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40 block w-full p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-900 my-1.5">Date Arrival</label>
                    <input type="datetime-local" name="date_arrival" class="datePicker" class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40 block w-full p-2">
                </div>

                <button type="submit" class="block w-full p-2 font-medium  m-auto mt-2 bg-yellow-400 rounded-sm text-black">
                    Add route
                </button>
            </form>
        </div>
    </div>
</section>
@endsection

<script defer src="{{ asset('assets/js/driver.js') }}"></script>