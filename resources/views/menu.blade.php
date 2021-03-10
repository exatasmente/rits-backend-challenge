<div  class="md:hidden">
    <div class="fixed z-40 bottom-0 w-full h-10 bg-white">
        <nav class="bg-menu flex justify-center">
            <a href="{{route('admin.dashboard')}}" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium {{request()->is('admin')? 'text-indigo-600 bg-indigo-50 border-b-4 border-indigo-600 focus:outline-none focus:bg-indigo-100': 'text-gray-600 border-b-4 border-transparent hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50' }}  transition ease-in-out duration-150">
                <svg class="mr-3 h-6 w-6 text-indigo-500 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>

            </a>
            <a href="{{route('admin.produtos')}}" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium {{request()->is('admin/produtos*')? 'text-indigo-600 bg-indigo-50 border-b-4 border-indigo-600 focus:outline-none focus:bg-indigo-100': 'text-gray-600 border-b-4 border-transparent hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50' }}  transition ease-in-out duration-150">
                <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-600 group-focus:text-gray-600 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M16 4V16L12 14L8 16V4M6 20H18C19.1046 20 20 19.1046 20 18V6C20 4.89543 19.1046 4 18 4H6C4.89543 4 4 4.89543 4 6V18C4 19.1046 4.89543 20 6 20Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

            </a>
            <a href="{{route('admin.clientes')}}" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium {{request()->is('admin/clientes*')? 'text-indigo-600 bg-indigo-50 border-b-4 border-indigo-600 focus:outline-none focus:bg-indigo-100': 'text-gray-600 border-b-4 border-transparent hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50' }}  transition ease-in-out duration-150">
                <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-600 group-focus:text-gray-600 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>

            </a>
            <button type="submit" form="logout-form" class="focus:outline-none group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 border-l-4 border-transparent hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-600 group-focus:text-gray-600 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor" transform="rotate(180,0,0)">
                    <path d="M11 16L7 12M7 12L11 8M7 12L21 12M16 16V17C16 18.6569 14.6569 20 13 20H6C4.34315 20 3 18.6569 3 17V7C3 5.34315 4.34315 4 6 4H13C14.6569 4 16 5.34315 16 7V8"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </nav>

    </div>
</div>

<div class="flex flex-col  border-r border-gray-200 pt-5 pb-4 bg-white  w-56 overflow-y-auto hidden md:flex">
    <div class="flex items-center flex-shrink-0 px-4">

    </div>
    <div class="mt-5 flex-grow flex flex-col">
        <nav class="flex-1 space-y-1">
            <a href="{{route('admin.dashboard')}}" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium {{request()->is('admin')? 'text-indigo-600 bg-indigo-50 border-l-4 border-indigo-600 focus:outline-none focus:bg-indigo-100': 'text-gray-600 border-l-4 border-transparent hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50' }}  transition ease-in-out duration-150">
                <svg class="mr-3 h-6 w-6 text-indigo-500 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Pedidos
            </a>
            <a href="{{route('admin.produtos')}}" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium {{request()->is('admin/produtos*')? 'text-indigo-600 bg-indigo-50 border-l-4 border-indigo-600 focus:outline-none focus:bg-indigo-100': 'text-gray-600 border-l-4 border-transparent hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50' }}  transition ease-in-out duration-150">
                <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-600 group-focus:text-gray-600 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M16 4V16L12 14L8 16V4M6 20H18C19.1046 20 20 19.1046 20 18V6C20 4.89543 19.1046 4 18 4H6C4.89543 4 4 4.89543 4 6V18C4 19.1046 4.89543 20 6 20Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Produtos
            </a>
            <a href="{{route('admin.clientes')}}" class="group flex items-center px-3 py-2 text-sm leading-5 font-medium {{request()->is('admin/clientes*')? 'text-indigo-600 bg-indigo-50 border-l-4 border-indigo-600 focus:outline-none focus:bg-indigo-100': 'text-gray-600 border-l-4 border-transparent hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50' }}  transition ease-in-out duration-150">
                <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-600 group-focus:text-gray-600 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Clientes
            </a>
            <button type="submit" form="logout-form" class="focus:outline-none group flex items-center px-3 py-2 text-sm leading-5 font-medium text-gray-600 border-l-4 border-transparent hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition ease-in-out duration-150">
                <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-600 group-focus:text-gray-600 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M11 16L7 12M7 12L11 8M7 12L21 12M16 16V17C16 18.6569 14.6569 20 13 20H6C4.34315 20 3 18.6569 3 17V7C3 5.34315 4.34315 4 6 4H13C14.6569 4 16 5.34315 16 7V8"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Sair
            </button>
        </nav>
    </div>
</div>
<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    @csrf
</form>
