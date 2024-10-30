<x-admin.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Country') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section>
                        <form method="POST" action="{{ route('admin.country.update', $country->id) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')

                            <div>
                                <x-input-label for="country_name" :value="__('Country Name')" />
                                <x-text-input id="country_name" name="country_name" type="text" class="mt-1 block w-full" value="{{ old('country_name', $country->country_name) }}" required />
                                <x-input-error class="mt-2" :messages="$errors->get('country_name')" />
                            </div>

                            <div>
                                <x-input-label for="state" :value="__('State')" />
                                <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" value="{{ old('state', $country->state) }}" required />
                                <x-input-error class="mt-2" :messages="$errors->get('state')" />
                            </div>

                            <div>
                                <x-input-label for="city" :value="__('City')" />
                                <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" value="{{ old('city', $country->city) }}" required />
                                <x-input-error class="mt-2" :messages="$errors->get('city')" />
                            </div>

                            <div>
                                <x-input-label for="zip_code" :value="__('ZIP Code')" />
                                <x-text-input id="zip_code" name="zip_code" type="number" class="mt-1 block w-full" value="{{ old('zip_code', $country->zip_code) }}" required />
                                <x-input-error class="mt-2" :messages="$errors->get('zip_Code')" />
                            </div>

                            <div class="flex justify-center mt-4">
                                <x-primary-button>{{ __('Update') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
