<div>


    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">

        <div class="max-w-md w-full">
                @include('shared.alerts')
            <div>
                <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                    Login
                </h2>
            </div>

            <form wire:submit.prevent="authenticate" class="mt-8"  method="POST">
                @csrf
                <div>
                    <x-input
                        wire:model.lazy="email"
                        aria-label="Email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        placeholder="email@exemplo.com"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border {{$errors->has('email') ? 'border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red' : 'border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300'}} rounded-md focus:outline-none focus:z-10 sm:text-sm sm:leading-5"
                    />
                </div>
                <div class="mt-2">
                    <x-input
                        wire:model.lazy="password"
                        aria-label="Password"
                        name="password"
                        type="password"
                        value="{{ old('password') }}"
                        placeholder="Senha"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border {{$errors->has('password') ? 'border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red' : 'border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300'}} rounded-md focus:outline-none focus:z-10 sm:text-sm sm:leading-5"
                    />

                </div>
                <div class="mt-6">
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Entrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
