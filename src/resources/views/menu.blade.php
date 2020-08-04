<div  class="md:hidden">
    <div class="fixed z-40 bottom-0 w-full h-10 bg-menu">
        <nav class="py-2 bg-menu flex justify-center">
            <a href=""  class="flex ml-2 px-2">
                <svg class="ml-1 h-6 w-6 text-menu group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="none" fill="currentColor" viewBox="0 0 24 24">

                    <path  d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z"/>
                </svg>
            </a>
            {{--Home  --}}
            <a href=""  class="flex px-2">
                <svg class="ml-1 h-6 w-6 text-menu group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="none" fill="currentColor" viewBox="0 0 24 24">
                    <path class="heroicon-ui" d="M13 20v-5h-2v5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-7.59l-.3.3a1 1 0 1 1-1.4-1.42l9-9a1 1 0 0 1 1.4 0l9 9a1 1 0 0 1-1.4 1.42l-.3-.3V20a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2zm5 0v-9.59l-6-6-6 6V20h3v-5c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v5h3z"/>
                </svg>

            </a>
            {{-- lembretes --}}
            <a href=""  class="flex px-2">
                <svg class="ml-1 h-6 w-6 text-menu group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="none" fill="currentColor" viewBox="0 0 24 24">
                    <path class="heroicon-ui" d="M7 5H5v14h14V5h-2v10a1 1 0 0 1-1.45.9L12 14.11l-3.55 1.77A1 1 0 0 1 7 15V5zM5 3h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2zm4 2v8.38l2.55-1.27a1 1 0 0 1 .9 0L15 13.38V5H9z"/>

                </svg>
                {{-- Configurações --}}
            </a>
            {{-- Logout --}}
            <a href="#"
               onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
               class="flex px-2 mr-2"
            >
                <svg class="ml-1 h-6 w-6 text-menu group-focus:text-indigo-300 transition ease-in-out duration-150" stroke="currentColor" fill="currentColor" viewBox="0 0 24 24">
                    <path stroke="null" id="svg_3" d="m11.82696,22.34704l-6.40879,0c-1.74169,0 -3.15485,-1.35646 -3.15485,-3.01713l0,-14.77148c0,-1.66566 1.41838,-3.01713 3.15485,-3.01713l6.51308,0c0.3911,0 0.70398,-0.29922 0.70398,-0.67324s-0.31288,-0.67324 -0.70398,-0.67324l-6.51308,0c-2.51867,0 -4.5628,1.95989 -4.5628,4.36362l0,14.77148c0,2.40872 2.04935,4.36362 4.5628,4.36362l6.40879,0c0.3911,0 0.70398,-0.29922 0.70398,-0.67324s-0.31809,-0.67324 -0.70398,-0.67324z"/>
                    <path stroke="null" id="svg_4" d="m23.42431,11.4704l-4.47416,-4.27884c-0.27638,-0.26431 -0.71962,-0.26431 -0.996,0c-0.27638,0.26431 -0.27638,0.68821 0,0.95252l3.27479,3.13183l-14.28288,0c-0.3911,0 -0.70398,0.29922 -0.70398,0.67324s0.31288,0.67324 0.70398,0.67324l14.28288,0l-3.27479,3.13183c-0.27638,0.26431 -0.27638,0.68821 0,0.95252c0.13558,0.12966 0.31809,0.19948 0.49539,0.19948s0.35981,-0.06483 0.49539,-0.19948l4.47416,-4.27884c0.28159,-0.2693 0.28159,-0.69818 0.00521,-0.9575z"/>
                </svg>


            </a>
        </nav>

    </div>
</div>

<div class="flex flex-col  border-r border-gray-200 pt-5 pb-4 bg-white overflow-y-auto hidden md:flex">
    <div class="flex items-center flex-shrink-0 px-4">
        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-on-white.svg" alt="Workflow">
    </div>
    <div class="mt-5 flex-grow flex flex-col">
        <nav class="flex-1 bg-white space-y-1">
            <a href="{{route('admin.dashboard')}}" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-indigo-600 bg-indigo-50 border-l-4 border-indigo-600 focus:outline-none focus:bg-indigo-100 transition ease-in-out duration-150">
                <svg class="mr-3 h-6 w-6 text-indigo-500 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Pedidos
            </a>
            <a href="{{route('admin.produtos')}}" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 border-l-4 border-transparent hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-600 group-focus:text-gray-600 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Produtos
            </a>
            <a href="{{route('admin.clientes')}}" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 border-l-4 border-transparent hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-600 group-focus:text-gray-600 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                </svg>
                Clientes
            </a>
            <a href="#" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 border-l-4 border-transparent hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-600 group-focus:text-gray-600 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                Sair
            </a>
        </nav>
    </div>
</div>
