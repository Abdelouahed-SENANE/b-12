@extends('layouts.layout')
@section('content')
    <section class="bg-gray-100 pt-[150px] h-screen w-full">
        <div class="w-[60%]  mx-auto flex  gap-8">
            <aside class="w-[300px] bg-white p-5 rounded">
                <div class="flex justify-center cursor-pointer upload_img" id="button_img">
                    <div class="relative">
                        <img src="{{ asset('assets/uploads/' . auth()->user()->picture) }}" alt="" class="w-24 h-24
                        rounded-full">
                        <button class="bg-gray-300 upload absolute right-1.5 top-[60px] p-1.5 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="text-center py-8">
                    <h2 class="font-semibold text-xl">{{ auth()->user()->name }}</h2>
                    <span class="text-gray-500 text-sm">{{ auth()->user()->email  }}</span>
                    <div class="py-5">
                        <h4 class="font-medium text-xl text-yellow-400">About</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                </div>
                <div class=" fixed top-0 left-0  opacity-0 invisible w-full h-screen z-50"
                     id="upload-container">
                    <div class="bg-black opacity-25 fixed top-0 left-0 h-screen w-full" onclick="closeImg()"></div>
                    <div class="p-2 bg-white w-[450px] fixed  top-[50%] left-[50%] translate-y-[-180%]
                    translate-x-[-50%] z-40 rounded-xl transition-all duration-300 ease-in-out" id="field_img">

                        <div class="flex items-center justify-center w-full">
                            <form action="/driver/image/{{ auth()->user()->id }}" class="w-full h-full" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div>
                                    <input required type="file" name="image" id="" class="block file:bg-yellow-400
                                    file:py-2.5 file:px-4
                                        file:border-none file:text-black text-sm rounded-3xl rounded-tl-3xl
                                        rounded-bl-3xl
                                        w-full
                                        my-5 bg-gray-100">
                                </div>
                                <div class="flex items-center justify-center">
                                    <input type="submit" value="save" class="block bg-yellow-400 w-[120px] py-1.5
                                    rounded-3xl">
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </aside>
            <main class="flex-grow bg-white p-5 relative rounded">

                <form action="/driver/update/{{ auth()->user()->id }}" method="post">
                    @method('patch')
                    @csrf
                    <div>
                        <h2 class="text-yellow-400 font-semibold text-xl">
                            Personal Details
                        </h2>
                    </div>
                    @if($errors->any())
                        <div class="text-rose-500 bg-red-500/10 rounded-xl text-sm p-1">
                            <p class="my-1 font-semibold ml-5 text-md">Somethings wrong!</p>
                            <ul class="ml-12">
                                @foreach($errors->all() as $error)
                                    <li class="list-disc">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="grid grid-cols-2 gap-7 my-5">
                        <div>
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $driver->name }}" id="name" class="block
                            w-full px-5
                            py-2
                            mt-2
                            text-gray-700
                             placeholder-gray-400 bg-white text-sm
                                        border border-gray-200 rounded-lg dark:placeholder-gray-600
                                        focus:border-yellow-400 dark:focus:border-yellow-400 focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40" placeholder="Enter name">
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="{{ $driver->email }}" class="block
                            w-full px-5 py-2 mt-2
                            text-gray-700
                             placeholder-gray-400 bg-white text-sm
                                        border border-gray-200 rounded-lg dark:placeholder-gray-600
                                        focus:border-yellow-400 dark:focus:border-yellow-400 focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40" placeholder="Enter email">
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="name" value="{{$driver->password}}"
                                   class="block w-full px-5 py-2 mt-2
                            text-gray-700
                             placeholder-gray-400 bg-white text-sm
                                        border border-gray-200 rounded-lg dark:placeholder-gray-600
                                        focus:border-yellow-400 dark:focus:border-yellow-400 focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40" placeholder="********">
                        </div>
                    </div>
                    <div>
                        <h2 class="text-yellow-400 font-semibold text-xl">
                            Vehicular Details
                        </h2>
                    </div>
                    <div class="grid grid-cols-2 gap-7 my-5">
                        <div>
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" value="{{$driver->description}}"
                                   class="block w-full px-5 py-2 mt-2
                            text-gray-700
                             placeholder-gray-400 bg-white text-sm
                                        border border-gray-200 rounded-lg dark:placeholder-gray-600
                                        focus:border-yellow-400 dark:focus:border-yellow-400 focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40" placeholder="********">
                        </div>
                        <div>
                            <label for="email">registration</label>
                            <input type="text" name="registration" id="email" value="{{ $driver->registration }}"
                                   class="block
                            w-full px-5 py-2 mt-2
                            text-gray-700
                             placeholder-gray-400 bg-white text-sm
                                        border border-gray-200 rounded-lg dark:placeholder-gray-600
                                        focus:border-yellow-400 dark:focus:border-yellow-400 focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40" placeholder="Enter registration">
                        </div>
                        <div>
                            <label for="email">Car type</label>
                            <input type="text" name="type" id="email" value="{{ $driver->type_car }}" class="block
                            w-full px-5 py-2 mt-2
                            text-gray-700
                             placeholder-gray-400 bg-white text-sm
                                        border border-gray-200 rounded-lg dark:placeholder-gray-600
                                        focus:border-yellow-400 dark:focus:border-yellow-400 focus:ring-yellow-300
                                        focus:outline-none focus:ring focus:ring-opacity-40" placeholder="Enter type">
                        </div>
                    </div>
                    <div class="flex items-center gap-3  justify-end">
                        <input type="submit" name="update" id="" value="update" class="bg-yellow-400 py-1.5 px-5
                        rounded-3xl block
                        cursor-pointer">
                        <a href="/" class="block bg-gray-400 text-white py-1.5 px-5 rounded-3xl">Cancel</a>
                    </div>
                </form>
            </main>
        </div>
    </section>
@endsection
