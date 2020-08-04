<div>
    <div class="fixed bottom-0 top-0 inset-x-0 px-4 py-4 sm:inset-0 sm:p-0 sm:flex sm:items-center sm:justify-center">
        <div {{$attributes}} class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div style="max-height: 90%; min-height: auto;" class="bg-white rounded-lg px-4 pt-5 pb-4 overflow-auto shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            {{$slot}}
        </div>
</div>
