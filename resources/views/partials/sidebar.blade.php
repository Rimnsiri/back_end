<div class="flex h-screen bg-gray-100 w-64" >

    <!-- sidebar -->
    <div class="fixed inset-y-0 left-0 flex-col w-64 bg-gray-800 md:flex rounded-2xl">

        <div class="flex flex-col flex-1 overflow-y-auto">
            <nav
                class="flex flex-col flex-1 gap-10 px-2 py-4 overflow-y-auto bg-gradient-to-b from-gray-700 to-blue-500 rounded-2xl">
                <div>
                    <a href="/dashboard" class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        Dashboard
                    </a>
                </div>
                <div class="flex flex-col flex-1 gap-3">
                    <a href="/dashboard" :class="{ 'bg-gray-400 bg-opacity-25': request()->routeIs('/dashboard') }"
                        class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-400 hover:bg-opacity-25 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="margin-right: 80 px">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6l2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2z"
                                clip-rule="evenodd" />
                        </svg>
                        Home
                    </a>
                    <a href="{{ route('devs.index') }}" :class="{ 'bg-gray-400 bg-opacity-25': request()->routeIs('devs.index') }"
                        class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-400 hover:bg-opacity-25 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="24" height="24"  
                        viewBox="0 0 512 512" style="margin-right: 80 px">
                        <path
                          d="M437.02 74.98C388.668 26.63 324.379 0 256 0S123.332 26.629 74.98 74.98C26.63 123.332 0 187.621 0 256s26.629 132.668 74.98 181.02C123.332 485.37 187.621 512 256 512s132.668-26.629 181.02-74.98C485.37 388.668 512 324.379 512 256s-26.629-132.668-74.98-181.02zM111.105 429.297c8.454-72.735 70.989-128.89 144.895-128.89 38.96 0 75.598 15.179 103.156 42.734 23.281 23.285 37.965 53.687 41.742 86.152C361.641 462.172 311.094 482 256 482s-105.637-19.824-144.895-52.703zM256 269.507c-42.871 0-77.754-34.882-77.754-77.753C178.246 148.879 213.13 114 256 114s77.754 34.879 77.754 77.754c0 42.871-34.883 77.754-77.754 77.754zm170.719 134.427a175.9 175.9 0 0 0-46.352-82.004c-18.437-18.438-40.25-32.27-64.039-40.938 28.598-19.394 47.426-52.16 47.426-89.238C363.754 132.34 315.414 84 256 84s-107.754 48.34-107.754 107.754c0 37.098 18.844 69.875 47.465 89.266-21.887 7.976-42.14 20.308-59.566 36.542-25.235 23.5-42.758 53.465-50.883 86.348C50.852 364.242 30 312.512 30 256 30 131.383 131.383 30 256 30s226 101.383 226 226c0 56.523-20.86 108.266-55.281 147.934zm0 0"
                          data-original="#000000" />
                      </svg>
                        Développeurs
                    </a>
                    <a href="{{ route('skills.index') }}" :class="{ 'bg-gray-400 bg-opacity-25': request()->routeIs('skills.index') }"
                        class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-400 rounded-2xl">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"
                        style="margin-right: 80 px">
                            <path d="M11 9a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"/>
                            <path fill-rule="evenodd" d="M9.896 3.051a2.681 2.681 0 0 1 4.208 0c.147.186.38.282.615.255a2.681 2.681 0 0 1 2.976 2.975.681.681 0 0 0 .254.615 2.681 2.681 0 0 1 0 4.208.682.682 0 0 0-.254.615 2.681 2.681 0 0 1-2.976 2.976.681.681 0 0 0-.615.254 2.682 2.682 0 0 1-4.208 0 .681.681 0 0 0-.614-.255 2.681 2.681 0 0 1-2.976-2.975.681.681 0 0 0-.255-.615 2.681 2.681 0 0 1 0-4.208.681.681 0 0 0 .255-.615 2.681 2.681 0 0 1 2.976-2.975.681.681 0 0 0 .614-.255ZM12 6a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z" clip-rule="evenodd"/>
                            <path d="M5.395 15.055 4.07 19a1 1 0 0 0 1.264 1.267l1.95-.65 1.144 1.707A1 1 0 0 0 10.2 21.1l1.12-3.18a4.641 4.641 0 0 1-2.515-1.208 4.667 4.667 0 0 1-3.411-1.656Zm7.269 2.867 1.12 3.177a1 1 0 0 0 1.773.224l1.144-1.707 1.95.65A1 1 0 0 0 19.915 19l-1.32-3.93a4.667 4.667 0 0 1-3.4 1.642 4.643 4.643 0 0 1-2.53 1.21Z"/>
                          </svg>
                          
                        skills
                    </a>
                    <a href="/dashboard" :class="{ 'bg-gray-400 bg-opacity-25': request()->routeIs('/dashboard') }"
                        class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-400 hover:bg-opacity-25 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="margin-right: 80 px">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6l2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2z"
                                clip-rule="evenodd" />
                        </svg>
                        Messages
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Main content -->
    

</div>