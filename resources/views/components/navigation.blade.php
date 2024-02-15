<header class="bg-white relative">
    <nav class="py-3 bg-transparent relative z-20">
        <div class="container mx-auto w-[80%]">
            <div class="flex items-center justify-between">
                <div>
                    <a href="/" class="flex items-center">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" class="w-12 h-12">

                    </a>

                </div>


                <div class="absolute z-20 bg-white  lg:bg-transparent  left-0 h-0 w-full
                overflow-hidden
                transition-all
                duration-300
                ease-in-out
                top-full
                 lg:relative lg:h-auto lg:w-full" id="navbar">
                    <div class=" mx-auto w-[80%] lg:w-auto lg:mx-0 flex flex-col lg:flex-row lg:items-center
                    lg:justify-end">
                        <ul class=" flex flex-col lg:flex-row   px-5 lg:p-0  lg:justify-end">
                            <li class="my-2 mx-2">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                        </ul>
                        @auth
                        <div class="text-black lg:hidden px-5 lg:p-0 flex flex-col ">
                            <a href="/profile" class="block mx-2 my-2">Profile</a>
                            <a href="/logout" class="block mx-2 my-2">logout</a>
                        </div>
                        @else
                        <div class="flex lg:items-center px-5 lg:p-0  text-gray-600 flex-col mb-5 lg:mb-0 lg:flex-row">
                            <a href="{{ url('/signin') }}" class="block px-5 text-center mb-2 lg:mb-0 lg:mx-2
                            max-w-[100px]
                            rounded-3xl
                            py-2
                            bg-yellow-400">Login</a>
                            <a href="{{ url('/signup') }}" class="block px-5 text-center max-w-[100px] rounded-3xl
                            py-2 border
                            border-yellow-400">Sign up</a>
                        </div>
                        @endauth
                    </div>
                </div>
                <div>
                    <div class=" lg:hidden">
                        <button id="toggle_menu">
                            <i class="fa-solid fa-burger text-2xl hover:text-orange-500 transition-colors duration-200 ease-linear
                        "></i>
                        </button>
                    </div>
                    <div class="relative">
                        @auth
                        <div class="hidden lg:block">
                            <button class="block" id="edit_control">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                            </button>
                            <div class="text-black bg-white absolute right-[-80px] opacity-0 invisible
                                transition-all
                                duration-300 ease-in-out
                                translate-y-[40px]
                                top-[40px] shadow-sm rounded-sm
                                z-60 " id="my_profile">
                                <ul class="w-[160px]">
                                    <li>
                                        @driver
                                        <a href="/driver/profile" class="block mx-2 my-2">Profile</a>
                                        <a href="/driver/dashboard" class="block mx-2 my-2">Dashboard</a>
                                        @enddriver
                                        @passenger
                                        <a href="/passenger/profile" class="block mx-2 my-2">Profile</a>
                                        @endpassenger
                                    </li>

                                    @passenger
                                    <li>
                                        <a href="/passenger/dashboard" class="block mx-2 my-2">Dashboard</a>
                                    </li>
                                    @endpassenger
                                    <li>
                                        <a href="/logout" class="block mx-2 my-2">logout</a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
    </nav>
</header>