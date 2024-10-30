<x-admin.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Ferry') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-x-scroll shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <a href="{{ route('admin.ferry') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition duration-150 ease-in-out">
                            {{ __('List Ferry') }}
                        </a>
                    </div>
                    <div class="container">
                        <form action="{{ route('admin.ferry.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-3">
                                <div>
                                    <x-input-label for="ferry_type" class="block text-sm font-medium mb-1">{{ __('Ferry Type') }}</x-input-label>
                                    <x-text-input type="text"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                        id="ferry_type" name="ferry_type" placeholder="Enter ferry type" />
                                </div>
                                <div>
                                    <x-input-label for="destination" class="block text-sm font-medium mb-1">{{ __('Destination') }}</x-input-label>
                                    <x-text-input type="text"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                        id="destination" name="destination" placeholder="Enter destination" />
                                </div>
                                <div>
                                    <x-input-label for="pickup_location_wise" class="block text-sm font-medium mb-1">{{ __('Pickup Location') }}</x-input-label>
                                    <x-text-input type="text"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                        id="pickup_location_wise" name="pickup_location_wise" placeholder="Enter pickup location" />
                                </div>
                                <div>
                                    <x-input-label for="pickup_sightseeing_point" class="block text-sm font-medium mb-1">{{ __('Pickup Sightseeing Point') }}</x-input-label>
                                    <x-text-input type="text"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                        id="pickup_sightseeing_point" name="pickup_sightseeing_point" placeholder="Enter pickup sightseeing point" />
                                </div>
                                <div>
                                    <x-input-label for="drop_location_wise" class="block text-sm font-medium mb-1">{{ __('Drop Location') }}</x-input-label>
                                    <x-text-input type="text"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                        id="drop_location_wise" name="drop_location_wise" placeholder="Enter drop location" />
                                </div>
                                <div>
                                    <x-input-label for="drop_sightseeing_point" class="block text-sm font-medium mb-1">{{ __('Drop Sightseeing Point') }}</x-input-label>
                                    <x-text-input type="text"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                        id="drop_sightseeing_point" name="drop_sightseeing_point" placeholder="Enter drop sightseeing point" />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-3">
                                <div>
                                    <x-input-label for="price" class="block text-sm font-medium mb-1">{{ __('Price') }}</x-input-label>
                                    <x-text-input type="number"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                        id="price" name="price" placeholder="Enter price" />
                                </div>
                                <div>
                                    <x-input-label for="pick_session_price" class="block text-sm font-medium mb-1">{{ __('Pick Session Price') }}</x-input-label>
                                    <x-text-input type="number"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                        id="pick_session_price" name="pick_session_price" placeholder="Enter pick session price" />
                                </div>
                                <div>
                                    <x-input-label for="off_session_price" class="block text-sm font-medium mb-1">{{ __('Off Session Price') }}</x-input-label>
                                    <x-text-input type="number"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                                        id="off_session_price" name="off_session_price" placeholder="Enter off session price" />
                                </div>
                            </div>

                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                {{__('Submit') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
