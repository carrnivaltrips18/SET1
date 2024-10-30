<x-admin.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Country') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('status'))
                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <section>
                        <div class="mb-4">
                            <a href="{{ route('admin.country.list') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                {{ __('Country List') }}
                            </a>
                        </div>
                        <form method="POST" action="{{ route('admin.country.store') }}" class="mt-6 space-y-6">
                            @csrf

                            <div>
                                <x-input-label for="country_name" :value="__('Country Name')" />
                                <x-text-input id="country_name" name="country_name" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('country_name')" />
                            </div>

                            <div>
                                <x-input-label for="state" :value="__('State')" />
                                <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('state')" />
                            </div>

                            <div>
                                <x-input-label for="city" :value="__('City')" />
                                <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('city')" />
                            </div>

                            <div>
                                <x-input-label for="zip_code" :value="__('ZIP Code')" />
                                <x-text-input id="zip_code" name="zip_code" type="number" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('zip_code')" />
                            </div>

                            <div class="flex justify-center mt-4">
                                <x-primary-button>{{ __('Create') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
