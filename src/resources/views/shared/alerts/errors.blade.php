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
</div>
