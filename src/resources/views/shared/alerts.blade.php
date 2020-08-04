<div>
@if ($errors->any() or session()->has('error'))
<div x-data="{open : false}" x-init="setTimeout(()=>{open=true},250)" class="rounded-md bg-red-200 p-4 my-2"
     x-show="open"
     x-transition:enter="transition ease-out duration-100 transform"
     x-transition:enter-start="opacity-0 scale-95"
     x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-75 transform"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-95"
>
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-8 w-8 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            <h3 class="text-md leading-5 font-medium text-red-800">
                Erro:
            </h3>
            <div class="mt-2 text-md leading-5 text-red-700">
                <ul class="list-disc pl-5">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <li class="mt-1">
                                {{$error}}
                            </li>
                        @endforeach
                    @else
                        <li class="mt-1">
                            {{session()->get('error')}}
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endif
@if (session()->has('success'))
    <div x-data="{open : false}" x-on:click.away="open = false" x-init="setTimeout(()=>{open=true},250)" class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end z-10"
         x-show="open"
         x-transition:enter="transition ease-out duration-100 transform"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75 transform"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
    >
        <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto">
            <div class="rounded-lg shadow-xs overflow-hidden">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm leading-5 font-medium text-gray-900">
                                Sucesso !
                            </p>
                            <p class="mt-1 text-sm leading-5 text-gray-500">
                                {{session()->get('success')}}
                            </p>
                        </div>
                        <div class="ml-4 flex-shrink-0 flex">
                            <button x-on:click="open= false" class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
</div>
