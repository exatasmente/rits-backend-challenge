<div>
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
