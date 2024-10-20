<div class="flex h-screen bg-gray-100" >

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
                    <a href="{{ route('cvs.index') }}" :class="{ 'bg-gray-400 bg-opacity-25': request()->routeIs('cvs.index') }"
                        class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-400 hover:bg-opacity-25 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="margin-right: 80 px">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6l2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2z"
                                clip-rule="evenodd" />
                        </svg>
                        Développeurs
                    </a>
                    <a href="{{ route('skills.index') }}" :class="{ 'bg-gray-400 bg-opacity-25': request()->routeIs('skills.index') }"
                        class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-400 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32" style="margin-right: 8px">
                            <path fill="currentColor"
                                d="M12 4a5 5 0 1 1-5 5a5 5 0 0 1 5-5m0-2a7 7 0 1 0 7 7a7 7 0 0 0-7-7m10 28h-2v-5a5 5 0 0 0-5-5H9a5 5 0 0 0-5 5v5H2v-5a7 7 0 0 1 7-7h6a7 7 0 0 1 7 7zm0-26h10v2H22zm0 5h10v2H22zm0 5h7v2h-7z" />
                        </svg>
                        skills
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Main content -->
    

</div>