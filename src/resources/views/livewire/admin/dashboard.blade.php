<div>
    <div wire:ignore x-data="{open : false}" x-init="open= true" x-on:click.away="open=false" class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end"
         x-show="open"
         x-transition:enter="transition ease-out duration-100 transform"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75 transform"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
    >
        <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto">
            <div class="rounded-lg shadow-xs">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 pt-0.5">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80" alt="">
                        </div>
                        <div class="ml-3 w-0 flex-1">
                            <p class="text-sm leading-5 font-medium text-gray-900">
                                Emilia Gates
                            </p>
                            <p class="mt-1 text-sm leading-5 text-gray-500">
                                Sent you an invite to connect.
                            </p>
                            <div class="mt-4 flex">
              <span class="inline-flex rounded-md shadow-sm">
                <button x-on:click="open=false" type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                  Accept
                </button>
              </span>
                                <span class="ml-3 inline-flex rounded-md shadow-sm">
                <button x-on:click="open=false" type="button" class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                  Decline
                </button>
              </span>
                            </div>
                        </div>
                        <div class="ml-4 flex-shrink-0 flex">
                            <button x-on:click="open=false" class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
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
    <div class="flex flex-col">
        <div class="mt-4">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Last 30 days
            </h3>
            <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dl>
                            <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                Total Subscribers
                            </dt>
                            <dd class="mt-1 text-3xl leading-9 font-semibold text-gray-900">
                                71,897
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dl>
                            <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                Avg. Open Rate
                            </dt>
                            <dd class="mt-1 text-3xl leading-9 font-semibold text-gray-900">
                                58.16%
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <dl>
                            <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                Avg. Click Rate
                            </dt>
                            <dd class="mt-1 text-3xl leading-9 font-semibold text-gray-900">
                                24.57%
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="mt-4 mb-10 p-2 text-3xl leading-6 font-medium text-gray-900">
            Pedidos
        </h3>
        <!-- 3 column wrapper -->
        <div class="grid-rows-3 flex flex-col md:grid-rows-1 rounded-md shadow">
            <!-- Left sidebar & main wrapper -->
            <div class="bg-white flex-1 sm:col-span-1">
                <div class="xl:flex-shrink-0 xl:border-r xl:border-gray-200 bg-white">
                    <div class="px-4 py-3">

                        <livewire:admin.pedido-list type="1" grid="true" list-name="Pendente:" key="pendentes" >
                        </livewire:admin.pedido-list>

                    </div>
                </div>


            </div>
            <div class="bg-white flex-1 sm:col-span-1">
                <div class="xl:flex-shrink-0 xl:border-r xl:border-gray-200 bg-white">
                    <div class="px-4 py-3">

                        <livewire:admin.pedido-list type="2" list-name="Em Preparo:" key="em_preparo"></livewire:admin.pedido-list>
                   </div>
                </div>
            </div>
            <div class="bg-white flex-1 sm:col-span-1">
                <div class="xl:flex-shrink-0 xl:border-r xl:border-gray-200 bg-white">
                    <div class="px-4 py-3">
                        <livewire:admin.pedido-list type="3" list-name="Em Entrega:" key="em_entrega"></livewire:admin.pedido-list>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
